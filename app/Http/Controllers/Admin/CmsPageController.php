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

        return redirect()->route('admin.pages.index')->with('status', 'CmsPage Created Successfully');
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
        return redirect()->route('admin.pages.index')->with('message', 'CmsPage Updated Successfully');
    }


}