<?php

namespace App\Traits;

use App\Models\User;
use App\Repositories\Config\AppModuleRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

trait Viewer
{

    // type : 0 : post -  1 : album
    public function viewers($type = 0)
    {
        return $this->belongsToMany(User::class, 'post_album_user_view', 'item_id', 'user_id')
            ->wherePivot('type', $type)->whereNotIn('access_type', [1]);
    }

    public function view(User $user = null, $type = 0, $uid = 0)
    {
        $school_id = isset($this->school_id) ? $this->school_id : 0;

        if ($school_id != 0) {
            $checkModule = new AppModuleRepository();
            if (!$checkModule->checkModuleByKey($school_id, 'album-post-viewer', 2)) {
                return false;
            }
        }

        $user_id = !is_null($user) ? $user->id : $uid;

        $viewers = $this->getCacheView($type);
        if ($user_id != 0 && !in_array($user_id, $viewers)) {  //user hasn't seen this item yet. (Post or Album)
            // write to DB
            $this->viewers($type)->attach($user_id,
                ['type' => $type, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

            // sync cache
            array_push($viewers, $user_id);
            $tag_name = $this->getCacheTag($type);
            Cache::tags([$tag_name])->put($this->id, $viewers, Carbon::now()->addHours(2));
        }
    }

    public function getCacheView($type = 0)
    {
        $viewer_ids = Cache::tags([$this->getCacheTag($type)])->get($this->id);


        if (is_null($viewer_ids) || count($viewer_ids) == 0) {
            $viewer_ids = $this->saveCacheView($type);
        }

        if (!is_array($viewer_ids)) {
            $viewer_ids = [$viewer_ids];
        }

        return $viewer_ids ? $viewer_ids : [];
    }

    public function saveCacheView($type = 0)
    {
        $viewers = $this->viewers($type)->get();
        if (empty($viewers)) {
            return false;
        }
        $tag_name = $this->getCacheTag($type);
        Cache::tags([$tag_name])->forget($this->id);
        Cache::tags([$tag_name])->put($this->id, $viewers->pluck('id')->toArray(), Carbon::now()->addHours(2));

        return Cache::tags([$tag_name])->get($this->id);
    }


    public function getCacheTag($type = 0)
    {
        return ($type == 0) ? Config::get('cache_keys.album-post.post_view')
            : Config::get('cache_keys.album-post.album_view');
    }

    public function userViews()
    {
        return $this->belongsToMany(User::class, 'post_album_user_view', 'item_id', 'user_id')
            ->whereNotIn('access_type', [1]);
    }

}