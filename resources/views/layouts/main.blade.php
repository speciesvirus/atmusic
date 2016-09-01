<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{--<meta name="google-site-verification" content="VISjwlrj-JBTlfdSHyJQu2bqklIV618wZO1_75BPC0w" />--}}
    {{--<meta name="author" content="Awecent Co. Ltd., Thailand" />--}}
    {{--<meta name="keywords" content="เกมส์ , เกมส์ออนไลน์ , Game Online , เกมส์มือถือ , ข่าวเกมส์ออนไลน์" />--}}
    {{--<meta name="description" content="playing the game." />--}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--<meta property="fb:app_id" content="500822303376396">--}}
    <meta property="og:url"    content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
    <meta property="fb:app_id" content="950643235062155">
    @yield('meta')

    <link rel="stylesheet" type="text/css" href="{{ asset("components/jquery-ui/themes/base/jquery-ui.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("components/css/reset.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("components/bootstrap/dist/css/bootstrap.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("components/font-awesome/css/font-awesome.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("components/css/default.css") }}">

    <script src="{{ asset("components/jquery/dist/jquery.min.js") }}"></script>
    <script src="{{ asset("components/jquery-ui/jquery-ui.min.js") }}"></script>
    <script src="{{ asset("components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("components/js/snap.svg-min.js") }}"></script>
    <script src="{{ asset("components/sly/dist/sly.min.js") }}"></script>
    <script src="{{ asset("components/js/script.js") }}"></script>

    @yield('source')

</head>
<body>

<header>

    <div class="site-branding">
        <a href="{{ url('/') }}" rel="home">
            <img src="{{ asset('components/images/unbok.png') }}" alt="unbok">

        </a>
    </div>

    <div class="search">
        <form id="search" method="get">
            <ul>
                <li>
                    <div class="input-search">
                        <input type="search" placeholder="Search" value="{{ session('search') }}">
                    </div>
                </li>
                <li>
                    <a href='javascript://' id="search-btn">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </form>
    </div>

    <div class='nav'>
        <ul>
            <li>
                <a href='#facebook'>
                    <div class='fa fa-facebook'></div>

                </a>
            </li>
            <li>
                <a href='{{ url('contact') }}'>
                    <div class='fa fa-envelope'></div>
                </a>
            </li>
            {{--<li>--}}
            {{--<a href='#blog'>Contact us</a>--}}
            {{--</li>--}}
            <li>

                @if( !Auth::guest() )
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>{{ Auth::user()->email == null ? Auth::user()->name : Auth::user()->email }}</b></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                        <img src="{{ Auth::user()->avatar }}" name="aboutme" width="50" height="50" border="0" class="img-circle"></a>
                                        <h5 class="">{{ Auth::user()->name }}</h5>
                                    </center>
                                    <hr>
                                    <center>
                                        <p class="text-left"><strong><a href="{{ route('profile') }}">Profile</a></strong></p>
                                        <p class="text-left"><strong><a href="{{ route('account') }}">Account</a></strong></p>
                                    </center>
                                </div>
                                <div class="bottom text-center">
                                    <a href="{{ url('logout') }}"><b>Log Out</b></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                @else
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    Login via
                                    <div class="social-buttons btn-social">
                                        <a href="{{ asset('redirect/facebook') }}" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                        <a href="{{ asset('redirect/google') }}" class="btn btn-google"><i class="fa fa-google"></i> Google</a>
                                    </div>
                                    or
                                    <form class="form" role="form" method="post" action="{{ route('account.signin') }}" accept-charset="UTF-8" id="login-nav">
                                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                            <label class="sr-only" for="email">Email address</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email address" required>
                                            <span class="help-inline">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                            <label class="sr-only" for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                            <span class="help-inline">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                                            <div class="help-block text-right"><a href="{{ url('/password/reset') }}">Forget the password ?</a></div>
                                        </div>
                                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> keep me logged-in
                                            </label>
                                        </div>
                                    </form>
                                </div>
                                <div class="bottom text-center">
                                    New here ? <a href="{{ Route('signup') }}"><b>Join Us</b></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                @endif

            </li>
        </ul>
    </div>


    @include('composers.headerMenu')


</header>

<div class="wrapper">

    @yield('content')

</div>
{{--<div class="container">--}}


<dev class="footer" class="">
    <a href="{{ asset('/') }}">Home</a>
    <a href="{{ route('privacy') }}">Privacy &amp; Cookies</a>
    <a href="{{ route('terms') }}">Term and Conditions</a>
    <a href="{{ route('contact') }}">Contact</a>
</dev>

{{--</div>--}}
</body>


@yield('script')

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-79878986-2', 'auto');
    ga('send', 'pageview');

</script>

</html>


