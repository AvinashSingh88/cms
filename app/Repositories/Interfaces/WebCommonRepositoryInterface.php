<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface WebCommonRepositoryInterface{
    public function getHome();
    public function getAboutus();
    public function getContactus();
    public function storeContactEnquiry($data);
    public function getTestimonial();
    public function getGallery();
    public function getBlogs($slug);
    public function getBlogDetail($slug, $ip);
    public function applyBlogAction($data);
    public function storeBlogComment($data);
    public function getBlogComments($blog_id);
}