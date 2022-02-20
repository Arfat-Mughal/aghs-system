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
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <a type="button" href="{{route('add_student')}}" class="au-btn au-btn-icon au-btn--blue" ><i class="zmdi zmdi-plus"></i> Add Student</a>

                                <button id="btnGroupDrop3" type="button" class="au-btn au-btn-icon au-btn--green dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Update Positions
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop3">
                                    @foreach($grades as $grade)
                                        <form method="POST" action="{{ route('add_student_positions') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item" name="grade" value="{{$grade->id}}">
                                                {{$grade->name}}
                                            </button>
                                        </form>
                                    @endforeach
                                </div>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle au-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Update Status
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="dropdown-item" href="{{route('update_all_students_status',1)}}">Activate All</a>
                                            <a class="dropdown-item" href="{{route('update_all_students_status',0)}}">Deactivate All</a>
                                    </div>
                                </div>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop4" type="button" class="btn btn-warning text-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Move to Next Class
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop4">
                                        @foreach($grades as $grade)
                                                <a class="dropdown-item" onclick="return confirm('Are you sure? All Active Students of this class will promote to next class ')" href="{{route('promote_next_class',$grade->id)}}">{{$grade->name}}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop2" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        PRINT RECORD
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                                        @foreach($grades as $grade)
                                            <a class="dropdown-item" href="{{route('getStudentsViewByClasses',$grade->id)}}" target="_blank">{{$grade->name}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-md-4 ">
                        <form action="{{route('searchStudent')}}" method="post" class="mt-4 d-flex">
                            @csrf
                            <label for="search" class="mr-3 mt-1">Search</label>
                            <input type="text" name="search" id="search" maxlength="25" class="form-control">
                            <button type="submit" class="btn btn-primary btn-sm ml-3">Search</button>
                        </form>
                    </div>
                </div>
                <div class="mt-2">
                    <table class="table table-striped" id="">
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
                            <td><img src="{{asset($student->path)}}" alt="{{$student->name}}" height="40px" width="60px" class="rounded"></td>
                            <td>{{$student->addmission_no}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->father_name}}</td>
                            <td>{{$student->b_form}}</td>
                            <td>{{$student->cell}}</td>
                            <td>{{$student->grade->name}}</td>
                            <td>
{{--                                @if($student->is_active)--}}
{{--                                <a href="{{ route('change_Student_Status', [ 'id'=> $student->id ]) }}" class="btn btn-success btn-sm" role="button" aria-pressed="true">Active</a>--}}
{{--                                @else--}}
{{--                                    <a href="{{ route('change_Student_Status', [ 'id'=> $student->id ]) }}" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Blocked</a>--}}
{{--                                    @endif--}}
                                    <input data-id="{{$student->id}}" class="toggle-class" size="mini" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $student->is_active ? 'checked' : '' }}>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <div class="d-flex justify-content-end">
                    {{ $students->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
