<?php

namespace App\Repositories\Quiz;

use App\Helpers\Transformer\Quiz\QuizQuestionAnswerTransformer;
use App\Helpers\Transformer\Quiz\QuizQuestionCategoryTransformer;
use App\Helpers\Transformer\Quiz\QuizQuestionTransformer;
use App\Helpers\Transformer\Quiz\QuizTransformer;
use App\Models\Quiz\Quiz;
use App\Repositories\BaseRepository;

class QuizRepository extends BaseRepository
{
    protected $quizTransfomer;
    protected $quizQuestionTransfomer;
    protected $quizQuestionAnswerTransfomer;
    protected $quizQuestionCategoryTransfomer;

    public function __construct()
    {
        parent::__construct();
        $this->list_search_fields = ['code', 'name'];
        $this->quizTransfomer = new QuizTransformer();
        $this->quizQuestionTransfomer = new QuizQuestionTransformer();
        $this->quizQuestionAnswerTransfomer = new QuizQuestionAnswerTransformer();
        $this->quizQuestionCategoryTransfomer = new QuizQuestionCategoryTransformer();
    }

    public function getModel(){
        return Quiz::class;
    }
    public function transformer($quiz)
    {
//        $categories = $quiz->quiz_question_category;
        $question = $quiz->quiz_question;
        $result = $this->quizTransfomer->transform($quiz);
//        if (!empty($categories)) {
//            foreach ($categories as $category) {
//                $list_question_in_category = [];
//                if (count($question) > 0) {
//                    $list_question_in_category_not_transform = $question->where('quiz_question_category_id', $category->id)->all();
//                    if (count($list_question_in_category_not_transform) > 0) {
//                        $list_question_in_category = $this->quizQuestionTransfomer->transformCollectionKeepFormat($list_question_in_category_not_transform);
//                    }
//                }
//                $category = $this->quizQuestionCategoryTransfomer->transform($category);
//                $category['question'] = array_values($list_question_in_category);
//                $result['category'][] = $category;
//            }
//        }
//        $question_not_exist_category = $question->where('quiz_question_category_id', '');
        if (count($question) > 0) {
            $category = [
                'id' => "",
                'tenant_id' => "",
                'quiz_id' => "",
                'name' => "",
                'parent_id' => "",
                'sort_index' => "",
                'status' => ""
            ];
            $list_question_not_in_category = $this->quizQuestionTransfomer->transformCollectionKeepFormat($question->all());
//            $category['question'] = array_values($list_question_not_in_category);
            $result['question'] = array_values($list_question_not_in_category);
        }
        return $result;
    }
}