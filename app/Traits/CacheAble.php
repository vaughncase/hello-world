<?php


namespace App\Traits;


use Illuminate\Support\Facades\Cache;

trait CacheAble
{

    protected $cacheKey;

    public function getModelCache($itemId, $cacheKey = null, $expired = 300)
    {
        $cacheKey = $this->getModelCacheKey($itemId, $cacheKey);
        $model    = Cache::get($cacheKey);

        if (is_null($model)) {
            $model = $this->whereId($itemId)->first();
            if (is_null($model)) {
                return null;
            }

            // gỡ các fillable không cần thiết
            if (!empty($model->hidden)) {
                foreach ($model->hidden as $hidden_field) {
                    unset($model->original[$hidden_field], $model->$hidden_field);
                }
            }

            Cache::put($cacheKey, $model, $expired);
        }

        return $model;
    }

    public function forgetModelCache($itemId, $cacheKey = null)
    {
        $cacheKey = $this->getModelCacheKey($itemId, $cacheKey);
        Cache::forget($cacheKey);
    }

    public function getModelCacheKey($itemId, $cacheKey = null)
    {

        $cacheKey = !is_null($cacheKey) ? $cacheKey : $this->cacheKey;

        return $cacheKey . '_' . $itemId;
    }
}