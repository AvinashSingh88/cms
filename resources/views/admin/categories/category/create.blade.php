@extends('admin.include.master')
@section('title', 'Add New Category')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Add New Category</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.categories.store') }}">
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

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category Name <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="title" required> 
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Type <span class="text-danger">*</span> </label>
                                        <select class="form-control" name="type" id="type">
                                            <option value="">Select Type</option>
                                            <option value="blog">Blog</option>
                                            <option value="news">News</option>
                                            <option value="event">Event</option>
                                            <option value="case_study">Case Study</option>
                                        </select> 
                                    </div>
                                </div>
                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status <span class="text-danger">*</span> </label>
                                        <select class=" form-control" id="status" name="status" required>
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                        </select> 
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
