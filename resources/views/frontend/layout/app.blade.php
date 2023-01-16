<!DOCTYPE html>
<html lang="en">

<head>
    <title>Carbook - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>

<body>


    <!-- Start nav -->
    @include('frontend.layout.includes.navigation')
    <!-- END nav -->

    <div class="hero-wrap ftco-degree-bg" style="background-image: url('{{ asset('frontend/images/bg_1.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
                <div class="col-lg-8 ftco-animate">
                    <div class="text w-100 text-center mb-md-5 pb-md-5">
                        <h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>
                        <p style="font-size: 18px;">A small river named Duden flows by their place and supplies it with
                            the necessary regelialia. It is a paradisematic country, in which roasted parts</p>
                        {{-- <a href="https://vimeo.com/45830194" class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
	            	<div class="icon d-flex align-items-center justify-content-center">
	            		<span class="ion-ios-play"></span>
	            	</div>
	            	<div class="heading-title ml-5">
		            	<span>Easy steps for renting a car</span>
	            	</div>
	            </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')


    {{-- Footer --}}
    @include('frontend.layout.includes.footer')

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>
    {{-- Login Modal --}}odal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="text-center">
                                    <h4>Sign In</h4>
                                    <p>Sign In to your account</p>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail">
                            </div>
                            <div class="col-12">
                                <label for="inputPassword" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="inputPassword">
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" class="form-check-input"
                                        id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember
                                        Me</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 text-right">
                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>
                            <div class="col-12 text-center">
                                <div class="">
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </div>
                            </div>

                            <div class="col-12 text-center">
                                <div class="">
                                    <br>
                                    <span>Don’t have an account? </span><a
                                        href="{{ route('frontend.registerView') }}"
                                        style="font-size: 18px; color:#2874F0">Sign Up Now!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/aos.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('frontend/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('frontend/js/google-map.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>

</body>

</html>
