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
Route::view('contact-us', 'website.contact')->name('contact');
Route::controller(WebsiteController::class)->group(function(){
    Route::get('/home','home' )->name('home');
    Route::get('/posts/{post}','show' )->name('website.posts.show');
});

Auth::routes();
Route::prefix('auth')->middleware('auth')->group(function(){
    Route::get('dashboard',[DashboardController::class,'dashboad'])->name('auth.dashboard');
    Route::resource('posts',PostController::class);
});

