<?php
/**
 *File name : AccessRole.php  / Date: 11/15/2021 - 10:30 AM
 *Code Owner: Dao Thi Minh Nguyet / Phone: 0985455294 / Email: nguyetdtm@omt.vn
 */

namespace App\Models\Authorization;


use App\Models\User;
use App\Traits\Relationship;
use Illuminate\Database\Eloquent\Model;

class AccessRole extends Model
{
//    use Relationship;
    protected $table = 'access_roles';
    protected $uniqueColumn = 'code';
    protected $fillable = [
        'moet_unit_id',
        'name',
        'code',
        'created_user_id',
        'modified_user_id',
        'status',
    ];

    public function getUniqueColumn()
    {
        return $this->uniqueColumn;
    }

    public function getMessageValidateUniqueColumn()
    {
        return trans('general.validate_unique_column', ['column' => trans('authorization.role_code')]);
    }

    public function permissions()
    {
        return $this->belongsToMany(AccessPermission::class, 'access_permission_role', 'role_id', 'permission_id')
            ->withPivot(['created_user_id', 'modified_user_id'])
            ->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'access_role_user', 'role_id', 'user_id')
            ->withPivot(['moet_unit_id', 'created_user_id', 'modified_user_id', 'created_at', 'updated_at'])
            ->withTimestamps();
    }

//    public function attachUserAccessRole($userIds, $moetUnitId)
//    {
//        return $this->relationAttach(new AccessRoleUser(), 'role_id', 'user_id', $userIds, $moetUnitId, false);
//    }
//
//    public function detachUserAccessRole($userIds)
//    {
//        return $this->relationDetach(new AccessRoleUser(), 'role_id', 'user_id', $userIds);
//    }
//    public function attachAccessPermissionRole($permissionIds)
//    {
//        return $this->relationAttach(new AccessPermissionRole(), 'role_id', 'permission_id', $permissionIds, 0, false);
//    }
//
//    public function detachAccessPermissionRole($permissionIds)
//    {
//        return $this->relationDetach(new AccessPermissionRole(), 'role_id', 'user_id', $permissionIds);
//    }


}