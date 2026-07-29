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

    <!-- Partners Section -->
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 text-center">
                    <div class="heading-section mb-4">
                        <span class="subheading text-primary">Recommended Elsewhere</span>
                        <h2 class="mb-3">Tools & Platforms We Recommend</h2>
                        <div class="divider mx-auto mb-4">
                            <span class="divider-line"></span>
                        </div>
                        <p class="text-muted">A few free tools and platforms from across our network that students, parents, and staff may find useful.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($partners as $partner)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="feature-box p-4 bg-white rounded shadow-sm h-100">
                            <h5 class="mb-2">
                                <i class="ion-ios-link me-2 text-primary"></i>{{ $partner['name'] }}
                            </h5>
                            <p class="text-muted mb-3">{{ $partner['description'] }}</p>
                            <a href="{{ $partner['url'] }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary btn-sm">
                                Visit Site <i class="ion-ios-arrow-forward ms-1"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
