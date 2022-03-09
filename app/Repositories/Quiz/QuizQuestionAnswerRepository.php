<?php

namespace App\Repositories\Quiz;

use App\Models\Quiz\QuizQuestionAnswer;
use App\Repositories\BaseRepository;

class QuizQuestionAnswerRepository extends BaseRepository
{

    public function __construct()
    {
        parent::__construct();
        $this->list_search_fields = ['code', 'name'];
    }

    public function getModel(){
        return QuizQuestionAnswer::class;
    }
}