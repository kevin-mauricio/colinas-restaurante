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
                  <li><a href="#gallery">Gallery</a></li>
                  <li class="dropdown"><a href="#"><span>Drop Down</span> <i
                              class="bi bi-chevron-down dropdown-indicator"></i></a>
                      <ul>
                          <li><a href="#">Drop Down 1</a></li>
                          <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                      class="bi bi-chevron-down dropdown-indicator"></i></a>
                              <ul>
                                  <li><a href="#">Deep Drop Down 1</a></li>
                                  <li><a href="#">Deep Drop Down 2</a></li>
                                  <li><a href="#">Deep Drop Down 3</a></li>
                                  <li><a href="#">Deep Drop Down 4</a></li>
                                  <li><a href="#">Deep Drop Down 5</a></li>
                              </ul>
                          </li>
                          <li><a href="#">Drop Down 2</a></li>
                          <li><a href="#">Drop Down 3</a></li>
                          <li><a href="#">Drop Down 4</a></li>
                      </ul>
                  </li>
                  <li><a href="#contact">Contact</a></li>
              </ul>
          </nav><!-- .navbar -->

          <a class="btn-book-a-table" href="#book-a-table">Book a Table</a>
          <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
          <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      </div>
  </header><!-- End Header -->
