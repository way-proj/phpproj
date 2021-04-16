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
|	http://codeigniter.com/user_guide/general/routing.html
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
| my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'home/home';
$route['view-product/(:any)'] = 'Pages/view_produc/$1';

//16-2-2021
$route['webdesign'] = 'Pages/webdesign';
$route['appdevelopment'] = 'Pages/appdevelopment';
$route['webdevelopment'] = 'Pages/webdevelopment';
$route['ecommerce'] = 'Pages/ecommerce';
$route['digitalmarketing'] = 'Pages/digitalmarketing';
$route['aboutUs'] = 'Pages/aboutUs';
$route['contactUs'] = 'Pages/contactUs';
$route['thank-you'] = 'Pages/thankyou';
$route['portfolio'] = 'Pages/portfolio';
$route['products/(:any)'] = 'Pages/products/$1';
$route['products'] = 'Pages/products';
$route['product-details/(:any)'] = 'Pages/getProductDetails/$1';
$route['software'] = 'Pages/software';
$route['software-details/(:any)'] = 'Pages/getSoftwareDetails/$1';



//$route['portfolio-detail'] = 'Pages/portfoliodetail';
$route['drive-app'] = 'Pages/driveapp';
$route['portfolio-detail/(:any)'] = 'Pages/getPorfolioDetails/$1';
$route['privacy-policy'] = 'Pages/privacyPolicy';

//$route['app-development'] = 'Pages/appdevelopment';


$route['story'] = 'Pages/our_story';
$route['shop'] = 'Pages/shop';
$route['nicalu-naturale'] = 'Pages/nicalu_naturale';
$route['book'] = 'Pages/book';
//$route['cart'] = 'Cart/add';
$route['contact-us'] = 'Pages/contact_us';
$route['reviews'] = 'Pages/reviews';
$route['product-details'] = 'Pages/product_details';
$route['product-details/(:any)'] = 'Pages/product_details/$1';
//$route['Checkout/checkout/(:any)'] = 'Checkout/checkout/$1';

//$route['book-now'/(':num')'] = 'pages/book_now';
$route['book-now/(:any)'] = 'Pages/book_now/$1';
$route['view-produc/(:any)'] = 'Pages/view_produc/$1';

$route['booking'] = 'Pages/contact_mail';

// categoery routing

$route['general'] = 'Pages/general_notebook';
$route['personalizable'] = 'Pages/personalizable_notebook';
$route['wedding'] = 'Pages/wedding_notebook';
$route['interest'] = 'Pages/interest_notebook';
$route['office'] = 'Pages/office_use_notebook';
$route['corporate'] = 'Pages/corporate_query';
$route['dealer'] = 'Pages/dealers_enquiry';
$route['contact'] = 'Pages/contact_page';
$route['general/(.+)'] = 'Pages/view_product/$1/$2/$3/$4';
$route['wedding/(.+)'] = 'Pages/view_product/$1/$2/$3/$4';
$route['office/(.+)'] = 'Pages/view_product/$1/$2/$3/$4';
$route['save-contact'] = 'Pages/save_contact'; //save contact

// sub categoery routing
$route['personalizable/(.+)'] = 'Pages/common_page/$1/$2/$3/$4';
$route['personal/(.+)'] = 'Pages/view_sub_product/$1/$2/$3/$4';

$route['interest/(.+)'] = 'Pages/common_page_interst/$1/$2/$3/$4';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
