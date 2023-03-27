@extends('admin.include.master')
@section('title', 'Category List')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <a class="btn btn-primary float-right" href="{{ url('admin/categories/create') }}">Add New Category</a>

                    <div class="breadcrumb mt-3 border-bottom pb-2">
                        <a href="{{ url('') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>/Category
                    </div>
                    <!-- <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Category</h4>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body booking_card">

                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="card-title float-left mt-2">Category List</h4>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-stripped table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td>
                                            <div class="actions"> <a href="#" class="btn btn-sm bg-success-light mr-2">Active</a> </div>
                                        </td>
                                        <td>{{ convert_datetime_to_date_format($value->created_at, 'd M Y') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action"> 
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route('admin.categories.edit',$value->id) }}"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Inactive_asset"><i class="fas fa-trash m-r-5"></i> Delete</a> 
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="pagination">
                                {{ $categories->appends(request()->input())->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
