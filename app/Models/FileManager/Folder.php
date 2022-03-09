<?php

namespace App\Models\FileManager;

use App\Traits\LogRecord;
use ClassPreloader\ClassLoader\Config;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use LogRecord;

    protected $table = 'file_manager_folders';

    protected $fillable = [
        'user_id',
        'name',
        'path',
        'parent_id',
        'soft_delete', // 0: activated - 1: soft deleted
        'type', // 1 photos - 2: files
        'code_url',
        'logs'
    ];

    public function children(){
        return $this->hasMany(Folder::class,'parent_id','id')
            ->where('soft_delete',0)->orderBy('id');
    }

    public function files(){
        return $this->hasMany(File::class,'folder_id','id')
            ->where('soft_delete',0)
            ->orderBy('id','DESC');
    }

    public function canDelete(){
        return count($this->children) === 0 && count($this->files) === 0;
    }

    public function getTypeText(){
        $config =  Config::get('file_manager.folder_types');
        return isset($config[$this->type]) ? $config[$this->type] : 'photos';
    }

    public function getTextValidMimeTypes(){
        $valid_mime_types = Config::get('file_manager.valid_mime_types');
        $valid_mime_types = $valid_mime_types[$this->getTypeText()];
        foreach($valid_mime_types as $index=>$valid_mime_type){
            $valid_mime_types[$index] = '.'.$valid_mime_type;
        }
        return implode(", ",$valid_mime_types);
    }

    public function getFileServerUrl(){
        $urls = Config::get('file_server.codes_url');
        return $urls[$this->code_url];
    }

    public function getUploadRoute(){
        $route = route('file-manager.folders.upload',[$this->getTypeText(), $this->id], false);
        return $this->getFileServerUrl().$route;
    }
}
