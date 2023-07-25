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
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Admin\CareerController;


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
    return "Cache is cleared by @AviSinghAdmin";
})->name('clear-cache');

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
    // Route::post('/blogs/fetch_subcategory', [BlogController::class, 'fetchSubCategory'])->name('blogs.fetch_subcategory');
    Route::post('/blogs/fetch_category', [BlogController::class, 'fetchCategory'])->name('blogs.fetch_category');
    Route::get('/blogs/show_comments/{blog_id}', [BlogController::class, 'showComments'])->name('blogs.show_comments');
    Route::get('/blogs/show_likes/{blog_id}', [BlogController::class, 'showLikes'])->name('blogs.show_likes');
    Route::get('/blogs/show_views/{blog_id}', [BlogController::class, 'showViews'])->name('blogs.show_views');
    Route::get('/blog/change_comment_status', [BlogController::class, 'changeCommentStatus'])->name('blog.change_comment_status');
    
    /** Route For Gallery */
    Route::resource('/image_categories', ImageCategoryController::class);
    Route::resource('/galleries', GalleryController::class);
    
    /** Route For CMS Page */
    Route::resource('/pages', CmsPageController::class);
    
    /** Route For Page Section */
    Route::get('/page_sections', [CmsPageController::class, 'pageSectionIndex'])->name('page_sections.index');
    Route::get('/page_sections/create', [CmsPageController::class, 'pageSectionCreate'])->name('page_sections.create');
    Route::post('/page_sections/store', [CmsPageController::class, 'pageSectionStore'])->name('page_sections.store');
    Route::get('/page_sections/{id}/edit', [CmsPageController::class, 'pageSectionEdit'])->name('page_sections.edit');
    Route::put('/page_sections/update/{id}', [CmsPageController::class, 'pageSectionUpdate'])->name('page_sections.update');
    
    /** Route For Section Data */
    Route::get('/section_data', [CmsPageController::class, 'sectionDataIndex'])->name('section_data.index');
    Route::get('/section_data/create', [CmsPageController::class, 'sectionDataCreate'])->name('section_data.create');
    Route::post('/section_data/fetch_section', [CmsPageController::class, 'fetchSection'])->name('section_data.fetch_section');
    Route::post('/section_data/store', [CmsPageController::class, 'sectionDataStore'])->name('section_data.store');
    Route::get('/section_datas/{id}/edit', [CmsPageController::class, 'sectionDataEdit'])->name('section_data.edit');
    Route::put('/section_datas/update/{id}', [CmsPageController::class, 'sectionDataUpdate'])->name('section_data.update');
    
    Route::get('/customer/leads', [CmsPageController::class, 'customerLeadList'])->name('customer.leads');
    Route::get('/career/enquiry', [CmsPageController::class, 'careerEnquiryList'])->name('career.enquiry');
    Route::get('/subscribers', [CmsPageController::class, 'subscriberList'])->name('subscribers');

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
    Route::get('/website/office_setup', [BusinessController::class, 'officeSetup'])->name('website.office_setup');
    Route::post('/website/update_office_setup', [BusinessController::class, 'updateOfficeSetup'])->name('website.update_office_setup');
    
    Route::resource('/faqs', FaqController::class);

    Route::resource('/staffs', StaffController::class);

    /** Route For CMS Page */
    Route::resource('/services', ServiceController::class);

    Route::resource('/industry', IndustryController::class);

    Route::resource('/careers', CareerController::class);
    
   
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
    
});
