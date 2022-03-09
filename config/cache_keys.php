<?php
/**
 *File name : cache_keys.php  / Date: 11/1/2021 - 4:35 PM
 *Code Owner: Dao Thi Minh Nguyet / Phone: 0985455294 / Email: nguyetdtm@omt.vn
 */


return [

    'authorization' => [
        'permissions' => [
            'list'   => 'authorization.permission.list',
            'info'   => 'authorization.permission.info',
            'groups' => 'authorization.permission.groups',
            'roles'  => 'authorization.permission.roles.php',
        ],
        'roles'       => [
            'list'        => 'authorization.role.list',
            'permissions' => 'authorization.role.list_role_permissions',
        ],
        'permission_groups'       => [
            'all'        => 'authorization.permission_group.list',
        ],
    ],

    'users' => [
        'info' => 'user.info'
    ],

    'moet' => [
        'moet_unit' => 'moet.unit'
    ],

    'student' => [
        'info' => 'student.info'
    ],

];
