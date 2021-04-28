<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ url('/frontend/public/assets/img/favicons/logo-semangat-koding.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ url('/frontend/public/assets/img/favicons/logo-semangat-koding.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/frontend/public/assets/img/favicons/logo-semangat-koding.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ url('/frontend/public/assets/img/favicons/logo-semangat-koding.png') }}">
  <link rel="manifest" href="assets/img/favicons/manifest.json">
  <meta name="msapplication-TileImage" content="{{ url('/frontend/public/assets/img/favicons/logo-semangat-koding.png') }}">
  <meta name="theme-color" content="#ffffff">
  <title>Semangat Koding | membangun indonesia</title>
  @livewireStyles
  @include('includes.app.style')
  <style>
    .course-overview::-webkit-scrollbar {
        display: none;
    }

    .course-overview {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }
    </style>
</head>

<body>
  <main class="main" id="top">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 backdrop"
      data-navbar-on-scroll="data-navbar-on-scroll">
      <div class="container"><a class="navbar-brand d-flex align-items-center fw-bolder fs-2 fst-italic" href="{{ url('/') }}">
          <div class="text-info">Semangat</div>
          <div class="text-warning">Koding</div>
        </a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto pt-2 pt-lg-0">
            <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="page" href="{{ url('/') }}">Home</a></li>
            <li class="nav-item px-2"><a class="nav-link fw-medium" href="{{ url('/class') }}">Class</a></li>
          </ul>
          @guest
            <a href="{{ url('/login') }}" class="btn btn-lg btn-info rounded-pill bg-gradient order-0" type="submit">Masuk</a>&nbsp;
            <a href="{{ url('/register') }}" class="btn btn-lg btn-warning rounded-pill bg-gradient order-0" type="submit">Daftar</a>
          @endguest
          @auth
            <a href="{{ url('/dashboard') }}" class="btn btn-lg btn-info rounded-pill bg-gradient order-0" type="submit">dashboard</a>&nbsp;
          @endauth
        </div>
      </div>
    </nav>

    <section class="py-0" id="home">
        {{ $slot }}
    </section> 

    <!-- footer -->
    <section class="py-0 bg-primary-gradient">
      <div class="bg-holder"
        style="background-image:url({{url("/frontend/public/assets/img/illustrations/footer-bg.png")}});background-position:center;background-size:cover;">
      </div>
      <!--/.bg-holder-->

      <div class="container">
        <div class="row flex-center py-8">
          <div class="col-lg-6 mb-4 text-center">
            <h1 class="text-white">Get started now</h1>
          </div>
          <div class="col-lg-6 d-flex justify-content-lg-end justify-content-center">
          </div>
        </div>
        <div class="row justify-content-lg-between">
          <div class="col-6 col-sm-4 col-lg-auto mb-3">
            <h5 class="mb-5 text-white">CATEGORIES </h5>
            <ul class="list-unstyled mb-md-4 mb-lg-0">
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">IOS Developers</a></li>
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">Front-End Developers</a></li>
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">UX Designers</a></li>
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">UI Designers</a></li>
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">Content Writer</a></li>
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">Program &amp; Tech</a></li>
            </ul>
          </div>
          <div class="col-6 col-sm-4 col-lg-auto mb-3">
            <h5 class="mb-5 text-white">COMMUNITY </h5>
            <ul class="list-unstyled mb-md-4 mb-lg-0">
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">Events</a></li>
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">Blog</a></li>
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">Forum</a></li>
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">Podcast</a></li>
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">Affiliates</a></li>
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">Invite a Friend</a></li>
            </ul>
          </div>
          <div class="col-6 col-sm-4 col-lg-auto mb-3">
            <h5 class="mb-5 text-white">ABOUT </h5>
            <ul class="list-unstyled mb-md-4 mb-lg-0">
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">About Us</a></li>
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">Partnerships</a></li>
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">Finance Experts</a></li>
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">Project Management</a></li>
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">Product Manager</a></li>
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">The Team</a></li>
            </ul>
          </div>
          <div class="col-6 col-sm-4 col-lg-auto mb-3">
            <h5 class="mb-5 text-white">CONTACT </h5>
            <ul class="list-unstyled mb-md-4 mb-lg-0">
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">Contact Us</a></li>
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">Press Center</a></li>
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">Careers</a></li>
              <li class="mb-3"><a class="text-light text-decoration-none" href="#!">FAQ</a></li>
            </ul>
          </div>
        </div>
        <div class="row flex-center">
          <div class="col-auto my-4">
            <ul class="list-unstyled list-inline">
              <li class="list-inline-item me-3"><a href="#!">
                  <svg class="bi bi-twitter" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#1F3A63"
                    viewBox="0 0 16 16">
                    <path
                      d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z">
                    </path>
                  </svg></a></li>
              <li class="list-inline-item me-3"><a class="text-decoration-none" href="#!">
                  <svg class="bi bi-facebook" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#1F3A63"
                    viewBox="0 0 16 16">
                    <path
                      d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                    </path>
                  </svg></a></li>
              <li class="list-inline-item me-3"><a href="#!">
                  <svg class="bi bi-instagram" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#1F3A63"
                    viewBox="0 0 16 16">
                    <path
                      d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                    </path>
                  </svg></a></li>
            </ul>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-auto mb-2">
            <p class="mb-0 fs--1 text-white my-2 text-center">&copy; semangat koding &nbsp; 2021
            </p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->
@include('includes.app.script')
@livewireScripts
</body>

</html>