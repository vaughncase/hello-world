<?php
/**
 *File name : file_manager.php  / Date: 1/18/2022 - 9:43 AM
 *Code Owner: Tke / Phone: 0367313134 / Email: thedc.it.94@gmail.com
 */
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'file-manager'], function () {
    Route::post('/folder/load', 'FileManager\FoldersController@load');
    Route::post('/folder/create', 'FileManager\FoldersController@create');
    Route::post('/folder/update', 'FileManager\FoldersController@update');
    Route::post('/folder/delete', 'FileManager\FoldersController@delete');
    Route::post('/folder/upload', 'FileManager\FoldersController@upload');

    Route::post('/file/update', 'FileManager\FilesController@update');
    Route::post('/file/delete', 'FileManager\FilesController@delete');
});