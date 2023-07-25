<?php
namespace App\Repositories;
use App\Repositories\Interfaces\ServiceRepositoryInterface;
use App\Models\ServicePage;
use App\Models\CmsPage;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function getServiceMenu(){
        return CmsPage::select('id', 'title')->where('parent_id', 5)->where('status', 1)->get();
    }


    /** CMS Page Repo Function Start */
        public function allServicesPages(){
            $pages = ServicePage::select('*')->latest()->paginate(10);
            return $pages;
        }

        public function storeServicesPage($request, $data){
            $page = new ServicePage();
            $page->parent_id = $data['parent_id'];
            $page->title = $data['title'];
            $page->description = $data['description'];
            if($data['image1']){
                $page->image1 = $data['image1'];
            }
            if($data['image2']){
                $page->image2 = $data['image2'];
            }
            if($data['image3']){
                $page->image3 = $data['image3'];
            }
            $page->status = $data['status'];
            $page->meta_title = $data['meta_title'];
            $page->meta_tag = $data['meta_tag'];
            $page->meta_description = $data['meta_description'];
            $page->created_by = $data['created_by'];
            $page->save();
        }

        public function findServicesPage($id){
            return ServicePage::find($id);
        }

        public function updateServicesPage($data, $id){
            $page = ServicePage::where('id', $id)->first();
            $page->parent_id = $data['parent_id'];
            $page->title = $data['title'];
            $page->description = $data['description'];
            if($data['image1']){
                $page->image1 = $data['image1'];
            }
            if($data['image2']){
                $page->image2 = $data['image2'];
            }
            if($data['image3']){
                $page->image3 = $data['image3'];
            }
            $page->status = $data['status'];
            $page->meta_title = $data['meta_title'];
            $page->meta_tag = $data['meta_tag'];
            $page->meta_description = $data['meta_description'];
            $page->updated_by = $data['updated_by'];
            $page->save();
        }
    /** CMS Page Repo Function End */

}