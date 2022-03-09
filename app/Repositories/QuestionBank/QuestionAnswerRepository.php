<?php

namespace App\Repositories\QuestionBank;

use App\Models\QuestionBank\QuestionAnswer;
use App\Repositories\BaseRepository;

class QuestionAnswerRepository extends BaseRepository
{

    public function __construct()
    {
        parent::__construct();
        $this->list_search_fields = ['code', 'name'];
    }

    public function getModel(){
        return QuestionAnswer::class;
    }
}