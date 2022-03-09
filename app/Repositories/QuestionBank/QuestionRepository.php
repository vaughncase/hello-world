<?php

namespace App\Repositories\QuestionBank;


use App\Models\QuestionBank\Question;
use App\Repositories\BaseRepository;

class QuestionRepository extends BaseRepository
{

    public function __construct()
    {
        parent::__construct();
        $this->list_search_fields = ['code', 'name'];
    }

    public function getModel(){
        return Question::class;
    }

    public function genCodeQuestion()
    {
        $code = rand(100000, 99999999);
        return $code;
    }
}