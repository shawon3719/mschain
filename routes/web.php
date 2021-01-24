<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', 'Frontend\PagesController@index')->name('home');
/*
     Frontend contact form
    */
    Route::group(['prefix' => 'contact'], function() {
        Route::post('/store', 'Frontend\PagesController@contactStore')->name('contact.store');
    });
    Route::group(['prefix' => 'products'], function() {
        Route::get('show/details/{slug}', 'Frontend\PagesController@showDetails')->name('products.details');
    });




//=========== Admin Route Groups Starts here==========

    //=========== Admin Route ==========
    Route::group(['prefix' => 'admin'], function() {
        Route::get('/', 'HomeController@index')->name('admin');

    //=========== Slider Route Group==========
    Route::group(['prefix' => '/sliders'], function(){
        Route::get('/', 'Admin\SliderController@index')->name('admin.sliders');
        Route::post('/store', 'Admin\SliderController@store')->name('admin.slider.store');
        Route::post('/slider/edit/{id}', 'Admin\SliderController@update')->name('admin.slider.update');
        Route::post('/slider/delete/{id}', 'Admin\SliderController@destroy')->name('admin.slider.delete');
    });

        //=========== Category Route Group==========
    Route::group(['prefix' => '/categories'], function(){
        Route::get('/', 'Admin\CategoryController@index')->name('admin.categories');
        Route::get('/create', 'Admin\CategoryController@create')->name('admin.category.create');
        Route::post('/store', 'Admin\CategoryController@store')->name('admin.category.store');
        Route::get('/edit/{id}', 'Admin\CategoryController@edit')->name('admin.category.edit');
        Route::post('/category/edit/{id}', 'Admin\CategoryController@update')->name('admin.category.update');
        Route::post('/category/delete/{id}', 'Admin\CategoryController@destroy')->name('admin.category.delete');
    });

        //Product Routes

        Route::group(['prefix' => '/products'], function(){
            Route::get('/', 'Admin\ProductController@index')->name('admin.products');
            Route::get('/create', 'Admin\ProductController@create')->name('admin.products.create');
            Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('admin.product.edit');
            Route::post('/store', 'Admin\ProductController@store')->name('admin.product.store');
            Route::post('/product/edit/{id}', 'Admin\ProductController@update')->name('admin.product.update');
            Route::post('/product/delete/{id}', 'Admin\ProductController@destroy')->name('admin.product.delete');
        });

    });

        //=========== Authentication Route ==========
Auth::routes();
