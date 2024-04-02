<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="/" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">EasyApply</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/" class="nav-item nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/') ? 'active' : ''; ?>">Home</a>
            <a href="/testimonial" class="nav-item nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/testimonial') ? 'active' : ''; ?>">Testimonial</a>
            <a href="/about" class="nav-item nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/about') ? 'active' : ''; ?>">About</a>
            <a href="/apply" class="nav-item nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/apply') ? 'active' : ''; ?>">Apply Job</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle <?php echo ($_SERVER['REQUEST_URI'] == '/jobs' || $_SERVER['REQUEST_URI'] == '/category') ? 'active' : ''; ?>" data-bs-toggle="dropdown">Jobs</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="/jobs" class="dropdown-item <?php echo ($_SERVER['REQUEST_URI'] == '/jobs') ? 'active' : ''; ?>">Job List</a>
                    <a href="/category" class="dropdown-item <?php echo ($_SERVER['REQUEST_URI'] == '/category') ? 'active' : ''; ?>">Job Category</a>
                </div>
            </div>
            <a href="/contact" class="nav-item nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/contact') ? 'active' : ''; ?>">Contact</a>
            <a href="/signup-type" class="nav-item nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/signup-type') ? 'active' : ''; ?>">Sign Up</a>
            <a href="/contact" class="nav-item nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/login') ? 'active' : ''; ?>">Log in</a>
        </div>
        <a href="/jobs/create" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job<i
                class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
