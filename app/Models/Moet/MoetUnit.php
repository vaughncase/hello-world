<?php

namespace App\Models\Moet;

use App\Traits\CacheAble;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class MoetUnit extends Model
{

    use CacheAble;

    protected $table = 'moet_units';

    protected $fillable = [
        'sis_id',
        'name',
        'email',
        'code',
        'phone',
        'parent_id',
        'moet_level', // 0 - super admin; 1 - Bộ; 2 - Sở; 3 - Phòng; 4 - trường
        'is_active', // 1 yes - 0 no
        'deleted_at',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->cacheKey = Config::get('cache_keys.moet.moet_unit');
    }

    public function moetUnitChildren()
    {
        return $this->where('parent_id', $this->id)->where('is_active', STATUS_ACTIVE   )->get();
    }

}
