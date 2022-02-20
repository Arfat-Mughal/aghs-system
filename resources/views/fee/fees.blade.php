@extends('layouts.adminLayout')
@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Fees</h2>
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <a type="button" href="{{route('add_fee')}}" class="au-btn au-btn-icon au-btn--blue" ><i class="zmdi zmdi-plus"></i>Create Fee card</a>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle au-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Update Status
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="{{route('update_all_slips_status',1)}}">Activate All</a>
                                    <a class="dropdown-item" href="{{route('update_all_slips_status',0)}}">Deactivate All</a>
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
                        <th scope="col">Roll Number</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Father Name</th>
                        <th scope="col">Payable Amount</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fees as $date)
                        <tr>
                            <td scope="row">{{$date->id}}</td>
                            <td scope="row">{{$date->student->addmission_no}}</td>
                            <td scope="row">{{$date->student->name}}</td>
                            <td scope="row">{{$date->student->father_name}}</td>
                            <td scope="row">{{$date->payments->sum('fee')}}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="#" target="_blank">View</a>
                                        <a class="dropdown-item" href="#">Update</a>
                                        <form method="POST" action="#">
                                            @csrf
                                            <input type="hidden" name="id" value={{$date->id}}>
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
