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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function(){

    return view('admin.index');

});

Route::group(['middleware' => 'admin'], function(){

    Route::resource('/admin/users', AdminUsersController::class);
    Route::resource('/admin/posts', AdminPostsController::class);
    Route::resource('/admin/categories', AdminCategoriesController::class);
    Route::resource('/admin/media', AdminMediasController::class);
    // Route::get('/admin/users/edit', 'AdminUsersController@edit')->name('admin.users.edit');
    // Route::get('/admin/posts/edit', 'AdminPostsController@edit')->name('admin.posts.edit');

});



// Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
//     Route::resource('/admin/users', AdminUsersController::class);
// });
