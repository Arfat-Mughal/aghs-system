@extends('layouts.adminLayout')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8 col-md-10 col-lg-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Creating Fee Card</h2>
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
                    <form action="{{route('fee_store')}}" method="post">
                        @csrf
                        <div class="card-body card-block">
                            <div class="row">
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">Class</label>
                                    <div class="input-group">
                                        <select class="custom-select" name="grade_id">
                                            <option selected>Select option</option>
                                            @foreach($grades as $grade)
                                                <option value="{{$grade->id}}">{{$grade->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">Issue Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="issue_date">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">Last Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="last_date">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="x_card_code" class="control-label mb-1">Details</label>
                                    <div class="input_fields_wrap">
                                        <div class="col-4">
                                            <input type="text" placeholder="Details" name="fees[0][detail]" class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                            <input type="text" placeholder="Amount" name="fees[0][fee]" class="form-control" required>
                                        </div>
                                        <button class="add_field_button btn btn-info mt-2 text-white">Add More Fields</button>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Create fee for selected class</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
