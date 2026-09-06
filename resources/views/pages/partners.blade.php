@extends('layouts.mainLayout')
@section('content')

    <!-- Hero Section -->
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('web_assets/images/image_4.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-3 bread">Our Partners</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2">
                            <a href="{{route('home')}}">Home <i class="ion-ios-arrow-forward"></i></a>
                        </span>
                        <span>Partners <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-lg-10 text-center">
                    <h2 class="mb-3">Our Partners</h2>
                    <p class="text-muted">A few other free tools and platforms from across our network that you might find useful.</p>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($partners as $partner)
                    <div class="col-lg-10 mb-3">
                        <a href="{{ $partner['url'] }}" target="_blank" rel="noopener noreferrer"
                           class="d-block bg-white p-4 rounded shadow-sm text-decoration-none">
                            <h3 class="h5 mb-2 text-dark">{{ $partner['emoji'] ?? '' }} {{ $partner['name'] }}</h3>
                            <p class="text-muted mb-0">{{ $partner['description'] }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
