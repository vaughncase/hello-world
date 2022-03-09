<?php
/**
 *File name : AccessPermission.php  / Date: 11/15/2021 - 10:31 AM
 *Code Owner: Dao Thi Minh Nguyet / Phone: 0985455294 / Email: nguyetdtm@omt.vn
 */

namespace App\Models\Authorization;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccessPermission extends Model
{

    use SoftDeletes;

    protected $connection = KO_TEACHERS;
    protected $table = 'access_permissions';
    protected $fillable = [
        'code',
        'name',
        'description',
        'type',
        'is_deleted',
        'created_user_id',
        'modified_user_id',
    ];
    protected $hidden = ['deleted_at'];

    public function roles()
    {
        return $this->belongsToMany(AccessRole::class, 'access_permission_role', 'permission_id', 'role_id')
            ->wherePivot('status', '=', STATUS_ACTIVE)
            ->withTimestamps();
    }

}