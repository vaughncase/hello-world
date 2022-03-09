<?php
/**
 *File name : user.php  / Date: 2/8/2022 - 11:40 PM
 *Code Owner: Tke / Phone: 0367313134 / Email: thedc.it.94@gmail.com
 */

/** @var \Laravel\Lumen\Routing\Router $router */
$router->group(['prefix' => 'authorization'], function() use ($router) {
    $router->group(['prefix' => 'role'], function() use ($router) {
        $router->post('/', [
            'uses' => 'Authorization\AccessRoleController@index',
            'as'   => 'authorization.role.index',
        ]);
        $router->post('/create', [
            'uses' => 'Authorization\AccessRoleController@create',
            'as'   => 'authorization.role.create',
        ]);
        $router->post('/users', [
            'uses' => 'Authorization\AccessRoleController@users',
            'as'   => 'authorization.role.users',
        ]);
        $router->post('/store', [
            'uses' => 'Authorization\AccessRoleController@store',
            'as'   => 'authorization.role.store',
        ]);
        $router->post('/show', [
            'uses' => 'Authorization\AccessRoleController@show',
            'as'   => 'authorization.role.show',
        ]);
        $router->post('/edit', [
            'uses' => 'Authorization\AccessRoleController@edit',
            'as'   => 'authorization.role.edit',
        ]);
    });
});


