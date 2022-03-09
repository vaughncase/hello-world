<?php

namespace App\Models\QuestionBank;

use App\Traits\CacheAble;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionAnswer extends Model
{
    use SoftDeletes;
    use CacheAble;

    protected $table = 'question_answers';

    protected $fillable = [
        "id",
        'moet_level', // 0 - super admin; 1 - Bộ; 2 - Sở; 3 - Phòng; 4 - trường
        "question_id",
        "content",
        "is_true",//0: Câu trả lời sai, 1: Câu trả lời đúng
        "percent_score",//Phần trăm điểm cho câu trả lời
        "created_user_id",
        "modified_user_id",
        'deleted_at',
    ];
}
