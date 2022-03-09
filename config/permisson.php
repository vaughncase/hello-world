<?php
/**
 *File name : permisson.php  / Date: 11/17/2021 - 5:27 PM
 *Code Owner: Dao Thi Minh Nguyet / Phone: 0985455294 / Email: nguyetdtm@omt.vn
 */


//---------------------------------SCHOOL PERMISSIONS---------------------------------------------------------------
/**
 * Attendance Come
 */
DEFINE('PERMISSION_SCHOOL_VIEW_REPORT_ATTENDANCE_COME', 'school-view-report-attendance-come');
DEFINE('PERMISSION_SCHOOL_EXPORT_REPORT_ATTENDANCE_COME', 'school-export-report-attendance-come');
DEFINE('PERMISSION_SCHOOL_VIEW_RESULT_ATTENDANCE_COME', 'school-view-result-attendance-come');
DEFINE('PERMISSION_SCHOOL_UPDATE_RESULT_ATTENDANCE_COME', 'school-update-result-attendance-come');
DEFINE('PERMISSION_SCHOOL_UPDATE_PAST_RESULT_ATTENDANCE_COME', 'school-update-past-result-attendance-come');
DEFINE('PERMISSION_SCHOOL_MANAGE_COME_IMAGE_ATTENDANCE_APP', 'school-manage-come-image-attendance-app');
/**
 * Attendance Breakfast
 */
DEFINE('PERMISSION_SCHOOL_VIEW_RESULT_ATTENDANCE_BREAKFAST', 'school-view-result-attendance-breakfast');
DEFINE('PERMISSION_SCHOOL_UPDATE_RESULT_ATTENDANCE_BREAKFAST', 'school-update-result-attendance-breakfast');
DEFINE('PERMISSION_SCHOOL_UPDATE_PAST_RESULT_ATTENDANCE_BREAKFAST', 'school-update-past-result-attendance-breakfast');
DEFINE('PERMISSION_SCHOOL_USE_ATTENDANCE_BREAKFAST_ON_APP', 'school-use-attendance-breakfast-on-app');
/**
 * Attendance Lunch
 */
DEFINE('PERMISSION_SCHOOL_MANAGE_CONFIG_ATTENDANCE_LUNCH', 'school-manage-config-attendance-lunch');
DEFINE('PERMISSION_SCHOOL_VIEW_RESULT_ATTENDANCE_LUNCH', 'school-view-result-attendance-lunch');
DEFINE('PERMISSION_SCHOOL_UPDATE_RESULT_ATTENDANCE_LUNCH', 'school-update-result-attendance-lunch');
DEFINE('PERMISSION_SCHOOL_UPDATE_PAST_RESULT_ATTENDANCE_LUNCH', 'school-update-past-result-attendance-lunch');
DEFINE('PERMISSION_SCHOOL_USE_ATTENDANCE_LUNCH_ON_APP', 'school-use-attendance-lunch-on-app');
/**
 * Face Recognition
 */
DEFINE('PERMISSION_SCHOOL_VIEW_STUDENT_FACE_IDENTITY', 'school-view-student-face-identity');
DEFINE('PERMISSION_SCHOOL_ADD_STUDENT_FACE_IDENTITY', 'school-add-student-face-identity');
DEFINE('PERMISSION_SCHOOL_DELETE_STUDENT_FACE_IDENTITY', 'school-delete-student-face-identity');
DEFINE('PERMISSION_SCHOOL_UPDATE_STUDENT_ATTENDANCE_IMAGE', 'school-update-student-attendance-image');
/**
 * Attendance Leave
 */
DEFINE('PERMISSION_SCHOOL_VIEW_RESULT_ATTENDANCE_LEAVE', 'school-view-result-attendance-leave');
DEFINE('PERMISSION_SCHOOL_UPDATE_RESULT_ATTENDANCE_LEAVE', 'school-update-result-attendance-leave');
DEFINE('PERMISSION_SCHOOL_UPDATE_PAST_RESULT_ATTENDANCE_LEAVE', 'school-update-past-result-attendance-leave');
DEFINE('PERMISSION_SCHOOL_USE_ATTENDANCE_LEAVE_ON_APP', 'school-use-attendance-leave-on-app');
/**
 * Attendance Late
 */
DEFINE('PERMISSION_SCHOOL_VIEW_ATTENDANCE_LATE_CLASSES', 'school-view-attendance-late-classes');
DEFINE('PERMISSION_SCHOOL_MANAGE_ATTENDANCE_LATE_CLASSES', 'school-manage-attendance-late-classes');
DEFINE('PERMISSION_SCHOOL_VIEW_RESULT_ATTENDANCE_LATE', 'school-view-result-attendance-late');
DEFINE('PERMISSION_SCHOOL_UPDATE_RESULT_ATTENDANCE_LATE', 'school-update-result-attendance-late');
DEFINE('PERMISSION_SCHOOL_UPDATE_PAST_RESULT_ATTENDANCE_LATE', 'school-update-past-result-attendance-late');
DEFINE('PERMISSION_SCHOOL_MANAGE_STUDENT_ATTENDANCE_LATE_CLASS', 'school-manage-student-attendance-late-class');
DEFINE('PERMISSION_SCHOOL_USE_ATTENDANCE_LATE_ON_APP', 'school-use-attendance-late-on-app');
DEFINE('PERMISSION_SCHOOL_VIEW_REPORT_ATTENDANCE_LATE', 'school-view-report-attendance-late');
/**
 * Extracurricular Attendance Come
 */
DEFINE('PERMISSION_SCHOOL_VIEW_RESULT_ATTENDANCE_COME_EXTRACURRICULAR',
    'school-view-result-attendance-come-extracurricular');
DEFINE('PERMISSION_SCHOOL_UPDATE_RESULT_ATTENDANCE_COME_EXTRACURRICULAR',
    'school-update-result-attendance-come-extracurricular');
DEFINE('PERMISSION_SCHOOL_UPDATE_PAST_RESULT_ATTENDANCE_COME_EXTRACURRICULAR',
    'school-update-past-result-attendance-come-extracurricular');
DEFINE('PERMISSION_SCHOOL_USE_ATTENDANCE_COME_EXTRACURRICULAR_ON_APP',
    'school-use-attendance-come-extracurricular-on-app');
/**
 * Extracurricular Attendance Leave
 */
DEFINE('PERMISSION_SCHOOL_VIEW_RESULT_ATTENDANCE_LEAVE_EXTRACURRICULAR',
    'school-view-result-attendance-leave-extracurricular');
DEFINE('PERMISSION_SCHOOL_UPDATE_RESULT_ATTENDANCE_LEAVE_EXTRACURRICULAR',
    'school-update-result-attendance-leave-extracurricular');
DEFINE('PERMISSION_SCHOOL_UPDATE_PAST_RESULT_ATTENDANCE_LEAVE_EXTRACURRICULAR',
    'school-update-past-result-attendance-leave-extracurricular');
DEFINE('PERMISSION_SCHOOL_USE_ATTENDANCE_LEAVE_EXTRACURRICULAR_ON_APP',
    'school-use-attendance-leave-extracurricular-on-app');
/**
 * Classes
 */
DEFINE('PERMISSION_SCHOOL_VIEW_CLASSES', 'school-view-classes');
DEFINE('PERMISSION_SCHOOL_MANAGE_CLASSES', 'school-manage-classes');
DEFINE('PERMISSION_SCHOOL_MANAGE_TEACHERS_CLASSES', 'school-manage-teachers-classes');
DEFINE('PERMISSION_SCHOOL_MANAGE_STUDENTS_CLASSES', 'school-manage-students-classes');
DEFINE('PERMISSION_SCHOOL_VIEW_ACTIVITIES_CLASSES', 'school-view-activities-classes');
/**
 * Learn Schedules
 */

DEFINE('PERMISSION_SCHOOL_VIEW_LEARN_SCHEDULE', 'school-view-learn-schedule');
DEFINE('PERMISSION_SCHOOL_EXPORT_LEARN_SCHEDULE', 'school-export-learn-schedule');
DEFINE('PERMISSION_SCHOOL_MANAGE_LEARN_SCHEDULE', 'school-manage-learn-schedule');
DEFINE('PERMISSION_SCHOOL_MANAGE_IN_CHARGE_CLASS_LEARN_SCHEDULE', 'school-manage-in-charge-class-learn-schedule');
/**
 * Medicine Notes
 */
DEFINE('PERMISSION_SCHOOL_VIEW_MEDICINE_NOTES', 'school-view-medicine-notes');
DEFINE('PERMISSION_SCHOOL_ACCEPT_MEDICINE_NOTES', 'school-accept-medicine-notes');
DEFINE('PERMISSION_SCHOOL_PRINT_MEDICINE_NOTES', 'school-print-medicine-notes');
DEFINE('PERMISSION_SCHOOL_REPLY_MEDICINE_NOTES', 'school-reply-medicine-notes');
DEFINE('PERMISSION_SCHOOL_EXPORT_MEDICINE_NOTES', 'school-export-medicine-notes');
/**
 * Morning Messages
 */
DEFINE('PERMISSION_SCHOOL_VIEW_MORNING_MESSAGES', 'school-view-morning-messages');
DEFINE('PERMISSION_SCHOOL_ACCEPT_MORNING_MESSAGES', 'school-accept-morning-messages');
DEFINE('PERMISSION_SCHOOL_REPLY_MORNING_MESSAGES', 'school-reply-morning-messages');
/**
 * Thanks Messages
 */
DEFINE('PERMISSION_SCHOOL_VIEW_THANKS_MESSAGES', 'school-view-thanks-messages');
DEFINE('PERMISSION_SCHOOL_REPLY_THANKS_MESSAGES', 'school-reply-thanks-messages');
/**
 * Absent Requests
 */
DEFINE('PERMISSION_SCHOOL_VIEW_ABSENT_REQUESTS', 'school-view-absent-requests');
DEFINE('PERMISSION_SCHOOL_CREATE_STUDENT_ABSENT_REQUESTS', 'school-create-student-absent-requests');
DEFINE('PERMISSION_SCHOOL_UPDATE_STUDENT_ABSENT_REQUESTS', 'school-update-student-absent-requests');
DEFINE('PERMISSION_SCHOOL_DELETE_STUDENT_ABSENT_REQUESTS', 'school-delete-student-absent-requests');
DEFINE('PERMISSION_SCHOOL_ACCEPT_ABSENT_REQUESTS', 'school-accept-absent-requests');
/**
 * Student Messages
 */
DEFINE('PERMISSION_SCHOOL_VIEW_STUDENT_MESSAGES', 'school-view-student-messages');
DEFINE('PERMISSION_SCHOOL_MANAGE_STUDENT_MESSAGES', 'school-manage-student-messages');
DEFINE('PERMISSION_SCHOOL_REPLY_STUDENT_STUDENT_MESSAGES', 'school-reply-student-messages');
/**
 * Transport Ticket
 */
DEFINE('PERMISSION_SCHOOL_VIEW_TRANSPORT_TICKET', 'school-view-transport-ticket');
DEFINE('PERMISSION_SCHOOL_ACCEPT_TRANSPORT_TICKET', 'school-accept-transport-ticket');
DEFINE('PERMISSION_SCHOOL_CREATE_STUDENT_TRANSPORTER', 'school-create-student-transporter');
/**
 * Report Activities
 */
DEFINE('PERMISSION_SCHOOL_VIEW_REPORT_ACTIVITIES', 'school-view-report-activities');
/**
 * Learn Activity
 */
DEFINE('PERMISSION_SCHOOL_VIEW_RESULT_LEARN_ACTIVITY', 'school-view-result-learn-activity');
DEFINE('PERMISSION_SCHOOL_UPDATE_RESULT_LEARN_ACTIVITY', 'school-update-result-learn-activity');
DEFINE('PERMISSION_SCHOOL_UPDATE_PAST_RESULT_LEARN_ACTIVITY', 'school-update-past-result-learn-activity');
/**
 * Dining Activity
 */
DEFINE('PERMISSION_SCHOOL_VIEW_RESULT_DINING_ACTIVITY', 'school-view-result-dining-activity');
DEFINE('PERMISSION_SCHOOL_UPDATE_RESULT_DINING_ACTIVITY', 'school-update-result-dining-activity');
DEFINE('PERMISSION_SCHOOL_UPDATE_PAST_RESULT_DINING_ACTIVITY', 'school-update-past-result-dining-activity');
/**
 * Sleep Activity
 */
DEFINE('PERMISSION_SCHOOL_VIEW_RESULT_SLEEP_ACTIVITY', 'school-view-result-sleep-activity');
DEFINE('PERMISSION_SCHOOL_UPDATE_RESULT_SLEEP_ACTIVITY', 'school-update-result-sleep-activity');
DEFINE('PERMISSION_SCHOOL_UPDATE_PAST_RESULT_SLEEP_ACTIVITY', 'school-update-past-result-sleep-activity');
/**
 * Hygienic Activity
 */
DEFINE('PERMISSION_SCHOOL_VIEW_RESULT_HYGIENIC_ACTIVITY', 'school-view-result-hygienic-activity');
DEFINE('PERMISSION_SCHOOL_UPDATE_RESULT_HYGIENIC_ACTIVITY', 'school-update-result-hygienic-activity');
DEFINE('PERMISSION_SCHOOL_UPDATE_PAST_RESULT_HYGIENIC_ACTIVITY', 'school-update-past-result-hygienic-activity');
/**
 * Daily Assessment
 */
DEFINE('PERMISSION_SCHOOL_VIEW_RESULT_DAILY_ASSESSMENT', 'school-view-result-daily-assessment');
DEFINE('PERMISSION_SCHOOL_UPDATE_RESULT_DAILY_ASSESSMENT', 'school-update-result-daily-assessment');
DEFINE('PERMISSION_SCHOOL_UPDATE_PAST_RESULT_DAILY_ASSESSMENT', 'school-update-past-result-daily-assessment');
DEFINE('PERMISSION_SCHOOL_ACCEPT_DAILY_ASSESSMENT', 'school-accept-daily-assessment');
DEFINE('PERMISSION_SCHOOL_REPLY_CENSOR_DAILY_ASSESSMENT', 'school-reply-censor-daily-assessment');
DEFINE('PERMISSION_SCHOOL_EDIT_STUDENT_DAILY_ASSESSMENT', 'school-edit-student-daily-assessment');
DEFINE('PERMISSION_SCHOOL_DELETE_STUDENT_DAILY_ASSESSMENT', 'school-delete-student-daily-assessment');
/**
 * Weekend Assessment
 */
DEFINE('PERMISSION_SCHOOL_VIEW_RESULT_WEEKEND_ASSESSMENT', 'school-view-result-weekend-assessment');
DEFINE('PERMISSION_SCHOOL_UPDATE_RESULT_WEEKEND_ASSESSMENT', 'school-update-result-weekend-assessment');
DEFINE('PERMISSION_SCHOOL_UPDATE_PAST_RESULT_WEEKEND_ASSESSMENT', 'school-update-past-result-weekend-assessment');
DEFINE('PERMISSION_SCHOOL_ACCEPT_WEEKEND_ASSESSMENT', 'school-accept-weekend-assessment');
DEFINE('PERMISSION_SCHOOL_REPLY_CENSOR_WEEKEND_ASSESSMENT', 'school-reply-censor-weekend-assessment');
DEFINE('PERMISSION_SCHOOL_EDIT_STUDENT_WEEKEND_ASSESSMENT', 'school-edit-student-weekend-assessment');
DEFINE('PERMISSION_SCHOOL_DELETE_STUDENT_WEEKEND_ASSESSMENT', 'school-delete-student-weekend-assessment');
/**
 * Attachments
 */
DEFINE('PERMISSION_SCHOOL_VIEW_ATTACHMENTS', 'school-view-attachments');
DEFINE('PERMISSION_SCHOOL_UPDATE_ATTACHMENTS', 'school-update-attachments');
DEFINE('PERMISSION_SCHOOL_UPDATE_PAST_ATTACHMENTS', 'school-update-past-attachments');
DEFINE('PERMISSION_SCHOOL_ACCEPT_ATTACHMENTS', 'school-accept-attachments');
DEFINE('PERMISSION_SCHOOL_REPLY_CENSOR_ATTACHMENTS', 'school-reply-censor-attachments');
DEFINE('PERMISSION_SCHOOL_EDIT_STUDENT_ATTACHMENTS', 'school-edit-student-attachments');
DEFINE('PERMISSION_SCHOOL_DELETE_STUDENT_ATTACHMENTS', 'school-delete-student-attachments');
/**
 * Albums
 */
DEFINE('PERMISSION_SCHOOL_VIEW_SCHOOL_ALBUMS', 'school-view-school-albums');
DEFINE('PERMISSION_SCHOOL_VIEW_CLASS_ALBUMS', 'school-view-classes-albums');
DEFINE('PERMISSION_SCHOOL_VIEW_STUDENT_ALBUMS', 'school-view-student-albums');
DEFINE('PERMISSION_SCHOOL_VIEW_INFORMATION_ALBUMS', 'school-view-information-albums');
DEFINE('PERMISSION_SCHOOL_CREATE_SCHOOL_ALBUMS', 'school-create-school-albums');
DEFINE('PERMISSION_SCHOOL_CREATE_CLASS_ALBUMS', 'school-create-class-albums');
DEFINE('PERMISSION_SCHOOL_CREATE_STUDENT_ALBUMS', 'school-create-student-albums');
DEFINE('PERMISSION_SCHOOL_ACCEPT_ALBUMS', 'school-accept-albums');
DEFINE('PERMISSION_SCHOOL_REPLY_CENSOR_ALBUMS', 'school-reply-censor-albums');
DEFINE('PERMISSION_SCHOOL_VIEW_DELETED_ALBUMS', 'school-view-deleted-albums');
DEFINE('PERMISSION_SCHOOL_RECOVER_DELETED_ALBUMS', 'school-recover-deleted-albums');
DEFINE('PERMISSION_SCHOOL_REPLY_COMMENT_ALBUMS', 'school-reply-comment-albums');
DEFINE('PERMISSION_SCHOOL_DELETE_SCHOOL_ALBUMS', 'school-delete-school-albums');
DEFINE('PERMISSION_SCHOOL_DELETE_CLASS_ALBUMS', 'school-delete-class-albums');
DEFINE('PERMISSION_SCHOOL_DELETE_STUDENT_ALBUMS', 'school-delete-student-albums');
DEFINE('PERMISSION_SCHOOL_DOWNLOAD_ALBUMS', 'school-download-albums');
DEFINE('PERMISSION_SCHOOL_VIEW_REPORT_ALBUMS', 'school-view-report-albums');
/**
 * Posts
 */
DEFINE('PERMISSION_SCHOOL_VIEW_SCHOOL_POSTS', 'school-view-school-posts');
DEFINE('PERMISSION_SCHOOL_VIEW_CLASSES_POSTS', 'school-view-classes-posts');
DEFINE('PERMISSION_SCHOOL_VIEW_INTERNAL_POSTS', 'school-view-internal-posts');
DEFINE('PERMISSION_SCHOOL_VIEW_STUDENT_POSTS', 'school-view-students-posts');
DEFINE('PERMISSION_SCHOOL_VIEW_SCHOOL_GROUP_POSTS', 'school-view-school-group-posts');
DEFINE('PERMISSION_SCHOOL_VIEW_INFORMATION_POSTS', 'school-view-information-posts');
DEFINE('PERMISSION_SCHOOL_CONFIG_CATEGORIES_POSTS', 'school-config-categories-posts');
DEFINE('PERMISSION_SCHOOL_CREATE_SCHOOL_POSTS', 'school-create-school-posts');
DEFINE('PERMISSION_SCHOOL_CREATE_CLASS_POSTS', 'school-create-classes-posts');
DEFINE('PERMISSION_SCHOOL_CREATE_INTERNAL_POSTS', 'school-create-internal-posts');
DEFINE('PERMISSION_SCHOOL_CREATE_STUDENT_POSTS', 'school-create-students-posts');
DEFINE('PERMISSION_SCHOOL_CREATE_SCHOOL_GROUP_POSTS', 'school-create-student-group-posts');
DEFINE('PERMISSION_SCHOOL_DELETE_SCHOOL_POSTS', 'school-delete-school-posts');
DEFINE('PERMISSION_SCHOOL_DELETE_CLASS_POSTS', 'school-delete-classes-posts');
DEFINE('PERMISSION_SCHOOL_DELETE_INTERNAL_POSTS', 'school-delete-internal-posts');
DEFINE('PERMISSION_SCHOOL_DELETE_STUDENT_POSTS', 'school-delete-students-posts');
DEFINE('PERMISSION_SCHOOL_DELETE_SCHOOL_GROUP_POSTS', 'school-delete-school-group-posts');
DEFINE('PERMISSION_SCHOOL_PIN_POSTS', 'school-pin-posts');
DEFINE('PERMISSION_SCHOOL_CONFIG_DEFAULT_COVER_POSTS', 'school-config-default-cover-posts');
DEFINE('PERMISSION_SCHOOL_VIEW_REPORT_POSTS', 'school-view-report-posts');
DEFINE('PERMISSION_SCHOOL_ACCEPT_POSTS', 'school-accept-posts');
DEFINE('PERMISSION_SCHOOL_REPLY_CENSOR_POSTS', 'school-reply-censor-posts');
DEFINE('PERMISSION_SCHOOL_VIEW_DELETED_POSTS', 'school-view-deleted-posts');
DEFINE('PERMISSION_SCHOOL_RECOVER_DELETED_POSTS', 'school-recover-deleted-posts');
DEFINE('PERMISSION_SCHOOL_REPLY_COMMENT_POSTS', 'school-reply-comment-posts');
/**
 * Users - Staff
 */
DEFINE('PERMISSION_SCHOOL_VIEW_STAFF', 'school-view-staff');
DEFINE('PERMISSION_SCHOOL_EXPORT_STAFF', 'school-export-staff');
DEFINE('PERMISSION_SCHOOL_CREATE_STAFF', 'school-create-staff');
DEFINE('PERMISSION_SCHOOL_UPDATE_STAFF', 'school-update-staff');
DEFINE('PERMISSION_SCHOOL_DELETE_STAFF', 'school-delete-staff');
DEFINE('PERMISSION_SCHOOL_ASSIGN_SCHOOL_STAFF', 'school-assign-school-staff');
DEFINE('PERMISSION_SCHOOL_UPLOAD_STAFF', 'school-upload-staff');
DEFINE('PERMISSION_SCHOOL_MANAGE_SCHOOL_GROUP_STAFF', 'school-manage-school-group-staff');
DEFINE('PERMISSION_SCHOOL_MANAGE_SCHOOL_GROUP_TEACHER', 'school-manage-school-group-teacher');
DEFINE('PERMISSION_SCHOOL_RECOVER_STAFF_ACCOUNT', 'school-recover-staff-account');
/**
 * Users - Guardian
 */
DEFINE('PERMISSION_SCHOOL_VIEW_GUARDIAN', 'school-view-guardian');
DEFINE('PERMISSION_SCHOOL_EXPORT_GUARDIAN', 'school-export-guardian');
DEFINE('PERMISSION_SCHOOL_CREATE_GUARDIAN', 'school-create-guardian');
DEFINE('PERMISSION_SCHOOL_UPDATE_GUARDIAN', 'school-update-guardian');
DEFINE('PERMISSION_SCHOOL_DELETE_GUARDIAN', 'school-delete-guardian');
DEFINE('PERMISSION_SCHOOL_ASSIGN_SCHOOL_GUARDIAN', 'school-assign-school-guardian');
DEFINE('PERMISSION_SCHOOL_RECOVER_GUARDIAN_ACCOUNT', 'school-recover-guardian-account');
/**
 * Users - Student
 */
DEFINE('PERMISSION_SCHOOL_VIEW_STUDENTS', 'school-view-students');
DEFINE('PERMISSION_SCHOOL_VIEW_ACTIVE_ACCOUNTS', 'school-view-active-account');
DEFINE('PERMISSION_SCHOOL_VIEW_DELETED_STUDENTS', 'school-view-deleted-students');
DEFINE('PERMISSION_SCHOOL_RECOVER_STUDENTS', 'school-recover-student-account');
DEFINE('PERMISSION_SCHOOL_EXPORT_STUDENTS', 'school-export-students');
DEFINE('PERMISSION_SCHOOL_CREATE_STUDENTS', 'school-create-students');
DEFINE('PERMISSION_SCHOOL_UPDATE_STUDENTS', 'school-update-students');
DEFINE('PERMISSION_SCHOOL_DELETE_STUDENTS', 'school-delete-students');
DEFINE('PERMISSION_SCHOOL_MANAGE_GUARDIAN_STUDENTS', 'school-manage-guardian-students');
DEFINE('PERMISSION_SCHOOL_UPLOAD_STUDENTS', 'school-upload-students');
DEFINE('PERMISSION_SCHOOL_ASSIGN_SCHOOL_STUDENTS', 'school-assign-school-students');
/**
 * School Year
 */
DEFINE('PERMISSION_SCHOOL_VIEW_SCHOOL_YEAR', 'school-view-school-year');
DEFINE('PERMISSION_SCHOOL_CREATE_SCHOOL_YEAR', 'school-create-school-year');
DEFINE('PERMISSION_SCHOOL_UPDATE_SCHOOL_YEAR', 'school-update-school-year');
DEFINE('PERMISSION_SCHOOL_DELETE_SCHOOL_YEAR', 'school-delete-school-year');
DEFINE('PERMISSION_SCHOOL_TRANSFER_SCHOOL_YEAR', 'school-transfer-school-year');
/**
 * Holiday
 */
DEFINE('PERMISSION_SCHOOL_VIEW_HOLIDAY', 'school-view-holiday');
DEFINE('PERMISSION_SCHOOL_CREATE_HOLIDAY', 'school-create-holiday');
DEFINE('PERMISSION_SCHOOL_UPDATE_HOLIDAY', 'school-update-holiday');
DEFINE('PERMISSION_SCHOOL_DELETE_HOLIDAY', 'school-delete-holiday');
/**
 * Grade
 */
DEFINE('PERMISSION_SCHOOL_VIEW_GRADE', 'school-view-grade');
DEFINE('PERMISSION_SCHOOL_MANAGE_GRADE', 'school-manage-grade');
/**
 * Emoticon
 */
DEFINE('PERMISSION_SCHOOL_VIEW_EMOTICON', 'school-view-emoticon');
DEFINE('PERMISSION_SCHOOL_MANAGE_EMOTICON', 'school-manage-emoticon');
/**
 * Sample Comment
 */
DEFINE('PERMISSION_SCHOOL_VIEW_SAMPLE_COMMENT', 'school-view-sample-comment');
DEFINE('PERMISSION_SCHOOL_MANAGE_SAMPLE_COMMENT', 'school-manage-sample-comment');
/**
 * Birthday
 */
DEFINE('PERMISSION_SCHOOL_VIEW_STUDENT_BIRTHDAY', 'school-view-student-birthday');
DEFINE('PERMISSION_SCHOOL_VIEW_STAFF_BIRTHDAY', 'school-view-staff-birthday');
DEFINE('PERMISSION_SCHOOL_EXPORT_STUDENT_BIRTHDAY', 'school-export-student-birthday');
DEFINE('PERMISSION_SCHOOL_EXPORT_STAFF_BIRTHDAY', 'school-export-staff-birthday');
/**
 * School Profile
 */
DEFINE('PERMISSION_SCHOOL_VIEW_SCHOOL_INFORMATION', 'school-view-school-information');
DEFINE('PERMISSION_SCHOOL_MANAGE_SCHOOL_PROFILE', 'school-manage-school-profile');
DEFINE('PERMISSION_SCHOOL_MANAGE_SCHOOL_INFORMATION', 'school-manage-school-information');
/**
 * Food Menu
 */
DEFINE('PERMISSION_SCHOOL_VIEW_FOOD_MENU', 'school-view-food-menu');
DEFINE('PERMISSION_SCHOOL_UPLOAD_FOOD_MENU', 'school-upload-food-menu');
DEFINE('PERMISSION_SCHOOL_MANAGE_SCHOOL_FOOD_MENU', 'school-manage-school-food-menu');
DEFINE('PERMISSION_SCHOOL_MANAGE_GRADE_FOOD_MENU', 'school-manage-grade-food-menu');
/**
 * Customer feedback
 */
DEFINE('PERMISSION_SCHOOL_VIEW_DEPARTMENT', 'school-view-department');
DEFINE('PERMISSION_SCHOOL_MANAGE_DEPARTMENT', 'school-manage-department');
DEFINE('PERMISSION_SCHOOL_VIEW_CATEGORY_CUSTOMER_FEEDBACK', 'school-view-category-customer-feedback');
DEFINE('PERMISSION_SCHOOL_MANAGE_CATEGORY_CUSTOMER_FEEDBACK', 'school-manage-category-customer-feedback');
DEFINE('PERMISSION_SCHOOL_MANAGE_FAQ_CUSTOMER_FEEDBACK', 'school-manage-faq-customer-feedback');
DEFINE('PERMISSION_SCHOOL_VIEW_CUSTOMER_FEEDBACK', 'school-view-customer-feedback');
DEFINE('PERMISSION_SCHOOL_MANAGE_CUSTOMER_FEEDBACK', 'school-manage-customer-feedback');
DEFINE('PERMISSION_SCHOOL_REPLY_INTERNAL_CUSTOMER_FEEDBACK', 'school-reply-internal-customer-feedback');
DEFINE('PERMISSION_SCHOOL_REPLY_GUARDIAN_CUSTOMER_FEEDBACK', 'school-reply-guardian-customer-feedback');
/**
 * Height Weight
 */
DEFINE('PERMISSION_SCHOOL_VIEW_HEIGHT_WEIGHT', 'school-view-height-weight');
DEFINE('PERMISSION_SCHOOL_CREATE_HEIGHT_WEIGHT', 'school-create-height-weight');
DEFINE('PERMISSION_SCHOOL_UPLOAD_HEIGHT_WEIGHT', 'school-upload-height-weight');
DEFINE('PERMISSION_SCHOOL_UPDATE_HEIGHT_WEIGHT', 'school-update-height-weight');
DEFINE('PERMISSION_SCHOOL_DELETE_HEIGHT_WEIGHT', 'school-delete-height-weight');
DEFINE('PERMISSION_SCHOOL_EXPORT_HEIGHT_WEIGHT', 'school-export-height-weight');
DEFINE('PERMISSION_SCHOOL_PRINT_STUDENT_HEIGHT_WEIGHT', 'school-print-student-height-weight');
/**
 * Student Profile / General Health
 */
DEFINE('PERMISSION_SCHOOL_VIEW_STUDENT_GENERAL_HEALTH', 'school-view-general-health');
DEFINE('PERMISSION_SCHOOL_UPDATE_STUDENT_GENERAL_HEALTH', 'school-update-general-health');
/**
 * Staff dinning
 */
DEFINE('PERMISSION_SCHOOL_VIEW_STAFF_DINNING', 'school-view-staff-dining');
DEFINE('PERMISSION_SCHOOL_UPDATE_PRICE_STAFF_DINNING', 'school-update-price-staff-dining');
DEFINE('PERMISSION_SCHOOL_ADD_STAFF_DINNING', 'school-add-staff-dining');
DEFINE('PERMISSION_SCHOOL_REMOVE_STAFF_DINNING', 'school-remove-staff-dining');
DEFINE('PERMISSION_SCHOOL_UPDATE_STAFF_DINNING', 'school-update-staff-dining');
DEFINE('PERMISSION_SCHOOL_MANAGE_STAFF_DINNING', 'school-manage-staff-dining');
/**
 * School Config
 */
DEFINE('PERMISSION_SCHOOL_VIEW_SCHOOL_CONFIG', 'school-view-school-config');
DEFINE('PERMISSION_SCHOOL_UPDATE_SCHOOL_CONFIG', 'school-update-school-config');
/**
 * Role && Permission
 */
DEFINE('PERMISSION_SCHOOL_VIEW_SYSTEM_PERMISSION', 'school-view-system-permission');
DEFINE('PERMISSION_SCHOOL_MANAGE_SYSTEM_PERMISSION', 'school-manage-system-permission');
DEFINE('PERMISSION_SCHOOL_VIEW_SYSTEM_ROLE', 'school-view-system-role');
DEFINE('PERMISSION_SCHOOL_MANAGE_SYSTEM_ROLE', 'school-manage-system-role');

/**
 * Moet
 */
DEFINE('PERMISSION_SCHOOL_VIEW_MOET_INFO', 'school-view-moet-info');
DEFINE('PERMISSION_SCHOOL_EDIT_MOET_INFO', 'school-edit-moet-info');


/**
 * Redirect dashboard v4
 */
DEFINE('PERMISSION_SCHOOL_MANGER_DASHBOARD', 'school-manager-dashboard');

/**
 * Class Diary
 */
DEFINE('PERMISSION_SCHOOL_VIEW_CLASS_DIARY_TEMPLATE', 'school-view-class-diary-template');
DEFINE('PERMISSION_SCHOOL_MANAGE_CLASS_DIARY_TEMPLATE', 'school-manage-class-diary-template');
DEFINE('PERMISSION_SCHOOL_VIEW_CLASS_DIARY_DAILY', 'school-view-class-diary-daily');
DEFINE('PERMISSION_SCHOOL_MANAGE_CLASS_DIARY_DAILY', 'school-manage-class-diary-daily');


/**
 * School event
 */
DEFINE('PERMISSION_SCHOOL_VIEW_SCHOOL_EVENT', 'school-view-school-event');
DEFINE('PERMISSION_SCHOOL_CREATE_SCHOOL_EVENT', 'school-create-school-event');
DEFINE('PERMISSION_SCHOOL_UPDATE_SCHOOL_EVENT', 'school-update-school-event');
DEFINE('PERMISSION_SCHOOL_DELETE_SCHOOL_EVENT', 'school-delete-school-event');
DEFINE('PERMISSION_SCHOOL_EXPORT_REGISTRATION_ORDER_SCHOOL_EVENT', 'school-export-registration-order-school-event');
DEFINE('PERMISSION_SCHOOL_MANAGER_REGISTRATION_ORDER_SCHOOL_EVENT', 'school-manger-registration-order-school-event');


/**
 * Education program
 */
DEFINE('PERMISSION_SCHOOL_VIEW_SCHOOL_EDUCATION_PROGRAM', 'school-group-view-education-program');
DEFINE('PERMISSION_SCHOOL_MANAGE_SCHOOL_EDUCATION_PROGRAM', 'school-group-create-education-program');


/**
 * Education program category
 */
DEFINE('PERMISSION_SCHOOL_VIEW_EDUCATION_PROGRAM_CATEGORY', 'school-group-view-education-program-category');
DEFINE('PERMISSION_SCHOOL_MANAGE_EDUCATION_PROGRAM_CATEGORY', 'school-group-manage-education-program-category');

/**
 * Education plan
 */
DEFINE('PERMISSION_SCHOOL_VIEW_EDUCATION_PLAN', 'school-view-education-plan');
DEFINE('PERMISSION_SCHOOL_MANAGE_EDUCATION_PLAN', 'school-manage-education-plan');

/**
 * Education plan schedule
 */
DEFINE('PERMISSION_SCHOOL_VIEW_EDUCATION_PLAN_SCHEDULE', 'school-view-education-plan-schedule');
DEFINE('PERMISSION_SCHOOL_MANAGE_EDUCATION_PLAN_SCHEDULE', 'school-manage-education-plan-schedule');

/**
 * Education plan general plan
 */
DEFINE('PERMISSION_SCHOOL_VIEW_EDUCATION_PLAN_GENERAL_PLAN', 'school-view-education-plan-general-plan');
DEFINE('PERMISSION_SCHOOL_MANAGE_EDUCATION_PLAN_GENERAL_PLAN', 'school-manage-education-plan-general-plan');

/**
 * Education plan period general plan
 */
DEFINE('PERMISSION_SCHOOL_VIEW_EDUCATION_PLAN_BOARD_GENERAL_PLAN', 'school-view-education-plan-board-general-plan');
DEFINE('PERMISSION_SCHOOL_MANAGE_EDUCATION_PLAN_BOARD_GENERAL_PLAN', 'school-manage-education-plan-board-general-plan');

/**
 * Education plan period comment
 */
DEFINE('PERMISSION_SCHOOL_MANAGE_EDUCATION_PLAN_BOARD_PERIOD_COMMENT',
    'school-manage-education-plan-board-period-comment');

/**
 * Education plan period lesson
 */
DEFINE('PERMISSION_SCHOOL_VIEW_EDUCATION_PLAN_BOARD_LESSON', 'school-view-education-plan-board-lesson');
DEFINE('PERMISSION_SCHOOL_MANAGE_EDUCATION_PLAN_BOARD_LESSON', 'school-manage-education-plan-board-lesson');

/**
 * Education plan lesson send feedback
 */
DEFINE('PERMISSION_SCHOOL_EDUCATION_PLAN_BOARD_LESSON_SEND_FEEDBACK',
    'school-manage-education-plan-board-lesson-send-feedback');

/**
 * Education plan lesson comment on feedback
 */
DEFINE('PERMISSION_SCHOOL_EDUCATION_PLAN_BOARD_LESSON_FEEDBACK_COMMENT',
    'school-manage-education-plan-board-lesson-feedback-comment');

/**
 * Education plan lesson rating
 */
DEFINE('PERMISSION_SCHOOL_EDUCATION_PLAN_BOARD_LESSON_RATING', 'school-manage-education-plan-board-lesson-rating');

