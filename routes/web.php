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
    return view('index');
});

Route::get('/about', function(){
    return view('about');
});


Route::get('/admin', function(){
    if(!auth()->check()) {
        return redirect()->to('/login');
    }
    return view('dashboard');
});


Route::get('/login','UserController@showLoginForm')->name('login');
Route::post('/login','UserController@doLoginProcess');


Route::get('/admin/dorm', 'DormController@index');


Route::get('/search','DormController@showSearchForm');
Route::post('/search','DormController@doSearchProcess');

Route::get('/view/{id}','DormController@showDormInformation');

Route::post('/dorm/review/store', 'RatingController@store');