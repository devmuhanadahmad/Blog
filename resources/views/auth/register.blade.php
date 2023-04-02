


<!DOCTYPE html>
<html class="no-js" lang="en">

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



     <!-- Start Account Register Area -->
     <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <div class="register-form">
                        <div class="title">
                            <h3>No Account? Register</h3>
                            <p>Registration takes less than a minute but gives you full control over your orders.</p>
                        </div>
                        <form class="row" method="post" action="{{ route('register') }}">
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-fn">Name</label>
                                    <x-form.input id="reg-fn" name="name" required />
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-email">E-mail Address</label>
                                    <x-form.input type="email" id="reg-email" name="email" required />
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-pass">Password</label>
                                    <x-form.input type="password" id="reg-pass" name="password" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-pass-confirm">Confirm Password</label>
                                    <x-form.input type="password" id="reg-pass-confirm" name="password_confirmation" required />
                                </div>
                            </div>
                            <div class="button">
                                <button class="btn" type="submit">Register</button>
                            </div>
                            <p class="outer-link">Already have an account? <a href="{{ route('login') }}">Login Now</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Register Area -->

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
