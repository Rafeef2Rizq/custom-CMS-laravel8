<?php

use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\auth\PostController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',[WebsiteController::class,'home'] )->name('home');
Route::get('/posts/{post}',[WebsiteController::class,'show'] )->name('website.posts.show');
Auth::routes();

Route::get('auth/dashboard',[DashboardController::class,'dashboad'])->name('auth.dashboard')
->middleware('auth');
Route::resource('auth/posts',PostController::class);
