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

/*Route::view('Create','register');
Route::post('save',function () {
    echo 'Form Data';
});*/
# userController   
Route::get('Create','userController@create');
Route::post('save','userController@store');


#Blog
Route::get('Create','blogController@create');
Route::post('save','blogController@store');
Route::get('display','blogController@store');
//Route::get('remove/{$id}','blogController@remove');


Route::resource('Admins','adminsController');
Route::resource('Articals','articalsController');

#routing for user
Route::get('users/Login','usersController@LoginView');
Route::post('users/doLogin','usersController@login');

Route::get('users/LogOut','adminsController@LogOut')->middleware('userCheck');
Route::resource('users','usersController');


#routing for tasks
Route::resource('tasks','tasksController');