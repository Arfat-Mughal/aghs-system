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

        </div>
    </section>

@endsection
