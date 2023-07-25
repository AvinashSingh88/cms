<?php
    use App\Models\BusinessSetting;
    use App\Models\CmsPage;
    use App\Models\User;
    use App\Models\Staff;
    use App\Models\Testimonial;
    use App\Models\Blog;
    use App\Models\Faq;
    use App\Models\Gallery;
    
    /** Change DateTime format to any date/datetime format */
    if (!function_exists('convert_datetime_to_date_format')) {
        function convert_datetime_to_date_format($date, $format){
            return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format($format);    
        }
    }

    /** highlights the selected navigation on admin panel */
    if (!function_exists('areActiveRoutes')) {
        function areActiveRoutes(array $routes, $output = "active"){
            foreach ($routes as $route) {
                if (Route::currentRouteName() == $route) return $output;
            }
        }
    }

    /** return file uploaded via uploader */
    if (!function_exists('upload_asset')) {
        function upload_asset($file_name, $folder_name="all", $type="local"){
            if ($type == "local") {
                $extenstion = $file_name->getClientOriginalExtension();
                $filename = $folder_name. '-' . date('YmdHis') . '-' .rand(1,10000). '.' . $extenstion;
                $file_name->move(public_path('uploads/'.$folder_name), $filename);
                $file_path = 'uploads/'.$folder_name.'/'. $filename;
                // dd($file_path);
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

    if (!function_exists('fetch_business_setting_data')) {
        function fetch_business_setting_data($type)
        {
            return BusinessSetting::select('field_name', 'value')->where('type', $type)->first();
        }
    }

    if (!function_exists('get_business_single_cache_value')) {
        function get_business_single_cache_value($var_name, $type, $field_name = null){
            return Cache::rememberForever($var_name, function () use ($type, $field_name) { 
                $output = DB::table('business_settings')
                    ->where('type', $type);
                    if($field_name != null){
                        $output = $output->where('field_name', $field_name)
                        ->select('value')->first();
                        return $output->value;
                    }else{
                        $output = $output->select('field_name', 'value')->first();
                        return $output;
                    }    
                });
        }
    }

    if (!function_exists('get_business_multiple_cache_value')) {
        function get_business_multiple_cache_value($var_name, $type){
            return Cache::rememberForever($var_name, function () use ($type) { 
                return DB::table('business_settings')->select('field_name', 'value')
                    ->where('type', $type)
                    ->get();
                });
        }
    }

    if (!function_exists('get_section_wise_data')) {
        function get_section_wise_data($page_id, $section_id, $limit_start=0, $limit_end=0){
            $output = DB::table('section_datas')->select('id', 'section_id', 'title', 'description', 'img', 'order_number', 'other')
                ->where('page_id', $page_id)
                ->where('section_id', $section_id)
                ->where('status', 1)
                ->orderBy('order_number', 'ASC');
                if($limit_start >= 0 && $limit_end > 0){
                    $output->skip($limit_start)->take($limit_end);
                }
                if($limit_start > 0 && $limit_end = 0){
                    $output->limit($limit_start);
                }
                $output = $output->get();
                return $output;
        }
    }

    if (!function_exists('get_common_section')) {
        function get_common_section($id){
            $output = DB::table('page_sections')->select('id', 'section_name', 'title', 'description', 'image')
                ->where('id', $id)
                // ->where('page_id', $page_id)
                // ->where('section_name', $section_name)
                ->where('status', 1)
                ->first();
                return $output;
        }
    }

    if (!function_exists('get_common_section_data')) {
        function get_common_section_data($section_id, $limit_start=0, $limit_end=0){
            $output = DB::table('section_datas')->select('id', 'section_id', 'title', 'description', 'img', 'order_number', 'other')
                ->where('section_id', $section_id)
                ->where('status', 1)
                ->orderBy('order_number', 'ASC');
                if($limit_start >= 0 && $limit_end > 0){
                    $output->skip($limit_start)->take($limit_end);
                }
                if($limit_start > 0 && $limit_end = 0){
                    $output->limit($limit_start);
                }
                $output = $output->get();
                return $output;
        }
    }

    if (!function_exists('get_main_menus')) {
        function get_main_menus(){
            $output = CmsPage::select('id', 'parent_id', 'title', 'page_url')
                ->where('parent_id', 0)
                ->where('status', 1)
                ->where('id', '!=', 1)
                ->get();
                return $output;
        }
    }

    // doctor list
    if (!function_exists('doctorList')){
        function doctorList(){
            return User::where('user_type_id', 4)->get();
        }
    }

    // faq list
    if (!function_exists('faqList')){
        function faqList(){
            return Faq::latest()->where('status', 1)->get();
        }
    }

    // latestPostList list
    if (!function_exists('latestPostList')){
        function latestPostList(){
            return Blog::latest()->where('blogs.type', 'blog')
            ->leftJoin('categories', 'categories.id', '=', 'blogs.category_id')
            ->select(['categories.title as categoryTitle', 'blogs.*'])
            ->paginate(10);
         }
    }

    // Testimonial list
    if (!function_exists('testimonialList')){
        function testimonialList(){
            return Testimonial::latest()->where('status', 1)->get();
        }
    }

    // Team list
    if (!function_exists('ourTeamList')){
        function ourTeamList(){
            $staff_list = Staff::latest()->where('staffs.status', 1)
                ->leftJoin('users', 'users.id', '=', 'staffs.user_id');
            $staff_list =  $staff_list->select(['users.mobile','users.email','users.first_name','users.last_name','users.profile_pic', 'staffs.*'])
                ->paginate(10);
            return $staff_list;
        }
    }

    if (!function_exists('ourClients')){
        function ourClients(){
            return Gallery::where('category_id', 2)
                ->inRandomOrder()
                ->limit(6)
                ->get();
        }
    }

?>