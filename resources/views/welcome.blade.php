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
        <script src="{{ asset("components/js/snap.svg-min.js") }}"></script>
        <script src="{{ asset("components/sly/dist/sly.min.js") }}"></script>
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
                    <span class="menu-dropdown">

                        			<div class="frame crazy sub-menu-list-item" id="basic">
                                        <ul>
                                            <li>
                                                <a class="dropdown-item" href="/nieuws/q-beach-live-josie-blaast-de-wolken-aan-het-q-beach-house-weg-1">
                                                    <img sizes="213px" srcset="https://i.ytimg.com/vi/R10mrTJpqPw/hqdefault.jpg?custom=true&w=196&h=110&stc=true&jpg444=true&jpgq=90&sp=68&sigh=I4T92Vc8kyuXwphhmHCgYMT-kmg" alt="Hoofd">
                                                    <div class="title">Q-Beach Live: Josie blaast de wolken hier weg!</div>
                                                </a>
                                            </li>
                                            {{--<li>--}}
                                                {{--<a class="dropdown-item" href="/nieuws/q-beach-live-rune-kaapte-vandaag-onze-boot">--}}
                                                    {{--<img sizes="213px" srcset="http://static1.q-music.vmmacdn.be/site/w480/5/c0/3a/5b/1336993/Hoofdfoto.jpg 480w,http://static1.q-music.vmmacdn.be/site/w800/5/c0/3a/5b/1336993/Hoofdfoto.jpg 800w,http://static1.q-music.vmmacdn.be/site/w1200/5/c0/3a/5b/1336993/Hoofdfoto.jpg 1200w,http://static1.q-music.vmmacdn.be/site/w2400/5/c0/3a/5b/1336993/Hoofdfoto.jpg 2400w" src="http://static1.q-music.vmmacdn.be/5/c0/3a/5b/1336993/Hoofdfoto.jpg" alt="Hoofdfoto">--}}
                                                    {{--<div class="title">Q-Beach Live: Rune kaapte vandaag onze boot!</div>--}}
                                                {{--</a>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-item" href="/nieuws/is-het-celine-dion-of-rihanna">--}}
                                                    {{--<img sizes="213px" srcset="http://static1.q-music.vmmacdn.be/site/w480/a/ce/48/63/1336998/la-la-et-mg-celine-dion-brother-dies-20160116-_1_-pagina.jpg 480w,http://static1.q-music.vmmacdn.be/site/w800/a/ce/48/63/1336998/la-la-et-mg-celine-dion-brother-dies-20160116-_1_-pagina.jpg 800w,http://static1.q-music.vmmacdn.be/site/w1200/a/ce/48/63/1336998/la-la-et-mg-celine-dion-brother-dies-20160116-_1_-pagina.jpg 1200w,http://static1.q-music.vmmacdn.be/site/w2400/a/ce/48/63/1336998/la-la-et-mg-celine-dion-brother-dies-20160116-_1_-pagina.jpg 2400w" src="http://static1.q-music.vmmacdn.be/a/ce/48/63/1336998/la-la-et-mg-celine-dion-brother-dies-20160116-_1_-pagina.jpg" alt="La la et mg celine dion brother dies 20160116  1  pagina">--}}
                                                    {{--<div class="title">Is het Céline Dion of Rihanna?</div>--}}
                                                {{--</a>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-item" href="/nieuws/troye-sivan-organiseert-heuse-wildhunt-voor-videoclip-wild">--}}
                                                    {{--<img sizes="213px" srcset="http://static1.q-music.vmmacdn.be/site/w480/d/36/66/da/1336974/hoofdfotoTroye.jpg 480w,http://static1.q-music.vmmacdn.be/site/w800/d/36/66/da/1336974/hoofdfotoTroye.jpg 800w,http://static1.q-music.vmmacdn.be/site/w1200/d/36/66/da/1336974/hoofdfotoTroye.jpg 1200w,http://static1.q-music.vmmacdn.be/site/w2400/d/36/66/da/1336974/hoofdfotoTroye.jpg 2400w" src="http://static1.q-music.vmmacdn.be/d/36/66/da/1336974/hoofdfotoTroye.jpg" alt="Hoofdfototroye">--}}
                                                    {{--<div class="title">Troye Sivan organiseert heuse Wildhunt voor videoclip Wild</div>--}}
                                                {{--</a>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-item" href="/nieuws/uitgelekt-24-nieuwe-singles-van-justin-bieber-en-major-lazer">--}}
                                                    {{--<img sizes="213px" srcset="http://static1.q-music.vmmacdn.be/site/w480/0/e1/a4/57/1336981/cold_cold_water.jpg 480w,http://static1.q-music.vmmacdn.be/site/w800/0/e1/a4/57/1336981/cold_cold_water.jpg 800w,http://static1.q-music.vmmacdn.be/site/w1200/0/e1/a4/57/1336981/cold_cold_water.jpg 1200w,http://static1.q-music.vmmacdn.be/site/w2400/0/e1/a4/57/1336981/cold_cold_water.jpg 2400w" src="http://static1.q-music.vmmacdn.be/0/e1/a4/57/1336981/cold_cold_water.jpg" alt="Cold cold water">--}}
                                                    {{--<div class="title">UITGELEKT: 24 nieuwe singles van Justin Bieber en Major Lazer</div>--}}
                                                {{--</a>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-item" href="/nieuws/major-lazer-x-justin-bieber-x-mo-pure-chemie">--}}
                                                    {{--<img sizes="213px" srcset="http://static1.q-music.vmmacdn.be/site/w480/8/2d/0b/55/1336909/justinbieberhome.jpg 480w,http://static1.q-music.vmmacdn.be/site/w800/8/2d/0b/55/1336909/justinbieberhome.jpg 800w,http://static1.q-music.vmmacdn.be/site/w1200/8/2d/0b/55/1336909/justinbieberhome.jpg 1200w,http://static1.q-music.vmmacdn.be/site/w2400/8/2d/0b/55/1336909/justinbieberhome.jpg 2400w" src="http://static1.q-music.vmmacdn.be/8/2d/0b/55/1336909/justinbieberhome.jpg" alt="Justinbieberhome">--}}
                                                    {{--<div class="title">Major Lazer x Justin Bieber x Mø, pure chemie! </div>--}}
                                                {{--</a>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-item" href="/nieuws/q-beach-live-josie-blaast-de-wolken-aan-het-q-beach-house-weg-1">--}}
                                                    {{--<img sizes="213px" srcset="https://i.ytimg.com/vi/R10mrTJpqPw/hqdefault.jpg?custom=true&w=196&h=110&stc=true&jpg444=true&jpgq=90&sp=68&sigh=I4T92Vc8kyuXwphhmHCgYMT-kmg" alt="Hoofd">--}}
                                                    {{--<div class="title">Q-Beach Live: Josie blaast de wolken hier weg!</div>--}}
                                                {{--</a>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-item" href="/nieuws/q-beach-live-rune-kaapte-vandaag-onze-boot">--}}
                                                    {{--<img sizes="213px" srcset="http://static1.q-music.vmmacdn.be/site/w480/5/c0/3a/5b/1336993/Hoofdfoto.jpg 480w,http://static1.q-music.vmmacdn.be/site/w800/5/c0/3a/5b/1336993/Hoofdfoto.jpg 800w,http://static1.q-music.vmmacdn.be/site/w1200/5/c0/3a/5b/1336993/Hoofdfoto.jpg 1200w,http://static1.q-music.vmmacdn.be/site/w2400/5/c0/3a/5b/1336993/Hoofdfoto.jpg 2400w" src="http://static1.q-music.vmmacdn.be/5/c0/3a/5b/1336993/Hoofdfoto.jpg" alt="Hoofdfoto">--}}
                                                    {{--<div class="title">Q-Beach Live: Rune kaapte vandaag onze boot!</div>--}}
                                                {{--</a>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-item" href="/nieuws/is-het-celine-dion-of-rihanna">--}}
                                                    {{--<img sizes="213px" srcset="http://static1.q-music.vmmacdn.be/site/w480/a/ce/48/63/1336998/la-la-et-mg-celine-dion-brother-dies-20160116-_1_-pagina.jpg 480w,http://static1.q-music.vmmacdn.be/site/w800/a/ce/48/63/1336998/la-la-et-mg-celine-dion-brother-dies-20160116-_1_-pagina.jpg 800w,http://static1.q-music.vmmacdn.be/site/w1200/a/ce/48/63/1336998/la-la-et-mg-celine-dion-brother-dies-20160116-_1_-pagina.jpg 1200w,http://static1.q-music.vmmacdn.be/site/w2400/a/ce/48/63/1336998/la-la-et-mg-celine-dion-brother-dies-20160116-_1_-pagina.jpg 2400w" src="http://static1.q-music.vmmacdn.be/a/ce/48/63/1336998/la-la-et-mg-celine-dion-brother-dies-20160116-_1_-pagina.jpg" alt="La la et mg celine dion brother dies 20160116  1  pagina">--}}
                                                    {{--<div class="title">Is het Céline Dion of Rihanna?</div>--}}
                                                {{--</a>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-item" href="/nieuws/troye-sivan-organiseert-heuse-wildhunt-voor-videoclip-wild">--}}
                                                    {{--<img sizes="213px" srcset="http://static1.q-music.vmmacdn.be/site/w480/d/36/66/da/1336974/hoofdfotoTroye.jpg 480w,http://static1.q-music.vmmacdn.be/site/w800/d/36/66/da/1336974/hoofdfotoTroye.jpg 800w,http://static1.q-music.vmmacdn.be/site/w1200/d/36/66/da/1336974/hoofdfotoTroye.jpg 1200w,http://static1.q-music.vmmacdn.be/site/w2400/d/36/66/da/1336974/hoofdfotoTroye.jpg 2400w" src="http://static1.q-music.vmmacdn.be/d/36/66/da/1336974/hoofdfotoTroye.jpg" alt="Hoofdfototroye">--}}
                                                    {{--<div class="title">Troye Sivan organiseert heuse Wildhunt voor videoclip Wild</div>--}}
                                                {{--</a>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-item" href="/nieuws/uitgelekt-24-nieuwe-singles-van-justin-bieber-en-major-lazer">--}}
                                                    {{--<img sizes="213px" srcset="http://static1.q-music.vmmacdn.be/site/w480/0/e1/a4/57/1336981/cold_cold_water.jpg 480w,http://static1.q-music.vmmacdn.be/site/w800/0/e1/a4/57/1336981/cold_cold_water.jpg 800w,http://static1.q-music.vmmacdn.be/site/w1200/0/e1/a4/57/1336981/cold_cold_water.jpg 1200w,http://static1.q-music.vmmacdn.be/site/w2400/0/e1/a4/57/1336981/cold_cold_water.jpg 2400w" src="http://static1.q-music.vmmacdn.be/0/e1/a4/57/1336981/cold_cold_water.jpg" alt="Cold cold water">--}}
                                                    {{--<div class="title">UITGELEKT: 24 nieuwe singles van Justin Bieber en Major Lazer</div>--}}
                                                {{--</a>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-item" href="/nieuws/major-lazer-x-justin-bieber-x-mo-pure-chemie">--}}
                                                    {{--<img sizes="213px" srcset="http://static1.q-music.vmmacdn.be/site/w480/8/2d/0b/55/1336909/justinbieberhome.jpg 480w,http://static1.q-music.vmmacdn.be/site/w800/8/2d/0b/55/1336909/justinbieberhome.jpg 800w,http://static1.q-music.vmmacdn.be/site/w1200/8/2d/0b/55/1336909/justinbieberhome.jpg 1200w,http://static1.q-music.vmmacdn.be/site/w2400/8/2d/0b/55/1336909/justinbieberhome.jpg 2400w" src="http://static1.q-music.vmmacdn.be/8/2d/0b/55/1336909/justinbieberhome.jpg" alt="Justinbieberhome">--}}
                                                    {{--<div class="title">Major Lazer x Justin Bieber x Mø, pure chemie! </div>--}}
                                                {{--</a>--}}
                                            {{--</li>--}}





                                        </ul>



                                    </div>



</span>
                    </li>
                </ul>
            </div>

        </header>

        <div class="wrapper">
            <ul id="navmenu" class="side-menu -left -active shadow-z-2">

                <li class="section"><span>Hosts</span></li>
                <li class="option">
                    <a href="#null" class="-active">
                        <i class="icon mdi-action-view-quilt"></i>Overview
                    </a>
                    <a href="#null" class="helptoggle">
                        <i class="icon mdi-action-help"></i>
                    </a>
                </li>
                <li class="option">
                    <a href="#null">
                        <i class="icon mdi-hardware-memory"></i>CPU/Memory
                    </a>
                    <a href="#null" class="helptoggle">
                        <i class="icon mdi-action-help"></i>
                    </a>
                </li>
                <li class="option">
                    <a href="#null">
                        <i class="icon mdi-action-query-builder"></i>Requests Time Breakdown
                    </a>
                    <a href="#null" class="helptoggle">
                        <i class="icon mdi-action-help"></i>
                    </a>
                </li>
                <li class="option">
                    <a href="#null">
                        <i class="icon mdi-action-language"></i>Network
                    </a>
                    <a href="#null" class="helptoggle">
                        <i class="icon mdi-action-help"></i>
                    </a>
                </li>
                <li class="option">
                    <a href="#null">
                        <i class="icon mdi-action-swap-vert-circle"></i>File I/O
                    </a>
                    <a href="#null" class="helptoggle">
                        <i class="icon mdi-action-help"></i>
                    </a>
                </li>
                <li class="option">
                    <a href="#null">
                        <i class="icon mdi-action-get-app"></i>Requests
                    </a>
                    <a href="#null" class="helptoggle">
                        <i class="icon mdi-action-help"></i>
                    </a>
                </li>
                <li class="option">
                    <a href="#null">
                        <i class="icon mdi-device-brightness-high"></i>Forecast
                    </a>
                    <a href="#null" class="helptoggle">
                        <i class="icon mdi-action-help"></i>
                    </a>
                </li>
                <li class="section"><span>AWS Services</span></li>
                <li class="option">
                    <a href="#null"><img src="http://emisferosud.it/share/aws-ec2.svg" class="icon">EC2 Instances</a>
                    <a href="#null" class="helptoggle">
                        <i class="icon mdi-action-help"></i>
                    </a>
                </li>
                <li class="option">
                    <a href="#null"><img src="http://emisferosud.it/share/aws-rds.svg" class="icon">RDS Instances</a>
                    <a href="#null" class="helptoggle">
                        <i class="icon mdi-action-help"></i>
                    </a>
                </li>
                <li class="option">
                    <a href="#null"><img src="http://emisferosud.it/share/aws-elb.svg" class="icon">ELB Instances</a>
                    <a href="#null" class="helptoggle">
                        <i class="icon mdi-action-help"></i>
                    </a>
                </li>
            </ul>

            <div class="content">

                <div class="page-content">
                    <ul>
                        <li>
                            <div class="clash-card archer">
                                <div class="clash-card__image clash-card__image--archer">
                                    <img src="https://i.ytimg.com/vi/WvsDpFFC2Js/hqdefault.jpg?custom=true&w=320&h=180&stc=true&jpg444=true&jpgq=90&sp=68&sigh=m7iqIgc6LqvyU7ZQ-dX1798m8Aw" alt="archer" style="display: block;">
                                </div>
                                <div class="c_info">
                                    <span id="c_stars" data-star="3.5"><span style="width: 42px;"></span></span>
                                    <div class="c_num">3.5</div>
                                </div>

                                <div class="clash-card__unit-description">
                                    <div class="clash-card__level">ปริศนาฟ้าแลบ วันที่ 22 กรกฎาคม 2559 ตอนที่ 4</div>
                                    <p class="c_industry">Digital Media</p>
                                    <p class="c_industry">91,843 views 3 days ago</p>
                                </div>

                                <div class="clash-card__unit-stats clearfix">
                                    <a href="https://www.facebook.com/designcouch" target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="https://www.twitter.com/designcouch" target="_blank">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                    <a href="https://www.dribbble.com/designcouch" target="_blank">
                                        <i class="fa fa-plus-circle"></i>
                                    </a>
                                    <a href="https://www.codepen.io/designcouch/public">
                                        <i class="fa fa-clock-o"></i>
                                    </a>

                                    <a href="javascript://" class="more-info">
                                        <i class="fa fa-user"></i>
                                    </a>

                                </div>

                            </div>
                        </li>
                    </ul>
                </div>

            </div>


            <div id="audioplayer">
                <div class="cover" data-role="maximize">
                    <img src="https://i.ytimg.com/vi/WvsDpFFC2Js/hqdefault.jpg?custom=true&w=320&h=180&stc=true&jpg444=true&jpgq=90&sp=68&sigh=m7iqIgc6LqvyU7ZQ-dX1798m8Aw" data-cover-placeholder="http://qmusic.be/assets/cover-placeholder-41a46459e9a76d48e9a780de6a8c6b54614c2a52564a63fe33667a5e44e3198c.png">
                </div>
                <div class="player-bar">
                    {{--<div class="player-bar-background" style="background-image:url(http://qmusic.be/assets/player-bar-beach-a6ca0cf24da263404a81dbc5413da07b0d42a662f41a0d4ab3426b807995986e.png)"></div>--}}

                    <div class="current-track">
                        <span class="title">ปริศนาฟ้าแลบ วันที่ 22 กรกฎาคม 2559 ตอนที่ 4<br>
                            <span class="artist">Digital Media</span>
                        </span>

                    </div>

                    <div class="play-console">
                        <div class="back">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 306 306" xml:space="preserve">
                                <g>
                                    <g id="skip-previous">
                                        <rect width="51" height="306" ></rect>
                                        <polygon points="89.25,153 306,306 306,0"></polygon>
                                    </g>
                                </g>
                            </svg>
                        </div>


                        <div class="play-button">
                            <svg id="svg-play" viewBox="0 0 36 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" data-pause="M11,10 L17,10 17,26 11,26 M20,10 L26,10 26,26 20,26" data-play="M 11 10 L 18 13.74 L 18 22.28 L 11 26 M 18 13.74 L 26 18 L 26 18 L 18 22.28">
                                <path id="ytp-2" d="M 11 10 L 18 13.74 L 18 22.28 L 11 26 M 18 13.74 L 26 18 L 26 18 L 18 22.28">
                                </path>
                            </svg>
                        </div>


                        <div class="forward">
                            <!--?xml version="1.0" encoding="iso-8859-1"?-->
                            <!-- Generator: Adobe Illustrator 16.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->

                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 306 306" style="enable-background:new 0 0 306 306;" xml:space="preserve">
                                <g>
                                    <g id="skip-next">
                                        <path d="M0,306l216.75-153L0,0V306z M255,0v306h51V0H255z"></path>
                                    </g>
                                </g>
                            </svg>
                        </div>


                        <div class="play-progress-bar">
                            <div id="slider_container" class="middle-center-container slider-container">
                                <div id="slider_tooltip" class="slider-tooltip">
                                    <span id="slider_value">
                                        Drag me
                                    </span>
                                </div>
                                <section id="slider_bars" class="middle-center-container slider-bars">
                                    <div id="slider_drag" class="slider-drag" data-min-range="0"> </div>

                                </section>
                            </div>
                        </div>


                    </div>



                    <div class="view-controls">
                        <a href="#" data-role="toggle-playing" class="icon-button mobile play">
                            <span class="icon qi-arrow-right"></span>
                        </a>
                        <a href="/live/kijk" data-role="visualradio" class="icon-button mobile">
                            <span class="icon qi-tv"></span>
                        </a>
            <span href="#" class="icon-button station-select">
            <span class="icon qi-gear"></span>
            <span class="icon-text under">Station</span>
            <span class="station-list">
            <span class="option" data-role="change-station" data-station-id="qmusic">
            Qmusic
            </span>
            <span class="option" data-role="change-station" data-station-id="foute_radio_be">
            De Foute Radio
            </span>
            <span class="option" data-role="change-station" data-station-id="qsummer">
            Q Summer
            </span>
            </span>
            </span>
                        <a href="/playlist/qmusic" data-role="playlist" class="icon-button desktop">
                            <span class="icon qi-list-button"></span>
                            <span class="icon-text under">Playlist</span>
                        </a>
                        <a href="/berichten" data-role="messages" class="icon-button desktop">
                            <span class="icon qi-mail-button"></span>
                            <span class="icon-text under">Berichten</span>
                        </a>
                        <a href="/live/kijk" data-role="visualradio" class="icon-button desktop">
                            <span class="icon qi-tv-button"></span>
                            <span class="icon-text under">Kijk</span>
                        </a>
<span href="#" data-role="volume" class="icon-button desktop volume-control">
<span class="icon qi-settings-sliders"></span>
<span class="icon-text under">Volume</span>
<div class="volume-wrap"><div id="player-volume-control" data-min="0" data-max="1" class="noUi-target noUi-rtl noUi-vertical noUi-background"><div class="noUi-base"><div class="noUi-origin" style="top: 10%;"><div class="noUi-handle noUi-handle-upper"></div></div></div></div></div>
</span>
                        <a href="#" data-role="maximize" class="icon-button desktop maximize">
                            <span class="icon qi-maximize"></span>
                            <span class="icon-text under">Maximize</span>
                        </a>
                        <a href="#" data-role="minimize" class="icon-button minimize">
                            <span class="icon qi-minimize"></span>
                            <span class="icon-text under">Minimize</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        {{--<div class="container">--}}

        {{--</div>--}}
    </body>
</html>


