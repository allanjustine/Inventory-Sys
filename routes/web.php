<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;

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

Route::get('/', [SiteController::class, 'home']);

Route::get('/login', [SiteController::class, 'loginForm'])->name('login');
Route::post('/login',[SiteController::class, 'login']);

Route::group(['middleware'=>'auth'], function(){

    Route::post('/logout', [SiteController::class, 'logout']);

    Route::get('/users/create',[UserController::class,'create']);
    Route::post('/users',[UserController::class, 'store']);
    Route::get('/users', [UserController::class,'index']);

    Route::get('/members/create', [MemberController::class,'create']);
    Route::get('/members/edit/{id}', [MemberController::class,'edit']);
    Route::put('/members/{member}', [MemberController::class,'update']);
    Route::get('/members', [MemberController::class,'index']);
    Route::post('/members', [MemberController::class,'store']);

    Route::get('/companies/create', [CompanyController::class,'create']);
    Route::get('/companies/edit/{id}', [CompanyController::class,'edit']);
    Route::put('/companies/{company}', [CompanyController::class,'update']);
    Route::get('/companies', [CompanyController::class,'index']);
    Route::post('/companies', [CompanyController::class,'store']);
});


