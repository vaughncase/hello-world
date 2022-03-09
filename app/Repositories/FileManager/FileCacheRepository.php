<?php
/**
 *File name : FileCacheRepository.php  / Date: 2019-06-23 - 17:02
 *Code Owner: Tke
 */

namespace App\Repositories\FileManager;

use App\Models\FileManager\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class FileCacheRepository{

    protected $cache_tag;
    protected $expiry_cache_minutes;

    public function __construct()
    {
        $this->cache_tag = Config::get('file_manager.cache_keys.files');
        $this->expiry_cache_minutes = 60;
    }

    public function getFileByCache($file_id){
        $file_cache = Cache::tags([$this->cache_tag])->get($file_id);
        if(is_null($file_cache)){
            return $this->saveCache($file_id);
        }

        $file = new File();
        $file['attributes'] = $file_cache;
        return $file;
    }

    public function saveCache($file_id, File $file=null){

        $file = !is_null($file) ?  $file :
            File::whereId($file_id)->where('soft_delete',0)->first();


        $file_cache = !is_null($file) ? $file['original'] : null;

        Cache::tags([$this->cache_tag])->put($file_id,$file_cache,$this->expiry_cache_minutes);

        return $file;
    }

    public function saveCacheMultipleFiles($file_ids){

        $file_ids_no_cache = array();

        foreach($file_ids as $file_id){
            $file_cache = Cache::tags([$this->cache_tag])->get($file_id);

            if(is_null($file_cache))
                array_push($file_ids_no_cache, $file_id);

        }

        $files = File::whereIn('id',$file_ids_no_cache)
            ->where('soft_delete',0)->get();

        foreach($files as $file){
            $this->saveCache(0,$file);
        }

        return true;
    }

}