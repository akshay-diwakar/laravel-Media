<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\RoleAssignController;
use App\Http\Controllers\AssignPermissionController;

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

    // users endpoint
    Route::get('/users',[UserController::class,'index'])->name('User');
    Route::get('/users/add',[UserController::class,'add'])->name('User.add');
    Route::post('/users/save',[UserController::class,'store'])->name('User.save');
    Route::get('/users/edit/{id}',[UserController::class,'edit'])->name('User.edit');
    Route::post('/users/edit-save',[UserController::class,'update'])->name('User.edit-save');
    Route::delete('/users/delete/{id}',[UserController::class,'destroy'])->name('User.delete');

    // AssignRole EndPoints
    Route::get('/{user_id}/AssignRole/add',[RoleAssignController::class,'add'])->name('RoleAssign.add');
    Route::post('/{user_id}/AssignRole/save',[RoleAssignController::class,'store'])->name('RoleAssign.save');

    // AssignPermission EndPoints
    Route::get('/AssignPermission',[AssignPermissionController::class,'index'])->name('AssignPermission');
    Route::get('/AssignPermission/Add',[AssignPermissionController::class,'add'])->name('AssignPermission.add');
    Route::post('/AssignPermission/save',[AssignPermissionController::class,'store'])->name('AssignPermission.save');
    Route::get('/AssignPermission/Edit/{role_id}',[AssignPermissionController::class,'edit'])->name('AssignPermission.Edit');
    Route::post('/AssignPermission/edit-save',[AssignPermissionController::class,'update'])->name('AssignPermission.edit-save');
    Route::delete('/AssignPemission/Delete/{id}',[AssignPermissionController::class,'destroy'])->name('AssignPermission.delete');


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

