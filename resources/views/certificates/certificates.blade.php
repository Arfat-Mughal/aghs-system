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
                                <a type="button" href="{{route('add_certificate')}}" class="au-btn au-btn-icon au-btn--blue" ><i class="zmdi zmdi-plus"></i> Create certificate</a>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle au-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Update Status
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="{{route('update_all_certificates_status',1)}}">Activate All</a>
                                        <a class="dropdown-item" href="{{route('update_all_certificates_status',0)}}">Deactivate All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <table class="table table-striped" id="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ref_no</th>
                            <th scope="col">Name</th>
                            <th scope="col">Father Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Registration Code</th>
                            <th scope="col">No of weeks</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($certificates as $certificate)
                            <tr>
                                <td scope="row">{{$certificate->id}}</td>
                                <td scope="row">{{$certificate->ref_no}}</td>
                                <td scope="row">{{$certificate->name}}</td>
                                <td scope="row">{{$certificate->father_name}}</td>
                                <td scope="row">{{ Carbon\Carbon::parse($certificate->date)->format('d-m-Y') }}</td>
                                <td scope="row">{{$certificate->registration_code}}</td>
                                <td scope="row">{{$certificate->weeks}}</td>
                                @if($certificate->is_active)
                                    <td>
                                        <form action="{{route('change_certificate_status',$certificate->id)}}" method="post">
                                            @csrf
                                            <button class="btn btn-success" type="submit" value="{{$certificate->id}}" name="id">Active</button>
                                        </form>
                                    </td>
                                @else
                                    <td class="d-flex">
                                        <form action="{{route('change_certificate_status',$certificate->id)}}" method="post">
                                            @csrf
                                            <button class="btn btn-success" type="submit" value="{{$certificate->id}}" name="id">Not Active</button>
                                        </form>
                                        <a href="{{route('delete_certificate',$certificate->id)}}" class="btn btn-danger ml-2" role="button" aria-pressed="true">Delete</a>
{{--                                        <a href="{{route('update_slips_marks',$certificate->id)}}" class="btn btn-info ml-2" role="button" aria-pressed="true">Update</a>--}}
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
