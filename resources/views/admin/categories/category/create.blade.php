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

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Category Name </label>
                                        <input type="text" class="form-control" name="title" required> 
                                    </div>
                                </div>
                    
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status </label>
                                        <select class=" form-control" id="status" name="status" required>
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                        </select> 
                                    </div>
                                </div>
                        
                                <!-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Identity Proof No.</label>
                                        <input type="text" class="form-control"> 
                                    </div>
                                </div>
                        
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Skills</label>
                                        <input type="text" class="form-control"> 
                                    </div>
                                </div>
                            
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Hiring Date</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker"> 
                                        </div> 
                                    </div>
                                </div>
                        
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" rows="2"></textarea>
                                    </div>
                                </div>  -->

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
