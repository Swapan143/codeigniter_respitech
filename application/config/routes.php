<?php
defined('BASEPATH') OR exit('No direct script access allowed');      

// $route['default_controller'] = 'admin/AdminController';    
$route['translate_uri_dashes'] = FALSE;

/*==users==*/
$route['default_controller'] = 'user/HomeController';
$route['home'] = 'user/HomeController';

$route['all-collection'] = 'user/HomeController/all_collection';
$route['category/(:any)'] = 'user/HomeController/product_category';
$route['osa'] = 'user/HomeController/cpap';
$route['copd'] = 'user/HomeController/bi_pap';
$route['osa-book-for-sleep-test'] = 'user/HomeController/osaBookForSleepTest';
$route['copd-book-for-sleep-test'] = 'user/HomeController/copdBookForSleepTest';
$route['osa-book-for-sleep-test-submit'] = 'user/HomeController/osaBookForSleepTestSubmit';
$route['copd-book-for-sleep-test-submit'] = 'user/HomeController/copdBookForSleepTestSubmit';
$route['get-category'] = 'user/HomeController/getCategory';
$route['get-category-product'] = 'user/HomeController/getCategoryProduct';
$route['respitech-quiz'] = 'user/HomeController/berlinQuestionnaire';
$route['berlin-questionnaire-submit'] = 'user/HomeController/berlinQuestionnaireSubmit';
$route['get-city'] = 'user/HomeController/getCity';
$route['respitech-status/([a-zA-Z0-9]+)'] = 'user/HomeController/berlinStatus/$1';


$route['book-product/details/(:any)'] = 'user/HomeController/book_product';
$route['delete_account'] = 'user/HomeController/delete_account';

$route['account-delete'] = 'user/HomeController/account_delete';

$route['book-product/details/(:any)/add_to_cart'] = 'user/CardController/all_card';

$route['view-card'] = 'user/CardController';

$route['view-card/add_tocard']='user/CardController/all_card';
$route['view-card/card_delete'] = 'user/CardController/card_delete'; 

$route['card_delete_all'] = 'user/CardController/card_delete_all'; 

$route['user-register'] = 'user/HomeController/user_register';
$route['user-login'] = 'user/HomeController/user_login';
$route['user-register/register_user'] = 'user/HomeController/add_register';
$route['user-logout'] = 'user/HomeController/user_logout';
$route['user-login/login_user'] = 'user/HomeController/login_user';

$route['cart-checkout'] = 'user/HomeController/cart_checkout';

$route['cart-checkout/confirm_order'] = 'user/HomeController/confirm_order';

$route['sucess-order'] = 'user/HomeController/sucess_order';



$route['my-order'] = 'user/HomeController/my_order';

$route['order-details/([a-zA-Z0-9]+)'] = 'user/HomeController/orderDetails/$1';

$route['order-tracking/([a-zA-Z0-9]+)'] = 'user/HomeController/tracking/$1';


$route['wishlist'] = 'user/HomeController/wishlist';
$route['removewishlist'] = 'user/HomeController/removewishlist';
$route['wish_list_del'] = 'user/HomeController/wish_list_del';

$route['about-us'] = 'user/HomeController/about_us';
$route['contact-us'] = 'user/HomeController/contact_us';
$route['privacy-policy'] = 'user/HomeController/privacy_policy';

$route['search'] = 'user/HomeController/header_search_product';

$route['search-product'] = 'user/HomeController/product_search';
$route['show-wishlist'] = 'user/HomeController/show_wishlist';

$route['my-account'] = 'user/HomeController/my_account';


$route['cancelorder'] = 'user/HomeController/cancelorder';

$route['all-collection/all_searchabc'] = 'user/HomeController/all_search_product';

$route['check-email'] = 'user/HomeController/check_email';

$route['category/(:any)/all_searchabc'] = 'user/HomeController/all_search_product';

$route['all-collection/search_price'] = 'user/HomeController/search_product';

$route['category/(:any)/search_price'] = 'user/HomeController/search_product';

$route['checks'] = 'user/HomeController/download_pdf';

$route['download_invoice'] = 'user/HomeController/download_invoice';

$route['search-product/search_price'] = 'user/HomeController/search_product';
$route['search-product/all_searchabc'] = 'user/HomeController/all_search_product';


$route['seller-login'] = 'user/HomeController/seller_login';
$route['seller-register'] = 'user/HomeController/seller_register';
$route['seller-register/register_seller'] = 'user/HomeController/add_register_seller';
$route['seller-logout'] = 'user/HomeController/seller_logout';

$route['seller-login/login_seller'] = 'user/HomeController/login_seller';
$route['seller_addcart'] = 'user/HomeController/seller_addcart';


//$route['book-product/details/(:any)/add_to_cart'] = 'user/CardController/all_card';


/*==admin==*/

$route['admin']='admin/AdminController';     
$route['verify'] = 'admin/AdminController/verify';
$route['forgotpassword'] = 'admin/AdminController/forgotpass';
$route['forgotpassword_verify'] = 'admin/AdminController/forgotpassword';
$route['admin/changepassword'] = 'admin/AdminController/resetpassword';
$route['admin/foorgot_pass_email'] = 'admin/AdminController/foorgot_pass_email';

// Banner//

$route['admin/banner'] = 'admin/BannerController';
$route['admin/add-banner'] = 'admin/BannerController/add_banner';
$route['admin/banner/edit-banner'] = 'admin/BannerController/edit_banner';
$route['admin/update-banner'] = 'admin/BannerController/update_banner';
$route['admin/banner/status'] = 'admin/BannerController/status';
$route['admin/banner/destroy/([a-zA-Z0-9]+)'] = 'admin/BannerController/destroy/$1';

$route['admin/dashboard'] = 'admin/DashboardController';
$route['admin/buyer'] = 'admin/master/MasterController/buyer';
$route['admin/product-view/([a-zA-Z0-9]+)'] = 'admin/master/MasterController/view_product/$1';

$route['buyer_search'] = 'admin/master/MasterController/buyer_search';
$route['search_buyer_details'] = 'admin/master/MasterController/search_buyer_details';
$route['buyer_data_add'] = 'admin/master/MasterController/buyer_data_add';
$route['product_serch_data'] = 'admin/master/MasterController/product_serch_data';

$route['admin/buyer-product'] = 'admin/master/MasterController/buyer_product';
$route['admin/product-edit/([a-zA-Z0-9]+)'] = 'admin/master/MasterController/product_edit/$1';
$route['admin-product-edit/([a-zA-Z0-9]+)'] = 'admin/master/MasterController/product_edit_admin/$1';
$route['buyer_product_edit'] = 'admin/master/MasterController/buyer_product_edit';
$route['admin_product_edit'] = 'admin/master/MasterController/admin_product_edit';

$route['product_search'] = 'admin/master/MasterController/product_search';
$route['buyer_product_data_add'] = 'admin/master/MasterController/buyer_product_data_add';
$route['admin/category'] = 'admin/master/MasterController/category';
$route['category_add'] = 'admin/master/MasterController/category_add';
$route['admin/category/edit_data/([a-zA-Z0-9]+)'] = 'admin/master/MasterController/category_edit_data/$1';
$route['admin/update_category'] = 'admin/master/MasterController/update_category';
$route['admin/category/destroy/([a-zA-Z0-9]+)'] = 'admin/master/MasterController/category_destroy/$1';


$route['admin/sub-category'] = 'admin/master/MasterController/sub_category';
$route['admin/sub-category/destroy/([a-zA-Z0-9]+)'] = 'admin/master/MasterController/sub_category_destroy/$1';
$route['subcategory_data_add'] = 'admin/master/MasterController/subcategory_data_add';
$route['admin/sub-category/edit_data/([a-zA-Z0-9]+)'] = 'admin/master/MasterController/sub_category_edit_data/$1';
$route['admin/sub_update_category'] = 'admin/master/MasterController/update_subcategory';   
$route['admin/sub-category/destroy/([a-zA-Z0-9]+)'] = 'admin/master/MasterController/sub_category_destroy/$1';

$route['admin/product'] = 'admin/master/MasterController/product';

$route['admin/product_add/select_category'] = 'admin/master/MasterController/select_category';

$route['admin/product_add/select_buyer_pro'] = 'admin/master/MasterController/select_buyer_pro';

$route['product_rate_s'] = 'admin/master/MasterController/product_rate_s';
$route['discount_rate_s'] = 'admin/master/MasterController/discount_rate_s';

$route['product_rate'] = 'admin/master/MasterController/product_rate';
$route['discount_rate'] = 'admin/master/MasterController/discount_rate';
$route['admin/product_add'] = 'admin/master/MasterController/product_add';
$route['admin/product/edit_data/([a-zA-Z0-9]+)'] = 'admin/master/MasterController/product_edit_data/$1';
$route['admin/product_edit'] = 'admin/master/MasterController/product_edit_submit';

$route['admin/sub_update_category'] = 'admin/master/MasterController/update_subcategory';  


$route['admin/product-image'] = 'admin/master/MasterController/product_image';
$route['product_image_add'] = 'admin/master/MasterController/product_image_add';
$route['product_image_show'] = 'admin/master/MasterController/product_image_show';
$route['product_submit'] = 'admin/master/MasterController/product_submit';

$route['admin/pending-order'] = 'admin/order/OrderController/pending_order';
$route['admin/pending-order/order_status'] = 'admin/order/OrderController/order_status';
$route['admin/view-order/([a-zA-Z0-9]+)'] = 'admin/order/OrderController/view_order/$1';
$route['admin/delivery-order'] = 'admin/order/OrderController/delivery_order';

$route['admin/total-stock'] = 'admin/stock/StockController/total_stock';  
$route['code_buyer_serch_data'] = 'admin/stock/StockController/code_buyer_serch_data';
$route['buyer_stock_data_serch'] = 'admin/stock/StockController/buyer_stock_data_serch';
$route['admin/monthly-account'] = 'admin/account/AccountController/monthly_account';
$route['report_generate'] = 'admin/account/AccountController/report_generate';

$route['admin/vendor'] = 'admin/vendor/VendorController/vendor';
$route['admin/vendor-product-view/([a-zA-Z0-9]+)'] = 'admin/vendor/VendorController/vendor_product_view/$1';

// doctor list
$route['admin/doctor'] = 'admin/DoctorController';
$route['admin/add-doctor'] = 'admin/DoctorController/add_doctor';
$route['admin/save-doctor'] = 'admin/DoctorController/save_doctor';
$route['admin/doctor-edit/([a-zA-Z0-9]+)'] = 'admin/DoctorController/doctor_edit/$1';
$route['admin/update-doctor'] = 'admin/DoctorController/update_doctor';
$route['admin/doctor/status'] = 'admin/DoctorController/status';
$route['admin/doctor/destroy/([a-zA-Z0-9]+)'] = 'admin/DoctorController/destroy/$1';
// patient list 

$route['admin/patient'] = 'admin/PatientController';
$route['admin/add-patient'] = 'admin/PatientController/add_patient';
$route['admin/save-patient'] = 'admin/PatientController/save_patient';
$route['admin/patient-edit/([a-zA-Z0-9]+)'] = 'admin/PatientController/patient_edit/$1';
$route['admin/update-patient'] = 'admin/PatientController/update_patient';
$route['admin/patient/status'] = 'admin/PatientController/status';
$route['admin/patient/destroy/([a-zA-Z0-9]+)'] = 'admin/PatientController/destroy/$1';

// recommended list 

$route['admin/recommended-product/([a-zA-Z0-9]+)'] = 'admin/RecommendedController/index/$1';
$route['admin/add-recommended-product/([a-zA-Z0-9]+)'] = 'admin/RecommendedController/add_recommended_product/$1';
$route['admin/save-recommended-product'] = 'admin/RecommendedController/save_recommended_product';
$route['admin/recommended-product-edit/([a-zA-Z0-9]+)'] = 'admin/RecommendedController/recommended_productt_edit/$1';
$route['admin/update-recommended-product'] = 'admin/RecommendedController/update_recommended_product';


// query list
$route['admin/sleep-test'] = 'admin/QueryController/sleep_test';
$route['admin/free-consultation'] = 'admin/QueryController/free_consultation';

// berlin list
$route['admin/berlin-questionnaire-list'] = 'admin/QueryController/berlin_list';
$route['admin/berlin-questionnaire/([a-zA-Z0-9]+)'] = 'admin/QueryController/berlin_view/$1';

//state
$route['admin/state'] = 'admin/StateController';
$route['admin/add-state'] = 'admin/StateController/add_state';
$route['admin/state/edit-state/([a-zA-Z0-9]+)'] = 'admin/StateController/edit_state/$1';
$route['admin/update-state'] = 'admin/StateController/update_state';
$route['admin/state/status'] = 'admin/StateController/status';
$route['admin/state/destroy/([a-zA-Z0-9]+)'] = 'admin/StateController/destroy/$1';

//city
$route['admin/city'] = 'admin/CityController';
$route['admin/add-city'] = 'admin/CityController/add_city';
$route['admin/city/edit-city/([a-zA-Z0-9]+)'] = 'admin/CityController/edit_city/$1';
$route['admin/update-city'] = 'admin/CityController/update_city';
$route['admin/city/status'] = 'admin/CityController/status';
$route['admin/city/destroy/([a-zA-Z0-9]+)'] = 'admin/CityController/destroy/$1';


//$route['admin/manageadmin'] = 'admin/admin/adminController/manageadmin';
$route['api/category']='api/Api_Controller/category';
$route['api/subcategory']='api/Api_Controller/subcategory';
$route['api/subcategory-product']='api/Api_Controller/subcategory_products';      
$route['api/category-product']='api/Api_Controller/category_product';
$route['api/new-arrivals-product']='api/Api_Controller/new_arrivals_product';  
$route['api/best-sellers']='api/Api_Controller/best_sellers';
$route['api/sale-items']='api/Api_Controller/sale_items';
$route['api/login']='api/Api_Controller/login';
$route['api/register']='api/Api_Controller/register';
$route['api/wishlist'] = 'api/Api_Controller/Wishlist';
$route['api/check-wishlist'] = 'api/Api_Controller/CheckWishlist';
$route['api/wishlist-product'] = 'api/Api_Controller/WishlistProduct';
$route['api/changeProfile-user'] = 'api/Api_Controller/changeProfile_user';
$route['api/change-password-user'] = 'api/Api_Controller/changePasswordUser';
$route['api/product-view'] = 'api/Api_Controller/get_product_view';
$route['api/product-view-image'] = 'api/Api_Controller/get_product_view_image';
$route['api/search'] = 'api/Api_Controller/search';
$route['api/order-insert'] = 'api/Api_Controller/order_insert';
$route['api/order-show'] = 'api/Api_Controller/order_show';
$route['api/order-cancel'] = 'api/Api_Controller/order_cancel';
$route['api/vendor-register'] = 'api/Api_Controller/vendor_register';
$route['api/vendor-login'] = 'api/Api_Controller/vendor_login';
$route['api/vendor-product-serch'] = 'api/Api_Controller/vendor_product_serch';
$route['api/vendor-product-insert'] = 'api/Api_Controller/vendor_product_insert';
$route['api/vendor-product-show'] = 'api/Api_Controller/vendor_product_show';
$route['api/vendor-product-stock'] = 'api/Api_Controller/vendor_product_stock';
$route['api/vendor-product-edit'] = 'api/Api_Controller/vendor_product_edit';
$route['api/contact-us'] = 'api/Api_Controller/contact_us';
$route['api/privacy-policy'] = 'api/Api_Controller/privacy_policy';













 


