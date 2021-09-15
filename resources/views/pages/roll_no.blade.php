@extends('layouts.mainLayout')
@section('content')

    @include('includes.header')

    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('web_assets/images/bg_2.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">Get your Roll No slip</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home<i class="ion-ios-arrow-forward"></i></a></span> <span>Roll No <i class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-4 offset-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="form-group mb-2 ml-2">
                                <label>Type Your Name and Select Class</label>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="form-inline">
                                <div class="form-group mx-sm-3 mb-1">
                                    <input type="text" class="form-control" placeholder="Full Name">
                                </div>
                                <div class="form-group mx-sm-3 mb-1">
                                    <select class="custom-select">
                                        <option selected>Select Class</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="card footer">
                            <div class="col-lg-12 col-md-8 mt-2 text-right">
                                <button type="submit" class="btn btn-primary mb-2">Get Your Slip</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
