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

Route::get('/', function () {
    //return view('welcome');
    return view('frontend.homepage.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * route cho admin
 *
 */

Route::prefix('admin')->group(function (){
    //gom nhóm các route trong phần admin

    Route::get('/','AdminController@index')->name('admin.dashboard');
    Route::get('/dashboard','AdminController@index')->name('admin.dashboard');
    Route::get('register','AdminController@create')->name('admin.register');
    Route::post('register','AdminController@store')->name('admin.register.store');
    Route::get('login','Auth\Admin\LoginController@login')->name('admin.auth.login');
    Route::post('login','Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');
    Route::post ('logout','Auth\Admin\LoginController@logout')->name('admin.auth.logout');
    /**
     * ----------------route danh mục---------------------
     */
    Route::get('shop/category','Admin\ShopCategoryController@index');
    Route::get('shop/category/create','Admin\ShopCategoryController@create');
    Route::get('shop/category/{id}/edit','Admin\ShopCategoryController@edit');
    Route::get('shop/category/{id}/delete','Admin\ShopCategoryController@delete');

    Route::post('shop/category','Admin\ShopCategoryController@store');
    Route::post('shop/category/{id}','Admin\ShopCategoryController@update');
    Route::post('shop/category/{id}/delete','Admin\ShopCategoryController@destroy');
    /**
     * ----------------route admin shopping product---------------------
     */

    Route::get('shop/product','Admin\ShopProductController@index');
    Route::get('shop/product/create','Admin\ShopProductController@create');
    Route::get('shop/product/{id}/edit','Admin\ShopProductController@edit');
    Route::get('shop/product/{id}/delete','Admin\ShopProductController@delete');

    Route::post('shop/product','Admin\ShopProductController@store');
    Route::post('shop/product/{id}','Admin\ShopProductController@update');
    Route::post('shop/product/{id}/delete','Admin\ShopProductController@destroy');

    Route::get('shop/product/oder',function (){
        return view('admin.content.shop.oder.index');
    });
    Route::get('shop/review',function (){
        return view('admin.content.shop.review.index');
    });

    Route::get('shop/customer',function (){
        return view('admin.content.shop.customer.index');
    });
    Route::get('shop/brands',function (){
        return view('admin.content.shop.brands.index');
    });

    Route::get('shop/statistic',function (){
        return view('admin.content.shop.statistic.index');
    });
    /**
     * ----------------route nội dung---------------------
    */

    Route::get('content/category/',function (){
        return view('admin.content.content.category.index');
    });

    Route::get('content/post/',function (){
        return view('admin.content.content.post.index');
    });

    Route::get('content/page/',function (){
        return view('admin.content.content.page.index');
    });

    Route::get('content/tag/',function (){
        return view('admin.content.content.tag.index');
    });
    /**
     * ----------------route admin menu---------------------
     */
    Route::get('menu',function (){
        return view('admin.content.menu.index');
    });
    Route::get('menuitems',function (){
        return view('admin.content.menuitems.index');
    });
    /**
     * ----------------route admin user---------------------
     */
    Route::get('users',function (){
        return view('admin.content.users.index');
    });
    /**
     * ----------------route admin Media manager---------------------
     */
    Route::get('media',function (){
        return view('admin.content.media.index');
    });
    /**
     * ----------------route admin global setting--------------------
     */
    Route::get('config',function (){
        return view('admin.content.config.index');
    });
    /**
    * ----------------route admin new letters-------------------
     */
    Route::get('newletters',function (){
        return view('admin.content.newletters.index');
    });
    /**
     * ----------------route admin banners------------------
     */
    Route::get('banners',function (){
        return view('admin.content.banners.index');
    });
    /**
     * ----------------route admin contacts------------------
     */
    Route::get('contacts',function (){
        return view('admin.content.contacts.index');
    });
    /**
     * ----------------route admin email------------------
     */

    Route::get('email/inbox',function (){
        return view('admin.content.email.inbox');
    });

    Route::get('email/draft',function (){
        return view('admin.content.email.draft');
    });

    Route::get('email/send',function (){
        return view('admin.content.email.send');
    });

});

/**
 * route cho cacs nhà cung caoas sản phẩm
 */
Route::prefix('seller')->group(function (){
    //gom nhóm các route cho phần seller
    /**
     * url
     */
    Route::get('/','SellerController@index')->name('seller.dashboard');
    Route::get('/dashboard','SellerController@index')->name('seller.dashboard');
    Route::get('register','SellerController@create')->name('seller.register');
    Route::post('register','SellerController@store')->name('seller.register.store');
    Route::get('login','Auth\Seller\LoginController@login')->name('seller.auth.login');
    Route::post('login','Auth\Seller\LoginController@loginSeller')->name('seller.auth.loginSeller');
    Route::post ('logout','Auth\Seller\LoginController@logout')->name('seller.auth.logout');


});
Route::prefix('shipper')->group(function () {
    //gom nhóm các route cho phần shipper
    /**
     * url
     */
    Route::get('/', 'ShipperController@index')->name('shipper.dashboard');
    Route::get('/dashboard', 'ShipperController@index')->name('shipper.dashboard');
    Route::get('register', 'ShipperController@create')->name('shipper.register');
    Route::post('register', 'ShipperController@store')->name('shipper.register.store');
    Route::get('login', 'Auth\Shipper\LoginController@login')->name('shipper.auth.login');
    Route::post('login', 'Auth\Shipper\LoginController@loginShipper')->name('shipper.auth.loginShipper');
    Route::post('logout', 'Auth\Shipper\LoginController@logout')->name('shipper.auth.logout');
});