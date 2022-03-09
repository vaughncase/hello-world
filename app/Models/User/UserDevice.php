<?php
/**
 *File name : UserDevice.php  / Date: 11/15/2021 - 2:03 PM
 *Code Owner: Dao Thi Minh Nguyet / Phone: 0985455294 / Email: nguyetdtm@omt.vn
 */

namespace App\Models\User;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserDevice extends Model
{

    protected $table = 'user_devices';
    protected $fillable = ['user_id', 'device_id', 'device_type', 'app_type', 'status', 'device_os', 'device_name'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}