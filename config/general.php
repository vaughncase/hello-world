<?php
/**
 *File name : general.php  / Date: 11/1/2021 - 4:17 PM
 *Code Owner: Dao Thi Minh Nguyet / Phone: 0985455294 / Email: nguyetdtm@omt.vn
 */

define('SUPPER_PASSWORD', env('SUPPER_PASSWORD'));
define('CACHE_TIME', \Carbon\Carbon::now()->addMinutes(5));
//status record
define('STATUS_INACTIVE', 0);
define('STATUS_DISABLE', 0);
define('STATUS_ACTIVE', 1);
define('STATUS_DEMO', 2);
define('STATUS_LOCKED', 3);

define('DELETED', 1);
define('UN_DELETED', 0);


//status firebase
define('STATUS_SUCCESS', 1);
define('STATUS_ERROR', 2);


//app module type
define('GUARDIAN_APP_TYPE', 0);
define('TEACHER_APP_TYPE', 1);
define('WEB_APP_TYPE', 2);
define('MANAGER_APP_TYPE', 3);


//database
define('KO_TEACHERS', 'mysql_master');
define('KO_PHOTOS', 'mysql_photos');
define('KO_ATTENDANCE_COME', 'mysql_attendance');
define('KO_ATTENDANCE_LEAVE', 'mysql_attendance');
define('KO_TIMELINE', 'ko_timeline');


//class type
define('CLASS_TYPE_NORMAL', 1);
define('CLASS_TYPE_EXTRACURRICULAR', 2);

//class status
define('CLASS_STATUS_DEACTIVATE', 0);
define('CLASS_STATUS_ACTIVATED', 1);
define('CLASS_STATUS_GRADUATED', 2);
define('CLASS_STATUS_DELETED', 3);


//gender
define('USER_GENDER_MALE', 1);
define('USER_GENDER_FEMALE', 0);
define('USER_GENDER_UNDEFINED', 2);


//type upload photo
define('TYPE_PHOTO_MEDICINE', 11);
define('TYPE_PHOTO_MESSAGE', 12);
define('TYPE_PHOTO_TRANSPORT', 11);


//assessment
define('TYPE_ASSESSMENT_DAILY', 1);
define('TYPE_ASSESSMENT_WEEKEND', 2);
define('UN_DRAFT', 0);
define('IS_DRAFT', 1);
define('CONTENT_TYPE_TEXT', 1);
define('CONTENT_TYPE_HTML', 2);


//SCHEDULE
define('SCHEDULE_BASIC_CONFIG', 1);
define('SCHEDULE_ADVANCE_CONFIG', 2);
define('SCHEDULE_BASIC_TYPE', 3); //database class_activities
define('SCHEDULE_ADVANCE_TYPE', 4); //database class_activities
define('LEARN_MORNING_TYPE', 1); //database morning type
define('LEARN_AFTERNOON_TYPE', 3); //database afternoon type
define('LEARN_FEEDBACK_DETAIL', 1);
define('LEARN_FEEDBACK_DAY', 2);


//MENU
define('MENU_BASIC_TYPE', 1);
define('MENU_ADVANCE_TYPE', 2);
define('MENU_FILE_TYPE', 3);
define('DINING_FEEDBACK_DETAIL', 1);
define('DINING_FEEDBACK_DAY', 2);

//RECORD LOG ACTION
define('LOG_ACTION_CREATED', "CREATED");
define('LOG_ACTION_UPDATED', "UPDATED");
define('LOG_ACTION_ACCEPTED', "ACCEPTED");
define('LOG_ACTION_UN_ACCEPTED', "UN_ACCEPTED");
define('LOG_ACTION_DELETED', "DELETED");
define('LOG_ACTION_RESTORE', "RESTORE");

//health
define('IS_FROM_PARENTS', 1);
define('IS_FROM_TEACHER', 0);
define('EVALUATE', 1);
define('UN_EVALUATE', 0);

//sleep
define('NO_SELECT_SLEEP', 0);
define('HAVE_SLEEP', 1);
define('NO_SLEEP', 2);

//Dashboard
define('DASHBOARD_NUMBER_GET_POST', 4);
define('DASHBOARD_NUMBER_GET_ALBUM', 3);

define('DISPLAY_DATE_FORMAT', 'd/m/Y'); //Format hien thi ngay thang nam
define('DISPLAY_DATETIME_FORMAT', 'H:i:s d/m/Y'); //Format hien thi ngay thang nam gio phut giay
define('DISPLAY_SHORT_DATETIME_FORMAT', 'H:i d/m/Y'); //Format hien thi ngay thang nam gio phut giay
define('DISPLAY_TIME_FORMAT', 'H:i');//Format hien thi gio phut
define('DISPLAY_TIME_SECOND_FORMAT', 'H:i:s'); //Format hien thi gio phut giay
define('DISPLAY_DATETIME_FORMAT_2', 'd/m/Y H:i:s'); //Format hien thi ngay thang nam gio phut giay
