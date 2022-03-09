<?php

namespace App\Models\Quiz;

use App\Traits\CacheAble;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizQuestionAnswer extends Model
{
    use SoftDeletes;
    use CacheAble;

    protected $table = 'quiz_question_answer';

    protected $fillable = [
        "id",
        'moet_level', // 0 - super admin; 1 - Bộ; 2 - Sở; 3 - Phòng; 4 - trường
        "quiz_id",
        "question_id",
        "content",
        "is_true",
        "percent_score",//Phần trăm điểm cho câu trả lời
        "created_user_id",
        "modified_user_id",
        'deleted_at',
    ];
}
