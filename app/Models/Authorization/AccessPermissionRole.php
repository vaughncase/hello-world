<?php
/**
 *File name : AccessPermission.php  / Date: 11/15/2021 - 10:31 AM
 *Code Owner: Dao Thi Minh Nguyet / Phone: 0985455294 / Email: nguyetdtm@omt.vn
 */

namespace App\Models\Authorization;


use Illuminate\Database\Eloquent\Model;

class AccessPermissionRole extends Model
{
    protected $table = 'access_permission_Role';
    protected $fillable = [
        'permission_id',
        'role_id',
        'created_user_id',
        'modified_user_id',
    ];

}