@extends('admin.include.master')
@section('title', 'Website Header')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Website Header</h4>
                    </div>
                </div>
            </div>
        </div>

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

                                <input type="hidden" class="form-control" name="type" value="header_setup" required> 
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Header Logo </strong></label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control" name="header_logo"> 
                                            @if(fetch_business_setting_value('header_setup', 'customer_support_number') != null)
                                                <img src="{{ asset(fetch_business_setting_value('header_setup', 'header_logo')) }}" height=100 width=100>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Customer Support</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="customer_support_number" required> 
                                            <input type="text" class="form-control" name="values[]" value="{{ fetch_business_setting_value('header_setup', 'customer_support_number') }}"> 
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="col-md-3"><strong>Sales Support</strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="field_names[]" value="sales_number" required> 
                                            <input type="text" class="form-control" name="values[]" value="{{ fetch_business_setting_value('header_setup', 'sales_number') }}"> 
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
