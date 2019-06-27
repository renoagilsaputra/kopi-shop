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
$route['default_controller'] = 'home';
$route['tentang'] = 'home/tentang';
$route['menu'] = 'home/produk';
$route['toko'] = 'home/toko';

$route['login'] = 'auth';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';

$route['home/admin'] = 'admin';
$route['home/admin/produk'] = 'admin/produk';
$route['home/admin/produk_del/(:any)'] = 'admin/produk_del/$1';

$route['home/admin/produk_edit/(:any)'] = 'admin/produk_edit/$1';

$route['home/admin/transaksi'] = 'admin/transaksi';
$route['home/admin/transaksi_detail/(:any)/(:any)'] = 'admin/transaksi_detail/$1/$2';
$route['home/admin/user'] = 'admin/user';
$route['home/admin/user_del/(:any)'] = 'admin/user_del/$1';
$route['home/admin/user_edit/(:any)'] = 'admin/user_edit/$1';
$route['home/admin/changepassword/(:any)'] = 'admin/changepassword/$1';

$route['home/admin/cetak'] = 'admin/cetak';
$route['home/admin/cetak_detail'] = 'admin/cetak_detail';

$route['home/user'] = 'user';
$route['home/user/menu'] = 'user/menu';
$route['home/user/add_cart/(:any)'] = 'user/add_cart';
$route['home/user/shopping_cart'] = 'user/cart';
$route['home/user/transaksi'] = 'user/transaksi';
$route['home/user/detail_transaksi/(:any)'] = 'user/detail_transaksi/$1';

$route['home/user/info_user'] = 'user/info_user';
$route['home/user/user_edit'] = 'user/user_edit';
$route['home/user/changepassword'] = 'user/changepassword';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
