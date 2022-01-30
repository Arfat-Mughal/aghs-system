<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo justify-content-center">
        <a href="#" >
            <img src="{{asset('admin_assets/images/logo_header.png')}}" alt="Cool Admin"  height="64px" width="200px"/>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="{{route('panel')}}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{route('students')}}">
                        <i class="fas fa-copy"></i>Students</a>
                </li>
                <li>
                    <a href="{{route('results')}}">
                        <i class="fas fa-chart-bar"></i>Results</a>
                </li>
                <li>
                    <a href="{{route('slips')}}">
                        <i class="fas fa-table"></i>Roll No Slip's</a>
                </li>
                <li>
                    <a href="{{route('certificates')}}">
                        <i class="fas fa-trophy"></i>Certificates</a>
                </li>
                <li>
                    <a href="{{route('notifications')}}">
                        <i class="fas fa-flag"></i>Notifications</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
