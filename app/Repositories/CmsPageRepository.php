<?php
namespace App\Repositories;
use App\Repositories\Interfaces\CmsPageRepositoryInterface;
use App\Models\CmsPage;
use App\Models\MasterPage;
use App\Models\MasterPageSection;
use App\Models\CustomerLead;

class CmsPageRepository implements CmsPageRepositoryInterface
{
    public function allCmsPages(){
        $pages = CmsPage::select('cms_pages.*')
            ->latest()->paginate(10);
        return $pages;
    }

    public function storeCmsPage($request, $data){
        $page = new CmsPage();
        $page->parent_id = $data['parent_id'];
        $page->title = $data['title'];
        $page->description = $data['description'];
        if($data['banner_image']){
            $page->banner_image = $data['banner_image'];
        }
        $page->status = $data['status'];
        $page->meta_title = $data['meta_title'];
        $page->meta_tag = $data['meta_tag'];
        $page->meta_description = $data['meta_description'];
        $page->created_by = $data['created_by'];
        $page->save();
    }

    public function findCmsPage($id){
        return CmsPage::find($id);
    }

    public function updateCmsPage($data, $id){
        $page = CmsPage::where('id', $id)->first();
        $page->parent_id = $data['parent_id'];
        $page->title = $data['title'];
        $page->description = $data['description'];
        if($data['banner_image']){
            $page->banner_image = $data['banner_image'];
        }
        $page->status = $data['status'];
        $page->meta_title = $data['meta_title'];
        $page->meta_tag = $data['meta_tag'];
        $page->meta_description = $data['meta_description'];
        $page->updated_by = $data['updated_by'];
        $page->save();
    }

    public function getMenuList(){
        return CmsPage::select('id', 'title')->where('parent_id', '0')->where('status', 1)->get();
    }

    public function getMasterPageList(){
        return MasterPage::select('id', 'title')->where('status', 1)->get();
    }

    public function getCmsPageList(){
        return CmsPage::select('id', 'title')->where('status', 1)->get();
    }

    /** Master Page Repo Function Start */
    public function allMasterPageList(){
        $master_pages = MasterPage::select('*')
            ->latest()->paginate(10);
        return $master_pages;
    }

    public function findMasterPage($id){
        return MasterPage::find($id);
    }

    public function storeMasterPage($data, $type){
        if($type == "store"){
            $page = new MasterPage();
        }else{
            $page = MasterPage::find($data['id']);
        }
        $page->title = $data['title'];
        $page->status = $data['status'];
        $page->created_by = $data['created_by'];
        $page->save();
    }
    /** Master Page Repo Function End */

    /** Master Page Section Repo Function Start */
    public function allMasterPageSectionList(){
        $master_pages = MasterPageSection::select('master_page_sections.*', 'cp.title as cms_title', 'mp.title as master_page_title')
            ->leftJoin('master_pages as mp', 'mp.id', '=', 'master_page_sections.master_page_id')
            ->leftJoin('cms_pages as cp', 'cp.id', '=', 'master_page_sections.cms_page_id')
            ->latest()->paginate(10);
        return $master_pages;
    }

    public function findMasterPageSection($id){
        return MasterPageSection::find($id);
    }

    public function storeMasterPageSection($data, $type){
        if($type == "store"){
            $page = new MasterPageSection();
        }else{
            $page = MasterPageSection::find($data['id']);
        }
        $page->master_page_id = $data['master_page_id'];
        $page->cms_page_id = $data['cms_page_id'];
        $page->status = $data['status'];
        $page->order_number = $data['order_number'];
        $page->created_by = $data['created_by'];
        $page->save();
    }
    /** Master Page Section Repo Function End */
    
    public function allCustomerLeadList(){
        $leads = CustomerLead::select('*')->latest()->paginate(10);
        return $leads;
    }

}