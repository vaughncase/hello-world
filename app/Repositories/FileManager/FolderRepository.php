<?php
/**
 *File name : FolderRepository.php  / Date: 6/20/2019 - 2:44 PM
 *Code Owner: Tke
 */
namespace App\Repositories\FileManager;

use App\Models\FileManager\Folder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class FolderRepository{

    protected $folder;
    protected $file_server_config;
    protected $folder_types;

    public function __construct()
    {
        $this->folder = Config::get('file_manager.folder');
        $this->file_server_config = Config::get('file_server');
        $this->folder_types = Config::get('file_manager.folder_types');
    }


    public function getParentFolder(User $user, $parent_id, $with_children=false){

        $query_folder = Folder::whereId($parent_id)
            ->where('user_id',$user->id)
            ->where('soft_delete',0);

        $query_folder = $with_children ? $query_folder->with('children') : $query_folder ;
        $folder = $query_folder->first();

        return $folder;
    }

    public function checkExistNameFolder(Folder $folder, $new_name){
        $exist_folders = Folder::where('user_id',$folder->user_id)
            ->where('parent_id',$folder->parent_id)
            ->where('soft_delete',0)
            ->where('id','<>',$folder->id)
            ->whereName($new_name)
            ->get();

        return count($exist_folders) > 0;
    }


    public function getMainFoldersWithChildrenByType(User $user, $type, $folder_id){
        if($folder_id == 0)
            return $this->getDefaultFolder($user->id, $type);


        $folder = Folder::whereId($folder_id)
            ->where('user_id',$user->id)
            ->where('type',$type)
            ->where('soft_delete',0)
            ->with('children','children.children','children.files','files')
            ->first();

        return $folder;
    }

    public function createDefaultFolder($user_id, $type){
        $main_folder_path = $this->getMainFolderPath($user_id, $type);

        $folder = Folder::create([
            'user_id'   => $user_id,
            'name'      => $type == 1 ? trans('file_manager.main_folder_photos') : trans('file_manager.main_folder_files'),
            'path'      => $main_folder_path,
            'parent_id' => 0,
            'type'      => $type,
            'code_url'  => 1
        ]);

        $folder->children = collect();

        // synchronize all file in here
        $this->synchronizeDefaultFolder($folder);

        return $folder;
    }

    public function standardizePath($path){
        $params = explode("/",$path);
        foreach($params as $index=>$param){
            if(trim($param," ") == "")
                unset($params[$index]);
        }
        return implode("/",$params);
    }

    protected function getMainFolderPath($user_id,$type){
        $folder_type = $this->folder_types[$type];
        return '/public/'.$this->standardizePath($this->folder['main'])
            .'/'.$this->standardizePath($this->folder[$folder_type])
            .'/'.$user_id;
    }

    public function getDefaultFolder($user_id, $type){
        $folder = Folder::where('user_id',$user_id)
            ->where('parent_id',0)
            ->where('type',$type)
            ->where('soft_delete',0)
            ->with('children','children.children','children.files','files')
            ->first();
        return !is_null($folder) ? $folder :  $this->createDefaultFolder($user_id,$type);
    }

    public function createFolderByParentFolder(User $user,Folder $parent_folder, $name, $new_folder_path=null){

        $new_folder_path = !is_null($new_folder_path) ? $new_folder_path :  Carbon::now()->timestamp;

        $folder = Folder::create([
            'user_id'   => $user->id,
            'name'      => $name,
            'path'      => '/'.$this->standardizePath($parent_folder->path).'/'.$new_folder_path,
            'parent_id' => $parent_folder->id,
            'type'      => $parent_folder->type,
            'code_url'  => 1
        ]);

        return $folder;
    }

    public function getFolderWithParents(Folder $folder, $limit=4){
        $folders = collect();
        $folders->prepend(clone($folder));
        $child_folder = $folder;


        for($i = $limit; $i > 0 ; $i--){
            $parent_folder =  Folder::whereId($child_folder->parent_id)
                ->where('user_id',$child_folder->user_id)
                ->where('soft_delete',0)
                ->first();

            if(is_null($parent_folder))
                break;

            $folders->prepend(clone($parent_folder));
            $child_folder = $parent_folder;
        }

        return $folders;
    }

    public function getDirectory($folder_path){

        $path = $this->standardizePath($folder_path);

        $folders = explode("/",$path);
        $default_path = '';
        foreach($folders as $folder){
            $default_path = $default_path.'/'.$folder;
            if($default_path[0] == '/')
                $default_path = substr($default_path,0,1); // makeDirectory('path') - not '/path'

            if (!File::exists($default_path)) {
                File::makeDirectory($default_path, 755, true);
            }
        }

        return $path;
    }

    public function synchronizeDefaultFolder(Folder $folder){
        $synchronize_repository = new SynchronizeOldFiles();
        $synchronize_repository->makeFoldersByUser($folder->user_id,$folder->type);
        sleep(5);
        $synchronize_repository->makeDBFromFiles($folder->user_id,$folder->type);
        return $folder;

    }

}