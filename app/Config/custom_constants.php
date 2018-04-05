<?php

$default_user_image = Router::url().'/files/users/default_user.png';
define('APP_NAME', 'Royalty Rug');
define('DEV', 'CQLsys');
define('DEV_SITE', 'http://www.cqlsys.com');
define('DEV_TWITTER', 'https://twitter.com/CqlsysTech');
define('DEV_FACEBOOK', 'https://www.facebook.com/CqlsysTechnologies');
define('DEV_LINKEDIN', 'https://www.linkedin.com/company/cqlsys-technologies?trk=biz-companies-cym');
define('MAP_API_KEY', 'AIzaSyAs2Q75zf72FAjr2EAnTVgcM1XX8V2KV9k');

define('DEFAULT_USER_IMAGE',$default_user_image);

define('TIME1', microtime());

define('ADMIN_GROUP_ID', 1);

define('USER_GROUP_ID', 2);

define('PRO_GROUP_ID', 3);
define('DEFAULT_POINTS', 10);

define('NINE_HOURS', 60 * 60 * 9);

define('ONE_YEAR', 31536000);

define('SUCCESS_CODE', 200);

define('FAILURE_CODE', 403);
define('UNAUTHORIZED', 401);
define('PLACEHOLDER_IMAGE', '8f6dbadb60861178f2b3674b8dbdb4d5');

define('ACCOUNT_SID', 'AC84eb5711229b077437ca2993af0c51e4');
define('AUTH_TOKEN', '72c91421b8ffcc6f01ee57020baba1c4');
define('SENDING_NUMBER', '+12012524105');

define('API_BOOK_TICKETS', '/api/book');
define('API_CATEGORIES_LISTING', '/api/category_listing');
define('API_EVENT_ADD', '/api/add_event');
define('API_EVENT_DETAILS', '/api/event');
define('API_SIGNUP_DETAILS', '/api/users/signup');
define('API_OTP_CONFIRM', '/api/users/confirmotp');
define('API_LOGIN', '/api/users/login');
define('API_FORGOT_PASSWORD', '/api/users/forgotpassword');
define('API_RESET_PASSWORD', '/api/users/reset_password');
define('API_FAVOURITE', '/api/add-to-wishlist');


define('MAILGUN_API_KEY', 'key-c58a069be6d91f94336037421eeb84fb');
//define('IMAGEPATH',Router::url('',true));