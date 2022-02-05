@extends('layouts.mainLayout')
@section('content')

    @include('includes.header')

    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('web_assets/images/image_4.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">Our Courses</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Courses <i class="ion-ios-arrow-forward"></i></span></p>
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
                <div class="col-md-12">
                    <h1>Online Certificate</h1>
                </div>
                @if(session()->has('message'))
                    <div class="alert alert-success col-md-6 offset-2">
                        <h4>Your Diploma/Certificate has been verified</h4>
                        <ul>
                            <li>{{ session()->get('message') }}</li>
                            <li>{{ session()->get('registration_code') }}</li>
                            <li>{{ session()->get('week') }}</li>
                            <li>{{ session()->get('date') }}</li>
                            <li>{{ session()->get('name') }}</li>
                        </ul>
                        <h5>Has successfully completed the prescribed course</h5>
                    </div>
                @endif
                    <form action="{{route('get_certificate')}}" method="post" class="border col-md-6 offset-2">
                        @csrf
                        <label for="duration">Choose a duration:</label>
                        <select name="duration" id="duration" class="form-control" required>
                            <option value="">Select</option>
                            <option value="13">3 Months</option>
                            <option value="26">6 Months</option>
                        </select>
                        <label for="duration">Fullname</label>
                        <input type="text" name="fullname" class="form-control" required>
                        <div class="mt-2 mb-2 text-right">
                            <button type="submit" class="btn btn-info">Click here to verify</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection
