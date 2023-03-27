<?php

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
        function upload_asset($file_name)
        {
            $uploadedFileUrl = cloudinary()->upload($file_name->getRealPath())->getSecurePath();
            return $uploadedFileUrl;

            // Upload an image file to cloudinary with one line of code
            // $uploadedFileUrl = cloudinary()->upload($request->file($file_name)->getRealPath())->getSecurePath();
            
            // // Upload a video file to cloudinary with one line of code
            // $uploadedFileUrl = cloudinary()->uploadVideo($request->file($file_name)->getRealPath())->getSecurePath();

            // // Upload any file  to cloudinary with one line of code
            // $uploadedFileUrl = cloudinary()->uploadFile($request->file($file_name)->getRealPath())->getSecurePath();

            // // Upload an existing remote file to Cloudinary with one line of code
            // $uploadedFileUrl = cloudinary()->uploadFile($remoteFileUrl)->getSecurePath();
        }
    }

    if (!function_exists('static_asset')) {
        /**
         * Generate an asset path for the application.
         *
         * @param string $path
         * @param bool|null $secure
         * @return string
         */
        function static_asset($path, $secure = null)
        {
            return app('url')->asset('public/' . $path, $secure);
        }
    }
    
    // if (!function_exists('getBaseURL')) {
    //     function getBaseURL()
    //     {
    //         $root = '//' . $_SERVER['HTTP_HOST'];
    //         $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
    
    //         return $root;
    //     }
    // }


?>