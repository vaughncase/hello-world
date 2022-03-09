<?php

namespace App\Models\FileManager;

use App\Traits\LogRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class File extends Model
{

    use LogRecord;
    protected  $table = 'file_manager_files';

    protected $fillable = [

        'folder_id',
        'user_id',
        'name',
        'path',
        'soft_delete', // 0: activated - 1: soft deleted
        'type', // 1 photos - 2: files
        'extension',
        'content_type',
        'code_url',
        'logs'
    ];

    public function getTypeText(){
        $config =  Config::get('file_manager.folder_types');
        return isset($config[$this->type]) ? $config[$this->type] : 'photos';
    }

    public function getFileServerUrl(){
        $urls = Config::get('file_server.codes_url');
        return $urls[$this->code_url];
    }

    public function getFileRoute(){
        $route = route('file-manager.files.get-file',[$this->getTypeText(), $this->id], false);
        $url =  $this->getFileServerUrl().$route.'?time='.Carbon::parse($this->updated_at)->timestamp;
//        $cdn = env('CDN_SERVER','devcdn.ko.edu.vn');
//        $app_domain = env('APP_DOMAIN','komt.kidsonline.edu.vn');
        return $url;
    }
}
