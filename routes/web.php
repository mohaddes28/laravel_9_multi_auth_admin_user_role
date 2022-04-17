<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\User\UserDashboardController;

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
Route::get('/dashboard',function(){
    if(Auth()->user()->role == 1)
        return redirect('/admin');
    else
        return redirect('/user');
});


Auth::routes(['verify'=> true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::prefix('admin')->middleware(['auth','authAdmin','verified'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index']);
});

Route::prefix('user')->middleware(['auth','authUser','verified'])->group(function () {
    Route::get('/', [UserDashboardController::class, 'index']);
});