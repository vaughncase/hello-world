<?php


namespace App\Helpers\Transformer\Quiz;


class QuizQuestionCategoryTransformer extends \Transformer
{

    public function transform($quiz_question_category)
    {
        return [
            'quiz_question_category_id' => $quiz_question_category['id'],
            'moet_level' => $quiz_question_category['moet_level'],
            'quiz_id' => $quiz_question_category['quiz_id'],
            'name' => $quiz_question_category['name'],
            'parent_id' => $quiz_question_category['parent_id'],
            'sort_index' => $quiz_question_category['sort_index'],
            'status' => $quiz_question_category['status'],
        ];
    }

}