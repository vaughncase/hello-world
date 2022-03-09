<?php
/**
 *File name : file_server.php  / Date: 6/14/2019 - 6:07 PM
 *Code Owner: Tke
 */
define('UPLOAD_FILE_TYPE_DEFAULT',1);
define('UPLOAD_FILE_TYPE_DEFAULT_BASE64',2);
define('UPLOAD_FILE_TYPE_AWS',3);
define('UPLOAD_FILE_TYPE_AWS_BASE64',4);

return [

    'codes_url' => [
        0 => env('FILE_SERVER', 'https://komt.kidsonline.edu.vn'),
        1 => env('FILE_SERVER', 'https://komt.kidsonline.edu.vn'),
    ]

];