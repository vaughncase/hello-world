<?php
/**
 *File name : FileRepository.php  / Date: 6/21/2019 - 6:04 PM
 *Code Owner: Tke
 */
namespace App\Repositories\FileManager;

use App\Entities\FileEntity;
use App\Models\FileManager\Folder;
use Carbon\Carbon;
use App\Models\FileManager\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class FileRepository{

    protected $validMimeTypes;
    protected $folderTypes;

    public function __construct()
    {
        $this->validMimeTypes = Config::get('file_manager.valid_mime_types');
        $this->folderTypes = Config::get('file_manager.folder_types');
    }

    public function uploadFile($folder_path, $type, $file){
        $extension = $this->checkExistExtenstion($file, $type);
        if(!$extension)
            return false;
        $folder_repository = new FolderRepository();
        $directory = $folder_repository->getDirectory($folder_path);
        $filename = Carbon::now()->timestamp.'_'.randomString();
        $newFile = (new FileEntity())->saveFileAmazon($file, $filename, $directory,false);
        if(!$newFile)
            return false;

        return array(
            'path'              => $newFile,
            'name'              => $file->getClientOriginalName(),
            'extension'         => $extension,
            'content_type'      => $file->getClientMimeType()
        );

    }

    public function saveDatabaseFileAndUpload(Folder $folder, $type, $file){
        $upload = $this->uploadFile($folder->path, $type,$file);

        if(!$upload)
            return false;

        $dataCreateFile = $upload;
        $dataCreateFile['folder_id']  = $folder->id;
        $dataCreateFile['user_id']    = Auth::user()->id;
        $dataCreateFile['soft_delete']= 0;
        $dataCreateFile['type']       = $type;
        $dataCreateFile['code_url']   = $folder->code_url;

        $file =  File::create($dataCreateFile);

        $fileCacheRepository = new FileCacheRepository();
        $fileCacheRepository->saveCache(0,$file);
        return $file;
    }

    /**
     * Kiểm tra đuôi tệp hợp lệ
     * @param $file
     * @param $type
     * @return bool
     */
    public function checkExistExtenstion($file, $type){

        $extension = strtolower($file->getClientOriginalExtension());

        $folderType = $this->folderTypes[$type];
        $validMimeTypes = $this->validMimeTypes[$folderType];

        return in_array($extension, $validMimeTypes) ? $extension : false;
    }

    public function getFile($type, $file_id){

        $cache_repository = new FileCacheRepository();
        $file = $cache_repository->getFileByCache($file_id);

        if(is_null($file))
            return null;

        return $file->type == $type ? $file : null;

    }

    public function deleteFile(File $file){
        $file->update([
            'soft_delete' => 1
        ]);

        $file->recordLog('DELETED');
        $file_cache_repository = new FileCacheRepository();
        $file_cache_repository->saveCache(0,$file);
        return $file;
    }

    public function updateFile(File $file, $data){
        $file->update([
            'name' => $data['name']
        ]);

        $file->recordLog('RENAME');
        $file_cache_repository = new FileCacheRepository();
        $file_cache_repository->saveCache(0,$file);
        return $file;
    }

    public function getFileFromDB($user_id, $file_id){
        return File::whereId($file_id)
            ->where('user_id',$user_id)
            ->first();
    }

}