@extends('layouts.mainLayout')
@section('content')

    <!-- Hero Section -->
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('web_assets/images/image_4.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-3 bread">About Us</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2">
                            <a href="{{route('home')}}">Home <i class="ion-ios-arrow-forward"></i></a>
                        </span>
                        <span>About Us <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="ftco-section bg-light">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Section Header -->
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 text-center">
                    <div class="heading-section mb-4">
                        <span class="subheading text-primary">Leadership Message</span>
                        <h2 class="mb-3">Message from the Head of School</h2>
                        <div class="divider mx-auto mb-4">
                            <span class="divider-line"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="about-content">
                        <div class="welcome-message mb-4">
                            <h4 class="text-primary mb-3">
                                <i class="ion-ios-school me-2"></i>Welcome to Our School Community
                            </h4>
                            <p class="lead text-muted">
                                We hope you will find what makes our school distinctive here and in doing so are able to learn about where we stand now, what we have achieved in the past, and where we are headed in the years to come.
                            </p>
                        </div>

                        <div class="school-values">
                            <p class="mb-4">
                                When students arrive at our school, they are given a sense of inclusivity, acceptance, respect, and responsibility that helps them achieve success and greatness in all aspects of their lives.
                            </p>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="feature-box p-3 bg-white rounded shadow-sm mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="feature-icon me-3">
                                                <i class="ion-ios-bookmarks text-primary fs-4"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1">Academic Excellence</h6>
                                                <small class="text-muted">Challenging students to reach their full potential</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-box p-3 bg-white rounded shadow-sm mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="feature-icon me-3">
                                                <i class="ion-ios-people text-primary fs-4"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1">Community Building</h6>
                                                <small class="text-muted">Fostering strong relationships and citizenship</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="mb-4">
                                Many of our students begin their schooling journey with us from Montessori and continue until their 10th grade. In that time, they are encouraged to find new and meaningful ways to challenge and distinguish themselves academically while becoming conscientious citizens of a greater community.
                            </p>

                            <div class="quote-box bg-primary text-white p-4 rounded mb-4">
                                <blockquote class="mb-2">
                                    <i class="ion-quote fs-2 opacity-50"></i>
                                    <em>"Students contribute in many ways to their school and their peers, and are encouraged to seek inspiration from their teachers, advisors, coaches, and classmates."</em>
                                </blockquote>
                            </div>

                            <p>
                                As a school, we are always interested in the success of our students in areas where they are strong and those which they have yet to explore. New students join our community by demonstrating curiosity and excitement beyond just a good track record of external examinations and grades.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="about-image">
                        <div class="image-wrapper position-relative">
                            <img src="{{asset("web_assets/images/riaz.jpg")}}"
                                 class="img-fluid rounded shadow-lg"
                                 alt="Head of School"
                                 style="width: 100%; height: auto;">

                            <!-- Achievement badges -->
                            <div class="achievement-badges position-absolute" style="bottom: 20px; left: 20px;">
                                <div class="badge bg-white text-primary p-2 rounded shadow-sm mb-2">
                                    <i class="ion-trophy me-1"></i>
                                    <small>Excellence in Education</small>
                                </div>
                                <div class="badge bg-white text-primary p-2 rounded shadow-sm">
                                    <i class="ion-ribbon-a me-1"></i>
                                    <small>20+ Years Experience</small>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Stats -->
                        <div class="stats-box mt-4 p-4 bg-white rounded shadow-sm">
                            <h5 class="text-center mb-3">Our Achievements</h5>
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="stat-item">
                                        <span class="fw-bold text-primary fs-4">500+</span>
                                        <small class="d-block text-muted">Students</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="stat-item">
                                        <span class="fw-bold text-primary fs-4">25+</span>
                                        <small class="d-block text-muted">Years</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="stat-item">
                                        <span class="fw-bold text-primary fs-4">95%</span>
                                        <small class="d-block text-muted">Success Rate</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="cta-box p-5 bg-primary text-white rounded shadow">
                        <h3 class="mb-3">Ready to Join Our Community?</h3>
                        <p class="mb-4">Discover what makes our school special and take the first step towards your child's bright future.</p>
                        <a href="{{route('contact')}}" class="btn btn-light btn-lg px-5 py-3">
                            <i class="ion-ios-mail me-2"></i>Get In Touch
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
