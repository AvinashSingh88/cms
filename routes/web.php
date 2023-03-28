<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\WebCommonController;


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

Route::get('/', [WebCommonController::class, 'index'])->name('index');
Route::get('index', [WebCommonController::class, 'index'])->name('index');
Route::get('about', [WebCommonController::class, 'about_us'])->name('about');
Route::get('contact', [WebCommonController::class, 'contact_us'])->name('contact');
Route::get('testimonial', [WebCommonController::class, 'testimonial'])->name('testimonial');
Route::get('gallery', [WebCommonController::class, 'gallery'])->name('gallery');
Route::get('blogs', [WebCommonController::class, 'blogListing'])->name('blogs');
Route::get('blog_detail/{slug}', [WebCommonController::class, 'blogDetail'])->name('blog.detail');

Route::get('login', [WebCommonController::class, 'contact_us'])->name('contact');
Route::get('signup', [WebCommonController::class, 'contact_us'])->name('contact');

