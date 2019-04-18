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
Route::get('/logout','UserController@doLogoutProcess');


Route::get('/admin/dorm', 'DormController@index');


Route::get('/search','DormController@showSearchForm');
//Route::get('/search','DormController@doSearchProcess');

Route::get('/view/{id}','DormController@showDormInformation');

Route::post('/dorm/review/store', 'RatingController@store');

Route::get('/dorm','DormController@index');
Route::get('/dorm/new', 'DormController@showCreateForm');
Route::get('/dorm/data', 'DormController@getAllDormData');
Route::post('/dorm/store', 'DormController@doSaveProcess');
Route::get('/dorm/update/{dormname}', 'DormController@showUpdateForm');
Route::post('/dorm/{dorm}/update', 'DormController@doUpdateProcess');


Route::get('/owners', 'UserController@index');
Route::get('/owners/data', 'UserController@getAllUserData');


Route::get('/test', function(){
    return view('test');
});
