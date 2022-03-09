<?php
/**
 *File name : GateDefineCache.php  / Date: 11/25/2021 - 10:26 AM
 *Code Owner: Dao Thi Minh Nguyet / Phone: 0985455294 / Email: nguyetdtm@omt.vn
 */

namespace App\Repositories\Authorization;


use App\Models\Authorization\AccessPermission;
use App\Models\Authorization\AccessRole;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class GateDefineCache
{

    protected $cacheKeys;

    public function __construct()
    {
        $this->cacheKeys = Config::get('cache_keys.gate_define');
    }

    public function queryUserRoles($userId)
    {
        return DB::table('access_role_user')
            ->where('user_id', '=', $userId)
            ->where('is_deleted', '=', 0)
            ->select('role_id')
            ->get()
            ->toArray();
    }

    public function queryRoleByIds($ids)
    {
        return AccessRole::whereIn('id', $ids)
            ->select('id', 'type', 'item_id', 'item_type', 'name', 'code', 'english_name')
            ->active()
            ->get()
            ->toArray();
    }

    public function querySchoolRoles($schoolId)
    {
        return AccessRole::where('item_id', $schoolId)
            ->select('id', 'type', 'item_id', 'item_type', 'name', 'code', 'english_name')
            ->active()
            ->get()
            ->toArray();
    }

    public function queryAllPermissions()
    {
        return AccessPermission::select('id', 'code', 'type')
            ->active()
            ->get()
            ->toArray();
    }

    public function queryPermissionRoles($permissionId, $roleIds)
    {
        return DB::table('access_permission_role')
            ->select('role_id')
            ->where('permission_id', '=', $permissionId)
            ->whereIn('role_id', $roleIds)
            ->where('status', '=', 1)
            ->get()
            ->toArray();
    }

    public function getPermissions($type = null)
    {
        $permissions = Cache::get($this->cacheKeys['permissions']);

        $permissions = !is_null($permissions) ? $permissions : $this->updateListPermissionCache();

        return !is_null($type) && count($permissions) > 0 ?
            array_filter($permissions, function ($permission) use ($type) {
                return $permission['type'] == $type;
            })
            : $permissions;
    }

    public function updateListPermissionCache()
    {
        $permissions = $this->queryAllPermissions();
        Cache::put($this->cacheKeys['permissions'], $permissions, 120);

        return $permissions;
    }

    public function getAccessRolesOfUser($userId, $schoolId = null)
    {
        $roles = Cache::get($this->cacheKeys['roles_of_user'].$userId);
        $roles = is_null($roles) ? $this->updateUserAccessRoleCache($userId) : $roles;

        return !is_null($schoolId) && count($roles) > 0 ?
            array_filter($roles, function ($role) use ($schoolId) {
                return $role['item_id'] == $schoolId && $role['item_type'] == 'App\School';
            })
            : $roles;
    }

    public function getAccessRoleCodesOfUser($userId, $schoolId = null)
    {
        $roles = $this->getAccessRolesOfUser($userId, $schoolId);

        if (count($roles) == 0) {
            return [];
        }

        return collect($roles)->pluck('code')->toArray();
    }

    public function updateUserAccessRoleCache($userId)
    {
        $userRoles = $this->queryUserRoles($userId);
        $roleIds   = array_column($userRoles, 'role_id');
        $roles     = $this->queryRoleByIds($roleIds);

        Cache::put($this->cacheKeys['roles_of_user'].$userId, $roles, 720);

        return $roles;
    }

    public function getRolesOfPermission($permissionId, $schoolId = 0)
    {
        $roles = Cache::get($this->cacheKeys['roles_of_permission'].$schoolId.$permissionId);
        $roles = is_null($roles) || count($roles) === 0 ? $this->updatePermissionAccessRoleCache($permissionId,
            $schoolId) : $roles;

        return !is_null($schoolId) && count($roles) > 0 ?
            array_filter($roles, function ($role) use ($schoolId) {
                return $role['item_id'] == $schoolId && $role['item_type'] == 'App\School';
            })
            : $roles;
    }

    public function getRoleCodesOfPermission($permissionId, $schoolId = 0)
    {
        $roles = $this->getRolesOfPermission($permissionId, $schoolId);

        if (count($roles) == 0) {
            return [];
        }

        return collect($roles)->pluck('code')->toArray();
    }

    public function updatePermissionAccessRoleCache($permissionId, $schoolId = 0)
    {
        $roles   = $this->querySchoolRoles($schoolId);
        $roleIds = array_column($roles, 'id');

        $permissionRoles = $this->queryPermissionRoles($permissionId, $roleIds);
        $roleIds         = array_column($permissionRoles, 'role_id');
        $roles           = collect($roles)->filter(function ($role) use ($roleIds) {
            return in_array($role['id'], $roleIds);
        })->toArray();

        Cache::put($this->cacheKeys['roles_of_permission'].$schoolId.$permissionId, $roles, 480);

        return $roles;
    }

}