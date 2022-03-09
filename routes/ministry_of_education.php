<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * API bộ giáo dục
 * Date: 2/15/2022
 * Time: 10:08 PM
 */
Route::group(['prefix' => 'ministry_of_education', 'namespace' => '\App\Http\Controllers\MinistryOfEducation'], function () {
    Route::group(['prefix' => 'question_bank'], function () {
        Route::group(['prefix' => 'category'], function () {
            Route::post('get_list', 'QuestionCategoryController@getListData');
            Route::post('create', 'QuestionCategoryController@create');
            Route::post('update', 'QuestionCategoryController@update');
            Route::post('delete', 'QuestionCategoryController@delete');
            Route::post('detail', 'QuestionCategoryController@detail');
        });
        Route::group(['prefix' => 'question'], function () {
            Route::post('get_list', 'QuestionController@getListData');
            Route::post('create', 'QuestionController@createQuestion');
            Route::post('update', 'QuestionController@update');
            Route::post('delete', 'QuestionController@delete');
            Route::post('detail', 'QuestionController@detail');
        });
    });
    Route::group(['prefix' => 'quiz'], function () {
        Route::post('get_list', 'QuizController@getListData');
        Route::post('create', 'QuizController@create');
        Route::post('update', 'QuizController@update');
        Route::post('delete', 'QuizController@delete');
        Route::post('detail', 'QuizController@detail');
    });
});