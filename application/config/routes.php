<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// auth routes
$route['login'] = 'AuthController/login';
$route['logout'] = 'AuthController/logout';

// admin
$route['administrator'] = 'DashboardController';
$route['administrator/siswa'] = 'StudentController';
$route['administrator/siswa/resmi'] = 'StudentController/official';
$route['administrator/cms/sponsor'] = 'CMSController/sponsor_index';
$route['administrator/cms/sponsor/tambah'] = 'CMSController/sponsor_create';
$route['administrator/cms/sponsor/store'] = 'CMSController/sponsor_store';
$route['administrator/cms/sponsor/data'] = 'CMSController/sponsor_data';
$route['administrator/cms/sponsor/delete'] = 'CMSController/sponsor_delete';
$route['administrator/cms/sponsor/edit/(:num)'] = 'CMSController/sponsor_edit/$1';
$route['administrator/cms/sponsor/update/(:num)'] = 'CMSController/sponsor_update/$1';

// teacher
$route['guru'] = 'TeacherController';
$route['guru/upload/(:any)'] = 'TeacherController/upload_index/$1';
$route['guru/upload/(:any)/tambah'] = 'TeacherController/upload_create/$1';
$route['guru/upload/(:any)/store'] = 'TeacherController/upload_store/$1';
$route['guru/upload/(:any)/data'] = 'TeacherController/upload_data/$1';
$route['guru/upload/(:any)/detail/(:num)'] = 'TeacherController/upload_detail/$1/$2';
$route['guru/upload/(:any)/edit/(:num)'] = 'TeacherController/upload_edit/$1/$2';
$route['guru/mengajar'] = 'TeacherController/teach_index';
$route['guru/mengajar/data'] = 'TeacherController/teach_data';
$route['guru/mengajar/tambah'] = 'TeacherController/teach_create';
$route['guru/mengajar/store'] = 'TeacherController/teach_store';
$route['guru/nilai-siswa'] = 'TeacherController/score_student_index';
$route['guru/nilai-siswa/class-teach/data'] = 'TeacherController/score_student_class_teach_data';
$route['guru/nilai-siswa/kelas/(:num)'] = 'TeacherController/score_student_class/$1';
