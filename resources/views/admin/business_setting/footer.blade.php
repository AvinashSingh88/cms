@extends('admin.include.master')
@section('title', 'Website Footer')
@section('content')



<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Manage Website Footer</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manage Footer Logo  -->
        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.website.update') }}" enctype="multipart/form-data">
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

                                <input type="hidden" class="form-control" name="type" value="footer_setup" required> 
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Footer Logo </strong></label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control" name="footer_logo"> 
                                            @if(fetch_business_setting_value('footer_setup', 'footer_logo') != null)
                                                <img src="{{ asset(fetch_business_setting_value('footer_setup', 'footer_logo')) }}" height=100 width=100>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Footer Description</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="footer_description" required> 
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'footer_description') }} </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Copyright Widget</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="copyright_widget" required> 
                                            <input type="text" class="form-control" name="values[]" value="{{ fetch_business_setting_value('footer_setup', 'copyright_widget') }}" pattern="+91[7-9]{1}[0-9]{9}"> 
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

        <!-- Manage Contact Info  -->
        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.website.update') }}" enctype="multipart/form-data">
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

                                <input type="hidden" class="form-control" name="type" value="footer_setup" required> 
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Contact Address</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="contact_address" required> 
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'contact_address') }} </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Contact Phone</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="contact_phone" required> 
                                            <input type="text" class="form-control" name="values[]" value="{{ fetch_business_setting_value('footer_setup', 'contact_phone') }}" > 
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Contact Email</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="contact_email" required> 
                                            <input type="text" class="form-control" name="values[]" value="{{ fetch_business_setting_value('footer_setup', 'contact_email') }}" > 
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Working Hours</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="contact_working_hr" required> 
                                            <textarea class="form-control" name="values[]" row="6" col="50"> {{ fetch_business_setting_value('footer_setup', 'contact_working_hr') }} </textarea>
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

<!-- <script type="text/javascript">

    $("#rowAdder").click(function () {
        newRowAdd =
        '<div id="row"> <div class="input-group m-3">' +
        '<div class="input-group-prepend">' +
        '<button class="btn btn-danger" id="DeleteRow" type="button">' +
        '<i class="bi bi-trash"></i> Delete</button> </div>' +
        '<input type="text" class="form-control m-input"> </div> </div>';

        $('#newinput').append(newRowAdd);
    });

    $("body").on("click", "#DeleteRow", function () {
        $(this).parents("#row").remove();
    })
</script> -->

@endsection
