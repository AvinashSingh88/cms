@extends('admin.include.master')
@section('title', 'Staff List')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <a class="btn btn-primary float-right" href="{{ url('admin/staffs/create') }}">Add New Staff</a>
                    <div class="breadcrumb mt-3 border-bottom pb-2">
                        <a href="{{ url('') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>/Staff List
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body booking_card">

                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="card-title float-left mt-2">Staff List</h4>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="hotel_table" class="table table-stripped table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th> Mobile</th>
                                        <th>Profile Pic</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staffs as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->first_name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->mobile }}</td>
                                        <td><img src="{{ asset($value->profile_pic) }}" height="100" width="100"></td>
                                        <td>
                                            <div class="actions"> @if($value->status == 1) <a href="#" class="btn btn-sm bg-success-light mr-2">Active</a> @else <a href="#" class="btn btn-sm bg-danger-light mr-2">Inactive</a> @endif </div>
                                        </td>
                                        <td>{{ convert_datetime_to_date_format($value->created_at, 'd M Y') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action"> 
                                                <a class="dropdown-item" href="{{ route('admin.staffs.edit',$value->id) }}"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="{{ route('admin.staffs.show',$value->id) }}"><i class="fas fa-eye m-r-5"></i> Appointment</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="pagination">
                                {{ $staffs->appends(request()->input())->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

