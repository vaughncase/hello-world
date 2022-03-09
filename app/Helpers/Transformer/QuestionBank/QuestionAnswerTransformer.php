<?php


namespace App\Helpers\Transformer\QuestionBank;



class QuestionAnswerTransformer extends \Transformer
{

    public function transform($question_answer)
    {
        return [
            'question_answer_id'          => $question_answer['id'],
            'moet_level'        => $question_answer['moet_level'],
            'question_id'        => $question_answer['question_id'],
            'content' => $question_answer['content'],
            'is_true' => $question_answer['is_true'],
            'percent_score' => $question_answer['percent_score']
        ];
    }

}