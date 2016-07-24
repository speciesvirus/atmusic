<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link rel="stylesheet" type="text/css" href="{{ asset("components/css/reset.css") }}">
        <link rel="stylesheet" type="text/css" href="{{ asset("components/font-awesome/css/font-awesome.min.css") }}">
        <link rel="stylesheet" type="text/css" href="{{ asset("components/bootstrap/dist/css/bootstrap.min.css") }}">
        <link rel="stylesheet" type="text/css" href="{{ asset("components/css/default.css") }}">

        <script src="{{ asset("components/jquery/dist/jquery.min.js") }}"></script>
        <script src="{{ asset("components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
        <script src="{{ asset("components/js/script.js") }}"></script>

    </head>
    <body>

        <header>

            <div class="site-branding">
                <a href="http://www.workwithsmart.com/" rel="home"><img src="http://www.workwithsmart.com/wp-content/themes/smartcreative-theme/images/smartcreative.png" alt="SmartCreative"></a>
            </div>

            <div class='nav'>
                <ul>
                    <li>
                        <a href='#facebook'>
                            <div class='fa fa-facebook'></div>

                        </a>
                    </li>
                    <li>
                        <a href='#contact'>
                            <div class='fa fa-envelope'></div>

                        </a>
                    </li>
                    {{--<li>--}}
                        {{--<a href='#blog'>Contact us</a>--}}
                    {{--</li>--}}
                    <li>
                        <a href='#contact'>
                            {{--<div class='fa fa-envelope'></div>--}}
                            Login
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="#">recommend</a></li>
                    <li><a href="#">top hit</a></li>
                    <li><a href="#">Subscriptions</a></li>
                    <li><a href="#">My List</a></li>
                </ul>
            </div>

        </header>
        <div class="container">

        </div>
    </body>
</html>



