<!doctype html>
<html lang="en">

  <head>
    <title>HRIS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('assets/server/img/logo msdhris.png') }}" type="image/x-icon"/>
    
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,700|Oswald:400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('assets/client/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/client/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/client/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/client/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/client/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/client/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ url('assets/client/css/aos.css') }}">
    
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ url('assets/client/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/server/css/atlantis.css') }}">
    @stack('style')
  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    {{-- <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div> --}}

    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>


      <div class="top-bar bg-primary">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <a href="#" class="text-white"><span class="mr-2  icon-envelope-open-o"></span> <span class="d-none d-md-inline-block">{{ isset($data->perusahaan_email) ? $data->perusahaan_email : 'email@domain.com' }}</span></a>
              <span class="mx-md-2 d-inline-block"></span>
              <a href="#" class="text-white"><span class="mr-2  icon-phone"></span> <span class="d-none d-md-inline-block">{{ isset($data->perusahaan_telepon) ? $data->perusahaan_telepon : '021 2343 54xx' }}</span></a>


              <div class="float-right">

                <a href="{{ isset($data->perusahaan_twitter) ? $data->perusahaan_twitter : '#' }}" target="_blank" class="text-white"><span class="mr-2  icon-twitter"></span> <span class="d-none d-md-inline-block">Twitter</span></a>
                <span class="mx-md-2 d-inline-block"></span>
                <a href="{{ isset($data->perusahaan_facebook) ? $data->perusahaan_facebook : '#' }}" target="_blank" class="text-white"><span class="mr-2  icon-facebook"></span> <span class="d-none d-md-inline-block">Facebook</span></a>
                <span class="mx-md-2 d-inline-block"></span>
                <a href="{{ isset($data->perusahaan_instagram) ? $data->perusahaan_instagram : '#' }}" target="_blank" class="text-white"><span class="mr-2  icon-instagram"></span> <span class="d-none d-md-inline-block">Instagram</span></a>

              </div>

            </div>

          </div>

        </div>
      </div>

      <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">


            <div class="site-logo">
              <a href="{{ route('home') }}" class="nav-link {{ request()->segment(1) == '' ? 'active' : '' }}" class="text-black"><span class="text-primary">MSDHRIS</a>
            </div>

            <div class="col-12">
              <nav class="site-navigation text-right ml-auto " role="navigation">

                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li><a href="{{ route('home') }}" class="nav-link {{ request()->segment(1) == '' ? 'active' : '' }}">Home</a></li>
                  <li><a href="#" class="nav-link {{ request()->segment(1) == 'tentang-kami' ? 'active' : '' }}">Tentang Kami</a></li>


                  {{-- <li class="has-children">
                    <a href="#about-section" class="nav-link">About Us</a>
                    <ul class="dropdown arrow-top">
                      <li><a href="#team-section" class="nav-link">Team</a></li>
                      <li><a href="#pricing-section" class="nav-link">Pricing</a></li>
                      <li><a href="#faq-section" class="nav-link">FAQ</a></li>
                      <li class="has-children">
                        <a href="#">More Links</a>
                        <ul class="dropdown">
                          <li><a href="#">Menu One</a></li>
                          <li><a href="#">Menu Two</a></li>
                          <li><a href="#">Menu Three</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li> --}}

                  <li><a href="{{ route('karir') }}" class="nav-link {{ request()->segment(1) == 'karir' ? 'active' : '' }}">Karir</a></li>

                  <li><a href="#" class="nav-link {{ request()->segment(1) == 'galeri' ? 'active' : '' }}">Galeri</a></li>
                  <li><a href="#" class="nav-link" {{ request()->segment(1) == 'hubungi-kami' ? 'active' : '' }}>Hubungi Kami</a></li>
                </ul>
              </nav>

            </div>

            <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>
        </div>

      </header>

      <section style="background-color: #eee;">
        @yield('content')
      </section>


    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-7">
                <h2 class="footer-heading mb-4">About Us</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
              </div>
              <div class="col-md-4 ml-auto">
                <h2 class="footer-heading mb-4">Features</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>

            </div>
          </div>
          <div class="col-md-4 ml-auto">

            <div class="mb-5">
              <h2 class="footer-heading mb-4">Subscribe to Newsletter</h2>
              <form action="#" method="post" class="footer-suscribe-form">
                <div class="input-group mb-3">
                  <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary text-white" type="button" id="button-addon2">Subscribe</button>
                  </div>
                </div>
            </div>


            <h2 class="footer-heading mb-4">Follow Us</h2>
            <a href="#about-section" class="smoothscroll pl-0 pr-3"><span class="icon-facebook"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
            </form>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p class="copyright">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>

    </div>

    <script src="{{ url('assets/client/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('assets/client/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/client/js/bootstrap.min.js') }}"></script>
    @stack('scripts')

    <script src="{{ url('assets/client/js/main.js') }}"></script>
    @if (session()->has('success'))
      <script src="{{ url('assets/server/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
      <script>
        $(function(){
          let content = {
            message: "{{ session('success') }}",
            title: 'Success',
            icon: 'icon-check'
          }
          $.notify(content,{
              type: 'success',
              placement: {
                from: 'top',
                align: 'right'
              },
              time: 1000,
              delay: 2000,
            });
        })
      </script>
    @endif
    @if (session('error'))
      <script src="{{ url('assets/server/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
      <script>
        $(function(){
          let content = {
            message: "{{ session('error') }}",
            title: 'Informasi',
            icon: 'icon-bell'
          }
          $.notify(content,{
              type: 'info',
              placement: {
                from: 'top',
                align: 'right'
              },
              time: 1000,
              delay: 5000,
            });
        })
      </script>
    @endif
  </body>

</html>
