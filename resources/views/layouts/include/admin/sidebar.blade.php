<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#home" aria-expanded="false" aria-controls="home">
                <i class=" mdi mdi-houzz-box menu-icon"></i>
                <span class="menu-title">Home</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="home">
                <ul class="nav flex-column sub-menu">
                    <li> <a class="nav-link" href="{{ url('admin/topbars') }}"><i
                                class="mdi mdi-toggle-switch menu-icon"></i>Topbar</a></li>
                    <li> <a class="nav-link" href="{{ url('admin/headers') }}"><i
                                class="mdi mdi-toggle-switch menu-icon"></i>Header</a></li>
                    <li> <a class="nav-link" href="{{ url('admin/message') }}"><i
                                class="mdi mdi-toggle-switch menu-icon"></i>Message</a></li>
                    <li> <a class="nav-link" href="{{ url('admin/why') }}"><i
                                class="mdi mdi-toggle-switch menu-icon"></i>Why MIST</a></li>
                    <li> <a class="nav-link" href="{{ url('admin/abouts') }}"><i
                                class="mdi mdi-toggle-switch menu-icon"></i>About</a></li>
                    <li> <a class="nav-link" href="{{ url('admin/testimonials') }}"><i
                                class="mdi mdi-toggle-switch menu-icon"></i>Testimonials</a></li>
                    <li> <a class="nav-link" href="{{ url('admin/news') }}"><i
                                class="mdi mdi-toggle-switch menu-icon"></i>News</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/slider') }}">
                <i class="mdi mdi-view-carousel menu-icon"></i>
                <span class="menu-title">Home Slider</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/courses') }}">
                <i class="mdi mdi-book-open-variant  menu-icon"></i>
                <span class="menu-title">Courses</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/gallery') }}">
                <i class=" mdi mdi-folder-multiple-image menu-icon"></i>
                <span class="menu-title">gallery</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/bod') }}">
                <i class="mdi mdi-star-circle  menu-icon"></i>
                <span class="menu-title">BOD</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/management') }}">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Management</span>
            </a>
        </li>
    </ul>
</nav>
