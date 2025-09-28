<div class="py-2 bg-light">
    <div class="container-fluid">
        <div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md-5 pr-4 d-flex topper align-items-center">
                        <div class="icon bg-fifth mr-2 d-flex justify-content-center align-items-center"><span class="icon-map"></span></div>
                        <span class="text">VILLAGE BHANO CHAK P/O WAGHA TEHSIL SHALIMAR CANTT LAHORE</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon bg-secondary mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <span class="text">info@aghslahore.pk</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon bg-tertiary mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">0321-4960275, 0321-4969849, 042-37172500</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light ftco_navbar ftco-navbar-light" id="ftco-navbar">
    <div class="container-fluid d-flex align-items-center">
        <div class="icon"><img src="{{asset('web_assets/images/logo_header.png')}}" alt="" width="90px" height="80px"></div>
        <a class="navbar-brand d-block d-sm-none" href="#">AL-FALAH GRAMMAR</a>
        <a class="navbar-brand d-none d-sm-block" href="#">AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{route('home')}}" class="nav-link pl-0">Home</a></li>
                <li class="nav-item "><a href="{{route('notice')}}" class="nav-link pl-0">Notification</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="onlineVerificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Online Verification
                    </a>
                    <div class="dropdown-menu" aria-labelledby="onlineVerificationDropdown">
                        <a class="dropdown-item" href="{{route('roll_no')}}">Get Roll No Slip</a>
                        <a class="dropdown-item" href="{{route('result')}}">Result Announcement</a>
                        <a class="dropdown-item" href="{{route('courses')}}">Short Courses</a>
                    </div>
                </li>
                <li class="nav-item"><a href="{{route('about')}}" class="nav-link">About Us</a></li>
                <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact Us</a></li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item"><a href="{{ url('/admin/dashboard') }}" class="nav-link">Dashboard</a></li>
                    @else
                        <li class="nav-item"> <a href="{{ route('login') }}" class="nav-link">Log in</a></li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
