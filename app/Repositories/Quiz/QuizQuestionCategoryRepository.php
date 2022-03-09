<?php

namespace App\Repositories\Quiz;

use App\Models\Quiz\QuizQuestionCategory;
use App\Repositories\BaseRepository;

class QuizQuestionCategoryRepository extends BaseRepository
{

    public function __construct()
    {
        parent::__construct();
        $this->list_search_fields = ['code', 'name'];
    }

    public function getModel(){
        return QuizQuestionCategory::class;
    }
}