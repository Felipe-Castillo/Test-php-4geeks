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
use App\User;

Auth::routes();
Route::get('/', function () {
   return redirect('/admin/login');
});

Route::get('admin', function () {
	$user = new User();
   
	if($user->isAdmin()){
          return redirect('admin/dashboard');
	   
	}
    return redirect('/admin/login');

});
    Route::get('admin/login', 'Auth\AuthController@showLoginForm');
    Route::post('admin/login', 'Auth\AuthController@login');
    Route::get('admin/register', 'Auth\AuthController@getRegister');
    Route::post('admin/register', 'Auth\AuthController@postRegister');
	Route::post('admin/logout', 'Auth\LoginController@logout');
Route::get('admin/logout', 'Auth\LoginController@logout');

Route::group(array('namspace' => 'Admin' , 'prefix' => 'admin'), function()
{
    // place your route definitions here

    //Dashboard

    Route::resource('dashboard', 'Admin\DashboardController');
  

    // User's Route
    Route::get('users/data', 'Admin\UsersController@indexDatatable');
    Route::post('user/delete_multi_user', 'Admin\UsersController@delete_multi_user');
    Route::resource('user', 'Admin\UsersController');
    Route::get('user/edit/{id}', 'Admin\UsersController@edit');
    Route::delete('user/delete/{id}', 'Admin\UsersController@destroy');

 // categories Route
    Route::resource('category', 'Admin\CategoryController');
    Route::get('categorys/data', 'Admin\CategoryController@indexDatatable');
    Route::get('category/edit/{id}', 'Admin\CategoryController@edit');
    Route::post('category/delete_multi_categories', 'Admin\CategoryController@delete_multi_categories');
    Route::delete('category/delete/{id}', 'Admin\CategoryController@destroy');

 // Task Route
    Route::resource('task', 'Admin\TaskController');
    Route::get('tasks/data', 'Admin\TaskController@indexDatatable');
    Route::get('task/edit/{id}', 'Admin\TaskController@edit');
    Route::post('task/delete_multi_task', 'Admin\TaskController@delete_multi_tasks');
    Route::post('task/done_multi_tasks', 'Admin\TaskController@done_multi_tasks');
    Route::delete('task/delete/{id}', 'Admin\TaskController@destroy');

    //Reportes
    Route::get('reportes','Admin\PdfController@index');
    Route::get('endTask/{tipo}','Admin\PdfController@report');


    
 
});

