<?php
/**
 *File name : error_status.php  / Date: 8/4/2021 - 5:10 PM
 *Code Owner: Tke / Phone: 0367313134 / Email: thedc.it.94@gmail.com
 */

return [

    //Default status
    'missing_parameters'          => 'general.missing_parameters',
    'unauthorized'                => 'general.unauthorized',
    'unsuccessfully'              => 'general.unsuccessfully',
    'invalid_password'            => 'general.invalid_password',
    'authentication_failed'       => 'general.authentication_failed',
    'do_not_have_permission_unit' => 'general.do_not_have_permission_unit',
    'not_have_teacher_role'       => 'general.not_have_teacher_role',
    'teacher_not_class'           => 'general.teacher_not_class',
    'exception'                   => 'general.do_it_again',
    'invalid_re_password'         => 'general.invalid_re_password',
    're_password_not_correct'     => 'general.re_password_not_correct',

    'token' => [
        'expired'        => 'general.token_expired',
        'invalid'        => 'general.token_invalid',
        'exception'      => 'general.token_exception',
        'user_not_found' => 'general.token_user_not_found',
        'empty'          => 'general.token_empty',
    ],

    'not_found' => [
        'moet_unit' => 'general.moet_unit',
        'class'     => 'general.class',
        'user'      => 'general.user',
        'student'   => 'general.not_found_student',
        'object'    => 'general.not_found_object',
    ],

];
