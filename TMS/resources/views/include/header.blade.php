

<header class="p-3 bg-dark text-white">
  
  <div class="container">
    
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <div class="col-md-3 mb-2 mb-md-0">
        <span class="fs-4">{{config('app.name')}}</span>
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
          <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>
      </div>
      @auth
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="{{route('userHome')}}" class="nav-link px-2 text-white">Home</a></li>
        <li><a href="{{route('userBooking')}}" class="nav-link px-2 text-white">Booking</a></li>
        <li><a href="{{route('userTracking')}}" class="nav-link px-2 text-white">Tracking orders</a></li>
        <li><a href="{{route('userHistory')}}" class="nav-link px-2 text-white">Order history</a></li>
      </ul>
      @else
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="{{route('home')}}" class="nav-link px-2 text-secondary">Home</a></li>
        <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
        <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
        <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
        <li><a href="#" class="nav-link px-2 text-white">About</a></li>
      </ul>
      @endauth

      <div class="text-end text-white">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          @auth
          <li class="nav-item dropdown">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="{{route('userProfile')}}">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link text-white" href="{{route('login')}}">Login</a>
          </li>
          <li class="nav-item">
              <a class="nav-link text-white" href="{{route('registration')}}">Sign Up</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </div>

  
</header>