<?php

namespace App\Models\Quiz;

use App\Traits\CacheAble;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizQuestionCategory extends Model
{
    use SoftDeletes;
    use CacheAble;

    protected $table = 'quiz_question_category';

    protected $fillable = [
        "id",
        'moet_level', // 0 - super admin; 1 - Bộ; 2 - Sở; 3 - Phòng; 4 - trường
        "quiz_id",
        "name",
        "parent_id",
        "sort_index",
        "status",
        "created_user_id",
        "modified_user_id",
        'deleted_at',
    ];


    public function quiz_question()
    {
        return $this->hasMany(QuizQuestion::class, 'quiz_question_category_id', 'id');
    }
}
