@extends('admin.include.master')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title mt-3">Dashboard</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box mb-4">
                    <div
                        class="card-header card-header-warning card-header-icon position-relative border-0 text-right px-2 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                            <i class="material-icons">today</i>
                        </div>
                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted1">
                            Total Users</p>
                        <h3 class="card-title fs-18 font-weight-bold">{{$data['user_count']}}</h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box mb-4">
                    <div
                        class="card-header card-header-success card-header-icon position-relative border-0 text-right px-2 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                            <i class="material-icons">attach_money</i>
                        </div>
                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted1">
                            Total Category</p>
                        <h3 class="card-title fs-18 font-weight-bold">{{$data['category_count']}}</h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box mb-4">
                    <div
                        class="card-header card-header-danger card-header-icon position-relative border-0 text-right px-2 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                            <i class="material-icons">account_circle</i>
                        </div>
                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted1">
                            Total SubCategory</p>
                        <h3 class="card-title fs-18 font-weight-bold">{{$data['subcategory_count']}}</h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box mb-4">
                    <div
                        class="card-header card-header-info card-header-icon position-relative border-0 text-right px-2 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                            <i class="material-icons">date_range</i>
                        </div>
                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted1">
                            Total Blog</p>
                        <h3 class="card-title fs-18 font-weight-bold">{{$data['blog_count']}}</h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box mb-4">
                    <div
                        class="card-header card-header-info card-header-icon position-relative border-0 text-right px-2 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                            <i class="material-icons">date_range</i>
                        </div>
                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted1">
                            Total Likes</p>
                        <h3 class="card-title fs-18 font-weight-bold">{{$data['blog_like_count']}}</h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box mb-4">
                    <div
                        class="card-header card-header-info card-header-icon position-relative border-0 text-right px-2 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                            <i class="material-icons">date_range</i>
                        </div>
                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted1">
                            Total Comments</p>
                        <h3 class="card-title fs-18 font-weight-bold">{{$data['blog_comment_count']}}</h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box mb-4">
                    <div
                        class="card-header card-header-info card-header-icon position-relative border-0 text-right px-2 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                            <i class="material-icons">date_range</i>
                        </div>
                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted1">
                            Total Views</p>
                        <h3 class="card-title fs-18 font-weight-bold">{{$data['blog_view_count']}}</h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
