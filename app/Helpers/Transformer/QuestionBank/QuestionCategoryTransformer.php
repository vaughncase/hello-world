<?php


namespace App\Helpers\Transformer\QuestionBank;


class QuestionCategoryTransformer extends \Transformer
{

    public function transform($question_category)
    {
        return [
            'question_category_id' => $question_category['id'],
            'code' => $question_category['code'],
            'name' => $question_category['name'],
            'parent_id' => $question_category['parent_id'],
            'sort_index' => $question_category['sort_index'],
            'status' => $question_category['status'],
            'moet_level' => $question_category['moet_level']
        ];
    }

}