@extends('admin.include.master')
@section('title', 'Update CMS Page')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Update CMS Page</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.master_page_sections.update',$master_page_section->id) }}" enctype="multipart/form-data">
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

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Master Page <span class="text-danger">*</span> </label>
                                        <select class="form-control" name="master_page_id">
                                            <option value="">Select Master Page</option>
                                            @foreach($master_pages AS $page)
                                                <option value="{{$page->id}}" @if($page->id == $master_page_section->master_page_id) selected @endif>{{$page->title}}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>CMS Page <span class="text-danger">*</span> </label>
                                        <select class="form-control" name="cms_page_id">
                                            <option value="">Select CMS Page</option>
                                            @foreach($cms_pages AS $page)
                                                <option value="{{$page->id}}" @if($page->id == $master_page_section->cms_page_id) selected @endif>{{$page->title}}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>

                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status </label>
                                        <select class=" form-control" name="status" required>
                                            <option value="1" @if($master_page_section->status == 1) selected @endif>Active</option>
                                            <option value="2" @if($master_page_section->status == 2) selected @endif>Inactive</option>
                                        </select> 
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Order Number</label>
                                        <input type="text" class="form-control" name="order_number" value="{{$master_page_section->order_number}}" required> 
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