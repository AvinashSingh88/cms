<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LogoutController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ImageCategoryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\CmsPageController;
use App\Http\Controllers\Admin\TestimonialController;

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

/** Route for clear cache */
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared by @AviSingh";
});

Route::get('admin/auth/login', [LoginController::class, 'login'])->name('admin.auth.login')->middleware('AlreadyLoggedIn');
Route::post('adminAuthLogin', [LoginController::class, 'adminAuthLogin'])->name('adminAuthLogin')->middleware('AlreadyLoggedIn');

Route::group(['prefix' => 'admin', 'middleware' => ['AdminAuthCheck'], 'as' => 'admin.'], function () {
    Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('dashboard');
    Route::resource('/designation', DesignationController::class);

    /** Route for Category and Sub Category */
    Route::resource('/categories', CategoryController::class);
    Route::resource('/sub_categories', SubCategoryController::class);

    /** Route for Locations */
    Route::resource('/countries', CountryController::class);
    
    /** Route for Blog */
    Route::resource('/blogs', BlogController::class);
    Route::post('/blogs/fetch_subcategory', [BlogController::class, 'fetchSubCategory'])->name('blogs.fetch_subcategory');
    
    /** Route For Gallery */
    Route::resource('/image_categories', ImageCategoryController::class);
    Route::resource('/galleries', GalleryController::class);

    /** Route For CMS Page */
    Route::resource('/pages', CmsPageController::class);

    Route::resource('/testimonials', TestimonialController::class);

    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

});
