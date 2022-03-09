<?php

namespace App\Models\Quiz;

use App\Traits\CacheAble;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use SoftDeletes;
    use CacheAble;

    protected $table = 'quiz';

    protected $fillable = [
        "id",
        'moet_level', // 0 - super admin; 1 - Bộ; 2 - Sở; 3 - Phòng; 4 - trường
        'moet_unit_id',
        'lesson_id',
        "code",
        "name",
        "description",
        "end_date",
        "time",
        "score",
        "sort_index",
        "view_result",
        "random_question",
        "created_user_id",
        "modified_user_id",
        'deleted_at'
    ];

    public function quiz_question_category()
    {
        return $this->hasMany(QuizQuestionCategory::class, 'quiz_id', 'id');
    }

    public function quiz_question()
    {
        return $this->hasMany(QuizQuestion::class, 'quiz_id', 'id');
    }
}
