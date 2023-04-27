<?php
namespace App\Repositories;
use App\Repositories\Interfaces\BusinessRepositoryInterface;
use App\Models\BusinessSetting;

class BusinessRepository implements BusinessRepositoryInterface
{
    public function getBusinessSetupList($type){
        return BusinessSetting::select('field_name', 'value')->where('type', $type)->where('status', 1)->get();
    }

    public function updateWebsiteData($data){
        foreach($data['field_names'] as $key => $val){
            // dd($data['field_names'][1]);
            $social_media = BusinessSetting::where('type', $data['type'])->where('field_name', $val)->first();
            if($social_media == null){
                $social_media = new BusinessSetting(); 
                $social_media->type = $data['type'];
                $social_media->field_name = $val;
            }
            $social_media->value = $data['values'][$key];
            $social_media->save();
        }
        
        if($data['header_logo']){
            $header_logo_update = BusinessSetting::where('type', $data['type'])->where('field_name', 'header_logo')->first();
            if($header_logo_update == null){
                $header_logo_update = new BusinessSetting(); 
                $header_logo_update->type = $data['type'];
                $header_logo_update->field_name = 'header_logo';
            }
            $header_logo_update->value = $data['header_logo'];
            $header_logo_update->save();
        }

        if($data['footer_logo']){
            $footer_logo_update = BusinessSetting::where('type', $data['type'])->where('field_name', 'footer_logo')->first();
            if($footer_logo_update == null){
                $footer_logo_update = new BusinessSetting(); 
                $footer_logo_update->type = $data['type'];
                $footer_logo_update->field_name = 'footer_logo';
            }
            $footer_logo_update->value = $data['footer_logo'];
            $footer_logo_update->save();
        }
    }

    public function updateWebsiteWidgetData($data){
        foreach($data['widget_types'] as $key => $val){
            // dd($data['widget_lables'][0]);
            $widget = BusinessSetting::where('type', $val)->where('field_name', $data['widget_lables'][$key])->first();
            if($widget == null){
                $widget = new BusinessSetting(); 
                $widget->type = $val;
                $widget->field_name = $data['widget_lables'][$key];
            }
            $widget->value = $data['widget_links'][$key];
            $widget->save();
        } 
    }

}