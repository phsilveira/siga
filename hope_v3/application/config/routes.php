<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'user/index';
$route['logout'] = 'user/logout';
$route['login/validate_credentials'] = 'user/validate_credentials';