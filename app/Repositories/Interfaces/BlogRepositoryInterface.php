<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface BlogRepositoryInterface{
    
    public function allBlogs();
    public function getCategoryList();
    public function getCountryList();
    public function getSubCategoryList($category_id);
    public function storeBlog($request, $data);
    public function findBlog($id);
    public function updateBlog($data, $id); 
    public function setCommentStatus($comment_data); 
}