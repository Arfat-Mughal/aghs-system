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
                        <form action="{{route('store_datesheet')}}" method="post" name="add_name" id="add_name">
                            @csrf
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-3">
                                        <label for="x_card_code" class="control-label mb-1">Class</label>
                                        <div class="input-group">
                                            <select class="custom-select" name="grade_id">
                                                <option selected>Select option</option>
                                                @foreach($grades as $grade)
                                                    <option value="{{$grade->id}}">{{$grade->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="table-responsive table--no-card m-b-30">
                                        <table class="table table-borderless table-striped table-earning" id="dynamic_field">
                                            <thead>
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
                                                <td><select class="custom-select" name="grade_id[]">
                                                        <option selected>Select option</option>
                                                        @foreach($subjects as $grade)
                                                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><input type="date" name="grade_id[0date]" placeholder="Enter your Name"
                                                           class="form-control name_list"/></td>
                                                <td><input type="text" name="grade_id[0reporting]"
                                                           placeholder="Enter reporting time"
                                                           class="form-control name_list"/></td>
                                                <td><input type="text" name="grade_id[0start_time]" placeholder="Enter start time"
                                                           class="form-control name_list"/></td>
                                                <td><input type="text" name="grade_id[0end_time]" placeholder="Enter end time"
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
