@extends('layouts.mainLayout')
@section('content')

    <!-- Hero Section -->
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('web_assets/images/image_4.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-3 bread">Notifications</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2">
                            <a href="{{route('home')}}">Home <i class="ion-ios-arrow-forward"></i></a>
                        </span>
                        <span>Notifications <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Notifications Section -->
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 text-center">
                    <div class="heading-section mb-4">
                        <span class="subheading text-primary">Important Updates</span>
                        <h2 class="mb-3">School Notifications</h2>
                        <p class="text-muted">Stay updated with the latest announcements, circulars, and important notices from our school</p>
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

            <!-- Notifications Display -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="notifications-wrapper">
                        @if($notifications->count() >= 1)
                            <div class="notifications-header mb-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h4 class="mb-1">
                                            <i class="ion-document-text me-2 text-primary"></i>Available Notifications
                                        </h4>
                                        <p class="text-muted mb-0">Click on any notification to download</p>
                                    </div>
                                    <div class="notification-count">
                                        <span class="badge bg-primary fs-6 px-3 py-2">
                                            <i class="ion-ios-paper me-1"></i>{{ $notifications->count() }} Notifications
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="notifications-list">
                                @foreach($notifications as $index => $notification)
                                    <div class="notification-item p-4 bg-white rounded shadow-sm mb-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="notification-content flex-grow-1">
                                                <div class="d-flex align-items-center">
                                                    <div class="notification-icon me-3">
                                                        <i class="ion-document fs-3 text-primary"></i>
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-1 notification-title">
                                                            {{ $notification->name }}
                                                        </h5>
                                                        <div class="notification-meta text-muted">
                                                            <small>
                                                                <i class="ion-calendar me-1"></i>
                                                                {{ \Carbon\Carbon::parse($notification->created_at ?? now())->format('M d, Y') }}
                                                                <span class="mx-2">•</span>
                                                                <i class="ion-download me-1"></i>
                                                                Click to download
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notification-actions">
                                                <a href="{{ $notification->path }}"
                                                   target="_blank"
                                                   class="btn btn-primary btn-sm">
                                                    <i class="ion-download me-1"></i>Download
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Summary Stats -->
                            <div class="notifications-summary mt-4 p-4 bg-primary text-white rounded">
                                <div class="row text-center">
                                    <div class="col-md-4">
                                        <div class="summary-item">
                                            <i class="ion-document-text fs-3 mb-2"></i>
                                            <h4 class="mb-1">{{ $notifications->count() }}</h4>
                                            <small>Total Notifications</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="summary-item">
                                            <i class="ion-calendar fs-3 mb-2"></i>
                                            <h4 class="mb-1">{{ $notifications->count() }}</h4>
                                            <small>Available for Download</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="summary-item">
                                            <i class="ion-information fs-3 mb-2"></i>
                                            <h4 class="mb-1">24/7</h4>
                                            <small>Access Anytime</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- No Notifications State -->
                            <div class="no-notifications text-center p-5 bg-white rounded shadow-sm">
                                <div class="no-notifications-icon mb-4">
                                    <i class="ion-document fs-1 text-muted"></i>
                                </div>
                                <h4 class="mb-3 text-muted">No Notifications Available</h4>
                                <p class="text-muted mb-4">
                                    There are currently no notifications to display. Please check back later for updates.
                                </p>
                                <div class="no-notifications-actions">
                                    <a href="{{ route('home') }}" class="btn btn-outline-primary me-2">
                                        <i class="ion-home me-1"></i>Go to Homepage
                                    </a>
                                    <button class="btn btn-primary" onclick="location.reload()">
                                        <i class="ion-refresh me-1"></i>Refresh Page
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Access Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="quick-access p-4 bg-white rounded shadow-sm">
                        <h4 class="mb-3">
                            <i class="ion-help-circle me-2 text-primary"></i>Need Help?
                        </h4>
                        <p class="text-muted mb-4">
                            Can't find what you're looking for? Here are some quick options to help you.
                        </p>

                        <div class="row g-3">
                            <div class="col-md-4">
                                <a href="{{ route('contact') }}" class="btn btn-outline-primary w-100">
                                    <i class="ion-ios-mail me-2"></i>Contact Us
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('home') }}" class="btn btn-outline-primary w-100">
                                    <i class="ion-home me-2"></i>Homepage
                                </a>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-outline-primary w-100" onclick="window.print()">
                                    <i class="ion-printer me-2"></i>Print List
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
