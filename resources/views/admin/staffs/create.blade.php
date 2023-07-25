@extends('admin.include.master')
@section('title', 'Add New Staff')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Add New Staff</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.staffs.store') }}" enctype="multipart/form-data">
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
                                        <label>Name <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="name"> 
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span> </label>
                                        <input type="email" class="form-control" name="email"> 
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="mobile"> 
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Degree <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="degree"> 
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Speciality <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="speciality"> 
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>University <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="university"> 
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Expertise <span class="text-danger"></span> </label>
                                        <textarea type="text" class="form-control" name="expertise"> </textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description <span class="text-danger"></span> </label>
                                        <textarea type="text" class="form-control" name="description"> </textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Office Address <span class="text-danger"></span> </label>
                                        <textarea type="text" class="form-control" name="office"> </textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Time Schedule <span class="text-danger"></span> </label>
                                        <textarea type="text" class="form-control" name="time_schedule"> </textarea>
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

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Profile Pic <span class="text-danger">*</span></label>
                                        <input type="file"  class="form-control" name="profile_pic">
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
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#answer',
        });
        
    </script>
@endsection
