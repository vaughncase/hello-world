<?php


namespace App\Helpers\Transformer\Quiz;


class QuizQuestionTransformer extends \Transformer
{
    protected $quizQuestionAnswerTransformer;

    public function __construct()
    {
        $this->quizQuestionAnswerTransformer = new QuizQuestionAnswerTransformer();
    }

    public function transform($quiz_question)
    {
        $answer = [];
        if (count($quiz_question->answer) > 0) {
            $answer = $this->quizQuestionAnswerTransformer->transformCollectionKeepFormat($quiz_question->answer->all());
        }
        return [
            'quiz_question_id' => $quiz_question['id'],
            'moet_level' => $quiz_question['moet_level'],
            'quiz_id' => $quiz_question['quiz_id'],
            'question_id' => $quiz_question['question_id'],
            'question_name' => $quiz_question['question_name'],
            'content' => $quiz_question['content'],
            'solution_guide' => $quiz_question['solution_guide'],
            'type' => $quiz_question['type'],
            'quiz_question_category_id' => $quiz_question['quiz_question_category_id'],
            'score' => $quiz_question['score'],
            'sort_index' => $quiz_question['sort_index'],
            'status' => $quiz_question['status'],
            'answer' => $answer
        ];
    }

}