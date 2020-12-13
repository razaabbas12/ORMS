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

Auth::routes();

Route::group(['middleware' => 'auth'], function (){
	
	Route::get('/', function(){
		return view('welcome');
	});
    Route::get('/scheduling','UsersController@scheduling');
    Route::post('/schedule/create', 'UsersController@scheduleCreate')->name('schedule.create');
    Route::post('/booking/create', 'UsersController@bookingCreate')->name('booking.create');
    Route::get('/booking-detail', 'UsersController@bookingDetail');
    
    Route::get('booking','UsersController@booking');

	Route::resource('categories','CategoryController');
    Route::get('categories/{id}/delete','CategoryController@remove');

	Route::resource('products','ProductController');
    Route::get('products/{id}/delete','ProductController@remove');
    Route::get('product/{id}/detail','ProductController@getDetails');
    Route::get('/product-data/{id}', 'ProductController@loadProductData')->name('loadProductData');

    Route::resource('train','OrdersController');
    Route::get('all-orders','OrdersController@adminOrders');
    Route::get('all-schedules','OrdersController@customerOrders');
    Route::get('order/{id}/{status}','OrdersController@updateStatus');
    Route::get('manage/{id}/order','OrdersController@manageOrder')->name('manage-order');
    

    Route::resource('users','UsersController');
    Route::get('/user-tailor','UsersController@tailorDatatable');
    Route::get('/user-customer','UsersController@customerDatatable');
    Route::post('/user/update-status', 'UsersController@statusUpdated');

    Route::get('/reviews', 'UsersController@rating');
    Route::post('/tailor{id}/rating', 'UsersController@addRating')->name('tailor-rating');
    Route::get('/review/{id}/detail', 'UsersController@getRatingDetail');


    //Profile
    Route::group(['prefix' => 'profile'], function (){
        Route::get('',function(){
            return view('profile.index');
        });
        Route::get('change-password',function(){
            return view('profile.change-password');
        });
        Route::post('change_password','Auth\ForgotPasswordController@changePassword')->name('change_password');
    });
	
});

