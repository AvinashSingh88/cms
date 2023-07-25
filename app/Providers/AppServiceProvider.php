<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

use App\Repositories\Interfaces\LoginRepositoryInterface;
use App\Repositories\LoginRepository;
use App\Repositories\Interfaces\DesignationRepositoryInterface;
use App\Repositories\DesignationRepository;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Repositories\AdminRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\Interfaces\SubCategoryRepositoryInterface;
use App\Repositories\SubCategoryRepository;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Repositories\BlogRepository;
use App\Repositories\Interfaces\ImageCategoryRepositoryInterface;
use App\Repositories\ImageCategoryRepository;
use App\Repositories\Interfaces\GalleryRepositoryInterface;
use App\Repositories\GalleryRepository;
use App\Repositories\Interfaces\CmsPageRepositoryInterface;
use App\Repositories\CmsPageRepository;
use App\Repositories\Interfaces\TestimonialRepositoryInterface;
use App\Repositories\TestimonialRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\Interfaces\BusinessRepositoryInterface;
use App\Repositories\BusinessRepository;
use App\Repositories\Interfaces\FaqRepositoryInterface;
use App\Repositories\FaqRepository;
use App\Repositories\Interfaces\StaffRepositoryInterface;
use App\Repositories\StaffRepository;
use App\Repositories\Interfaces\ServiceRepositoryInterface;
use App\Repositories\ServiceRepository;
use App\Repositories\Interfaces\IndustryRepositoryInterface;
use App\Repositories\IndustryRepository;
use App\Repositories\Interfaces\CareerRepositoryInterface;
use App\Repositories\CareerRepository;


/** Bind for Frontend */
use App\Repositories\Interfaces\WebInterface\CommonRepositoryInterface;
use App\Repositories\WebRepo\CommonRepository;
use App\Repositories\Interfaces\WebInterface\WebServiceRepositoryInterface;
use App\Repositories\WebRepo\WebServiceRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LoginRepositoryInterface::class, LoginRepository::class);
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->bind(DesignationRepositoryInterface::class, DesignationRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(SubCategoryRepositoryInterface::class, SubCategoryRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(ImageCategoryRepositoryInterface::class, ImageCategoryRepository::class);
        $this->app->bind(GalleryRepositoryInterface::class, GalleryRepository::class);
        $this->app->bind(CmsPageRepositoryInterface::class, CmsPageRepository::class);
        $this->app->bind(TestimonialRepositoryInterface::class, TestimonialRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(BusinessRepositoryInterface::class, BusinessRepository::class);
        $this->app->bind(FaqRepositoryInterface::class, FaqRepository::class);
        $this->app->bind(StaffRepositoryInterface::class, StaffRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->bind(IndustryRepositoryInterface::class, IndustryRepository::class);
        $this->app->bind(CareerRepositoryInterface::class, CareerRepository::class);
        

        /** Bind for Frontend */
        $this->app->bind(CommonRepositoryInterface::class, CommonRepository::class);
        $this->app->bind(WebServiceRepositoryInterface::class, WebServiceRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
