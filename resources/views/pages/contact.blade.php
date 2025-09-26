@extends('layouts.mainLayout')
@section('content')

    <!-- Hero Section -->
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('web_assets/images/image_4.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-3 bread">Contact Us</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2">
                            <a href="{{route('home')}}">Home <i class="ion-ios-arrow-forward"></i></a>
                        </span>
                        <span>Contact <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 text-center">
                    <div class="heading-section mb-4">
                        <span class="subheading text-primary">Get In Touch</span>
                        <h2 class="mb-3">Contact Information</h2>
                        <p class="text-muted">We're here to help you with any questions or concerns you may have</p>
                        <div class="divider mx-auto mb-4">
                            <span class="divider-line"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-card h-100 p-4 bg-white rounded shadow-sm text-center">
                        <div class="contact-icon mb-3">
                            <i class="ion-ios-location fs-1 text-primary"></i>
                        </div>
                        <h4 class="mb-3">Our Location</h4>
                        <p class="mb-0 text-muted">VILLAGE BHANO CHAK P/O WAGHA TEHSIL SHALIMAR CANTT LAHORE</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-card h-100 p-4 bg-white rounded shadow-sm text-center">
                        <div class="contact-icon mb-3">
                            <i class="ion-ios-telephone fs-1 text-primary"></i>
                        </div>
                        <h4 class="mb-3">Phone Numbers</h4>
                        <div class="phone-links">
                            <a href="tel:0321-4960275" class="d-block text-decoration-none text-muted mb-1">0321-4960275</a>
                            <a href="tel:0321-4969849" class="d-block text-decoration-none text-muted mb-1">0321-4969849</a>
                            <a href="tel:042-37172500" class="d-block text-decoration-none text-muted">042-37172500</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-card h-100 p-4 bg-white rounded shadow-sm text-center">
                        <div class="contact-icon mb-3">
                            <i class="ion-ios-email fs-1 text-primary"></i>
                        </div>
                        <h4 class="mb-3">Email Address</h4>
                        <a href="mailto:info@aghslahore.pk" class="text-decoration-none">
                            <p class="mb-0 text-primary fw-semibold">info@aghslahore.pk</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Map Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row g-0">
                <!-- Contact Form -->
                <div class="col-lg-6">
                    <div class="contact-form-wrapper p-5 bg-white shadow-sm">
                        <div class="section-header mb-4">
                            <h3 class="mb-2">Send us a Message</h3>
                            <p class="text-muted">Fill out the form below and we'll get back to you as soon as possible</p>
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

                        @if(session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="ion-checkmark-circled me-2"></i>
                                <strong>Success!</strong> {{ session()->get('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{route('contact_store')}}" class="contact-form">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label fw-semibold">
                                        <i class="ion-person me-1 text-primary"></i>Full Name
                                    </label>
                                    <input type="text"
                                           class="form-control"
                                           id="name"
                                           name="name"
                                           placeholder="Enter your full name"
                                           required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label fw-semibold">
                                        <i class="ion-email me-1 text-primary"></i>Email Address
                                    </label>
                                    <input type="email"
                                           class="form-control"
                                           id="email"
                                           name="email"
                                           placeholder="Enter your email address"
                                           required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label fw-semibold">
                                    <i class="ion-document me-1 text-primary"></i>Subject
                                </label>
                                <input type="text"
                                       class="form-control"
                                       id="subject"
                                       name="subject"
                                       placeholder="What is this regarding?"
                                       required>
                            </div>

                            <div class="mb-4">
                                <label for="message" class="form-label fw-semibold">
                                    <i class="ion-chatbubble me-1 text-primary"></i>Message
                                </label>
                                <textarea class="form-control"
                                          id="message"
                                          name="message"
                                          rows="5"
                                          placeholder="Please provide details about your inquiry..."
                                          required></textarea>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="ion-paper-airplane me-2"></i>Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Map -->
                <div class="col-lg-6">
                    <div class="map-wrapper h-100">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6796.706325056473!2d74.5711358833381!3d31.59678134982958!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdeb36a4d647f5baf!2sAL-FALAH%20GRAMMAR%20HIGH%20SCHOOL%20(B-M)!5e0!3m2!1sen!2s!4v1631441044955!5m2!1sen!2s"
                            class="w-100 h-100 border-0 rounded shadow-sm"
                            style="min-height: 500px;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Contact Options -->
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="quick-contact p-4 bg-white rounded shadow-sm">
                        <h4 class="mb-3">Need Immediate Assistance?</h4>
                        <p class="text-muted mb-4">Choose the best way to reach us based on your needs</p>

                        <div class="row g-3">
                            <div class="col-md-4">
                                <a href="tel:042-37172500" class="btn btn-outline-primary w-100">
                                    <i class="ion-ios-telephone me-2"></i>Call Now
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="mailto:info@aghslahore.pk" class="btn btn-outline-primary w-100">
                                    <i class="ion-ios-email me-2"></i>Email Us
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{route('home')}}" class="btn btn-outline-primary w-100">
                                    <i class="ion-home me-2"></i>Visit School
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
