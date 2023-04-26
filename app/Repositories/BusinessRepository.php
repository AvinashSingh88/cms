<?php
namespace App\Repositories;
use App\Repositories\Interfaces\BusinessRepositoryInterface;
use App\Models\BusinessSetting;

class BusinessRepository implements BusinessRepositoryInterface
{
    public function getSocialMediaLink(){
        return BusinessSetting::select('value')->where('type', 'social_media')->where('status', 1)->get();
    }

    public function updateSocialMedia($data){
        foreach($data['field_names'] as $key => $val){
            // dd($data['field_names'][1]);
            $social_media = BusinessSetting::where('type', $data['type'])->where('field_name', $val)->first();
            if($social_media == null){
                $social_media = new BusinessSetting(); 
            }
            $social_media->type = $data['type'];
            $social_media->field_name = $val;
            $social_media->value = $data['values'][$key];
            $social_media->save();

        }
    }

}