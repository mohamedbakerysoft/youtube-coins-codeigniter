<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "site";
// front end routes
$route['404_override'] = 'site';
$route['users/register-login-with-google'] = 'users/registerLoginWithGoogle';
$route['articles/send_like/(:num)'] = 'articles/send_like/$1';
$route['articles/get_youtube_info'] = 'articles/get_youtube_info';
$route['articles/edit_article/(:num)'] = 'articles/edit_article/$1';
$route['articles/delete_article/(:num)'] = 'articles/delete_article/$1';
$route['category/(:any)'] = 'site/index';
$route['articles/most-views'] = 'site/index';
$route['articles/random'] = 'site/index';
$route['users/login'] = 'users/login';
$route['users/sign_up'] = 'users/sign_up';
$route['users/sign_out'] = 'users/sign_out';
$route['articles/search'] = 'site/index';
$route['site/list_articles'] = 'site/list_articles';
$route['articles/comment_delete/(:num)'] = 'articles/comment_delete/$1';
$route['articles/edit/(:num)'] = 'articles/edit/$1';
$route['articles/discard'] = 'articles/discard';
$route['articles/(:num)'] = 'articles/details/$1';
$route['articles/create'] = 'articles/create';
$route['admin/setting'] = 'admin/setting'; //categories
$route['admin/payments'] = 'payment/index'; 
$route['admin/categories'] = 'admin/categories';
$route['admin/add_category'] = 'admin/add_category';
$route['paypal'] = 'Paypal/index';
$route['paypal/success'] = 'Paypal/success';
$route['installer'] = 'install';
$route['transactions'] = 'Transactions/index';
$route['videos'] = 'Users/videos';
$route['register/(:any)'] = 'users/sign_up';



/* End of file routes.php */
/* Location: ./application/config/routes.php */