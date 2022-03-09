<?php


namespace App\Helpers\Transformer\Quiz;


class QuizTransformer extends \Transformer
{

    public function transform($quiz)
    {
        return [
            'quiz_id' => $quiz['id'],
            'moet_level' => $quiz['moet_level'],
            'moet_unit_id' => $quiz['moet_unit_id'],
            'code' => $quiz['code'],
            'name' => $quiz['name'],
            'description' => $quiz['description'],
            'end_date' => $quiz['end_date'],
            'time' => $quiz['time'],
            'score' => $quiz['score'],
            'sort_index' => $quiz['sort_index'],
            'status' => $quiz['status']
        ];
    }

}