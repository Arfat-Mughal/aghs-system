@extends('layouts.mainLayout')
@section('content')

    <!-- Hero Section -->
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('web_assets/images/image_4.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-3 bread">Check Your Result</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2">
                            <a href="{{route('home')}}">Home <i class="ion-ios-arrow-forward"></i></a>
                        </span>
                        <span>Result <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Result Check Section -->
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 text-center">
                    <div class="heading-section mb-4">
                        <span class="subheading text-primary">Academic Results</span>
                        <h2 class="mb-3">Check Your Academic Results</h2>
                        <p class="text-muted">Enter your roll number to view your examination results and academic performance</p>
                        <div class="divider mx-auto mb-4">
                            <span class="divider-line"></span>
                        </div>
                    </div>
                </div>
            </div>

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

            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <!-- Result Check Form -->
                    <div class="result-form-wrapper p-5 bg-white rounded shadow-sm">
                        <div class="form-header text-center mb-4">
                            <div class="form-icon mb-3">
                                <i class="ion-ios-paper fs-1 text-primary"></i>
                            </div>
                            <h4 class="mb-2">Result Inquiry</h4>
                            <p class="text-muted">Please enter your roll number to check your results</p>
                        </div>

                        <form action="{{route('result_catd')}}" method="GET" class="result-form">
                            <div class="row">
                                <div class="col-md-8 mb-4">
                                    <label for="roll_no" class="form-label fw-semibold">
                                        <i class="ion-card me-1 text-primary"></i>Roll Number
                                    </label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-primary text-white">
                                            <i class="ion-card"></i>
                                        </span>
                                        <input type="text"
                                               class="form-control"
                                               id="roll_no"
                                               name="roll_no"
                                               placeholder="Enter your roll number (e.g., 12345)"
                                               required
                                               pattern="[0-9]+"
                                               title="Please enter numbers only">
                                    </div>
                                    <div class="form-text">
                                        <small>Enter your complete roll number without any spaces or special characters</small>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-4">
                                    <label class="form-label fw-semibold">&nbsp;</label>
                                    <div class="d-grid h-100">
                                        <button type="submit" class="btn btn-primary btn-lg h-100">
                                            <i class="ion-search me-2"></i>Check Result
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- Form Features -->
                        <div class="form-features mt-4">
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <div class="feature-item p-3">
                                        <i class="ion-locked fs-3 text-primary mb-2"></i>
                                        <h6 class="mb-1">Secure</h6>
                                        <small class="text-muted">Protected Access</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="feature-item p-3">
                                        <i class="ion-speedometer fs-3 text-primary mb-2"></i>
                                        <h6 class="mb-1">Fast</h6>
                                        <small class="text-muted">Quick Results</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="feature-item p-3">
                                        <i class="ion-document fs-3 text-primary mb-2"></i>
                                        <h6 class="mb-1">Accurate</h6>
                                        <small class="text-muted">Official Records</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Instructions -->
                    <div class="instructions-box mt-4 p-4 bg-primary text-white rounded">
                        <h5 class="mb-3">
                            <i class="ion-information-circle me-2"></i>How to Check Your Result
                        </h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="instruction-step">
                                    <div class="step-number mb-2">1</div>
                                    <h6 class="mb-1">Enter Roll Number</h6>
                                    <small>Input your complete roll number</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="instruction-step">
                                    <div class="step-number mb-2">2</div>
                                    <h6 class="mb-1">Click Check Result</h6>
                                    <small>Submit your roll number for verification</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="instruction-step">
                                    <div class="step-number mb-2">3</div>
                                    <h6 class="mb-1">View Results</h6>
                                    <small>Access your detailed academic results</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Services Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="additional-services p-4 bg-white rounded shadow-sm">
                        <h4 class="mb-3">
                            <i class="ion-help-circle me-2 text-primary"></i>Need Additional Help?
                        </h4>
                        <p class="text-muted mb-4">
                            Explore our other academic services and resources
                        </p>

                        <div class="row g-3">
                            <div class="col-md-4">
                                <a href="{{ route('roll_no') }}" class="btn btn-outline-primary w-100">
                                    <i class="ion-card me-2"></i>Roll No Slip
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('notice') }}" class="btn btn-outline-primary w-100">
                                    <i class="ion-document-text me-2"></i>Notifications
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('contact') }}" class="btn btn-outline-primary w-100">
                                    <i class="ion-ios-mail me-2"></i>Contact Admin
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
