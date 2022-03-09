<?php

namespace App\Models\Quiz;

use App\Traits\CacheAble;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizQuestion extends Model
{
    use SoftDeletes;
    use CacheAble;

    protected $table = 'quiz_question';

    protected $fillable = [
        "id",
        'moet_level', // 0 - super admin; 1 - Bộ; 2 - Sở; 3 - Phòng; 4 - trường
        "quiz_id",
        "question_id",
        "question_name",
        "content",
        "solution_guide",
        "type",
        "quiz_question_category_id",
        "score",
        "sort_index",
        "status",
        "created_user_id",
        "modified_user_id",
        'deleted_at',
    ];

    public function answer()
    {
        return $this->hasMany(QuizQuestionAnswer::class, 'quiz_question_id', 'id');
    }
}
