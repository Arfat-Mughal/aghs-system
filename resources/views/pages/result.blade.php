@extends('layouts.mainLayout')
@section('content')

    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('web_assets/images/image_4.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">Check Your Result</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home<i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Result <i
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
            <div class="row">
                <div class="col-lg-6 col-md-4 offset-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="form-group mb-2 ml-2">
                                <label>Type Your Roll No</label>
                            </div>
                        </div>
                        <form action="{{route('result_catd')}}">
                            <div class="card-body">
                                <div class="form-group mx-sm-3 mb-1">
                                    <input type="text" class="form-control" placeholder="Roll No" name="roll_no">
                                </div>
                            </div>
                            <div class="card footer">
                                <div class="col-lg-12 col-md-8 mt-2 text-right">
                                    <button type="submit" class="btn btn-primary mb-2">Get Your Result</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
