<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\CmsPageRepositoryInterface;

class CmsPageController extends Controller
{
    private $cmsPageRepository;
    public function __construct(CmsPageRepositoryInterface $cmsPageRepository){
        $this->cmsPageRepository = $cmsPageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $pages =  $this->cmsPageRepository->allCmsPages();
        return view('admin.cms.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categories =  $this->cmsPageRepository->getCmsPageList();
        return view('admin.cms.page.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data = $request->validate([
            'parent_id' => 'required',
            'title' => 'required|string|max:255',
            'page_url' => 'nullable',
            'status' => 'required',
            'meta_title' => 'nullable',
            'meta_tag' => 'nullable',
            'meta_description' => 'nullable',
        ]);
        
        $data['created_by'] = session('LoggedUser')->id;
        $this->cmsPageRepository->storeCmsPage($request, $data);

        return redirect()->route('admin.pages.index')->with(session()->flash('alert-success', 'CmsPage Created Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $page = $this->cmsPageRepository->findCmsPage($id);
        if($page){
            $menus =  $this->cmsPageRepository->getCmsPageList();
            return view('admin.cms.page.update', compact('page', 'menus'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){ 
        $data = $request->validate([
            'parent_id' => 'required',
            'title' => 'required|string|max:255',
            'page_url' => 'nullable',
            'status' => 'required',
            'meta_title' => 'nullable',
            'meta_tag' => 'nullable',
            'meta_description' => 'nullable',
        ]);
        
        $data['updated_by'] = session('LoggedUser')->id;
        $this->cmsPageRepository->updateCmsPage($data, $id);
        return redirect()->route('admin.pages.index')->with(session()->flash('alert-success', 'CmsPage Updated Successfully'));
    }

    /** Page Section CRUD Start */
        public function pageSectionIndex(){
            $page_sections =  $this->cmsPageRepository->allPageSectionList();
            return view('admin.cms.page_section.index', compact('page_sections'));
        }
        
        public function pageSectionCreate(){
            $cms_pages =  $this->cmsPageRepository->getCmsPageList();
            return view('admin.cms.page_section.create', compact('cms_pages'));
        }

        public function pageSectionStore(Request $request){
            $data = $request->validate([
                'page_id' => 'required|numeric',
                'section_name' => 'required',
                'title' => 'required_without:description',
                'description' => 'required_without:title',
                'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'status' => 'required',
            ]);

            if($request->has('image')){
                $data['image'] = upload_asset($request->image, "cms");
            }else{
                $data['image'] = NULL;
            }
            
            $data['created_by'] = session('LoggedUser')->id;
            $this->cmsPageRepository->storePageSection($data, 'store');
            return redirect()->route('admin.page_sections.index')->with(session()->flash('alert-success', 'Page Section Created Successfully'));
        }

        public function pageSectionEdit($id){
            $page_section = $this->cmsPageRepository->findPageSection($id);
            if($page_section){
                $cms_pages =  $this->cmsPageRepository->getCmsPageList();
                return view('admin.cms.page_section.update', compact('page_section', 'cms_pages'));
            }
        }

        public function pageSectionUpdate(Request $request, $id){
            $data = $request->validate([
                'page_id' => 'required|numeric',
                'section_name' => 'required',
                'title' => 'required_without:description',
                'description' => 'required_without:title',
                'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'status' => 'required',
            ]);

            if($request->has('image')){
                $data['image'] = upload_asset($request->image, "cms");
            }else{
                $data['image'] = NULL;
            }
            
            $data['id'] = $request->id;
            $data['created_by'] = session('LoggedUser')->id;
            $this->cmsPageRepository->storePageSection($data, 'update');
            return redirect()->route('admin.page_sections.index')->with(session()->flash('alert-success', 'Page Section Updated Successfully'));
        }
    /** Page Section CRUD End */

    /** Section Data CRUD Start */
        public function sectionDataIndex(){
            $page_sections =  $this->cmsPageRepository->allSectionDataList();
            return view('admin.cms.section_data.index', compact('page_sections'));
        }

        public function fetchSection(Request $request){
            $data['sections'] = $this->cmsPageRepository->getPageSectionList($request->page_id);
            return response()->json($data);
        }
        
        public function sectionDataCreate(){
            $cms_pages =  $this->cmsPageRepository->getCmsPageList();
            return view('admin.cms.section_data.create', compact('cms_pages'));
        }

        public function sectionDataStore(Request $request){
            $data = $request->validate([
                'page_id' => 'required|numeric',
                'section_id' => 'required|numeric',
                'title' => 'required_without:description',
                'description' => 'required_without:title',
                'img' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'order_number' => 'required|numeric',
                'other' => 'nullable',
                'status' => 'required|numeric',
            ]);

            if($request->has('img')){
                $data['img'] = upload_asset($request->img, "cms");
            }else{
                $data['img'] = NULL;
            }
            
            $data['created_by'] = session('LoggedUser')->id;
            $this->cmsPageRepository->storeSectionData($data, 'store');
            return redirect()->route('admin.section_data.index')->with(session()->flash('alert-success', 'Section Data Created Successfully'));
        }

        public function sectionDataEdit($id){
            $section_data = $this->cmsPageRepository->findSectionData($id);
            if($section_data){
                $cms_pages =  $this->cmsPageRepository->getCmsPageList();
                $page_sections =  $this->cmsPageRepository->getPageSectionList($section_data->page_id);
                return view('admin.cms.section_data.update', compact('section_data', 'cms_pages', 'page_sections'));
            }
        }

        public function sectionDataUpdate(Request $request, $id){
            $data = $request->validate([
                'page_id' => 'required|numeric',
                'section_id' => 'required|numeric',
                'title' => 'required_without:description',
                'description' => 'required_without:title',
                'img' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'order_number' => 'required|numeric',
                'other' => 'nullable',
                'status' => 'required|numeric',
            ]);

            if($request->has('img')){
                $data['img'] = upload_asset($request->img, "cms");
            }else{
                $data['img'] = NULL;
            }
            
            $data['id'] = $request->id;
            $data['updated_by'] = session('LoggedUser')->id;
            $this->cmsPageRepository->storeSectionData($data, 'update');
            return redirect()->route('admin.section_data.index')->with(session()->flash('alert-success', 'Page Section Updated Successfully'));
        }
    /** Section Data CRUD End */

    public function customerLeadList(){
        $leads =  $this->cmsPageRepository->allCustomerLeadList();
        return view('admin.cms.customer_lead', compact('leads'));
    }

    public function careerEnquiryList(){
        $enquiries =  $this->cmsPageRepository->allCareerEnquiryList();
        return view('admin.cms.career_enquiry', compact('enquiries'));
    }

    public function subscriberList(){
        $subscribers =  $this->cmsPageRepository->allSubscriberList();
        return view('admin.cms.subscribers', compact('subscribers'));
    }

}