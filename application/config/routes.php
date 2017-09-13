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
//$route['/url'] = 'controller';
$route['admin/user/update/(:any)'] = 'admin/user/update/$1';
$route['admin/user/create'] = 'admin/user/create';
$route['admin/user'] = 'admin/user';

$route['admin/contact/search/page/(:any)'] = "admin/contact/search/$1";
$route['admin/contact/search/page'] = "admin/contact/search";
$route['admin/contact/search'] = "admin/contact/search";
$route['admin/contact/view/(:any)'] = 'admin/contact/view/$1';
$route['admin/contact/page/(:any)'] = 'admin/contact/index/$1';
$route['admin/contact/page'] = 'admin/contact';
$route['admin/contact'] = 'admin/contact';

$route['admin/product_type/update/(:any)'] = 'admin/product/update_type/$1';
$route['admin/product_type/create'] = 'admin/product/create_type';
$route['admin/product_type'] = 'admin/product/type';
$route['admin/product/search/page/(:any)'] = "admin/product/search/$1";
$route['admin/product/search/page'] = "admin/product/search";
$route['admin/product/search'] = "admin/product/search";
$route['admin/product/update_image/(:any)'] = 'admin/product/update_image/$1';
$route['admin/product/update/(:any)'] = 'admin/product/update/$1';
$route['admin/product/create'] = 'admin/product/create';
$route['admin/product/page/(:any)'] = 'admin/product/index/$1';
$route['admin/product/page'] = 'admin/product';
$route['admin/product'] = 'admin/product';

$route['admin/news/search/page/(:any)'] = "admin/news/search/$1";
$route['admin/news/search/page'] = "admin/news/search";
$route['admin/news/search'] = "admin/news/search";
$route['admin/news/update/(:any)'] = "admin/news/update/$1";
$route['admin/news/create'] = 'admin/news/create';
$route['admin/news/page/(:any)'] = 'admin/news/index/$1';
$route['admin/news/page'] = 'admin/news';
$route['admin/news'] = 'admin/news';

$route['admin/about/update/(:any)'] = 'admin/about/update/$1';
$route['admin/about/create'] = 'admin/about/create';
$route['admin/about'] = 'admin/about';

$route['admin/home/update_image/(:any)'] = 'admin/admin/update_image/$1';
$route['admin/home/update_banner/(:any)'] = 'admin/admin/update_banner/$1';
$route['admin/home/create'] = 'admin/admin/create';
$route['admin/log_out'] = 'admin/admin/logout';
$route['admin/(:any)'] = 'admin/admin/index/$1';


$route['sign_in'] = 'signin';
//$route['product/image/(:any)'] = 'product/product_img/$1';
$route['product/(:any)/(:any)'] = 'product/view/$1/$2';
$route['product/(:any)'] = 'product/index/$1';
$route['product'] = 'product';
$route['contact'] = 'contact';
$route['news/page/(:any)'] = 'news/index/$1';
$route['news/page'] = 'news';
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';
$route['about/(:any)'] = 'about/index/$1';
$route['about'] = 'about';
$route['banner/(:any)'] = 'home/banner/$1';
$route['admin'] = 'admin/admin/index';
$route['(:any)'] = 'home/view/$1';
$route['default_controller'] = 'home/view';
