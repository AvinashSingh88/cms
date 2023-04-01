<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
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

  
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', [WebCommonController::class, 'index'])->name('index');
Route::get('index', [WebCommonController::class, 'index'])->name('index');
Route::get('about', [WebCommonController::class, 'about_us'])->name('about');
Route::get('contact', [WebCommonController::class, 'contact_us'])->name('contact');
Route::post('contact/enquiry', [WebCommonController::class, 'postContactEnquiry'])->name('contact.enquiry');
Route::get('testimonial', [WebCommonController::class, 'testimonial'])->name('testimonial');
Route::get('gallery', [WebCommonController::class, 'gallery'])->name('gallery');
Route::get('blogs', [WebCommonController::class, 'blogListing'])->name('blogs');
Route::get('blogs/{slug}', [WebCommonController::class, 'blogSlugListing'])->name('blogs.slug');
Route::get('blog_detail/{slug}', [WebCommonController::class, 'blogDetail'])->name('blog.detail');


