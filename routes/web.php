<?php

use Illuminate\Support\Facades\Route;
use App\Models\Email_Password_Db;
use App\Models\Category;
use App\Models\Saved_Sites;

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

Route::get('/database', function () {
    return Email_Password_Db::All();
});

Route::get('/category', function () {
    return Category::All();
});

Route::get('/saved', function () {
    return Saved_Sites::All();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
