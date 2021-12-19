@extends('layouts.adminLayout')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <!-- Bootstrap DatePicker -->
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
                    <form action="{{route('store_datesheet')}}" method="post" name="add_name" id="add_name">
                        @csrf
                        <div class="card-body card-block">
                            <div class="row">
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">Class</label>
                                    <div class="input-group">
                                        <select class="custom-select" name="grade_id" required>
                                            <option selected value="">Select option</option>
                                            @foreach($grades as $grade)
                                                <option value="{{$grade->id}}">{{$grade->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">Term</label>
                                    <div class="input-group">
                                        <input type="text" name="term"
                                               placeholder="Term"
                                               class="form-control name_list" required/>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">Session</label>
                                    <div class="input-group">
                                        <input type="text" name="current_session"
                                               placeholder="Current Session"
                                               class="form-control name_list" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                    <table class="table table-striped" id="dynamic_field">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>Subject</th>
                                            <th>Date</th>
                                            <th>Reporting time</th>
                                            <th>Start time</th>
                                            <th>End time</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tr>
                                            <td><select class="custom-select" name="subject_id[0][subject_id]">
                                                    <option selected>Select option</option>
                                                    @foreach($subjects as $grade)
                                                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="date" name="subject_id[0][date]" placeholder="Enter your Name"
                                                       class="form-control name_list"/></td>
                                            <td><input type="time" name="subject_id[0][reporting]"
                                                       placeholder="Enter reporting time"
                                                       class="form-control name_list"/></td>
                                            <td><input type="time" name="subject_id[0][start_time]"
                                                       placeholder="Enter start time"
                                                       class="form-control name_list"/></td>
                                            <td><input type="time" name="subject_id[0][end_time]"
                                                       placeholder="Enter end time"
                                                       class="form-control name_list"/></td>
                                            <td>
                                                <button type="button" name="add" id="add" class="btn btn-success">
                                                    Add More
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                            </div>
                        </div>
                        <div>
                            <button class="btn pull-right btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
