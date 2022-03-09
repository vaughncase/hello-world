<?php

namespace App\Repositories\Quiz;

use App\Models\Quiz\QuizQuestion;
use App\Repositories\BaseRepository;

class QuizQuestionRepository extends BaseRepository
{

    public function __construct()
    {
        parent::__construct();
        $this->list_search_fields = ['code', 'name'];
    }

    public function getModel(){
        return QuizQuestion::class;
    }
}