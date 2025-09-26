@extends('layouts.mainLayout')
@section('content')

    <!-- Hero Section -->
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('web_assets/images/image_4.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-3 bread">Our Courses</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2">
                            <a href="{{route('home')}}">Home <i class="ion-ios-arrow-forward"></i></a>
                        </span>
                        <span>Courses <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Certificate Verification Section -->
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 text-center">
                    <div class="heading-section mb-4">
                        <span class="subheading text-primary">Certificate Verification</span>
                        <h2 class="mb-3">Online Certificate Verification</h2>
                        <p class="text-muted">Verify your certificates and diplomas online with our secure verification system</p>
                        <div class="divider mx-auto mb-4">
                            <span class="divider-line"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="ion-alert-circled me-2"></i>
                            <strong>Please fix the following errors:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show verification-result" role="alert">
                            <div class="d-flex align-items-center">
                                <div class="verification-icon me-3">
                                    <i class="ion-checkmark-circled fs-2 text-success"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="alert-heading mb-2">
                                        <i class="ion-ribbon-a me-2"></i>Certificate Verified Successfully!
                                    </h5>
                                    <div class="verification-details">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="mb-1"><strong>Student Name:</strong> {{ session()->get('name') }}</p>
                                                <p class="mb-1"><strong>Registration Code:</strong> {{ session()->get('registration_code') }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="mb-1"><strong>Duration:</strong> {{ session()->get('week') }} weeks</p>
                                                <p class="mb-1"><strong>Date:</strong> {{ session()->get('date') }}</p>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div class="success-message p-3 bg-success text-white rounded">
                                                <i class="ion-trophy me-2"></i>
                                                <strong>{{ session()->get('message') }}</strong> has successfully completed the prescribed course
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <!-- Certificate Verification Form -->
                    <div class="certificate-form-wrapper p-5 bg-white rounded shadow-sm">
                        <div class="form-header text-center mb-4">
                            <div class="form-icon mb-3">
                                <i class="ion-ios-paper fs-1 text-primary"></i>
                            </div>
                            <h4 class="mb-2">Certificate Verification Form</h4>
                            <p class="text-muted">Please fill in the details below to verify your certificate</p>
                        </div>

                        <form action="{{route('get_certificate')}}" method="post" class="certificate-form">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="fullname" class="form-label fw-semibold">
                                        <i class="ion-person me-1 text-primary"></i>Full Name
                                    </label>
                                    <input type="text"
                                           class="form-control"
                                           id="fullname"
                                           name="fullname"
                                           placeholder="Enter your full name as it appears on the certificate"
                                           required>
                                    <div class="form-text">
                                        <small>Enter the exact name as shown on your certificate</small>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="duration" class="form-label fw-semibold">
                                        <i class="ion-calendar me-1 text-primary"></i>Course Duration
                                    </label>
                                    <select name="duration"
                                            id="duration"
                                            class="form-select"
                                            required>
                                        <option value="">Select Course Duration</option>
                                        <option value="13">3 Months / 13 weeks</option>
                                        <option value="26">6 Months / 26 weeks</option>
                                    </select>
                                    <div class="form-text">
                                        <small>Choose the duration of your completed course</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Features -->
                            <div class="form-features mb-4">
                                <div class="row text-center">
                                    <div class="col-md-4">
                                        <div class="feature-item p-3">
                                            <i class="ion-locked fs-3 text-primary mb-2"></i>
                                            <h6 class="mb-1">Secure</h6>
                                            <small class="text-muted">SSL Encrypted</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="feature-item p-3">
                                            <i class="ion-speedometer fs-3 text-primary mb-2"></i>
                                            <h6 class="mb-1">Fast</h6>
                                            <small class="text-muted">Instant Results</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="feature-item p-3">
                                            <i class="ion-checkmark fs-3 text-primary mb-2"></i>
                                            <h6 class="mb-1">Verified</h6>
                                            <small class="text-muted">Official Records</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="ion-search me-2"></i>Verify Certificate
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Course Information Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="course-info p-5 bg-primary text-white rounded shadow">
                        <h3 class="mb-3">
                            <i class="ion-university me-2"></i>About Our Certificate Programs
                        </h3>
                        <p class="mb-4">
                            Our online certificate programs are designed to provide students with practical skills and knowledge in various fields. Each program is carefully structured to ensure comprehensive learning and skill development.
                        </p>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="info-card p-3 bg-white bg-opacity-10 rounded">
                                    <h5 class="mb-2">3-Month Program</h5>
                                    <p class="mb-0 small">Intensive short-term courses for quick skill acquisition</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-card p-3 bg-white bg-opacity-10 rounded">
                                    <h5 class="mb-2">6-Month Program</h5>
                                    <p class="mb-0 small">Comprehensive courses with in-depth knowledge and practical training</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
