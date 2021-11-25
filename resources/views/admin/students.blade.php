@extends('layouts.adminLayout')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title-1">Students</h2>
                        <div class="text-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    PRINT
                                </button>
                                <div class="dropdown-menu">
                                    @foreach($grades as $grade)
                                    <a class="dropdown-item" href="{{route('getStudentsViewByClasses',$grade->id)}}" target="_blank">{{$grade->name}}</a>
                                    @endforeach
                                </div>
                            </div>
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
                            <th scope="col">Cnic</th>
                            <th scope="col">Cell</th>
                            <th scope="col">Class</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
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
                            <td>{{$student->b_form}}</td>
                            <td>{{$student->cell}}</td>
                            <td>{{$student->grade->name}}</td>
                            <td>
                                @if($student->is_active)
                                <a href="{{ route('change_Student_Status', [ 'id'=> $student->id ]) }}" class="btn btn-success btn-sm" role="button" aria-pressed="true">Active</a>
                                @else
                                    <a href="{{ route('change_Student_Status', [ 'id'=> $student->id ]) }}" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Blocked</a>
                                    @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="{{route('view_student',$student->id)}}" target="_blank">View</a>
                                        <a class="dropdown-item" href="{{route('update_student',$student->id)}}">Update</a>
                                        <form method="POST" action="{{ route('delete_student', [ 'id'=> $student->id ]) }}">
                                            @csrf
                                            <input type="hidden" name="id" value={{$student->id}}>
                                            <button type="submit" class="dropdown-item">Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
