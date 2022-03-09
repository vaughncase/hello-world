<?php

namespace App\Models\QuestionBank;

use App\Traits\CacheAble;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionCategory extends Model
{
    use SoftDeletes;
    use CacheAble;

    protected $table = 'question_category';

    protected $fillable = [
        "id",
        "code",
        "name",
        "parent_id",
        "sort_index",
        "status",
        "moet_level", // 0 - super admin; 1 - Bộ; 2 - Sở; 3 - Phòng; 4 - trường
        "moet_unit_id",
        "created_user_id",
        "modified_user_id",
        'deleted_at',
    ];
}
