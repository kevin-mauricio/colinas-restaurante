  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="container d-flex align-items-center justify-content-between">

          <a href="{{ route('index') }}" class="logo d-flex align-items-center me-auto me-lg-0">
              <!-- Uncomment the line below if you also wish to use an image logo -->
              <!-- <img src="assets/img/logo.png" alt=""> -->
              <h1>Colinas Restaurante<span>.</span></h1>
          </a>

          <nav id="navbar" class="navbar">
              <ul>
                  {{--           @php
              $active = isset($nav_status) ? 'active' : '';
          @endphp --}}
                  <li><a href="{{ route('index') }}" {{-- class="{{$active}} --}}">Home</a></li>
                  <li><a href="{{ route('index_category') }}" {{-- class="{{$active}} --}}">Categories</a></li>
                  <li><a href="{{ route('index_plate') }}" {{-- class="{{$active}} --}}">Menu</a></li>
                  <li><a href="{{ route('index_coupon') }}">Coupons</a></li>
                  <li><a href="{{ route('index_zone') }}">Delivery Zones</a></li>
              </ul>
          </nav><!-- .navbar -->

          <a class="btn-book-a-table" href="{{ route('index_order') }}">Order</a>
          <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
          <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      </div>
  </header><!-- End Header -->
