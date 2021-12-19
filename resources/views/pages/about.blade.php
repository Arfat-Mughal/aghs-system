@extends('layouts.mainLayout')
@section('content')

    @include('includes.header')

    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('web_assets/images/image_4.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">About Us</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home<i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>About Us<i
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
                <h2 class="justify-content-center">Message from the Head of School</h2>
                <div class="col-md-9">
                    <p>Welcome to Headstart’s website. We hope you will find what makes our school distinctive here and in doing so are able to learn a
                        little about where we stand now, what we have achieved in the past, and where we are headed in the years to come.
                        When students arrive at Headstart they are given a sense of inclusivity, acceptance, respect, and responsibility
                        that helps them achieve success and greatness in all aspects of their lives.
                        Many of our students begin their schooling at the Montessori and continue with us until their 10th grade. In that time
                        they are asked to find new and meaningful ways to challenge and distinguish themselves academically and become conscientious citizens
                        of a greater community. Students contribute in many ways to their school and their peers, and are encouraged to seek inspiration
                        from their teachers, advisors, coaches, and classmates. As a school we are always interested in the success of our students
                        in areas where they are strong and those which they have yet to explore. New students join our community by demonstrating a curiosity,
                        and excitement beyond a good track record of external examinations and grades.</p>
                </div>
                <div class="col-md-3">
                    <img src="{{asset("web_assets/images/riaz.jpg")}}" class="rounded float-right" alt="Riaz" width="300px">
                </div>
            </div>
        </div>
    </section>

@endsection
