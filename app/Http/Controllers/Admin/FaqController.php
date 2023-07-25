<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\FaqRepositoryInterface;

class FaqController extends Controller
{

    private $faqRepository;

    public function __construct(FaqRepositoryInterface $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs =  $this->faqRepository->allFaqs();
        return view('admin.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqs.create');
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
            'question' => 'required|string|max:255',
            'answer' => 'required',
            'status' => 'required',
        ]);


        $data['created_by'] = session('LoggedUser')->id;
        $this->faqRepository->storeFaq($request, $data);

        return redirect()->route('admin.faqs.index')->with(session()->flash('alert-success', 'FAQ Created Successfully'));
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
        $faq = $this->faqRepository->findFaq($id);
        if($faq){
            return view('admin.faqs.update', compact('faq'));
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
            'question' => 'required|string|max:255',
            'answer' => 'required',
            'status' => 'required',
        ]);
        
        
        $data['updated_by'] = session('LoggedUser')->id;

        $this->faqRepository->updateFaq($data, $id);
        return redirect()->route('admin.faqs.index')->with(session()->flash('alert-success', 'FAQ Updated Successfully'));
    }

   

}