@extends('layouts.main')

@section('title', 'unbok')

@section('facebook-meta')
    <meta property="og:type"          content="article" />
    <meta property="og:title"         content="สัญญาเพิ่มเติมกลุ่มโรคร้ายแรง" />
    <meta property="og:description"   content="เมื่อตรวจพบว่าเป็นโรคร้ายแรงเป็นครั้งแรกในขณะที่ยังมีชีวิตอยู่ การได้รับชดเชยเงินก้อนจะช่วยในการวางแผนการรักษาได้เป็นอย่างมาก อย่าปล่อยให้โรคร้ายแรงทำร้ายคนทั้งบ้าน ให้เอไอเอ เป็นผู้ดูแลคุณและคนที่คุณรัก" />
    {{--<meta property="og:image"         content="{{ asset("components/image/ECIR/ecir_logo.jpg") }}" />--}}
@stop

@section('source')
    <link rel="stylesheet" type="text/css" href="{{ asset("components/css/watch.css") }}">
    <script src="{{ asset("components/js/watch.js") }}"></script>
@stop


@section('content')

    <div class="page-watch" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/hobbit_bg.jpg)">
        <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
        <div class="player-container">
            <div id="player"></div>
        </div>
    </div>

    <div id="audioplayer" class="">
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
                                        0:00
                                    </span>
                        </div>
                        <section id="play-progress-container" class="middle-center-container slider-bars">
                            <div id="video-progress" class="slider-drag" data-min-range="0"> </div>
                        </section>
                    </div>
                </div>

                <div class="time-display">
                    <span class="time-current"> - </span>
                    <span class="time-separator"> / </span>
                    <span class="time-duration"> - </span>
                </div>


            </div>



            <div class="view-controls">

                <div class="options">
                    <div class="tray-button mdl-js-button tray-button--active">
                        <i class="fa fa-volume-up" id="op-volume" aria-hidden="true">

                            <div class="mdl-card op-volume flex vertical mdl-shadow--2dp">

                                <div id="video-volume" class="middle-center-container slider-container">
                                    <section id="vl-container" class="middle-center-container slider-bars">
                                        <div id="vl-progress" class="slider-drag" data-min-range="5"> </div>
                                    </section>
                                </div>
                            </div>

                        </i>
                        <i class="fa fa-random" aria-hidden="true"></i>
                        {{--<i class="material-icons">battery_full</i>--}}
                        <i class="fa fa-cc" aria-hidden="true"></i>
                        <i class="fa fa-television" aria-hidden="true"></i>
                        <i id="op-set" class="fa fa-cog" aria-hidden="true">

                            <div class="mdl-card tray-menu flex vertical mdl-shadow--2dp">

                                <div class="row clickable">
                                    <i class="fa fa-television" aria-hidden="true"></i>
                                </div>
                                <div class="row">
                                    <i class="fa fa-cc" aria-hidden="true"></i>
                                </div>
                                <div class="row clickable">
                                    <i class="fa fa-random" aria-hidden="true"></i>
                                </div>
                                <div class="row final">
                                    <i class="fa fa-volume-up"></i>
                                </div>
                            </div>

                        </i>
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </div>
                </div>



            </div>
        </div>
    </div>

@stop
