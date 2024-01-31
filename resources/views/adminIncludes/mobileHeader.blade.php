<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="#">
                    <img src="{{ asset('admin_assets/images/logo_header.jpg') }}" alt="AGHS" width="80px"
                        height="80px" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="active has-sub">
                    <a class="js-arrow" href="{{ route('panel') }}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('students') }}">
                        <i class="fas fa-copy"></i>Students</a>
                </li>
                <li>
                    <a href="{{ route('results') }}">
                        <i class="fas fa-chart-bar"></i>Results</a>
                </li>
                <li>
                    <a href="{{ route('slips') }}">
                        <i class="fas fa-table"></i>Roll No Slip's</a>
                </li>
                <li>
                    <a href="{{ route('certificates') }}">
                        <i class="fas fa-trophy"></i>Short Courses</a>
                </li>
                <li>
                    <a href="{{ route('notifications') }}">
                        <i class="fas fa-flag"></i>Notifications</a>
                </li>
                <li>
                    <a href="{{ route('banners') }}">
                        <i class="fas fa-sliders"></i>Banners</a>
                </li>
                <li>
                    <a href="{{ route('fees') }}">
                        <i class="fas fa-calculator"></i>Fees</a>
                </li>
                <li>
                    <a href="{{ route('grades.index') }}">
                        <i class="fas fa-address-card"></i>Classes</a>
                </li>
                <li>
                    <a href="{{ route('notes.index') }}">
                        <i class="fas fa-address-card"></i>Notes</a>
                </li>
                <li>
                    <a href="{{ route('subjects.index') }}">
                        <i class="fas fa-address-card"></i>Subjects</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->
