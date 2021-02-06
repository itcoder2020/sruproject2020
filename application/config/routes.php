<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['login'] = 'home/login';
$route['rate'] = 'home/rate';
$route['admin'] = 'admin/login';
$route['results'] = 'home/results';
$route['admin/setting_rate'] = 'admin/setting';
$route['admin/main'] = 'admin/main';
$route['api/data_member'] = 'admin/data_member';
$route['api/data_weight'] = 'admin/data_weight';
$route['api/data_date'] = 'admin/data_date';
$route['admin/manage_member'] = 'admin/manage_member';
$route['admin/manage_date'] = 'admin/manage_date';
$route['admin/manage_rate'] = 'admin/manage_rate';
$route['home'] = 'home/home';
$route['workload'] = 'home/workload';
$route['profile'] = 'home/profile';
$route['admin/change_password'] = 'admin/change_pass';
$route['setting'] = 'home/setting';
$route['pdf/(:any)/(:any)'] = 'home/Viewpdf';
$route['word/(:any)/(:any)'] = 'home/Viewword';
$route['xls/(:any)/(:any)'] = 'home/Viewxls';
$route['rate/(:any)'] = 'home/rate_select/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
