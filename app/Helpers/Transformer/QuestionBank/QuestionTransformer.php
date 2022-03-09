<?php


namespace App\Helpers\Transformer\QuestionBank;


class QuestionTransformer extends \Transformer
{
    protected $questionAnswerTransformer;
    public function __construct()
    {
        $this->questionAnswerTransformer = new QuestionAnswerTransformer();
    }
    public function transform($question)
    {
        $answer = [];
        if (count($question->answer) > 0) {
            $answer = $this->questionAnswerTransformer->transformCollection($question->answer->all());
        }
        return [
            'question_id' => $question['id'],
            'moet_level' => $question['moet_level'],
            'question_category_id' => $question['question_category_id'],
            'code' => $question['code'],
            'name' => $question['name'],
            'content' => $question['content'],
            'solution_guide' => $question['solution_guide'],
            'type' => $question['type'],
            'status' => $question['status'],
            'is_private' => $question['is_private'],
            'answer' => $answer
        ];
    }

}