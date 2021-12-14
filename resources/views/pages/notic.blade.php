@extends('layouts.mainLayout')
@section('content')

    @include('includes.header')

    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('web_assets/images/image_4.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">Notice Board</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home<i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Notice Board<i
                                class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h3>Click And Download </h3>
            <div class="row border">
                    <ul>
                        <li><a href="{{asset('web_assets/images/datasheet.jpg')}}" target="_blank"> DateSheet 2021 </a></li>
                    </ul>
            </div>
        </div>
    </section>

@endsection
