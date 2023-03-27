<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface GalleryRepositoryInterface{
    
    public function allGallery();
    public function getCategoryList();
    public function storeGallery($request, $data);
    public function findGallery($id);
    public function updateGallery($data, $id); 
}