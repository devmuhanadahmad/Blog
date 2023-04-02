






<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{config('app.name')}}</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('front/assets/images/favicon.svg')}}" />

    <!-- ========================= CSS here ========================= -->
    @stack('css')
    <link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/assets/css/LineIcons.3.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/assets/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/assets/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/assets/css/main.css') }}" />

</head>

<body>



    <!-- End Header Area -->

    <!-- End Breadcrumbs -->
      <!-- Start Account Login Area -->
      <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <form class="card login-form" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="title">
                                <h3>Login Now</h3>
                                <p>You can login using your social media account or email address.</p>
                            </div>
                            <div class="social-login">
                                <div class="row">

                                    <div class="col-lg-12 col-md-12 col-12"><a class="btn google-btn"
                                        href="{{route('auth.socilaite.redirect','google')}}"><i class="lni lni-google"></i> Google login</a>
                                </div>

                                </div>
                            </div>
                            <div class="alt-option">
                                <span>Or</span>
                            </div>
                           <x-flash-message />
                            <div class="form-group input-group">
                                <label for="reg-fn">Email</label>
                                <input class="form-control" type="text" name="email" id="reg-email" required>
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">Password</label>
                                <input class="form-control" type="password" name="password" id="reg-pass" required>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between bottom-content">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" value="1" class="form-check-input width-auto" id="exampleCheck1">
                                    <label class="form-check-label">Remember me</label>
                                </div>
                                {{--
                                    @if (Route::has('password.request'))
                                    <a class="lost-pass" href="{{ route('password.request') }}">Forgot password?</a>
                                    @endif--}}
                            </div>
                            <div class="button">
                                <button class="btn" type="submit">Login</button>
                            </div>
                            @if (Route::has('register'))
                            <p class="outer-link">Don't have an account? <a href="{{ route('register') }}">Register here </a>
                            </p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Login Area -->


    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    @stack('js')
    <script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('front/assets/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/main.js') }}"></script>

    {{-- <script>
        const userId="{{Auth::id()}}";
    </script>
    <script src="{{ URL::asset('js/app.js') }}"></script> --}}
    <script type="text/javascript">
        //========= Hero Slider
        tns({
            container: '.hero-slider',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
        });

        //======== Brand Slider
        tns({
            container: '.brands-logo-carousel',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 5,
                },
                992: {
                    items: 6,
                }
            }
        });
    </script>

</body>

</html>
