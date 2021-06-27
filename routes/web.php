<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
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


Route::prefix('/Admin')->name('Admin.')->group(function () {


    Route::get('/',[HomeController::class,'index']);
    Route::get('/users',[UserController::class,'index'])->name('User');

    Route::group(['middleware' => 'auth'], function() {
    
        // Route::group(['middleware' => ['EnsureAutherized'] ], function(){
            // Post endpoints
            Route::get('/Posts/add', [PostsController::class,'add'])->name('Posts.add');
            Route::get('/Posts/edit/{id}',[PostsController::class,'edit'])->name('Posts.edit');
            Route::delete('/Posts/delete/{id}',[PostsController::class,'destroy'])->name('Posts.delete');
            
            // comment endpoints
            Route::post('Comments/save',[CommentsController::class,'store'])->name('Comments.save');
            Route::get('/Comments/edit/{id}',[CommentsController::class,'edit'])->name('Comments.edit');
            Route::delete('/Comments/delete/{id}',[CommentsController::class,'destroy'])->name('Comments.delete');
        // });
              
    });
            // post endpoints
        Route::get('/Posts', [PostsController::class,'index'])->name('Posts');
        Route::post('/Posts/save',[PostsController::class,'store'])->name('Posts.save');
        Route::post('/Posts/edit-save',[PostsController::class,'update'])->name('Posts.edit-save');


        // comments endpoints
        // Route::get('/Posts',[CommentsController::class,'index']);
        Route::post('/Comments/edit-save',[CommentsController::class,'update'])->name('Comments.edit-save');

    
});









// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
// email verification
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');