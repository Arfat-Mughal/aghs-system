@extends('layouts.adminLayout')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Results</h2>
                            <a href="{{route('add_results')}}" class="au-btn au-btn-icon au-btn--blue">
                                <i class="zmdi zmdi-plus"></i>create results</a>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <table class="table table-striped" id="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Class</th>
                            <th scope="col">No of Subjects</th>
                            <th scope="col">Total Marks</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results as $result)
                        <tr>
                            <th scope="row">{{$result->id}}</th>
                            <td>{{$result->grade->name}}</td>
                            <td>{{$result->marks->count('subject_id')}}</td>
                            <td>{{$result->marks->sum('t_marks')}}</td>
                            <td>
                                @if(count($result->studentsRecodeCards) >= 1)
                                    <a href="{{route('update_result_marks',['id'=>$result->grade_id,'recode_id'=>$result->id])}}" class="btn btn-warning" role="button" aria-pressed="true">Update Marks</a>
                                @else
                                    <a href="{{route('add_result_marks',$result->grade_id)}}" class="btn btn-info" role="button" aria-pressed="true">Add Marks</a>
                                @endif
                                <a href="{{route('delete_result_marks',$result->id)}}" class="btn btn-danger" role="button" aria-pressed="true">Delete</a>
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
