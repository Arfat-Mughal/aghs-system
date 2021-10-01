@extends('layouts.adminLayout')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8 col-md-10 col-lg-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Creating Results</h2>
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
                    <form action="{{route('store_results')}}" method="post" name="add_name" id="add_name">
                        @csrf
                        <div class="card-body card-block">
                            <div class="row">
                                <div class="col-4">
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
                            <div class="row mt-5">
                                <table class="table table-striped" id="dynamic_field_result">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>Subject</th>
                                        <th>Total Marks</th>
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
                                        <td><input type="number" name="subject_id[0][marks]" placeholder="Enter your Name"
                                                   class="form-control name_list"/></td>
                                        <td>
                                            <button type="button" name="add" id="addResult" class="btn btn-success">
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
