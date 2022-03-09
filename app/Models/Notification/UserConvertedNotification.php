<?php

namespace App\Models\Notification;

use Illuminate\Database\Eloquent\Model;

class UserConvertedNotification extends Model
{

    protected $table = 'user_converted_notifications';
    protected $connection = 'mysql_notification';

    protected $fillable = [
        'notification_id',
        'data',
        'status',
        'date',
        'type',
        'sent_at',
        'created_at',
        'updated_at',
        'device_type',
        'device_id',
        'result',
        'user_id'
    ];

    public function notification()
    {
        return $this->hasOne(UserMobileNotification::class, 'notification_id');
    }
    


}
