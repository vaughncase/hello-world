<?php

namespace App\Providers;

use App\Entities\AppModuleEntity;
use App\Entities\Authorization\AccessRoleEntity;
use App\Entities\Authorization\PermissionEntity;
use App\Repositories\Authorization\GateDefineCache;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @param  GateContract  $gate
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
//        $this->defineAccessPolicies($gate);
    }


    public function defineAccessPolicies(GateContract $gate)
    {
        $permissionEntity = new PermissionEntity();
        $permissions      = $permissionEntity->getAll();
        foreach ($permissions as $permission) {
            $gate->define($permission['code'],
                function($user) use ($permission) {
//                    $user_role_codes       = $accessRoleEntity->getAccessRoleCodesOfUser($user);
//                    $permission_role_codes = $accessRoleEntity->getRoleCodesOfPermission($permission['id']);
//                    return !empty(array_intersect($user_role_codes, $permission_role_codes));
                }
            );
        }
        return true;
    }

}
