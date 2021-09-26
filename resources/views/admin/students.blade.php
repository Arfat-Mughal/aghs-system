@extends('layouts.adminLayout')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Students</h2>
                            <a href="{{route('add_student')}}"  class="au-btn au-btn-icon au-btn--blue">
                                <i class="zmdi zmdi-plus"></i>add student</a>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <table class="table table-striped" id="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Roll NO</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Father Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Cell</th>
                            <th scope="col">Class</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $index => $student)
                        <tr>
                            <th scope="row">{{$student->id}}</th>
                            <td><img src="{{$student->path}}" alt="{{$student->name}}" height="40px" width="60px" class="rounded"></td>
                            <td>{{$student->addmission_no}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->father_name}}</td>
                            <td>{{$student->phone}}</td>
                            <td>{{$student->cell}}</td>
                            <td>{{$student->grade->name}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
