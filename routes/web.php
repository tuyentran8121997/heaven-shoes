<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });




Route::match(['get','post'],'/admin','AdminController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//index Page
Route::get('/','IndexController@index');

//Category/Listing Page
Route::get('/products/{url}','ProductsController@products');

//Products filter page
Route::match(['get','post'],'/products/filter','ProductsController@filter');

//Product Detail Page
Route::get('product/{id}','ProductsController@product');

//Get Product Attribute Price
Route::get('/get-product-price','ProductsController@getProductPrice');

//add to cart Route
Route::match(['get','post'],'/add-cart','ProductsController@addtocart');

//cart page
Route::match(['get','post'],'/cart','ProductsController@cart');

//Delete Product from Cart
Route::get('/cart/delete-product/{id}','ProductsController@deleteCartProduct');

//Update Product Quantity in Cart
Route::get('/cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity');

//Apply coupon
Route::post('/cart/apply-coupon','ProductsController@applyCoupon');

//Users Login/Register Page
Route::get('/login-register','UsersController@userLoginRegister');

// Users Register Form Submit
Route::post('/login-register','UsersController@register');

//Confirm account
Route::get('confirm/{code}','UsersController@confirmAccount');

//User login form submit
Route::post('/user-login','UsersController@login');

//Users logout
Route::get('/user-logout','UsersController@logout');

//Search products
Route::post('/search-products','ProductsController@searchProducts');

//All route after login prevent
Route::group(['middleware'=>['frontlogin']],function(){
    //Users Account page
    Route::match(['get','post'],'/account','UsersController@account');

    //Check user current password
    Route::post('/check-user-pwd','UsersController@chkUserPassword');

    //update user password
    Route::post('/update-user-pwd','UsersController@updatePassword');

    //checkout
    Route::match(['get','post'],'/checkout','ProductsController@checkout');

    // Order Review Page
    Route::match(['get','post'],'/order-review','ProductsController@orderReview');
    
    // Place Order
    Route::match(['get','post'],'/place-order','ProductsController@placeOrder');
    
    // Thanks Page
    Route::get('/thanks','ProductsController@thanks');
    
	// Users Orders Page
    Route::get('/orders','ProductsController@userOrders');
    
	// User Ordered Products Page
    Route::get('/orders/{id}','ProductsController@userOrderDetails');
    
});


//Check if User already exists
Route::match(['get','post'],'/check-email','UsersController@checkEmail');

Route::group(['middleware' => ['adminlogin']],function(){
    Route::get('/admin/dashboard','AdminController@dashboard');
    Route::get('/admin/setting','AdminController@setting');
    Route::get('/admin/check-pwd','AdminController@chkPassword');
    Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');

    //categories Routes
    Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
    Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
    Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');
    Route::get('/admin/view-categories','CategoryController@viewCategories');

    //Products Route
    Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
    Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@editProduct');
    Route::get('/admin/view-products','ProductsController@viewProducts');
    Route::get('/admin/delete-product/{id}','ProductsController@deleteProduct');
    Route::get('/admin/delete-product-image/{id}','ProductsController@deleteProductImage');
    Route::get('/admin/delete-alt-image/{id}','ProductsController@deleteAltImage');

    //Products Attribute Route
    Route::match(['get','post'],'/admin/add-attributes/{id}','ProductsController@addAttributes');
    Route::match(['get','post'],'/admin/edit-attributes/{id}','ProductsController@editAttributes');
    Route::match(['get','post'],'/admin/add-images/{id}','ProductsController@addImages');
    Route::get('/admin/delete-attribute/{id}','ProductsController@deleteAttribute');

    //Coupon Routes
    Route::match(['get','post'],'/admin/add-coupon','CouponsController@addCoupon');
    Route::match(['get','post'],'/admin/edit-coupon/{id}','CouponsController@editCoupon');
    Route::get('admin/view-coupons','CouponsController@viewCoupons');
    Route::get('/admin/delete-coupon/{id}','CouponsController@deleteCoupon');
    
    //Admin Banners ROutes
    Route::match(['get','post'],'/admin/add-banner','BannersController@addBanner');
    Route::match(['get','post'],'/admin/edit-banner/{id}','BannersController@editBanner');
    Route::get('/admin/view-banners','BannersController@viewBanners');
    Route::get('/admin/delete-banner/{id}','BannersController@deleteBanner');

    // Admin Orders Routes
    Route::get('/admin/view-orders','ProductsController@viewOrders');

    // Admin Order Details Route
	Route::get('/admin/view-order/{id}','ProductsController@viewOrderDetails');

	// Update Order Status
	Route::post('/admin/update-order-status','ProductsController@updateOrderStatus');

	// Admin Users Route
    Route::get('/admin/view-users','UsersController@viewUsers');
    
    // Add CMS Route
    Route::match(['get','post'],'/admin/add-cms-page','CmsController@addCmsPage');

    // Edit CMS Route
    Route::match(['get','post'],'/admin/edit-cms-page/{id}','CmsController@editCmsPage');

    //View CMS page
    Route::get('/admin/view-cms-pages','CmsController@viewCmsPages');

    //Delete CMS
    Route::get('/admin/delete-cms-page/{id}','CmsController@deleteCmsPage');

    //View Enquiries
    Route::get('/admin/view-enquiries','CmsController@viewEnquiries');

    //Delete enquiries
    Route::get('/admin/delete-enquiry/{id}','CmsController@deleteEnquiry');
});

Route::get('/logout','AdminController@logout');

//contact page
Route::match(['get','post'],'/page/contact','CmsController@contact');

//DIsplay CMS page
Route::match(['get','post'],'/page/{url}','CmsController@cmsPage');

