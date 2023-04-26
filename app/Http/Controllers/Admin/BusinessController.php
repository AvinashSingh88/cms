<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\BusinessRepositoryInterface;

class BusinessController extends Controller
{
    private $businessRepository;
    public function __construct(BusinessRepositoryInterface $businessRepository)
    {
        $this->businessRepository = $businessRepository;
    }

    public function socialMedia(){
        $social_meadia_values = $this->businessRepository->getBusinessSetupList('social_media');
        return view('admin.business_setting.social_media', compact('social_meadia_values'));
    }

    public function websiteHeader(){
        $datas = $this->businessRepository->getBusinessSetupList('header_setup');
        return view('admin.business_setting.header', compact('datas'));
    }

    public function websiteSetupUpdate(Request $request){
        $data = $request->validate([
            'type' => 'required|string|max:50',
            'field_names' => 'required|array',
            'values' => 'array',
        ]);

        if($request->has('header_logo')){
            // $file = Input::file('header_logo');
            // dd($file);
            $data['header_logo'] = upload_asset($request->header_logo, 'logo');
        }else{
            $data['header_logo'] = NULL;
        }

        if($request->has('footer_logo')){
            $data['footer_logo'] = upload_asset($request->footer_logo, 'logo');
        }else{
            $data['footer_logo'] = NULL;
        }
        
        $this->businessRepository->updateWebsiteData($data);
        return redirect()->route('admin.website.social_media')->with(session()->flash('alert-success', 'Social Media Updated Successfully'));
    }
    
}
