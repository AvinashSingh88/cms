<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CommonController;


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

// Route::get('/', [LoginController::class, 'login'])->name('admin.auth.login')->middleware('AlreadyLoggedIn');
Route::get('/', [CommonController::class, 'index'])->name('index');
Route::get('index', [CommonController::class, 'index'])->name('index');
Route::get('about', [CommonController::class, 'about_us'])->name('about');
Route::get('contact', [CommonController::class, 'contact_us'])->name('contact');
Route::get('testimonial', [CommonController::class, 'testimonial'])->name('testimonial');

Route::get('login', [CommonController::class, 'contact_us'])->name('contact');
Route::get('signup', [CommonController::class, 'contact_us'])->name('contact');

