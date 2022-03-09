<?php
/**
 *File name : GuardianNotification.php  / Date: 11/19/2021 - 12:02 PM
 *Code Owner: Dao Thi Minh Nguyet / Phone: 0985455294 / Email: nguyetdtm@omt.vn
 */

namespace App\Models\Notification;


use App\Models\Classes\Classes;
use App\Models\School\School;
use Illuminate\Database\Eloquent\Model;

class GuardianNotification extends Model
{

    protected $connection = KO_TEACHERS;
    protected $table = 'guardian_notifications';
    protected $fillable = [
        'type',
        'school_id',
        'class_id',
        'student_id',
        'item_id',
        'category',
        'date',
        'status',
        'flag',
        'count',
        'updated_at',
        'created_at'
    ];

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}