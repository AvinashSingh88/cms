<?php
namespace App\Repositories;
use App\Repositories\Interfaces\CmsPageRepositoryInterface;
use App\Models\CmsPage;
use App\Models\Menu;
use App\Models\CustomerLead;

class CmsPageRepository implements CmsPageRepositoryInterface
{
    public function allCmsPages()
    {
        $pages = CmsPage::select('cms_pages.*')
            ->latest()->paginate(10);
        return $pages;
    }

    public function getMenuList()
    {
        return CmsPage::select('id', 'title')->where('parent_id', '0')->where('status', 1)->get();
    }


    public function storeCmsPage($request, $data)
    {
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

    public function findCmsPage($id)
    {
        return CmsPage::find($id);
    }

    public function updateCmsPage($data, $id)
    {
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

    public function allCustomerLeadList()
    {
        $leads = CustomerLead::select('*')->latest()->paginate(10);
        return $leads;
    }

}