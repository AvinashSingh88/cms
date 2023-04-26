@extends('admin.include.master')
@section('title', 'Update Social Media')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Update Social Media</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.website.update') }}">
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

                                <input type="hidden" class="form-control" name="type" value="social_media" required> 
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Facebook ID </strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="facebook" required> 
                                            <input type="text" class="form-control" name="values[]" value="{{ $social_meadia_values[0]->value }}"> 
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Twitter ID </strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="twitter" required> 
                                            <input type="text" class="form-control" name="values[]" value="{{ $social_meadia_values[1]->value }}"> 
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Linkedin ID </strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="linkedin" required> 
                                            <input type="text" class="form-control" name="values[]" value="{{ $social_meadia_values[2]->value }}"> 
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Skype ID </strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="skype" required> 
                                            <input type="text" class="form-control" name="values[]" value="{{ $social_meadia_values[3]->value }}"> 
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Instagram ID </strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="instagram" required> 
                                            <input type="text" class="form-control" name="values[]" value="{{ $social_meadia_values[4]->value }}"> 
                                        </div>
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
