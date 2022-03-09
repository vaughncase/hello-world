<?php
/**
 *File name : UserRepository.php  / Date: 2/9/2022 - 11:14 PM
 *Code Owner: Tke / Phone: 0367313134 / Email: thedc.it.94@gmail.com
 */

namespace App\Repositories\User;

use App\Entities\Authorization\AccessRoleEntity;
use App\Entities\FileEntity;
use App\Entities\MoetUnitEntity;
use App\Models\Authorization\AccessRoleUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserRepository
{

    public function createUser($data, $moetUnitId, $roleIds = [])
    {

        $dataCreate = array(
            'username'      => $data['username'],
            'password'      => app('hash')->make($data['password']),
            'email'         => isset($data['email']) ? $data['email'] : '',
            'phone'         => isset($data['phone']) ? $data['phone'] : '',
            'date_of_birth' => isset($data['date_of_birth']) ? Carbon::parse($data['date_of_birth']) : null,
            'code'          => isset($data['code']) ? $data['code'] : '',
            'sis_id'        => isset($data['sis_id']) ? $data['sis_id'] : '',
            'gender'        => isset($data['gender']) ? $data['gender'] : 3,
            'is_active'     => isset($data['is_active']) ? $data['is_active'] : 0
        );

        if (isset($data['avatar'])) {
            $dataCreate['avatar'] = (new FileEntity())->saveFileAmazonBase64($data['avatar'],
                $data['username'] . Carbon::now()->timestamp, 'user/avatar');
        }

        $names = analysisName($data['full_name']);
        $dataCreate = array_merge($dataCreate, $names);

        $user = User::create($dataCreate);
        $this->assignUsersToMoetUnit($user->id, $moetUnitId, $roleIds);

        return $user;
    }

    public function assignUsersToMoetUnit($userIds, $moetUnitId, $roleIds = [])
    {
        $moet = (new MoetUnitEntity())->getMoetUnitInfo($moetUnitId);
        if (is_null($moet)) {
            return false;
        }

        // get list user
        $userIds = is_array($userIds) ? $userIds : [$userIds];

        // get role ids
        if (empty($roleIds)) { // assign to manager
            $rolesOfMoetUnit = (new AccessRoleEntity($moet))->getListRolesByMoetUnitIds([$moet->id]);
            switch ($moet->moet_level) {
                case MOET_UNIT_LEVEL_BO:
                    $roleCode = ROLE_CODE_MANAGER_BO;
                    break;
                case MOET_UNIT_LEVEL_DEPARTMENT:
                    $roleCode = ROLE_CODE_MANAGER_DEPARTMENT;
                    break;
                case MOET_UNIT_LEVEL_DIVISION:
                    $roleCode = ROLE_CODE_MANAGER_DIVISION;
                    break;
                case MOET_UNIT_LEVEL_SCHOOL:
                    $roleCode = ROLE_CODE_MANAGER_SCHOOL;
                    break;
                default:
                    $roleCode = '';
            }
            $roleIds = $rolesOfMoetUnit->filter(function ($role) use ($roleCode) {
                return $role->code == $roleCode;
            })->pluck('id')->toArray();
        }

        if (empty($roleIds)) {
            return false;
        }

        // check roles of user
        $existRoles = AccessRoleUser::where('moet_unit_id', $moetUnitId)
            ->whereIn('user_id', $userIds)
            ->whereIn('role_id', $roleIds)
            ->get()->groupBy(function ($roleUser) {
                return $roleUser->role_id;
            })->map(function ($roleUsers) {
                return $roleUsers->pluck('user_id')->toArray();
            });

        // make insert data

        foreach ($roleIds as $roleId) {
            $userIdsExist = isset($existRoles[$roleId]) ? $existRoles[$roleId] : [];
            $userIdsInsert = array_diff($userIds, $userIdsExist);
            $dataInsertSingleRole = array_map(function ($userId) use ($roleId, $moetUnitId) {
                return array(
                    'moet_unit_id'     => $moetUnitId,
                    'role_id'          => $roleId,
                    'user_id'          => $userId,
                    'created_user_id'  => Auth::check() ? Auth::user()->id : 0,
                    'modified_user_id' => Auth::check() ? Auth::user()->id : 0,
                );
            }, $userIdsInsert);
            DB::table('access_role_user')->insert($dataInsertSingleRole);
        }

        return true;

    }

}
