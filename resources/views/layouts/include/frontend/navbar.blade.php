<header class="site-navbar py-1 js-sticky-header site-navbar-target" role="banner">

    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <div class="site-logo">
                <a href="/" class="d-block">
                    MIST Ltd.
                </a>
            </div>
            <div class="mr-auto">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li class="active">
                            <a href="{{ url('/') }}" class="nav-link text-left">Home</a>
                        </li>
                        <li>
                            <a href="{{ url('/about') }}" class="nav-link text-left">About Us</a>
                        </li>
                        <li class="has-children">
                            <a style="pointer:none" href="#" class="nav-link  text-left">Administration</a>
                            <ul class="dropdown">
                                <li><a href="{{ url('/bod') }}">BOD</a></li>
                                <li><a href="{{ url('/management') }}">Management</a></li>

                            </ul>
                        </li>

                        <li>
                            <a href="{{ url('/admission') }}" class="nav-link text-left">Admissions</a>
                        </li>
                        <li class="has-children">
                            <a href="#" class="nav-link text-left">Academic</a>
                            <ul class="dropdown">
                                <li><a href="{{ url('/notice') }}">Academic Notice</a></li>
                                <li><a href="{{ url('/calendar') }}">Academic Calender</a></li>
                                <li><a href="{{ url('/') }}">Syllabus</a></li>
                                <li><a href="{{ url('/') }}">Teachers Info</a></li>
                                <li><a href="{{ url('/') }}">Students Info</a></li>
                                <li><a href="{{ url('/') }}">Innovation</a></li>
                                <li><a href="{{ url('/gallery') }}">Academic Gallery</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('/courses') }}" class="nav-link text-left">Courses</a>
                        </li>
                        {{-- <li>
                            <a href="{{ url('/') }}" class="nav-link text-left">Department</a>
                        </li> --}}
                        <li>
                            <a href="{{ url('/contact') }}" class="nav-link text-left">Contact</a>
                        </li>
                        <li>
                            <a href="{{ url('/notice') }}" class="nav-link text-left">Notice</a>
                        </li>

                    </ul>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
