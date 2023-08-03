@extends('layouts.adminLayout')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Slips</h2>
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <a type="button" href="{{route('add_datesheet')}}" class="au-btn au-btn-icon au-btn--blue" ><i class="zmdi zmdi-plus"></i> Create datesheets</a>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle au-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Update Status
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="{{route('update_all_slips_status',1)}}">Activate All</a>
                                        <a class="dropdown-item" href="{{route('update_all_slips_status',0)}}">Deactivate All</a>
                                    </div>
                                </div>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop2" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        PRINT SLIPS
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                                        @foreach($gradesWithSlips as $grade)
                                            <a class="dropdown-item" href="{{route('print_slip_class_wise',$grade->id)}}" >{{$grade->name}}</a>
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
                            <th scope="col">CLass</th>
                            <th scope="col">Term</th>
                            <th scope="col">Session</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($slips as $slip)
                            <tr>
                                <th scope="row">{{$slip->id}}</th>
                                <td>{{$slip->grade->name}}</td>
                                <td>{{$slip->term}}</td>
                                <td>{{$slip->session}}</td>
                                @if($slip->is_active)
                                    <td>
                                        <form action="{{route('change_slip_status',$slip->id)}}" method="post">
                                            @csrf
                                            <button class="btn btn-success">Active</button>
                                        </form>
                                    </td>
                                @else
                                    <td class="d-flex">
                                        <form action="{{route('change_slip_status',$slip->id)}}" method="post">
                                            @csrf
                                            <button class="btn btn-danger">Not Active</button>
                                        </form>
                                        <a href="{{route('delete_slips_marks',$slip->id)}}" class="btn btn-danger ml-2" role="button" aria-pressed="true">Delete</a>
                                        <a href="{{route('update_slips_marks',$slip->id)}}" class="btn btn-info ml-2" role="button" aria-pressed="true">Update</a>
                                    </td>

                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
