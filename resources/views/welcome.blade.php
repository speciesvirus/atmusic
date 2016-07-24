<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link rel="stylesheet" type="text/css" href="{{ asset("components/jquery-ui/themes/base/jquery-ui.css") }}">
        <link rel="stylesheet" type="text/css" href="{{ asset("components/css/reset.css") }}">
        <link rel="stylesheet" type="text/css" href="{{ asset("components/bootstrap/dist/css/bootstrap.min.css") }}">
        <link rel="stylesheet" type="text/css" href="{{ asset("components/font-awesome/css/font-awesome.min.css") }}">

        <link rel="stylesheet" type="text/css" href="{{ asset("components/css/default.css") }}">

        <script src="{{ asset("components/jquery/dist/jquery.min.js") }}"></script>
        <script src="{{ asset("components/jquery-ui/jquery-ui.min.js") }}"></script>
        <script src="{{ asset("components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
        <script src="{{ asset("components/js/script.js") }}"></script>

    </head>
    <body>

        <header>

            <div class="site-branding">
                <a href="http://www.workwithsmart.com/" rel="home"><img src="http://www.workwithsmart.com/wp-content/themes/smartcreative-theme/images/smartcreative.png" alt="SmartCreative"></a>
            </div>

            <div class="search">
                <form id="search">
                    <ul>
                        <li>
                            <a href='#contact'>
                                <input type="search" placeholder="Search">
                            </a>
                        </li>
                        <li>
                            <a href='#search'>
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
                    <li><a href="#">My List</a>
                    <span class="menu-dropdown"> <a class="dropdown-item" href="/nieuws/q-beach-live-josie-blaast-de-wolken-aan-het-q-beach-house-weg-1">
                            <img sizes="213px" srcset="https://i.ytimg.com/vi/R10mrTJpqPw/hqdefault.jpg?custom=true&w=196&h=110&stc=true&jpg444=true&jpgq=90&sp=68&sigh=I4T92Vc8kyuXwphhmHCgYMT-kmg" alt="Hoofd">
                            <div class="title">Q-Beach Live: Josie blaast de wolken hier weg!</div>
                        </a>
<a class="dropdown-item" href="/nieuws/q-beach-live-rune-kaapte-vandaag-onze-boot">
    <img sizes="213px" srcset="http://static1.q-music.vmmacdn.be/site/w480/5/c0/3a/5b/1336993/Hoofdfoto.jpg 480w,http://static1.q-music.vmmacdn.be/site/w800/5/c0/3a/5b/1336993/Hoofdfoto.jpg 800w,http://static1.q-music.vmmacdn.be/site/w1200/5/c0/3a/5b/1336993/Hoofdfoto.jpg 1200w,http://static1.q-music.vmmacdn.be/site/w2400/5/c0/3a/5b/1336993/Hoofdfoto.jpg 2400w" src="http://static1.q-music.vmmacdn.be/5/c0/3a/5b/1336993/Hoofdfoto.jpg" alt="Hoofdfoto">
    <div class="title">Q-Beach Live: Rune kaapte vandaag onze boot!</div>
</a>
<a class="dropdown-item" href="/nieuws/is-het-celine-dion-of-rihanna">
    <img sizes="213px" srcset="http://static1.q-music.vmmacdn.be/site/w480/a/ce/48/63/1336998/la-la-et-mg-celine-dion-brother-dies-20160116-_1_-pagina.jpg 480w,http://static1.q-music.vmmacdn.be/site/w800/a/ce/48/63/1336998/la-la-et-mg-celine-dion-brother-dies-20160116-_1_-pagina.jpg 800w,http://static1.q-music.vmmacdn.be/site/w1200/a/ce/48/63/1336998/la-la-et-mg-celine-dion-brother-dies-20160116-_1_-pagina.jpg 1200w,http://static1.q-music.vmmacdn.be/site/w2400/a/ce/48/63/1336998/la-la-et-mg-celine-dion-brother-dies-20160116-_1_-pagina.jpg 2400w" src="http://static1.q-music.vmmacdn.be/a/ce/48/63/1336998/la-la-et-mg-celine-dion-brother-dies-20160116-_1_-pagina.jpg" alt="La la et mg celine dion brother dies 20160116  1  pagina">
    <div class="title">Is het Céline Dion of Rihanna?</div>
</a>
<a class="dropdown-item" href="/nieuws/troye-sivan-organiseert-heuse-wildhunt-voor-videoclip-wild">
    <img sizes="213px" srcset="http://static1.q-music.vmmacdn.be/site/w480/d/36/66/da/1336974/hoofdfotoTroye.jpg 480w,http://static1.q-music.vmmacdn.be/site/w800/d/36/66/da/1336974/hoofdfotoTroye.jpg 800w,http://static1.q-music.vmmacdn.be/site/w1200/d/36/66/da/1336974/hoofdfotoTroye.jpg 1200w,http://static1.q-music.vmmacdn.be/site/w2400/d/36/66/da/1336974/hoofdfotoTroye.jpg 2400w" src="http://static1.q-music.vmmacdn.be/d/36/66/da/1336974/hoofdfotoTroye.jpg" alt="Hoofdfototroye">
    <div class="title">Troye Sivan organiseert heuse Wildhunt voor videoclip Wild</div>
</a>
<a class="dropdown-item" href="/nieuws/uitgelekt-24-nieuwe-singles-van-justin-bieber-en-major-lazer">
    <img sizes="213px" srcset="http://static1.q-music.vmmacdn.be/site/w480/0/e1/a4/57/1336981/cold_cold_water.jpg 480w,http://static1.q-music.vmmacdn.be/site/w800/0/e1/a4/57/1336981/cold_cold_water.jpg 800w,http://static1.q-music.vmmacdn.be/site/w1200/0/e1/a4/57/1336981/cold_cold_water.jpg 1200w,http://static1.q-music.vmmacdn.be/site/w2400/0/e1/a4/57/1336981/cold_cold_water.jpg 2400w" src="http://static1.q-music.vmmacdn.be/0/e1/a4/57/1336981/cold_cold_water.jpg" alt="Cold cold water">
    <div class="title">UITGELEKT: 24 nieuwe singles van Justin Bieber en Major Lazer</div>
</a>
<a class="dropdown-item" href="/nieuws/major-lazer-x-justin-bieber-x-mo-pure-chemie">
    <img sizes="213px" srcset="http://static1.q-music.vmmacdn.be/site/w480/8/2d/0b/55/1336909/justinbieberhome.jpg 480w,http://static1.q-music.vmmacdn.be/site/w800/8/2d/0b/55/1336909/justinbieberhome.jpg 800w,http://static1.q-music.vmmacdn.be/site/w1200/8/2d/0b/55/1336909/justinbieberhome.jpg 1200w,http://static1.q-music.vmmacdn.be/site/w2400/8/2d/0b/55/1336909/justinbieberhome.jpg 2400w" src="http://static1.q-music.vmmacdn.be/8/2d/0b/55/1336909/justinbieberhome.jpg" alt="Justinbieberhome">
    <div class="title">Major Lazer x Justin Bieber x Mø, pure chemie! </div>
</a>

</span>
                    </li>
                </ul>
            </div>

        </header>
        <div class="container">

        </div>
    </body>
</html>


