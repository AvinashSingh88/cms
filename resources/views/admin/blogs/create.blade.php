@extends('admin.include.master')
@section('title', 'Add New Blog')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Add New Blog</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row formtype">

                                <div class="col-md-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category <span class="text-danger">*</span> </label>
                                        <select class="form-control" name="category_id" id="category_id">
                                            <option value="">Select Category</option>
                                            @foreach($categories AS $category)
                                                <option value="{{$category->id}}">{{$category->title}}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sub Category </label>
                                        <select class="form-control" name="sub_category_id" id="sub_category_id">
                                            <option value="">Select Sub Category</option>
                                        </select> 
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title <span class="text-danger">*</span> </label>
                                        <input type="text" class="@error('title') is-invalid @enderror form-control" name="title"> 
                                        @error('title')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="description" name="description"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Blog Image </label>
                                        <input class="form-control" type="file" name="blog_image">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Banner Image </label>
                                        <input class="form-control" type="file" name="banner_image">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country </label>
                                        <select class=" form-control" name="country">
                                            <option value="">Select Country</option>
                                            @foreach($countries AS $country)
                                                <option value="{{$country->id}}">{{$country->country_name}}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status <span class="text-danger">*</span></label>
                                        <select class=" form-control" name="status">
                                            <option value="1" selected>Active</option>
                                            <option value="2">Inactive</option>
                                        </select> 
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Title </label>
                                        <input type="text" class="form-control" name="meta_title"> 
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Tag </label>
                                        <input type="text" class="form-control" name="meta_tag"> 
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Description </label>
                                        <textarea class="form-control" name="meta_description" rows="5"></textarea>
                                    </div>
                                </div>

                            </div>	
                            <button type="submit" class="btn btn-primary buttonedit1">Add</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('script')
    <script>
        tinymce.init({
            selector: 'textarea#description',
        });
        $(document).ready(function () {
            /** Get Sub category list on change on parent category */
            $('#category_id').on('change', function () {
                var idCategory = this.value;
                $("#sub_category_id").html('');

                $.ajax({
                    url: "{{url('admin/blogs/fetch_subcategory')}}",
                    type: "POST",
                    data: {
                        category_id: idCategory,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',

                    success: function (result) {
                        $('#sub_category_id').html('<option value="">Choose Sub Catyegory</option>');

                        $.each(result.sub_categories, function (key, value) {
                            $("#sub_category_id").append('<option value="' + value
                                .id + '">' + value.title + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection
