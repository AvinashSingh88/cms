@extends('admin.include.master')
@section('title', 'Update Industry')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Update Industry</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.industry.update',$page->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
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
                                        <label>Select Parent </label>
                                        <select class="form-control" name="parent_id" required>
                                            <option value="0">No Parent</option>
                                            @foreach($menus AS $category)
                                                <option value="{{$category->id}}" @if($category->id == $page->parent_id) selected @endif>{{$category->title}}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status </label>
                                        <select class=" form-control" name="status" required>
                                            <option value="1" @if($page->status == 1) selected @endif>Active</option>
                                            <option value="2" @if($page->status == 2) selected @endif>Inactive</option>
                                        </select> 
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title </label>
                                        <input type="text" class="form-control" name="title" value="{{$page->title}}" required> 
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description <span class="text-danger">*</span> </label>
                                        <textarea class="form-control" name="description" id="description">{!! $page->description !!}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image1 <span class="text-danger"></span></label>
                                        <input type="file" class="form-control" name="image1">
                                        @if($page->image1)
                                            <img src="{{asset($page->image1)}}" height="100" width="100">
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image2 <span class="text-danger"></span></label>
                                        <input type="file" class="form-control" name="image2">
                                        @if($page->image2)
                                            <img src="{{asset($page->image2)}}" height="100" width="100">
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image3 <span class="text-danger"></span></label>
                                        <input type="file" class="form-control" name="image3">
                                    </div>
                                </div>

                                @if($page->image3)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <img src="{{asset($page->image3)}}" height="100" width="100">
                                        </div>
                                    </div>
                                @endif


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Title </label>
                                        <input type="text" class="form-control" name="meta_title" value="{{$page->meta_title}}"> 
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Tag </label>
                                        <input type="text" class="form-control" name="meta_tag" value="{{$page->meta_tag}}"> 
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Description </label>
                                        <textarea class="form-control" id="myeditorinstance" name="meta_description">{!! $page->meta_description !!}</textarea>
                                    </div>
                                </div>

                            </div>	
                            <button type="submit" class="btn btn-primary buttonedit1">Update</button>
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
    </script>
@endsection