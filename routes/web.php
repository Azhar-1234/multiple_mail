<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontEnd\SiteController;
use App\Http\Controllers\backEnd\DashBoardController;
use App\Http\Controllers\backEnd\DesignationController;
use App\Http\Controllers\backEnd\UserController;
use App\Http\Controllers\backEnd\SmtpEmailController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[SiteController::class,'home']);
Auth::routes();

Route::get('/home',[DashBoardController::class,'index'])->name('home');
//Designation
Route::get('/view-designation',[DesignationController::class,'view'])->name('view-designation');
Route::post('/store-designation',[DesignationController::class,'store'])->name('store-designation');
Route::get('/edit-designation/{id}',[DesignationController::class,'edit'])->name('edit-designation');
Route::post('/update-designation',[DesignationController::class,'update'])->name('update-designation');
Route::get('/delete-designation/{id}',[DesignationController::class,'delete'])->name('delete-designation');
//user controller
Route::get('/view-user',[UserController::class,'view'])->name('view-user');
Route::post('/store-user',[UserController::class,'store'])->name('store-user');
Route::get('/edit-user/{id}',[UserController::class,'edit'])->name('edit-user');
Route::post('/update-user',[UserController::class,'update'])->name('update-user');
Route::get('/delete-user/{id}',[UserController::class,'delete'])->name('delete-user');
//SmtpEmail controller
Route::get('/view-email',[SmtpEmailController::class,'view'])->name('view-email');
Route::post('/store-email',[SmtpEmailController::class,'store'])->name('store-email');
Route::get('/edit-email/{id}',[SmtpEmailController::class,'edit'])->name('edit-email');
Route::post('/update-email',[SmtpEmailController::class,'update'])->name('update-email');
Route::get('/delete-email/{id}',[SmtpEmailController::class,'delete'])->name('delete-email');




