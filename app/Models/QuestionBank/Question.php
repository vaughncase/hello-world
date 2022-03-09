<?php

namespace App\Models\QuestionBank;

use App\Traits\CacheAble;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;
    use CacheAble;

    protected $table = 'questions';

    protected $fillable = [
        "id",
        'moet_level', // 0 - super admin; 1 - Bộ; 2 - Sở; 3 - Phòng; 4 - trường
        "question_category_id",
        "code",
        "name",
        "content",
        "solution_guide",//Hướng dẫn giải
        "type",//0:Chọn 1 đáp án đúng,1:Chọn nhiều đáp án đúng
        "status",//0: Chưa kích hoạt; 1: Kích hoạt
        "is_private",
        "created_user_id",
        "modified_user_id",
        'deleted_at',
    ];

    public function answer()
    {
        return $this->hasMany(QuestionAnswer::class, 'question_id', 'id');
    }
}
