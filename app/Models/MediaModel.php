<?php
/**
 *File name : MediaModel.php / Date: 1/4/2022 - 1:46 PM
 *Code Owner: Thanhnt/ Email: Thanhnt@omt.com.vn/ Phone: 0384428234
 */

namespace App\Models;


use App\Models\Classes\Classes;
use App\Models\Student\AssessmentCensorFeedback;
use Illuminate\Database\Eloquent\Model;

class MediaModel extends Model
{


    public function comments()
    {
        return $this->hasMany(Comment::class, 'item_id')->where('type', $this->getTypeLikeComment())->where('is_hidden', 0);
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'content_id')->where('type', $this->getTypeLikeComment())->where('likes.status', '=', 1);
    }

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'created_user_id');
    }

    public function thisClass()
    {
        return $this->hasOne(Classes::class, 'id', 'class_id');
    }

    public function feedBacks()
    {
        return $this->hasMany(AssessmentCensorFeedback::class, 'item_id')
            ->where('type', $this->getTypeFeedback())
            ->where('is_hidden', 0);
    }

    public function viewers()
    {
        return $this->belongsToMany(User::class, 'post_album_user_view', 'item_id',
            'user_id')
            ->withPivot(['item_id', 'user_id', 'type'])
            ->wherePivot('type', VIEWER_OF_POST);
    }

}