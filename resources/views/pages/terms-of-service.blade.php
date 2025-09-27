@extends('layouts.mainLayout')
@section('content')

    <!-- Hero Section -->
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('web_assets/images/image_4.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-3 bread">Terms of Service</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2">
                            <a href="{{route('home')}}">Home <i class="ion-ios-arrow-forward"></i></a>
                        </span>
                        <span>Terms of Service <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Terms of Service Content -->
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="terms-content bg-white p-5 rounded shadow-sm">
                        <div class="section-header mb-5 text-center">
                            <h2 class="mb-3">Terms of Service</h2>
                            <p class="text-muted">Last updated: {{ date('F d, Y') }}</p>
                            <div class="divider mx-auto mb-4">
                                <span class="divider-line"></span>
                            </div>
                        </div>

                        <div class="terms-content">
                            <div class="terms-section mb-5">
                                <h3 class="text-primary mb-3">
                                    <i class="ion-ios-information-circle me-2"></i>Agreement to Terms
                                </h3>
                                <p>
                                    By accessing and using the website of AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY (aghslahore.com), you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.
                                </p>
                            </div>

                            <div class="terms-section mb-5">
                                <h3 class="text-primary mb-3">
                                    <i class="ion-ios-world me-2"></i>Use License
                                </h3>
                                <p>Permission is granted to temporarily download one copy of the materials on AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY's website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:</p>
                                <ul class="list-unstyled ms-3">
                                    <li class="mb-2"><i class="ion-close text-danger me-2"></i>Modify or copy the materials</li>
                                    <li class="mb-2"><i class="ion-close text-danger me-2"></i>Use the materials for any commercial purpose or for any public display</li>
                                    <li class="mb-2"><i class="ion-close text-danger me-2"></i>Attempt to reverse engineer any software contained on the website</li>
                                    <li class="mb-2"><i class="ion-close text-danger me-2"></i>Remove any copyright or other proprietary notations from the materials</li>
                                </ul>
                                <p>This license shall automatically terminate if you violate any of these restrictions and may be terminated by AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY at any time.</p>
                            </div>

                            <div class="terms-section mb-5">
                                <h3 class="text-primary mb-3">
                                    <i class="ion-ios-paper me-2"></i>Disclaimer
                                </h3>
                                <p>
                                    The materials on AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY's website are provided on an 'as is' basis. AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.
                                </p>
                                <p>
                                    Further, AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its website or otherwise relating to such materials or on any sites linked to this site.
                                </p>
                            </div>

                            <div class="terms-section mb-5">
                                <h3 class="text-primary mb-3">
                                    <i class="ion-ios-shield me-2"></i>Limitations
                                </h3>
                                <p>
                                    In no event shall AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY's website, even if AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY or an authorized representative has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do not allow limitations on implied warranties, or limitations of liability for consequential or incidental damages, these limitations may not apply to you.
                                </p>
                            </div>

                            <div class="terms-section mb-5">
                                <h3 class="text-primary mb-3">
                                    <i class="ion-ios-checkmark-circle me-2"></i>Accuracy of Materials
                                </h3>
                                <p>
                                    The materials appearing on AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY's website could include technical, typographical, or photographic errors. AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY does not warrant that any of the materials on its website are accurate, complete, or current. AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY may make changes to the materials contained on its website at any time without notice. However, AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY does not make any commitment to update the materials.
                                </p>
                            </div>

                            <div class="terms-section mb-5">
                                <h3 class="text-primary mb-3">
                                    <i class="ion-ios-link me-2"></i>Links
                                </h3>
                                <p>
                                    AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY has not reviewed all of the sites linked to our website and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY of the site. Use of any such linked website is at the user's own risk.
                                </p>
                            </div>

                            <div class="terms-section mb-5">
                                <h3 class="text-primary mb-3">
                                    <i class="ion-ios-school me-2"></i>Educational Services
                                </h3>
                                <p>Our educational services are subject to the following terms:</p>
                                <ul class="list-unstyled ms-3">
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Admission is subject to availability and meeting our academic requirements</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Fees must be paid according to the schedule provided</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Students must adhere to our code of conduct and academic policies</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>We reserve the right to modify our curriculum and policies as needed</li>
                                </ul>
                            </div>

                            <div class="terms-section mb-5">
                                <h3 class="text-primary mb-3">
                                    <i class="ion-ios-person me-2"></i>User Conduct
                                </h3>
                                <p>When using our website or services, you agree to:</p>
                                <ul class="list-unstyled ms-3">
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Provide accurate and truthful information</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Respect the rights and privacy of others</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Not engage in any unlawful or harmful activities</li>
                                    <li class="mb-2"><i class="ion-checkmark text-success me-2"></i>Not attempt to gain unauthorized access to our systems</li>
                                </ul>
                            </div>

                            <div class="terms-section mb-5">
                                <h3 class="text-primary mb-3">
                                    <i class="ion-ios-refresh me-2"></i>Modifications
                                </h3>
                                <p>
                                    AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY may revise these terms of service for its website at any time without notice. By using this website, you are agreeing to be bound by the then current version of these terms of service.
                                </p>
                            </div>

                            <div class="terms-section mb-5">
                                <h3 class="text-primary mb-3">
                                    <i class="ion-ios-flag me-2"></i>Governing Law
                                </h3>
                                <p>
                                    These terms and conditions are governed by and construed in accordance with the laws of Pakistan and you irrevocably submit to the exclusive jurisdiction of the courts in that State or location.
                                </p>
                            </div>

                            <div class="terms-section">
                                <h3 class="text-primary mb-3">
                                    <i class="ion-ios-telephone me-2"></i>Contact Information
                                </h3>
                                <p>If you have any questions about these Terms of Service, please contact us:</p>
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