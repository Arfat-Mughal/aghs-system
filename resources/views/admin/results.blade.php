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
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <a href="{{route('add_results')}}" class="au-btn au-btn-icon au-btn--blue"><i class="zmdi zmdi-plus"></i>create results</a>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop4" type="button" class="btn btn-info dropdown-toggle au-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Update Status
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop4">
                                        <a class="dropdown-item" href="{{route('update_all_results_status',1)}}">Activate All</a>
                                        <a class="dropdown-item" href="{{route('update_all_results_status',0)}}">Deactivate All</a>
                                    </div>
                                </div>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop2" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        PRINT RESULT CARDS
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                                        @foreach($gradesWithData as $grade)
                                            <a class="dropdown-item" href="{{route('get_Maks_Sheet_Class_Wise',$grade->id)}}" >{{$grade->name}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        @if ($errors->has('errors'))
                            <div class="alert alert-danger">
                                {{ $errors->first('errors') }}
                            </div>
                        @endif
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
                                    @if($result->is_active)
                                        <a href="{{ route('change_result_status', [ 'id'=> $result->id ]) }}" class="btn btn-success btn-sm" role="button" aria-pressed="true">Active</a>
                                    @else
                                        <a href="{{ route('change_result_status', [ 'id'=> $result->id ]) }}" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Blocked</a>
                                    @endif
                                    <a href="{{route('update_result_marks',['id'=>$result->grade_id,'recode_id'=>$result->id])}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true">Update Marks</a>
                                @else
                                    <a href="{{route('add_result_marks',$result->grade_id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true">Add Marks</a>
                                @endif
                                <a href="{{route('delete_result_marks',$result->id)}}" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Delete</a>
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
