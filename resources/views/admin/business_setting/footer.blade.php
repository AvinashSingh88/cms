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

        <!-- Manage Footer Logo  -->
        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.website.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row formtype">
                                

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

        <!-- Manage Widget One  -->
        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.website.update_widget') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row formtype align-items-end">
                                <input type="hidden" class="form-control" name="widget_types[]" value="footer_widget_one_lable" required> 
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Widget One Name</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="widget_lables[]" value="widget_one_name" required> 
                                            <input type="text" class="form-control" name="widget_links[]" value="{{ fetch_business_setting_value('footer_widget_one_lable', 'widget_one_name') }}" > 
                                        </div>
                                    </div>
                                </div>

                                @foreach($widget_one_data as $key=>$value)
                                <div class="row w-100 my-2" id="row">
                                    <div class="col-md-12 d-flex">
                                        <input type="hidden" name="widget_types[]" value="footer_widget_one_links">
                                        <input type="text" class="form-control mx-1" name="widget_lables[]" placeholder="Lable" value="{{$value->field_name}}">
                                        <input type="text" class="form-control mx-1" name="widget_links[]" placeholder="Link" value="{{$value->value}}">
                                        <div class="input-group-prepend mx-1">
                                            <button class="btn btn-danger"
                                                id="DeleteRow" type="button">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
 
                                <div id="new_widget_one_input" class="w-100"></div>

                                <div class="w-100 d-block text-start">
                                    <button id="widget_one_row_adder" type="button"
                                        class="btn btn-success">
                                        <span class="fa fa-plus-square"></span> 
                                        Add Widget
                                    </button>
                                </div>
                            </div>	

                            <button type="submit" class="btn btn-primary buttonedit1">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manage Widget Two  -->
        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.website.update_widget') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row formtype align-items-end">
                                <input type="hidden" class="form-control" name="widget_types[]" value="footer_widget_two_lable" required> 
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Widget Two Name</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="widget_lables[]" value="widget_two_name" required> 
                                            <input type="text" class="form-control" name="widget_links[]" value="{{ fetch_business_setting_value('footer_widget_two_lable', 'widget_two_name') }}" > 
                                        </div>
                                    </div>
                                </div>

                                @foreach($widget_two_data as $key=>$value)
                                <div class="row w-100 my-2" id="row">
                                    <div class="col-md-12 d-flex">
                                        <input type="hidden" name="widget_types[]" value="footer_widget_two_links">
                                        <input type="text" class="form-control mx-1" name="widget_lables[]" placeholder="Lable" value="{{$value->field_name}}">
                                        <input type="text" class="form-control mx-1" name="widget_links[]" placeholder="Link" value="{{$value->value}}">
                                        <div class="input-group-prepend mx-1">
                                            <button class="btn btn-danger"
                                                id="DeleteRow" type="button">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
 
                                <div id="new_widget_two_input" class="w-100"></div>

                                <div class="w-100 d-block text-start">
                                    <button id="widget_two_row_adder" type="button"
                                        class="btn btn-success">
                                        <span class="fa fa-plus-square"></span> 
                                        Add Widget
                                    </button>
                                </div>
                            </div>	

                            <button type="submit" class="btn btn-primary buttonedit1">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manage Widget three  -->
        <div class="row">
            <div class="col-sm-12 w-75 mx-auto">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.website.update_widget') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row formtype align-items-end">
                                <input type="hidden" class="form-control" name="widget_types[]" value="footer_widget_three_lable" required> 
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Widget three Name</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="widget_lables[]" value="widget_three_name" required> 
                                            <input type="text" class="form-control" name="widget_links[]" value="{{ fetch_business_setting_value('footer_widget_three_lable', 'widget_three_name') }}" > 
                                        </div>
                                    </div>
                                </div>

                                @foreach($widget_three_data as $key=>$value)
                                <div class="row w-100 my-2" id="row">
                                    <div class="col-md-12 d-flex">
                                        <input type="hidden" name="widget_types[]" value="footer_widget_three_links">
                                        <input type="text" class="form-control mx-1" name="widget_lables[]" placeholder="Lable" value="{{$value->field_name}}">
                                        <input type="text" class="form-control mx-1" name="widget_links[]" placeholder="Link" value="{{$value->value}}">
                                        <div class="input-group-prepend mx-1">
                                            <button class="btn btn-danger"
                                                id="DeleteRow" type="button">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
 
                                <div id="new_widget_three_input" class="w-100"></div>
                                <div class="w-100 d-block text-start">
                                    <button id="widget_three_row_adder" type="button"
                                        class="btn btn-success ">
                                        <span class="fa fa-plus-square"></span> 
                                        Add Widget
                                    </button>
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

<script type="text/javascript">

    function addNewRow(append_id, widget_type){
        newRowAdd =
            '<div class="row my-2 w-100" id="row"><div class="col-md-12 d-flex">'+
            '<input type="hidden" name="widget_types[]" value='+widget_type+'>'+
            '<input type="text" class="form-control mx-1" name="widget_lables[]" placeholder="Lable">'+
            '<input type="text" class="form-control mx-1" name="widget_links[]" placeholder="Link">'+
            '<div class="input-group-prepend mx-1">'+
            '<button class="btn btn-danger" id="DeleteRow" type="button">'+
            '<i class="fa fa-trash"></i> </button>'+
            '</div></div></div>';                             

        $(append_id).append(newRowAdd);
    }
    
    $("#widget_one_row_adder").click(function () {
        addNewRow("#new_widget_one_input", "footer_widget_one_links"); 
    });

    $("#widget_two_row_adder").click(function () {
        addNewRow("#new_widget_two_input", "footer_widget_two_links"); 
    });

    $("#widget_three_row_adder").click(function () {
        addNewRow("#new_widget_three_input", "footer_widget_three_links"); 
    });

    $("body").on("click", "#DeleteRow", function () {
        $(this).parents("#row").remove();
    })
</script>

@endsection
