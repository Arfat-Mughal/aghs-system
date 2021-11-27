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
                            <a href="{{route('add_datesheet')}}" class="au-btn au-btn-icon au-btn--blue">
                                <i class="zmdi zmdi-plus"></i>create datesheets</a>
                        </div>
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
