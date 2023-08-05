@extends('layouts.adminLayout')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8 col-md-10 col-lg-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Updating Student</h2>
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
                        <form action="{{route('store_update_student')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="cc-exp" class="control-label mb-1">Student Name</label>
                                            <input type="text" name="name" class="form-control" value="{{$student->name}}">
                                            <input type="hidden" name="id" value="{{$student->id}}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="x_card_code" class="control-label mb-1">Father Name</label>
                                        <div class="input-group">
                                            <input type="text" name="father_name" class="form-control"  value="{{ $student->father_name }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="x_card_code" class="control-label mb-1">Roll No</label>
                                        <div class="input-group">
                                            <input type="number" name="roll_no" class="form-control"  value="{{$student->addmission_no}}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="x_card_code" class="control-label mb-1">Position</label>
                                        <div class="input-group">
                                            <input type="text" name="position" class="form-control"  value="{{ $student->position }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label for="x_card_code" class="control-label mb-1">Date of Birth</label>
                                        <div class="input-group">
                                            <input type="date" name="dob" class="form-control" value="{{$student->dob}}">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <label for="x_card_code" class="control-label mb-1">Religion</label>
                                        <select class="custom-select" name="religion">
                                            <option value="none">Select option</option>
                                            <option value="Islam" {{ ( "Islam" == $student->religion) ? 'selected' : '' }}>Islam</option>
                                            <option value="Hinduism" {{ ( "Hinduism" == $student->religion) ? 'selected' : '' }}>Hinduism</option>
                                            <option value="Christianity" {{ ( "Christianity" == $student->religion) ? 'selected' : '' }}>Christianity</option>
                                            <option value="Sikhism" {{ ( "Sikhism" == $student->religion) ? 'selected' : '' }}>Sikhism</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label for="x_card_code" class="control-label mb-1">Gender</label>
                                        <select class="custom-select" name="gender">
                                            <option value="none" >Select option</option>
                                            <option value="male" {{ ( "male" == $student->gender) ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ ( "female" == $student->gender) ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label for="x_card_code" class="control-label mb-1">Hafiz Quran</label>
                                        <select class="custom-select" name="quran">
                                            <option selected>Select option</option>
                                            <option value="1" {{ ( "1" == $student->quran) ? 'selected' : '' }}>Yes</option>
                                            <option value="0" {{ ( "0" == $student->quran) ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                    <div class="col-3 flex">
                                        <label for="x_card_code" class="control-label mb-1">Student Image</label>
                                        <div class="input-group">
                                            <!-- Hidden default "Choose File" button -->
                                            <input type="file" name="image" id="image-input" style="display: none;">
                                            <!-- Show existing image and allow uploading new image by clicking on it -->
                                            @if($student->path)
                                                <img id="student-image" src="{{ asset($student->path) }}" alt="Student Image" style="max-width: 150px; margin-top: 10px; cursor: pointer;">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="x_card_code" class="control-label mb-1">Home Address</label>
                                        <div class="input-group">
                                            <input type="text" name="address" class="form-control" value="{{ $student->address }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="x_card_code" class="control-label mb-1">Father Occupation</label>
                                        <div class="input-group">
                                            <input type="text" name="occupation" class="form-control" value="{{ $student->occupation }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label for="x_card_code" class="control-label mb-1">Email</label>
                                        <div class="input-group">
                                            <input type="text" name="email" class="form-control" value="{{ $student->email }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="x_card_code" class="control-label mb-1">B-Form</label>
                                        <div class="input-group">
                                            <input type="number" name="b_form" class="form-control" value="{{ $student->b_form }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="x_card_code" class="control-label mb-1">Father CNIC</label>
                                        <div class="input-group">
                                            <input type="number" name="cnic" class="form-control" value="{{ $student->cnic }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="x_card_code" class="control-label mb-1">Phone</label>
                                        <div class="input-group">
                                            <input type="number" name="phone" class="form-control" value="{{ $student->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="x_card_code" class="control-label mb-1">Cell</label>
                                        <div class="input-group">
                                            <input type="number" name="cell" class="form-control" value="{{ $student->cell }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="x_card_code" class="control-label mb-1">Class</label>
                                        <div class="input-group">
                                            <select class="custom-select" name="grade_id">
                                                <option selected>Select option</option>
                                                @foreach($grades as $grade)
                                                    <option value="{{$grade->id}}" {{ ( $grade->id == $student->grade_id) ? 'selected' : '' }}>{{$grade->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="x_card_code" class="control-label mb-1">Admission Date</label>
                                        <div class="input-group">
                                            <div class="input-group">
                                                <input type="date" name="date" class="form-control" value="{{ $student->date }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn pull-right btn-primary" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const imageInput = document.getElementById('image-input');
            const studentImage = document.getElementById('student-image');

            if (studentImage) {
                studentImage.addEventListener('click', function () {
                    imageInput.click();
                });
            }
        });
    </script>
@endsection
