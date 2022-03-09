<?php
/**
 *File name : user.php  / Date: 2/8/2022 - 11:40 PM
 *Code Owner: Tke / Phone: 0367313134 / Email: thedc.it.94@gmail.com
 */

use Illuminate\Support\Facades\Route;
Route::post('/students', 'Student\StudentController@index');
