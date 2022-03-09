<?php
/**
 *File name : api.php  / Date: 11/18/2021 - 9:47 AM
 *Code Owner: Tke / Phone: 0367313134 / Email: thedc.it.94@gmail.com
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Facades\JWTAuth;

/** @var \Laravel\Lumen\Routing\Router $router */


Route::post('/login-form', 'Auth\Web\LoginController@loginForm');
Route::post('/login', 'Auth\Web\LoginController@login');
Route::post('/logout', 'Auth\Web\LoginController@logout');


require(__DIR__.'/user.php');
$router->group(['prefix' => 'api', 'middleware' => 'auth'], function() use ($router) {
    Route::post('/redirect', 'Auth\Web\RedirectController@redirect');
    Route::post('/dashboard', [
        'uses' => 'DasboardController@index',
        'as'   => 'dashboard.index',
    ]);
    require(__DIR__.'/authorization.php');
    require(__DIR__ . '/student.php');
});
require(__DIR__.'/ministry_of_education.php');

