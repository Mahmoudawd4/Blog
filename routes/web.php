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

Route::get('/', function () {
    return view('welcome');
});

// read data
Route::get('/posts' ,'PostController@allPost')->name('post.all');
Route::get('posts/show/{id}','PostController@show')->name('post.show');


/////////////////
//login Admin Auth

Route::get('admin/login','UserController@login')->name('admin.login');
Route::post('admin/handel-login','UserController@handelLogin')->name('handel.login');



////////////////////////////////////////////////////////////////////////////////////
//Message
//create message

Route::get('message/create','MessageController@create')->name('message.create');
Route::post('message/store','MessageController@store')->name('message.store');



Route::middleware('is_Admin')->group(function(){

    //creat data & post
Route::get('/create','PostController@create')->name('post.create');
Route::post('/store','PostController@store')->name('post.store');

//updata data & post
Route::get('/edit/{id}','PostController@edit')->name('post.edit');
Route::post('/updata/{id}','PostController@updata')->name('post.updata');


//delete post
Route::get('/delete/{id}','PostController@delete')->name('post.delete');


/////////////////////////////////////////////////////////

//Auth Admin
//creat Admin

Route::get('admin/register','UserController@register')->name('admin.register');
Route::post('admin/handel-register','UserController@handelRegister')->name('handel.register');


//update Admin
Route::get('admin/edit/{id}','UserController@edit')->name('admin.edit');
Route::post('admin/update/{id}','UserController@update')->name('admin.update');


//delete Admin
Route::get('admin/delete/{id}','UserController@delete')->name('admin.delete');

//all admin

Route::get('admin/all','UserController@allAdmin')->name('admin.all');


//all message

Route::get('message/all','MessageController@allMessage')->name('message.all');

//delete message
Route::get('message/delete/{id}','MessageController@delete')->name('message.delete');

//logout

Route::get('/logout','UserController@logout')->name('admin.logout');


});





