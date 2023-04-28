<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\CmsPageRepositoryInterface;
use JD\Cloudder\Facades\Cloudder;

class CmsPageController extends Controller
{

    private $cmsPageRepository;

    public function __construct(CmsPageRepositoryInterface $cmsPageRepository)
    {
        $this->cmsPageRepository = $cmsPageRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages =  $this->cmsPageRepository->allCmsPages();
        return view('admin.cms.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  $this->cmsPageRepository->getMenuList();
        return view('admin.cms.page.create', compact('categories'));
    }

    public function generateSlug()
    {
        $this->slug = SlugService::createSlug(CmsPage::class, 'slug', $this->title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'parent_id' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'required',
            // 'blog_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
            'meta_title' => 'nullable',
            'meta_tag' => 'nullable',
            'meta_description' => 'nullable',
        ]);
        
        if($request->has('banner_image')){
            $data['banner_image'] = upload_asset($request->banner_image);
        }else{
            $data['banner_image'] = NULL;
        }
        $data['created_by'] = session('LoggedUser')->id;
        $this->cmsPageRepository->storeCmsPage($request, $data);

        return redirect()->route('admin.pages.index')->with(session()->flash('alert-success', 'CmsPage Created Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = $this->cmsPageRepository->findCmsPage($id);
        if($page){
            $menus =  $this->cmsPageRepository->getMenuList();
            return view('admin.cms.page.update', compact('page', 'menus'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'parent_id' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'required',
            // 'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
            'meta_title' => 'nullable',
            'meta_tag' => 'nullable',
            'meta_description' => 'nullable',
        ]);
        
        if($request->has('banner_image')){
            $data['banner_image'] = upload_asset($request->banner_image);
        }else{
            $data['banner_image'] = NULL;
        }
        $data['updated_by'] = session('LoggedUser')->id;

        $this->cmsPageRepository->updateCmsPage($data, $id);
        // return redirect('form')->with('status', 'Form Data Has Been Inserted');
        return redirect()->route('admin.pages.index')->with(session()->flash('alert-success', 'CmsPage Updated Successfully'));
    }

    /** Master Page CRUD Start */
    public function masterPageIndex(){
        $master_pages =  $this->cmsPageRepository->allMasterPageList();
        return view('admin.cms.master_page.index', compact('master_pages'));
    }

    public function masterPageCreate(){
        return view('admin.cms.master_page.create');
    }

    public function masterPageStore(Request $request){
        $data = $request->validate([
            'title' => 'required|string|unique:master_pages|max:255',
            'status' => 'required',
        ]);

        $data['created_by'] = session('LoggedUser')->id;
        $this->cmsPageRepository->storeMasterPage($data, 'store');
        return redirect()->route('admin.master_pages.index')->with(session()->flash('alert-success', 'Master Page Created Successfully'));
    }

    public function masterPageEdit($id){
        $master_page = $this->cmsPageRepository->findMasterPage($id);
        if($master_page){
            return view('admin.cms.master_page.update', compact('master_page'));
        }
    }

    public function masterPageUpdate(Request $request, $id){
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required',
        ]);
        
        $data['id'] = $request->id;
        $data['created_by'] = session('LoggedUser')->id;
        $this->cmsPageRepository->storeMasterPage($data, 'update');
        return redirect()->route('admin.master_pages.index')->with(session()->flash('alert-success', 'Master Page Created Successfully'));
    }
    /** Master Page CRUD End */

    /** Master Page Section CRUD Start */
    public function masterPageSectionIndex(){
        $master_page_sections =  $this->cmsPageRepository->allMasterPageSectionList();
        return view('admin.cms.master_page_section.index', compact('master_page_sections'));
    }
    
    public function masterPageSectionCreate(){
        $master_pages =  $this->cmsPageRepository->getMasterPageList();
        $cms_pages =  $this->cmsPageRepository->getCmsPageList();
        return view('admin.cms.master_page_section.create', compact('master_pages', 'cms_pages'));
    }

    public function masterPageSectionStore(Request $request){
        $data = $request->validate([
            'master_page_id' => 'required|numeric',
            'cms_page_id' => 'required|numeric',
            'status' => 'required',
            'order_number' => 'required|numeric',
        ]);

        $data['created_by'] = session('LoggedUser')->id;
        $this->cmsPageRepository->storeMasterPageSection($data, 'store');
        return redirect()->route('admin.master_page_sections.index')->with(session()->flash('alert-success', 'Master Page Section Created Successfully'));
    }

    public function masterPageSectionEdit($id){
        $master_page_section = $this->cmsPageRepository->findMasterPageSection($id);
        if($master_page_section){
            $master_pages =  $this->cmsPageRepository->getMasterPageList();
            $cms_pages =  $this->cmsPageRepository->getCmsPageList();
            return view('admin.cms.master_page_section.update', compact('master_page_section', 'master_pages', 'cms_pages'));
        }
    }

    public function masterPageSectionUpdate(Request $request, $id){
        $data = $request->validate([
            'master_page_id' => 'required|numeric',
            'cms_page_id' => 'required|numeric',
            'status' => 'required|numeric',
            'order_number' => 'required|numeric',
        ]);
        
        $data['id'] = $request->id;
        $data['created_by'] = session('LoggedUser')->id;
        $this->cmsPageRepository->storeMasterPageSection($data, 'update');
        return redirect()->route('admin.master_page_sections.index')->with(session()->flash('alert-success', 'Master Page Section Updated Successfully'));
    }
    /** Master Page Section CRUD End */
    

    public function customerLeadList(){
        $leads =  $this->cmsPageRepository->allCustomerLeadList();
        return view('admin.cms.customer_lead', compact('leads'));
    }

}