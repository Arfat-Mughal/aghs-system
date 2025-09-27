@extends('layouts.mainLayout')
@section('content')

    <!-- Hero Section -->
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('web_assets/images/image_4.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-3 bread">Privacy Policy</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2">
                            <a href="{{route('home')}}">Home <i class="ion-ios-arrow-forward"></i></a>
                        </span>
                        <span>Privacy Policy <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Privacy Policy Content -->
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="privacy-policy-content bg-white p-5 rounded shadow-sm">
                        <div class="section-header mb-5 text-center">
                            <h2 class="mb-3">Privacy Policy</h2>
                            <p class="text-muted">Last updated: {{ date('F d, Y') }}</p>
                            <div class="divider mx-auto mb-4">
                                <span class="divider-line"></span>
                            </div>
                        </div>

                        <div class="policy-content">
                            <div class="policy-section mb-5">
                                <h3 class="text-primary mb-3">
                                    <i class="ion-ios-information-circle me-2"></i>Introduction
                                </h3>
                                <p>
                                    AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY ("we," "our," or "us") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website aghslahore.com or use our services.
                                </p>
                            </div>

                            <div class="policy-section mb-5">
                                <h3 class="text-primary mb-3">
                                    <i class="ion-ios-folder me-2"></i>Information We Collect
                                </h3>
                                <h4 class="h5 mb-3">Personal Information</h4>
                                <p>We may collect personal information that you voluntarily provide to us when you:</p>
                                <ul class="list-unstyled ms-3">
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Register for admission or courses</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Contact us through our contact form</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Subscribe to our newsletter</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Participate in school activities</li>
                                </ul>

                                <h4 class="h5 mb-3 mt-4">Automatically Collected Information</h4>
                                <p>When you visit our website, we may automatically collect certain information about your device, including:</p>
                                <ul class="list-unstyled ms-3">
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>IP address and browser type</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Operating system and device information</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Pages visited and time spent on our site</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Referring website addresses</li>
                                </ul>
                            </div>

                            <div class="policy-section mb-5">
                                <h3 class="text-primary mb-3">
                                    <i class="ion-ios-gear me-2"></i>How We Use Your Information
                                </h3>
                                <p>We use the information we collect to:</p>
                                <ul class="list-unstyled ms-3">
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Provide and maintain our educational services</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Process admissions and enrollment</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Communicate with students, parents, and guardians</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Send important school notifications and updates</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Improve our website and services</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Comply with legal obligations</li>
                                </ul>
                            </div>

                            <div class="policy-section mb-5">
                                <h3 class="text-primary mb-3">
                                    <i class="ion-ios-cloud me-2"></i>Information Sharing and Disclosure
                                </h3>
                                <p>We do not sell, trade, or otherwise transfer your personal information to third parties except in the following circumstances:</p>
                                <ul class="list-unstyled ms-3">
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>With your explicit consent</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>To comply with legal requirements</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>To protect our rights and safety</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>With trusted service providers who assist in our operations</li>
                                </ul>
                            </div>

                            <div class="policy-section mb-5">
                                <h3 class="text-primary mb-3">
                                    <i class="ion-ios-locked me-2"></i>Data Security
                                </h3>
                                <p>
                                    We implement appropriate technical and organizational security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the internet is 100% secure.
                                </p>
                            </div>

                            <div class="policy-section mb-5">
                                <h3 class="text-primary mb-3">
                                    <i class="ion-ios-browsers me-2"></i>Cookies and Tracking Technologies
                                </h3>
                                <p>
                                    Our website uses cookies and similar tracking technologies to enhance your browsing experience. You can control cookie settings through your browser preferences. We also use Google AdSense, which may use cookies to serve relevant advertisements.
                                </p>
                            </div>

                            <div class="policy-section mb-5">
                                <h3 class="text-primary mb-3">
                                    <i class="ion-ios-person me-2"></i>Your Rights
                                </h3>
                                <p>You have the right to:</p>
                                <ul class="list-unstyled ms-3">
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Access your personal information</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Correct inaccurate information</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Request deletion of your information</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Opt-out of marketing communications</li>
                                </ul>
                            </div>

                            <div class="policy-section mb-5">
                                <h3 class="text-primary mb-3">
                                    <i class="ion-ios-refresh me-2"></i>Changes to This Privacy Policy
                                </h3>
                                <p>
                                    We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last updated" date.
                                </p>
                            </div>

                            <div class="policy-section">
                                <h3 class="text-primary mb-3">
                                    <i class="ion-ios-telephone me-2"></i>Contact Us
                                </h3>
                                <p>If you have any questions about this Privacy Policy, please contact us:</p>
                                <div class="contact-info bg-light p-4 rounded">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="mb-2">
                                                <i class="ion-ios-location text-primary me-2"></i>
                                                <strong>Address:</strong><br>
                                                VILLAGE BHANO CHAK P/O WAGHA<br>
                                                TEHSIL SHALIMAR CANTT LAHORE
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-2">
                                                <i class="ion-ios-telephone text-primary me-2"></i>
                                                <strong>Phone:</strong> 0321-4960275, 042-37172500
                                            </p>
                                            <p class="mb-0">
                                                <i class="ion-ios-email text-primary me-2"></i>
                                                <strong>Email:</strong> info@aghslahore.pk
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection