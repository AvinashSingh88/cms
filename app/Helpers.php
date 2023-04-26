<?php
    use App\Models\BusinessSetting;

    /** Change DateTime format to any date/datetime format */
    if (!function_exists('convert_datetime_to_date_format')) {
        function convert_datetime_to_date_format($date, $format){
            return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format($format);    
        }
    }

    /** highlights the selected navigation on admin panel */
    if (!function_exists('areActiveRoutes')) {
        function areActiveRoutes(array $routes, $output = "active")
        {
            foreach ($routes as $route) {
                if (Route::currentRouteName() == $route) return $output;
            }
        }
    }

    /** return file uploaded via uploader */
    if (!function_exists('upload_asset')) {
        function upload_asset($file_name, $folder_name="all", $type="local")
        {
            if ($type == "local") {
                $extenstion = $file_name->getClientOriginalExtension();
                $filename = $folder_name. '-' . time() . '.' . $extenstion;
                $file_name->move(public_path('uploads/'.$folder_name), $filename);
                $file_path = 'uploads/'.$folder_name.'/'. $filename;
                return $file_path;
            }

            if($type == "cloudinary"){
                $uploadedFileUrl = cloudinary()->upload($file_name->getRealPath())->getSecurePath();
                return $uploadedFileUrl;
            }
        }
    }

     /** Generate an asset path for the application */
    if (!function_exists('static_asset')) {
        function static_asset($path, $secure = null)
        {
            return app('url')->asset('public/' . $path, $secure);
        }
    }

    /** Fetch value by type and field_name from business setting */
    if (!function_exists('fetch_business_setting_value')) {
        function fetch_business_setting_value($type, $field_name)
        {
            return BusinessSetting::where('type', $type)->where('field_name', $field_name)->pluck('value')->first();
        }
    }





?>