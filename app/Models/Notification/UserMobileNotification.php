<?php

namespace App\Models\Notification;

use Illuminate\Database\Eloquent\Model;

class UserMobileNotification extends Model
{

    protected $table = 'user_mobile_notifications';
    protected $connection = 'mysql_notification';

    protected $fillable = [
        'user_id',
        'type',
        'item_id',
        'date',
        'data',
        'is_sent',
        'is_read',
        'is_deleted',
        'action',
        'is_converted',
        'is_handled',
        'flag'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function converted()
    {
        return $this->hasMany(UserConvertedNotification::class, 'notification_id');
    }

    public function getTypeLabelAttribute()
    {
        $label = "";
        switch ($this->type) {
            case 1:
                $label = "Bài viết toàn trường";
                break;
            case 2:
                $label = "Bài viết trong lớp";
                break;
            case 3:
                $label = "Album ảnh trong lớp";
                break;
            case 4:
                $label = "Nhận xét";
                break;
            case 5:
                $label = "Hoạt động vệ sinh";
                break;
            case 6:
                $label = "Xác nhận xin nghỉ";
                break;
            case 7:
                $label = "Chiều cao - cân nặng";
                break;
            case 8:
                $label = "Lịch sử bệnh";
                break;
            case 9:
                $label = "Xác nhận đơn dặn thuốc";
                break;
            case 10:
                $label = "Cập nhật uống thuốc";
                break;
            case 11:
                $label = "Album ảnh toàn trường";
                break;
            case 12:
                $label = "Hoạt động học";
                break;
            case 13:
                $label = "Hoạt động ngủ";
                break;
            case 14:
                $label = "Thông báo học phí";
                break;
            case 15:
                $label = "Ngoại khóa mới";
                break;
            case 16:
                $label = "Xác nhận lời nhắn";
                break;
            case 17:
                $label = "Phản hồi lời nhắn";
                break;
            case 19:
                $label = "Phản hồi lời cảm ơn";
                break;
            case 23:
                $label = "Khảo sát mới";
                break;
            case 24:
                $label = "Đánh giá định kỳ mới";
                break;
            case 25:
                $label = "Khuyến mãi mới";
                break;
            case 26:
                $label = "Thông báo truyện hàng ngày";
                break;
        }

        return $label;
    }

    public static function parentAppType()
    {
        return 1;
    }

    public static function teacherAppType()
    {
        return 2;
    }


}
