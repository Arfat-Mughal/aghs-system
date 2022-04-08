@extends('layouts.adminLayout')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8 col-md-10 col-lg-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Updating Fee Card</h2>
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
                    <form action="{{route('fee_update')}}" method="post">
                        @csrf
                        <div class="card-body card-block">
                            <div class="row">
                                <div class="col-3">
                                    <label for="x_card_code" class="control-label mb-1">Student Name</label>
                                    <div class="input-group">
                                        <input type="hidden" name="fee_id" value="{{$fee->id}}">
                                        <b>{{$fee->student->name}}</b>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label for="x_card_code" class="control-label mb-1">Class</label>
                                    <div class="input-group">
                                        <b>{{$fee->grade->name}}</b>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label for="x_card_code" class="control-label mb-1">Issue Date</label>
                                    <div class="input-group">
                                        <b>{{$fee->issue_date->format('d-M-Y')}}</b>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label for="x_card_code" class="control-label mb-1">Last Date</label>
                                    <div class="input-group">
                                        <b>{{$fee->last_date->format('d-M-Y')}}</b>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                <label for="x_card_code" class="control-label mb-1">Update Issue date</label>
                                <input type="date" placeholder="Details" name="issue_date" class="form-control">
                            </div>
                            <div class="col-6 mt-2">
                                <label for="x_card_code" class="control-label mb-1">Update last date</label>
                                <input type="date" placeholder="Details" name="last_date" class="form-control">
                            </div>
                                <div class="col-12 mt-2">
                                    <label for="x_card_code" class="control-label mb-1">Details</label>
                                    @foreach($fee->payments as $key => $payment)
                                        <div class="col-4 d-flex">
                                            <input type="text" placeholder="Details" name="fees[{{$key}}][detail]" class="form-control" value="{{$payment->detail}}">
                                            <input type="text" placeholder="Amount" name="fees[{{$key}}][fee]" class="form-control" value="{{$payment->fee}}">
                                        </div>
                                    @endforeach
                                    <div class="col-4 d-flex">
                                        <input type="text" placeholder="Details" name="fees[{{$fee->payments_count}}][detail]" class="form-control">
                                        <input type="text" placeholder="Amount" name="fees[{{$fee->payments_count}}][fee]" class="form-control">
                                    </div>
                                    <div class="col-4 d-flex">
                                        <input type="text" placeholder="Details" name="fees[{{$fee->payments_count + 1}}][detail]" class="form-control">
                                        <input type="text" placeholder="Amount" name="fees[{{$fee->payments_count + 1}}][fee]" class="form-control">
                                    </div>
                                    <div class="col-4 d-flex">
                                        <input type="text" placeholder="Details" name="fees[{{$fee->payments_count + 2}}][detail]" class="form-control">
                                        <input type="text" placeholder="Amount" name="fees[{{$fee->payments_count + 2}}][fee]" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
