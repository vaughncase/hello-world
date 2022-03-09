<?php

namespace App\Models\User;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ResetPasswordOTP extends Model
{
    protected $connection = KO_TEACHERS;
    protected $table = 'reset_password_otp';

    protected $fillable = [
        'id',
        'phone',
        'user_id',
        'school_id',
        'time_sent',
        'expiry',
        'otp',
        'content',
        'ip_sent',
        'status' // 0: not use; 1- used
    ];

    public function isExpired(){
        return $this->expiry < Carbon::now();
    }

    public function checkUsed(){
        return $this->status == 1;
    }

}
