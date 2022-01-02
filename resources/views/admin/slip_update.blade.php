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
                    <form action="{{route('update_slips_marks_store',$slip->id)}}" method="post">
                        @csrf
                        <div class="card-body card-block">
                            <div class="row">
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">Class</label>
                                    <div class="input-group">
                                        <select class="custom-select" name="grade_id">
                                            <option selected value="">Select option</option>
                                            @foreach($grades as $grade)
                                                <option value="{{$grade->id}}" {{ ( $grade->id == $slip->grade_id) ? 'selected' : '' }}>{{$grade->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">Term</label>
                                    <div class="input-group">
                                        <input type="text" name="term"
                                               placeholder="Term"
                                               value="{{$slip->term}}"
                                               class="form-control name_list" required/>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">Session</label>
                                    <div class="input-group">
                                        <input type="text" name="current_session"
                                               placeholder="Current Session"
                                               value="{{$slip->session}}"
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
                                    </tr>
                                    </thead>
                                    @foreach($slip->datesheets as $key=> $data)
                                        <input type="hidden" value="{{$data->id}}" name="recode[{{$key}}][data_id]">
                                    <tr>
                                        <td>
                                            <select class="custom-select" name="recode[{{$key}}][subject_id]">
                                                <option selected>Select option</option>
                                                @foreach($subjects as $grade)
                                                    <option value="{{$grade->id}}"  {{ ( $grade->id == $data->subject_id) ? 'selected' : '' }}>{{$grade->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="date" name="recode[{{$key}}][date]" value="{{$data->date}}" placeholder="Enter your Name"
                                                   class="form-control name_list"/></td>
                                        <td><input type="time" name="recode[{{$key}}][reporting]" value="{{$data->reporting}}"
                                                   placeholder="Enter reporting time"
                                                   class="form-control name_list"/></td>
                                        <td><input type="time" name="recode[{{$key}}][start_time]" value="{{$data->start_time}}"
                                                   placeholder="Enter start time"
                                                   class="form-control name_list"/></td>
                                        <td><input type="time" name="recode[{{$key}}][end_time]" value="{{$data->end_time}}"
                                                   placeholder="Enter end time"
                                                   class="form-control name_list"/></td>
                                    </tr>
                                    @endforeach
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
