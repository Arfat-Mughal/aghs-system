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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-sm-8 col-md-10 col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <strong>Creating</strong>
                            <small>Profile</small>
                        </div>
                        <form action="{{route('store_student')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="cc-exp" class="control-label mb-1">Student Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="x_card_code" class="control-label mb-1">Father Name</label>
                                        <div class="input-group">
                                            <input type="text" name="father_name" class="form-control"  value="{{ old('father_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="x_card_code" class="control-label mb-1">Roll No</label>
                                        <div class="input-group">
                                            <input type="number" name="roll_no" class="form-control"  value="{{ old('roll_no') }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="x_card_code" class="control-label mb-1">Position</label>
                                        <div class="input-group">
                                            <input type="text" name="position" class="form-control"  value="{{ old('position') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label for="x_card_code" class="control-label mb-1">Date of Birth</label>
                                        <div class="input-group">
                                            <input type="date" name="dob" class="form-control" value="{{ old('dob') }}">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <label for="x_card_code" class="control-label mb-1">Religion</label>
                                        <select class="custom-select" name="religion">
                                            <option value="" selected>Select option</option>
                                            <option value="Islam" {{ old('religion') === 'Islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="Hinduism" {{ old('religion') === 'Hinduism' ? 'selected' : '' }}>Hinduism</option>
                                            <option value="Christianity" {{ old('religion') === 'Christianity' ? 'selected' : '' }}>Christianity</option>
                                            <option value="Sikhism" {{ old('religion') === 'Sikhism' ? 'selected' : '' }}>Sikhism</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label for="x_card_code" class="control-label mb-1">Gender</label>
                                        <select class="custom-select" name="gender">
                                            <option value="" selected>Select option</option>
                                            <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label for="x_card_code" class="control-label mb-1">Hafiz Quran</label>
                                        <select class="custom-select" name="quran">
                                            <option value="" selected>Select option</option>
                                            <option value="1" {{ old('quran') === '1' ? 'selected' : '' }}>Yes</option>
                                            <option value="0" {{ old('quran') === '0' ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label for="x_card_code" class="control-label mb-1">Student Image</label>
                                        <div class="input-group">
                                            <input type="file" name="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="x_card_code" class="control-label mb-1">Home Address</label>
                                        <div class="input-group">
                                            <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="x_card_code" class="control-label mb-1">Father Occupation</label>
                                        <div class="input-group">
                                            <input type="text" name="occupation" class="form-control" value="{{ old('occupation') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label for="x_card_code" class="control-label mb-1">Email</label>
                                        <div class="input-group">
                                            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="x_card_code" class="control-label mb-1">B-Form</label>
                                        <div class="input-group">
                                            <input type="number" name="b_form" class="form-control" value="{{ old('b_form') }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="x_card_code" class="control-label mb-1">Father CNIC</label>
                                        <div class="input-group">
                                            <input type="number" name="cnic" class="form-control" value="{{ old('cnic') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="x_card_code" class="control-label mb-1">Phone</label>
                                        <div class="input-group">
                                            <input type="number" name="phone" class="form-control" value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="x_card_code" class="control-label mb-1">Cell</label>
                                        <div class="input-group">
                                            <input type="number" name="cell" class="form-control" value="{{ old('cell') }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="x_card_code" class="control-label mb-1">Class</label>
                                        <div class="input-group">
                                            <select class="custom-select" name="grade_id">
                                                <option value="" selected>Select option</option>
                                                @foreach($grades as $grade)
                                                    <option value="{{$grade->id}}" {{ old('grade_id') === $grade->id ? 'selected' : '' }}>{{$grade->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="x_card_code" class="control-label mb-1">Admission Date</label>
                                        <div class="input-group">
                                            <div class="input-group">
                                                <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn pull-right btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
