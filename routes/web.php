<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckUser;
use App\Http\Middleware\CheckCart;
use App\Http\Middleware\checkCustomer;

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
Route::get('/home','frontEnd\HomeController@index')->name('home');
Route::get('/','frontEnd\HomeController@index');

Route::get('danh-muc/{cateSlug}','frontEnd\CategoryController@index')->name('category');



Route::prefix('gio-hang')->name('cart')->middleware([checkCustomer::class])->group(function(){
    Route::get('/','frontEnd\CartController@index')->name('Index');
    Route::get('add','frontEnd\CartController@getadd')->name('Add');
    Route::post('add','frontEnd\CartController@add')->name('Add');
    Route::get('delete/{id}','frontEnd\CartController@delete')->name('Delete');
    Route::get('test-ajax','frontEnd\CartController@textajax');
});

Route::get('/{cateSlug}/{productSlug}','frontEnd\ProductController@index')->name('products');

Route::get('checkout','frontEnd\CheckoutController@index')->name('checkout');

Route::get('payment','frontEnd\PaymentController@index')->name('payment');
Route::post('payment','frontEnd\PaymentController@store');

Route::prefix('address')->name('address')->middleware([CheckCart::class])->group(function(){

    Route::get('/','frontEnd\AddressController@index')->name('.index');
    Route::post('/','frontEnd\AddressController@store')->name('.store');
});

Route::get('/dang-nhap/','admin\LoginController@index')->name('login');
Route::post('dang-nhap','admin\LoginController@store')->name('storeLogin');

Route::get('dang-xuat','admin\LoginController@logout')->name('logout');

Route::get('dang-ky','admin\RegisterController@index')->name('register');
Route::post('dang-ky','admin\RegisterController@store')->name('storeRegister');

Route::prefix('profile')->name('profile')->group(function(){
    Route::get('/','frontEnd\ProfileController@index');
});

Route::prefix('quan-tri')->middleware([CheckUser::class])->group(function(){
    Route::get('/','admin\IndexController@index')->name('index');
    
    Route::prefix('menu')->name('menu')->group(function(){
        Route::get('them-menu','admin\IndexController@getAddMenu')->name('Add');
        Route::post('them-menu','admin\IndexController@postAddMenu');
        Route::get('danh-sach-menu','admin\IndexController@listMenu')->name('List');
        Route::get('chinh-sua-menu/{id}','admin\IndexController@editMenu')->name('Edit');
        Route::post('chinh-sua-menu/{id}','admin\IndexController@editPostMenu');
        Route::get('xoa-menu/{id}','admin\IndexController@deleteMenu')->name('Delete');

        Route::prefix('{slug}/sub-menu')->name('submenu')->group(function(){
            Route::get('them-sub-menu','admin\SubMenuController@getAdd')->name('add');
            Route::post('them-sub-menu','admin\SubMenuController@postAdd');
        });
    });

    Route::prefix('danh-muc-cha')->name('parent')->group(function(){
        Route::get('them','admin\ParentCategoryController@getAdd')->name('.add');

        Route::post('them','admin\ParentCategoryController@postAdd');

        Route::get('danh-sach','admin\ParentCategoryController@list')->name('.list');

        Route::get('chinh-sua/{slug}','admin\ParentCategoryController@getEdit')->name('.edit');

        Route::post('chinh-sua/{slug}','admin\ParentCategoryController@postEdit');

        Route::get('xoa/{slug}','admin\ParentCategoryController@delete')->name('.delete');
    });

    Route::prefix('danh-muc-san-pham')->name('cate')->group(function(){
        Route::get('them-danh-muc','admin\CategoryController@getAdd')->name('.add');
        Route::post('them-danh-muc','admin\CategoryController@postAdd');

        Route::get('danh-sach-danh-muc','admin\CategoryController@list')->name('.list');

        Route::get('chinh-sua-danh-muc/{slug}','admin\CategoryController@getEdit')->name('.edit');

        Route::post('chinh-sua-danh-muc/{slug}','admin\CategoryController@postEdit');

        Route::get('xoa-danh-muc/{slug}','admin\CategoryController@delete')->name('.delete');
    });
    
    Route::prefix('san-pham')->name('product')->group(function(){
        Route::get('them-san-pham','admin\ProductController@getAdd')->name('.add');

        Route::post('them-san-pham','admin\ProductController@postAdd');

        Route::get('danh-sach-san-pham','admin\ProductController@list')->name('.list');

        Route::get('chinh-sua-san-pham/{slug}','admin\ProductController@getEdit')->name('.edit');

        Route::post('chinh-sua-san-pham/{slug}','admin\ProductController@postEdit');

         Route::get('xoa-san-pham/{slug}','admin\ProductController@delete')->name('.delete');

    });

    Route::prefix('hinh-anh-san-pham')->name('productImage')->group(function(){
            Route::get('them/{slug}','admin\ProductImageController@getAdd')->name('.add');

            Route::post('them/{slug}','admin\ProductImageController@postAdd')->name('.add');

            Route::get('{slug}','admin\ProductImageController@getList')->name('.list');

            Route::get('xoa/{id}','admin\ProductImageController@delete')->name('.delete');
    });

    Route::prefix('setting')->name('setting')->group(function(){
        Route::get('them','admin\SettingController@index')->name('.add');
        Route::post('them','admin\SettingController@store')->name('add');
    });

    Route::prefix('don-hang')->name('order')->group(function(){
        Route::get('danh-sach-don-hang','admin\OderController@index')->name('.list');
        Route::get('chi-tiet-don-hang/{id}','admin\OderController@detailOrder')->name('.detail');
        Route::post('chi-tiet-don-hang/{id}','admin\OderController@statusShipping');

        Route::get('xoa-don-hang/{id}','admin\OderController@delete')->name('.delete');
    });
});




