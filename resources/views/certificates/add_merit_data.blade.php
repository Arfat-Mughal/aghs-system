@extends('layouts.adminLayout')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4 col-md-6 col-lg-8">
                        <div class="card">
                            <div class="card-header">Credit Card</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Certificate Of Merit</h3>
                                </div>
                                <hr>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{route('get_certificate_merit')}}" novalidate="novalidate">
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="x_card_code" class="control-label mb-1">Ref No</label>
                                            <div class="input-group">
                                                <input id="x_card_code" name="ref_no" type="tel" class="form-control cc-cvc" value="" data-val="true">

                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label for="x_card_code" class="control-label mb-1">Date</label>
                                            <div class="input-group">
                                                <input id="x_card_code" name="date" type="date" class="form-control cc-cvc" value="" data-val="true">

                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label for="x_card_code" class="control-label mb-1">Registration Code</label>
                                            <div class="input-group">
                                                <input id="x_card_code" name="registration_code" type="text" class="form-control cc-cvc" value="">

                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label for="x_card_code" class="control-label mb-1">Number of Weeks</label>
                                            <div class="input-group">
                                                <input id="x_card_code" name="weeks" type="text" class="form-control cc-cvc" value="" data-val="true">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Student Name</label>
                                        <input id="cc-name" name="name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Father Name</label>
                                        <input id="cc-name" name="father_name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="cc-exp" class="control-label mb-1">Content of this course no 1</label>
                                                <input id="cc-exp" name="content_1" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration">
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="cc-exp" class="control-label mb-1">Content of this course no 2</label>
                                                <input id="cc-exp" name="content_2" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration">
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="cc-exp" class="control-label mb-1">Content of this course no 3</label>
                                                <input id="cc-exp" name="content_3" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration">
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="cc-exp" class="control-label mb-1">Content of this course no 4</label>
                                                <input id="cc-exp" name="content_4" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration">
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="cc-exp" class="control-label mb-1">Content of this course no 5</label>
                                                <input id="cc-exp" name="content_5" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration">
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                          <div class="col-4">
                                            <div class="form-group">
                                                <label for="cc-exp" class="control-label mb-1">Content of this course no 6</label>
                                                <input id="cc-exp" name="content_6" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration">
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <i class="fa fa-book"></i>&nbsp;
                                            <span id="payment-button-amount">Get Certificate</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
