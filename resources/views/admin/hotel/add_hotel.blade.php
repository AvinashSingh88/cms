@extends('admin.include.master')
@section('title','Add Hotel')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                <div class="breadcrumb mt-3 border-bottom pb-2"><a href="index.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a> / Listing</div>
                    <div class="mt-2">

                        <h4 class="card-title float-left mt-2">Add New Hotel</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body booking_card">
                        <form>
                    <div class="row formtype">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Hotel Name</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Contact Person</label>
                                <input class="form-control" type="text"> </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" name="Gender" id="Gender">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select> </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control"> </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                    <input type="text" class="form-control"> </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Locality</label>
                                    <input type="text" class="form-control "> </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address (Area and Street)</label>
                                    <textarea name="" cols="" rows="" class="form-control"></textarea> </div>

                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Package</label>
                                <select class="form-control" name="Package" id="Package">
                                            <option value="">Select Package</option>
                                            <option value="Male">Annual Package</option>
                                            <option value="Female">Monthly Package</option>
                                            <option value="Other">Life Time Package</option>
                                        </select> </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>City</label>
                                    <input type="text" class="form-control "> </div>

                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label>State</label>
                                <select class="form-control" name="state" id="state">
                                            <option value="">Select State</option>
                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                            <option value="Daman and Diu">Daman and Diu</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Lakshadweep">Lakshadweep</option>
                                            <option value="Puducherry">Puducherry</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Odisha">Odisha</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Telangana">Telangana</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Uttarakhand">Uttarakhand</option>
                                            <option value="West Bengal">West Bengal</option>
                                        </select>
                                 </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Landmark</label>
                                <input type="text" class="form-control"> </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Pincode</label>
                                <input type="text" class="form-control"> </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control"> </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="text" class="form-control"> </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary buttonedit1" onclick = "window.location.href='all-listing.html';">Add Hotel</button>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="Inactive_asset" class="modal fade Inactive-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center"> <img src="assets/img/sent.png" alt="" width="50" height="46">
                    <h3 class="Inactive_class">Are you sure want to Inactive this Asset?</h3>
                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Inactive</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
