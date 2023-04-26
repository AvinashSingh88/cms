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
        $social_meadia_values = $this->businessRepository->getSocialMediaLink();
        return view('admin.business_setting.social_media', compact('social_meadia_values'));
    }

    public function socialMediaUpdate(Request $request){
        $data = $request->validate([
            'type' => 'required|string|max:50',
            'field_names' => 'required|array',
            'values' => 'array',
        ]);

        $this->businessRepository->updateSocialMedia($data);

        return redirect()->route('admin.business_setting.social_media')->with(session()->flash('alert-success', 'Social Media Updated Successfully'));
    }
}
