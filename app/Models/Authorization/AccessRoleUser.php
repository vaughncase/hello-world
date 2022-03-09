<?php
/**
 *File name : AccessRoleUser.php / Date: 10/13/2020 - 10:50 AM
 *Code Owner: Thanhnt/ Email: Thanhnt@omt.com.vn/ Phone: 0384428234
 */


namespace App\Models\Authorization;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccessRoleUser extends Model
{
    use SoftDeletes;

    protected $table = 'access_role_user';

    protected $fillable = [
        'id',
        'moet_unit_id',
        'role_id',
        'user_id',
        'is_deleted',
        'created_user_id',
        'modified_user_id',
    ];

}
