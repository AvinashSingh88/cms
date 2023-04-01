<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface CmsPageRepositoryInterface{
    
    public function allCmsPages();
    public function getMenuList();
    public function storeCmsPage($request, $data);
    public function findCmsPage($id);
    public function updateCmsPage($data, $id); 
    public function allCustomerLeadList();
}