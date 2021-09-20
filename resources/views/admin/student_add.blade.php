@extends('layouts.adminLayout')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8 col-md-10 col-lg-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Adding Student</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-md-10 col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <strong>Creating</strong>
                            <small>Profile</small>
                        </div>
                        <div class="card-body card-block">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="cc-exp" class="control-label mb-1">Student Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">Father Name</label>
                                    <div class="input-group">
                                        <input type="text" name="father_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">Roll No</label>
                                    <div class="input-group">
                                        <input type="number" name="roll_no" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label for="x_card_code" class="control-label mb-1">Date of Birth</label>
                                    <div class="input-group">
                                        <input type="date" name="dob" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label for="x_card_code" class="control-label mb-1">Religion</label>
                                    <select class="custom-select" name="religion">
                                        <option selected>Select option</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hinduism ">Hinduism</option>
                                        <option value="Christianity ">Christianity</option>
                                        <option value="Sikhism">Sikhism</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="x_card_code" class="control-label mb-1">Gender</label>
                                    <select class="custom-select" name="gender">
                                        <option selected>Select option</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="x_card_code" class="control-label mb-1">Hafiz Quran</label>
                                    <select class="custom-select" name="quran">
                                        <option selected>Select option</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="x_card_code" class="control-label mb-1">Home Address</label>
                                    <div class="input-group">
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="x_card_code" class="control-label mb-1">Father Occupation</label>
                                    <div class="input-group">
                                        <input type="text" name="occupation" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">Email</label>
                                    <div class="input-group">
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">B-Form</label>
                                    <div class="input-group">
                                        <input type="number" name="b_form" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">Father CNIC</label>
                                    <div class="input-group">
                                        <input type="number" name="cnic" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label for="x_card_code" class="control-label mb-1">Phone</label>
                                    <div class="input-group">
                                        <input type="number" name="phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label for="x_card_code" class="control-label mb-1">Cell</label>
                                    <div class="input-group">
                                        <input type="number" name="cell" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label for="x_card_code" class="control-label mb-1">Class</label>
                                    <div class="input-group">
                                        <select class="custom-select" name="grade_id">
                                            <option selected>Select option</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label for="x_card_code" class="control-label mb-1">Admission Date</label>
                                    <div class="input-group">
                                        <div class="input-group">
                                            <input type="date" name="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn pull-right btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
