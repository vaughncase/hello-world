<?php

namespace App\Models\Authorization;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccessPermissionGroup extends Model
{

    use SoftDeletes;

    protected $table = 'access_permission_groups';
    protected $fillable = [
        'name',
        'code',
        'description',
        'is_deleted',
        'created_user_id',
        'modified_user_id',
    ];
    protected $hidden = ['deleted_at'];

    public function permissions()
    {
        return $this->belongsToMany(AccessPermission::class, 'access_permission_group', 'permission_id',
            'group_id');
    }

}
