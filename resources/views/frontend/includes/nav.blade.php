  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{ url('/') }}">Mentor</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="{{ url('/') }}" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="active" href="{{ url('index') }}">Home</a></li>
          <li><a href="{{ url('about') }}">About</a></li>
          <li><a href="{{ url('contact') }}">Contact</a></li>
          <li><a href="{{ url('testimonial') }}">Testimonial</a></li>
          <li><a href="{{ url('gallery') }}">Gallery</a></li>
          <li><a href="{{ url('blogs') }}">Blogs</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="{{ url('login') }}" class="get-started-btn">Login</a>
      <a href="{{ url('signup') }}" class="get-started-btn">Signup</a>

    </div>
  </header><!-- End Header -->