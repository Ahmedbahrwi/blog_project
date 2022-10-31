<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserController;
use App\Mail\forgetPassword;

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
//Auth
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('/registration', [AuthController::class, 'registration'])->name('register');
Route::post('/post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('/dashboard', [AuthController::class, 'dashboard']); 
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');  
Route::get('/forget-password',[ForgotPasswordController::class,'getEmail'])->name('get.email');
Route::post('/forget-password',[ForgotPasswordController::class,'postEmail'])->name('email.post');
Route::get('/reset-password/{token}',[ResetPasswordController::class,'getPassword'])->name('password.get');
Route::post('/reset-password', [ResetPasswordController::class,'updatePassword'])->name('password.post');
//comment
Route::get('/comment', [CommentController::class,'get_comment'])->name('comment.get');
Route::post('/comment', [CommentController::class,'post_comment'])->name('comment.post');
Route::get('/comment_edit/{id}', [CommentController::class,'edit'])->name('comment.edit');
Route::post('/comment_edit/{id}', [CommentController::class,'update'])->name('comment.updata');
Route::get('/comment_delete/{id}', [CommentController::class,'comment_delete'])->name('comment.delete');
//blogs
Route::get('/blog', [BlogController::class,'get_blog'])->name('blog.get');
Route::post('/blog', [BlogController::class,'post_blog'])->name('blog.post');
Route::get('/blog_edit/{id}', [BlogController::class,'blog_edit'])->name('blog.edit');
Route::post('/blog_edit/{id}', [BlogController::class,'blog_update'])->name('blog.updata');
Route::get('/blog_delete/{id}', [BlogController::class,'blog_delete'])->name('blog.delete');
Route::get('/active/{id}', [BlogController::class,'get_active'])->name('blog.get_active');
Route::post('/active1/{id}', [BlogController::class,'activate'])->name('blogs.active');
Route::get('/blogs', [BlogController::class,'index'])->name('blog.index');
Route::get('/blogs/show/{id}', [BlogController::class,'show'])->name('blogs.show');
//user
Route::get('/user', [UserController::class,'get_user'])->name('user.get');
Route::post('/user', [UserController::class,'add_user'])->name('user.post');
Route::get('/user_edit/{id}', [UserController::class,'user_edit'])->name('user.edit');
Route::post('/user_edit/{id}', [UserController::class,'user_update'])->name('user.updata');
Route::get('/user_delete/{id}', [UserController::class,'user_delete'])->name('user.delete');
Route::get('/users', [UserController::class,'user_index'])->name('user.user_index');
Route::get('/user/show/{id}', [UserController::class,'user_show'])->name('user.user_show');
