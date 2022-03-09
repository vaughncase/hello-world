<?php


namespace App\Helpers\Transformer\Quiz;


class QuizQuestionAnswerTransformer extends \Transformer
{

    public function transform($quiz_question_answer)
    {
        return [
            'quiz_question_answer_id' => $quiz_question_answer['id'],
            'moet_level' => $quiz_question_answer['moet_level'],
            'quiz_id' => $quiz_question_answer['quiz_id'],
            'question_id' => $quiz_question_answer['description'],
            'content' => $quiz_question_answer['content'],
            'is_true' => $quiz_question_answer['is_true'],
            'percent_score' => $quiz_question_answer['percent_score']
        ];
    }

}