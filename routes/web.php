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
Route::get('logout/', 'Auth\loginController@logout');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', 'HomeController@index');

Route::get('/post/{id}', ['as'=>'home.post','uses'=>'AdminPostsController@post']);
// Route::get('/post/{id}', [App\Http\Controllers\AdminPostsController::class, 'index'])->name('post');


Route::group(['middleware' => 'admin'], function(){

    Route::get('/admin', function(){
        return view('admin.index');
    });

    Route::resource('/admin/users', 'AdminUsersController', ['names'=>[
        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit'
    ]]);

    Route::resource('/admin/posts', AdminPostsController::class);
    Route::resource('/admin/categories', AdminCategoriesController::class);
    Route::resource('/admin/media', AdminMediasController::class);


    Route::resource('/admin/comments', PostCommentsController::class);
    Route::resource('/admin/comment/replies', CommentRepliesController::class);
    // Route::get('/admin/users/edit', 'AdminUsersController@edit')->name('admin.users.edit');
    // Route::get('/admin/posts/edit', 'AdminPostsController@edit')->name('admin.posts.edit');

});

Route::group(['middleware' => 'auth'], function(){

    Route::post('comment/reply', 'CommentRepliesController@createReply');

});

// Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
//     Route::resource('/admin/users', AdminUsersController::class);
// });
