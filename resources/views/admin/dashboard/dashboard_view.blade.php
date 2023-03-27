@extends('admin.include.master')
@section('content')

<!-- <div class="page-wrapper">
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
                            Today Booking</p>
                        <h3 class="card-title fs-18 font-weight-bold">30 </h3>
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
                            Total Amount</p>
                        <h3 class="card-title fs-18 font-weight-bold">21</h3>
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
                            Total Customer</p>
                        <h3 class="card-title fs-18 font-weight-bold">9</h3>
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
                            Total Booking</p>
                        <h3 class="card-title fs-18 font-weight-bold">9</h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="card-title">VISITORS</h4>
                    </div>
                    <div class="card-body">
                        <div id="line-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="card-title">ROOMS BOOKED</h4>
                    </div>
                    <div class="card-body">
                        <div id="donut-chart"></div>
                    </div>
                </div>
            </div>
        </div>






        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="card-title">RECENT BOOKING</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-stripped table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Contact&nbsp;Person</th>
                                        <th>Room Type</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            Vikash Kumar
                                        </td>
                                        <td>Double(AC)</td>
                                        <td>9555110707</td>
                                        <td><a href="mailto:vikash@orrish.com">vikash@orrish.com</a></td>

                                        <td>08/02/2023</td>

                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>
                                            Vikash Kumar
                                        </td>
                                        <td>Double(AC)</td>
                                        <td>9555110707</td>
                                        <td><a href="mailto:vikash@orrish.com">vikash@orrish.com</a></td>

                                        <td>08/02/2023</td>

                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>
                                            Vikash Kumar
                                        </td>
                                        <td>Double(AC)</td>
                                        <td>9555110707</td>
                                        <td><a href="mailto:vikash@orrish.com">vikash@orrish.com</a></td>

                                        <td>08/02/2023</td>

                                    </tr>

                                    <tr>
                                        <td>4</td>
                                        <td>
                                            Vikash Kumar
                                        </td>
                                        <td>Double(AC)</td>
                                        <td>9555110707</td>
                                        <td><a href="mailto:vikash@orrish.com">vikash@orrish.com</a></td>

                                        <td>08/02/2023</td>

                                    </tr>

                                    <tr>
                                        <td>5</td>
                                        <td>
                                            Vikash Kumar
                                        </td>
                                        <td>Double(AC)</td>
                                        <td>9555110707</td>
                                        <td><a href="mailto:vikash@orrish.com">vikash@orrish.com</a></td>

                                        <td>08/02/2023</td>

                                    </tr>

                                    <tr>
                                        <td>6</td>
                                        <td>
                                            Vikash Kumar
                                        </td>
                                        <td>Double(AC)</td>
                                        <td>9555110707</td>
                                        <td><a href="mailto:vikash@orrish.com">vikash@orrish.com</a></td>

                                        <td>08/02/2023</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>




    </div>
</div> -->
@endsection
