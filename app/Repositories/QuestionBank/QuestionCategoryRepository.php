<?php

namespace App\Repositories\QuestionBank;


use App\Models\QuestionBank\QuestionCategory;
use App\Repositories\BaseRepository;

class QuestionCategoryRepository extends BaseRepository
{

    public function __construct()
    {
        parent::__construct();
        $this->list_search_fields = ['code', 'name'];
    }

    public function getModel()
    {
        return QuestionCategory::class;
    }

    public function genCodeCategory($moet_unit_id = null)
    {
//        do {
//            $code = rand(100000, 999999);
//            $category = QuestionCategory::where('code', $code)->where('moet_unit_id', $moet_unit_id)->first();
//        } while (!is_null($category));
        $code = rand(100000, 999999);
        return $code;
    }
}