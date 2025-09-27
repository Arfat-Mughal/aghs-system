@extends('layouts.mainLayout')
@section('content')

    <!-- Hero Section -->
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('web_assets/images/image_4.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-3 bread">Get Your Roll Number Slip</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2">
                            <a href="{{route('home')}}">Home <i class="ion-ios-arrow-forward"></i></a>
                        </span>
                        <span>Roll Number Slip <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Roll Number Slip Section -->
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 text-center">
                    <div class="heading-section mb-4">
                        <span class="subheading text-primary">Examination Services</span>
                        <h2 class="mb-3">Roll Number Slip Generation</h2>
                        <p class="text-muted">Generate and download your examination roll number slip by providing your details</p>
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
                    <!-- Roll Number Slip Form -->
                    <div class="roll-slip-form-wrapper p-5 bg-white rounded shadow-sm">
                        <div class="form-header text-center mb-4">
                            <div class="form-icon mb-3">
                                <i class="ion-card fs-1 text-primary"></i>
                            </div>
                            <h4 class="mb-2">Generate Roll Number Slip</h4>
                            <p class="text-muted">Please provide your full name and select your class to generate your roll number slip</p>
                        </div>

                        <form action="{{route('get_roll_no')}}" method="POST" class="roll-slip-form">
                            @csrf

                            <div class="row">
                                <div class="col-md-8 mb-4">
                                    <label for="full_name" class="form-label fw-semibold">
                                        <i class="ion-person me-1 text-primary"></i>Full Name
                                    </label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-primary text-white">
                                            <i class="ion-person"></i>
                                        </span>
                                        <input type="text"
                                               class="form-control"
                                               id="full_name"
                                               name="full_name"
                                               placeholder="Enter your full"
                                               required>
                                    </div>
                                    <div class="form-text">
                                        <small>Enter your complete name exactly as registered in school records</small>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-4">
                                    <label for="class" class="form-label fw-semibold">
                                        <i class="ion-university me-1 text-primary"></i>Class
                                    </label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-primary text-white">
                                            <i class="ion-university"></i>
                                        </span>
                                        <select class="form-control"
                                                id="class"
                                                name="class"
                                                required>
                                            <option value="">Select Class</option>
                                            @foreach($grades as $grade)
                                                <option value="{{$grade->id}}">{{$grade->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-text">
                                        <small>Choose your current class</small>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="ion-download me-2"></i>Generate Roll Number Slip
                                </button>
                            </div>
                        </form>

                        <!-- Form Features -->
                        <div class="form-features mt-4">
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <div class="feature-item p-3">
                                        <i class="ion-document fs-3 text-primary mb-2"></i>
                                        <h6 class="mb-1">Official</h6>
                                        <small class="text-muted">School Approved</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="feature-item p-3">
                                        <i class="ion-printer fs-3 text-primary mb-2"></i>
                                        <h6 class="mb-1">Printable</h6>
                                        <small class="text-muted">PDF Format</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="feature-item p-3">
                                        <i class="ion-speedometer fs-3 text-primary mb-2"></i>
                                        <h6 class="mb-1">Instant</h6>
                                        <small class="text-muted">Quick Generation</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Instructions -->
                    <div class="instructions-box mt-4 p-4 bg-primary text-white rounded">
                        <h5 class="mb-3">
                            <i class="ion-information-circle me-2"></i>How to Get Your Roll Number Slip
                        </h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="instruction-step">
                                    <div class="step-number mb-2">1</div>
                                    <h6 class="mb-1">Enter Full Name</h6>
                                    <small>Provide your complete name</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="instruction-step">
                                    <div class="step-number mb-2">2</div>
                                    <h6 class="mb-1">Select Class</h6>
                                    <small>Choose your current class</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="instruction-step">
                                    <div class="step-number mb-2">3</div>
                                    <h6 class="mb-1">Generate Slip</h6>
                                    <small>Download your roll number slip</small>
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
                            <i class="ion-help-circle me-2 text-primary"></i>Need Additional Services?
                        </h4>
                        <p class="text-muted mb-4">
                            Explore our other examination and academic services
                        </p>

                        <div class="row g-3">
                            <div class="col-md-4">
                                <a href="{{ route('result') }}" class="btn btn-outline-primary w-100">
                                    <i class="ion-search me-2"></i>Check Results
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
