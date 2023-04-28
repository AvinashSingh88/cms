<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface CmsPageRepositoryInterface{
    
    public function getMenuList();
    public function getMasterPageList();
    public function getCmsPageList();
    
    public function allCmsPages();
    public function storeCmsPage($request, $data);
    public function findCmsPage($id);
    public function updateCmsPage($data, $id);

    public function allMasterPageList(); 
    public function storeMasterPage($data, $type); 
    public function findMasterPage($id); 

    public function allMasterPageSectionList(); 
    public function storeMasterPageSection($data, $type); 
    public function findMasterPageSection($id); 

    public function allCustomerLeadList();
}