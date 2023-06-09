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
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BusinessController;

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
Route::get('admin', [LoginController::class, 'login'])->name('admin')->middleware('AlreadyLoggedIn');
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
    Route::get('/blogs/show_comments/{blog_id}', [BlogController::class, 'showComments'])->name('blogs.show_comments');
    Route::get('/blogs/show_likes/{blog_id}', [BlogController::class, 'showLikes'])->name('blogs.show_likes');
    Route::get('/blogs/show_views/{blog_id}', [BlogController::class, 'showViews'])->name('blogs.show_views');
    Route::get('/blog/change_comment_status', [BlogController::class, 'changeCommentStatus'])->name('blog.change_comment_status');
    
    /** Route For Gallery */
    Route::resource('/image_categories', ImageCategoryController::class);
    Route::resource('/galleries', GalleryController::class);
    
    /** Route For CMS Page */
    Route::resource('/pages', CmsPageController::class);

    Route::get('/master_pages', [CmsPageController::class, 'masterPageIndex'])->name('master_pages.index');
    Route::get('/master_pages/create', [CmsPageController::class, 'masterPageCreate'])->name('master_pages.create');
    Route::post('/master_pages/store', [CmsPageController::class, 'masterPageStore'])->name('master_pages.store');
    Route::get('/master_pages/{id}/edit', [CmsPageController::class, 'masterPageEdit'])->name('master_pages.edit');
    Route::put('/master_pages/update/{id}', [CmsPageController::class, 'masterPageUpdate'])->name('master_pages.update');
    
    Route::get('/master_page_sections', [CmsPageController::class, 'masterPageSectionIndex'])->name('master_page_sections.index');
    Route::get('/master_page_sections/create', [CmsPageController::class, 'masterPageSectionCreate'])->name('master_page_sections.create');
    Route::post('/master_page_sections/store', [CmsPageController::class, 'masterPageSectionStore'])->name('master_page_sections.store');
    Route::get('/master_page_sections/{id}/edit', [CmsPageController::class, 'masterPageSectionEdit'])->name('master_page_sections.edit');
    Route::put('/master_page_sections/update/{id}', [CmsPageController::class, 'masterPageSectionUpdate'])->name('master_page_sections.update');
    
    Route::get('/customer/leads', [CmsPageController::class, 'customerLeadList'])->name('customer.leads');

    /** Route For Testimonial Page */
    Route::resource('/testimonials', TestimonialController::class);
    
    /** Route For user/customer Page */
    Route::get('/users/index', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/change_status', [UserController::class, 'changeStatus'])->name('users.change_status');
    
    /** Route For Bussiness Setting page */
    Route::get('/website/social_media', [BusinessController::class, 'socialMedia'])->name('website.social_media');
    Route::get('/website/header', [BusinessController::class, 'websiteHeader'])->name('website.header');
    Route::get('/website/footer', [BusinessController::class, 'websiteFooter'])->name('website.footer');
    Route::post('/website/update', [BusinessController::class, 'websiteSetupUpdate'])->name('website.update');
    Route::post('/website/update_widget', [BusinessController::class, 'websiteSetupUpdateWidget'])->name('website.update_widget');

    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

});
