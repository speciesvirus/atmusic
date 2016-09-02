@extends('layouts.main')

@section('title', $result['title'])

@section('meta')
    <link rel="shortlink" href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
    <meta name="description" content="{{ strlen($result['description']) > 157 ? preg_replace('/\s+/', ' ',trim(mb_substr($result['description'],0,157, 'UTF-8')))."..." : trim($result['description']) }}">
    <meta name="keywords" content="{{ $result['keywords'] }}">

    <meta property="og:type" content="video" />
    <meta property="og:title" content="{{ $result['title'] }}" />
    <meta property="og:url" content="http://iheregame.com/mobile/110-%E3%80%90game-news%E3%80%91battlefield-of-double-tail.html" />
    <meta property="og:site_name" content="unbok" />
    <meta property="og:description" content="{{ strlen($result['description']) > 157 ? preg_replace('/\s+/', ' ',trim(mb_substr($result['description'],0,157, 'UTF-8')))."..." : trim($result['description']) }}" />
    <meta property="article:author" content="{{ $result['channelTitle'] }}" />
    <meta property="article:section" content="player" />
    <meta property="og:image" content="{{ $result['thumbnails'] == '' ? $result['thumbnailsSD'] : $result['thumbnails'] }}" />


    <meta property="og:video:type" content="text/html">
    <meta property="og:video:width" content="1280">
    <meta property="og:video:height" content="720">
    <meta property="og:video:url" content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
    <meta property="og:video:secure_url" content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
    <meta property="og:video:type" content="application/x-shockwave-flash">
    <meta property="og:video:width" content="1280">
    <meta property="og:video:height" content="720">

    @if($result['tags'])
    @foreach($result['tags'] as $tag)
<meta property="og:video:tag" content="{{ $tag }}">
    @endforeach
    @endif


    <meta name="twitter:card" content="player">
    <meta name="twitter:site" content="@youtube">
    <meta name="twitter:url" content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
    <meta name="twitter:title" content="{{ $result['title'] }}">
    <meta name="twitter:description" content="{{ strlen($result['description']) > 157 ? preg_replace('/\s+/', ' ',trim(mb_substr($result['description'],0,157, 'UTF-8')))."..." : trim($result['description']) }}">
    <meta name="twitter:image" content="{{ $result['thumbnails'] == '' ? $result['thumbnailsSD'] : $result['thumbnails'] }}">
    <meta name="twitter:player" content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
    <meta name="twitter:player:width" content="1280">
    <meta name="twitter:player:height" content="720">
@stop

@section('source')
    <link rel="stylesheet" type="text/css" href="{{ asset("components/css/watch.css") }}">
    {{--<script src="{{ asset("components/js/watch.js") }}"></script>--}}
@stop


@section('content')



    <div id="navmenu" class="side-menu -left -active shadow-z-2">

        <p>{{ $result['title'] }}</p>
        <ul class="watch-content">

            <li>
                <strong>view :</strong>
                {{ $result['viewCount'] }}
            </li>
            <li>
                <strong>published on :</strong>
                {{ $result['publishedAt'] }}
            </li>
            <li>
                <strong>channel :</strong>
                {{ $result['channelTitle'] }}
            </li>
            {{--<li>--}}
                {{--<strong  data-toggle="popover" data-content="And here's some amazing content. It's very engaging. Right?">description</strong>--}}
                {{--<pre>{{ $result['description'] }}</pre>--}}
            {{--</li>--}}
            @if(isset($socials))

                <li>
                    <strong>download</strong><br>
                    @php $i = true @endphp
                    @foreach($socials as $social)
                        @if($social->group == 1)
                            <a href="{{ asset('social/v/'.$social->id.'/'.Session::token()) }}" target="_blank" class="icon-button"><img src="{{ asset($social->image) }}"></a>
                            @php $i = false @endphp
                        @endif
                    @endforeach
                    @if($i)
                        -
                    @endif
                    {{--<a href="#" class="icon-button joox"><img src="{{ asset('components/images/download/joox.png') }}"></a>--}}
                    {{--<a href="#" class="icon-button kkbox"><img src="{{ asset('components/images/download/kkbox.png') }}"></a>--}}
                    {{--<a href="#" class="icon-button itunes"><img src="{{ asset('components/images/download/itunes.png') }}"></a>--}}
                </li>
                <li>
                    <strong>socials</strong><br>
                    @php $i = true @endphp
                    @foreach($socials as $social)
                        @if($social->group == 2)
                            <a href="{{ asset('social/v/'.$social->id.'/'.Session::token()) }}" target="_blank" class="icon-button"><img src="{{ asset($social->image) }}"></a>
                            @php $i = false @endphp
                        @endif
                    @endforeach
                    @if($i)
                        -
                    @endif
                    {{--<a href="#" class="icon-button youtube"><i class="fa fa-youtube"></i><span></span></a>--}}
                    {{--<a href="#" class="icon-button pinterest"><i class="fa fa-pinterest"></i><span></span></a>--}}
                </li>
                <li>
                    <strong>other</strong><br>
                    @php $i = true @endphp
                    @foreach($socials as $social)
                        @if($social->group == 3)
                            <a href="{{ asset('social/v/'.$social->id.'/'.Session::token()) }}" target="_blank" class="icon-button"><img src="{{ asset($social->image) }}"></a>
                            @php $i = false @endphp
                        @endif
                    @endforeach
                    @if($i)
                        -
                    @endif
                </li>



            @endif


            <li>
                <strong>share</strong><br>
                <!--SVG, I nomrally include an svg file using PHP. For this pen I've dropped it inline below -->
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">


                    <symbol id="icon-facebook" viewBox="0 0 30.162 64">
                        <title>Facebook</title>
                        <desc>Link to Facebook</desc>

                        <path d="M30.113,0.001c0,0-6.156,0-10.239,0c-6.082,0-12.843,2.549-12.843,11.351c0.032,3.065,0,6.001,0,9.306H0
		v11.173h7.251V64h13.321V31.616h8.794l0.796-10.991h-9.821c0,0,0.026-4.893,0-6.31c0-3.476,3.628-3.279,3.84-3.279
		c1.73,0,5.081,0.005,5.942,0V0L30.113,0.001L30.113,0.001z"/>
                    </symbol>

                    <symbol id="icon-googleplus" viewBox="0 0 63.611 64">
                        <title>Google Plus</title>
                        <desc>Link to Google Plus</desc>

                        <path d="M34.7,37.618c-1.362-0.586-2.713-0.908-4.061-0.967c-0.937-0.029-2.524-0.117-4.762-0.262
		c-2.241-0.146-4.001-0.235-5.289-0.262c-1.199-0.029-2.362-0.073-3.489-0.135c-1.126-0.057-2.115-0.203-2.962-0.438
		c-0.879-0.206-1.625-0.593-2.24-1.166c-0.615-0.567-0.921-1.396-0.921-2.48c0-1.053,0.365-1.888,1.097-2.499
		c0.732-0.612,1.432-1.039,2.105-1.273h5.311c4.096,0,7.688-1.317,10.775-3.95c3.087-2.634,4.63-5.852,4.63-9.656
		c0-1.462-0.262-2.955-0.789-4.478c-0.525-1.521-1.331-2.911-2.413-4.171V5.619h10.183V1.405h-15.1
		c-1.346-0.409-2.671-0.746-3.973-1.009C21.5,0.135,20.19,0,18.875,0c-4.77,0-8.684,1.317-11.74,3.952
		C4.077,6.586,2.546,9.951,2.546,14.047c0,2.722,0.774,5.115,2.327,7.176c1.55,2.063,3.729,3.753,6.54,5.07v0.658
		c-2.223,0.936-3.883,2.058-4.983,3.357c-1.097,1.303-1.645,2.728-1.645,4.28c0,1.229,0.235,2.259,0.703,3.095
		c0.467,0.836,1.082,1.56,1.843,2.174c0.674,0.526,1.477,0.987,2.414,1.382c0.936,0.394,1.844,0.726,2.721,0.987v0.613
		c-3.629,0.149-6.613,1.083-8.954,2.809C1.171,47.375,0,49.73,0,52.718c0,3.688,1.626,6.485,4.873,8.405
		C8.119,63.042,13.021,64,19.575,64c4.008,0,7.375-0.383,10.098-1.144c2.722-0.762,5.061-1.829,7.022-3.206
		c1.844-1.346,3.217-2.932,4.128-4.762c0.905-1.829,1.361-3.78,1.361-5.858c0-2.079-0.338-3.82-1.009-5.225
		c-0.673-1.404-1.597-2.663-2.767-3.776C37.297,39.008,36.061,38.203,34.7,37.618z M24.516,22.058
		c-1.361,2.034-3.301,3.051-5.815,3.051c-2.253,0-4.089-1.023-5.509-3.073c-1.42-2.047-2.127-4.695-2.127-7.945
		c0-1.432,0.125-2.83,0.372-4.191s0.664-2.524,1.251-3.489c0.615-1.053,1.413-1.865,2.392-2.436
		c0.979-0.571,2.157-0.857,3.533-0.857c2.514,0,4.469,1.019,5.86,3.051c1.387,2.034,2.085,4.762,2.085,8.185
		C26.558,17.455,25.877,20.023,24.516,22.058z M31.276,58.182c-2.473,1.655-5.861,2.48-10.161,2.48
		c-2.487,0-4.593-0.242-6.322-0.722c-1.726-0.482-3.102-1.104-4.125-1.869c-1.082-0.788-1.844-1.652-2.282-2.59
		c-0.438-0.936-0.658-1.915-0.658-2.94c0-2.282,0.666-4.145,1.998-5.595c1.33-1.449,3.577-2.482,6.737-3.098
		c3.365,0,6.322,0.074,8.866,0.221c2.547,0.149,4.229,0.279,5.049,0.395c1.551,0.379,2.706,1.097,3.47,2.152
		c0.762,1.055,1.141,2.396,1.141,4.036C34.983,54.018,33.75,56.53,31.276,58.182z"/>
                        <path d="M51.718,14.318V22.9h3.35v-8.582h8.543v-3.293h-8.543V2.424h-3.35v8.602h-8.543v3.293H51.718L51.718,14.318
		z"/>
                    </symbol>

                    <symbol id="icon-linkedin" viewBox="0 0 64 62.888">
                        <title>LinkedIn</title>
                        <desc>Link to LinkedIn</desc>

                        <path d="M6.902,0c-4.229,0-6.988,2.85-6.9,6.646c-0.088,3.619,2.677,6.553,6.815,6.553
		c4.313,0,7.073-2.934,7.073-6.553C13.807,2.85,11.13,0,6.902,0z M0.345,62.888h13.114V18.074H0.345V62.888z M48.906,18.705
		c-4.189,0-8.471-0.866-13.029,6.204h-0.256l-0.23-6.831H23.782c0.174,3.708,0.196,9.245,0.196,14.507v30.303h13.113V36.992
		c0-1.215,0.17-2.42,0.51-3.285c0.861-2.414,3.018-4.917,6.645-4.917c4.744,0,6.646,3.708,6.646,9.139v24.959H64V36.291
		C64,23.869,57.531,18.705,48.906,18.705z"/>
                    </symbol>

                    <symbol id="icon-pinterest" viewBox="0 0 64 63.999">
                        <title>Pinterest</title>
                        <desc>Link to Pinterest</desc>

                        <path d="M18.924,61.027C3.735,54.875-3.981,36.195,2.063,20.569C8.371,4.279,26.524-4.013,42.859,1.914
		c16.604,6.035,25.082,23.838,19.355,40.665c-5.338,15.693-23.418,25.008-38.612,20.113c1.678-5.066,3.343-10.127,4.983-15.102
		c4.885,4.449,11.357,4.598,17.031,0.256c7.002-5.365,10.119-17.827,6.379-25.844c-3.012-6.456-8.283-10.09-15.201-10.992
		c-9.13-1.195-17.193,1.109-22.849,8.865c-4.074,5.578-4.922,11.767-2.073,18.229c0.908,2.055,2.445,3.584,4.465,4.604
		c1.184,0.602,1.921,0.334,2.342-0.994c0.562-1.793,0.525-3.25-0.622-5c-2.391-3.646-1.726-7.645-0.141-11.437
		c3.752-8.962,16.665-12.133,23.894-5.938c2.373,2.043,3.563,4.701,3.758,7.731c0.305,4.584-0.404,9.015-2.611,13.119
		c-1.313,2.434-3.111,4.342-5.918,5.023c-4.264,1.025-7.428-2.061-6.392-6.303c0.696-2.854,1.585-5.658,2.343-8.499
		c0.195-0.726,0.299-1.494,0.328-2.25c0.098-2.177-0.926-4.018-2.561-4.737c-1.757-0.762-4.057-0.256-5.532,1.354
		c-2.703,2.945-2.837,6.414-2.044,10.121c0.256,1.207,0.293,2.572,0.037,3.779c-1.214,5.633-2.623,11.23-3.831,16.877
		C19.01,57.277,19.076,59.1,18.924,61.027z"/>
                    </symbol>

                    <symbol id="icon-twitter" viewBox="0 0 64 52.013">
                        <title>Twitter</title>
                        <desc>Link to Twitter</desc>

                        <path d="M64,6.154c-2.354,1.044-4.885,1.749-7.537,2.069c2.709-1.626,4.789-4.2,5.77-7.266
		c-2.531,1.505-5.346,2.598-8.344,3.187C51.5,1.592,48.09,0,44.309,0c-7.248,0-13.128,5.878-13.128,13.131
		c0,1.025,0.117,2.028,0.339,2.992C20.608,15.575,10.936,10.348,4.458,2.404c-1.13,1.939-1.776,4.196-1.776,6.601
		c0,4.557,2.318,8.574,5.84,10.927c-2.151-0.065-4.174-0.656-5.947-1.641c0,0.055,0,0.11,0,0.166c0,6.363,4.525,11.667,10.532,12.875
		c-1.105,0.301-2.263,0.455-3.461,0.455c-0.847,0-1.668-0.074-2.472-0.227c1.671,5.215,6.521,9.008,12.265,9.117
		c-4.494,3.523-10.156,5.615-16.304,5.615c-1.06,0-2.106-0.061-3.135-0.184c5.81,3.73,12.712,5.904,20.125,5.904
		c24.145,0,37.359-20.004,37.359-37.355c0-0.57-0.012-1.137-0.043-1.7C60.008,11.099,62.238,8.786,64,6.154z"/>
                    </symbol>

                    {{--<symbol id="icon-youtube" viewBox="0 0 64 44.907">--}}
                        {{--<title>YouTube</title>--}}
                        {{--<desc>Link to YouTube</desc>--}}

                        {{--<path d="M63.394,9.304c0,0-0.115-8.491-9.777-8.838C43.966,0.113,32.994,0,32.994,0h-1.992--}}
		{{--c0,0-10.967,0.113-20.623,0.466C0.717,0.813,0.603,9.304,0.603,9.304S-0.675,23.151,0.49,33.565--}}
		{{--c0.877,7.875,2.556,10.41,11.752,10.875c9.186,0.467,18.771,0.467,18.771,0.467h1.971c0,0,9.586,0,18.771-0.467--}}
		{{--c9.195-0.465,10.875-3,11.752-10.875C64.677,23.151,63.394,9.304,63.394,9.304z M25.386,31.411V13.258l17.215,9.196L25.386,31.411z--}}
		{{--"/>--}}
                        {{--<polygon opacity="0.2" points="25.386,13.258 40.478,23.557 42.601,22.454 	"/>--}}
                    {{--</symbol>--}}

                </svg>
                <div class="socialLinks">
                    <a class="facebook" href="#" title="Find me on Facebook">
                        <svg class="socialIcon">
                            <use xlink:href="#icon-facebook" />
                        </svg>
                    </a>
                    <a class="googleplus" href="https://plus.google.com/share?url=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" onclick="javascript:window.open(this.href, '',
            'menubar=no,toolbar=no,height=600,width=600');return false;" title="Find me on Google Plus">
                        <svg class="socialIcon">
                            <use xlink:href="#icon-googleplus" />
                        </svg>
                    </a>
                    <a class="linkedin" href="https://www.linkedin.com/cws/share?url=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" onclick="javascript:window.open(this.href, '',
            'menubar=no,toolbar=no,height=420,width=550');return false;" title="Find me on LinkedIn">
                        <svg class="socialIcon">
                            <use xlink:href="#icon-linkedin" />
                        </svg>
                    </a>
                    <a class="pinterest" href="http://www.pinterest.com/pin/create/button?url=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>&media={{ $result['thumbnails'] == '' ? $result['thumbnailsSD'] : $result['thumbnails'] }}&description={{ $result['title'] }}" onclick="javascript:window.open(this.href, '',
            'menubar=no,toolbar=no,height=650,width=1024');return false;" title="Find me on Pinterest">
                        <svg class="socialIcon">
                            <use xlink:href="#icon-pinterest" />
                        </svg>
                    </a>
                    <a class="twitter" href="https://twitter.com/intent/tweet?text={{ $result['title'] }}&url=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" onclick="javascript:window.open(this.href, '',
            'menubar=no,toolbar=no,height=420,width=550');return false;" title="Find me on Twitter">
                        <svg class="socialIcon">
                            <use xlink:href="#icon-twitter" />
                        </svg>
                    </a>
                    {{--<a class="youtube" href="#" title="Find me on YouTube">--}}
                        {{--<svg class="socialIcon">--}}
                            {{--<use xlink:href="#icon-youtube" />--}}
                        {{--</svg>--}}
                    {{--</a>--}}
                </div>


            </li>


        </ul>


    </div>


    <div class="content">


        <div class="watch-bg" style="background-image: url('{{ $result['thumbnails'] == '' ? $result['thumbnailsSD'] : $result['thumbnails'] }}')"></div>
        <div class="watch-pattern"></div>
        <div class="page-watch">
            <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
            {{--<div class="player-container">--}}
            {{----}}
            {{--</div>--}}
            <div class="watch-container">
                <div id="player"></div>
            </div>
        </div>

        <div id="audioplayer" class="">
            <div class="cover" data-role="maximize">
                <img src="https://i.ytimg.com/vi/{{ $result['id'] }}/mqdefault.jpg?custom=true&w=196&h=110&stc=true&jpg444=true&jpgq=90&sp=68&sigh=I4T92Vc8kyuXwphhmHCgYMT-kmg" data-cover-placeholder="https://i.ytimg.com/vi/{{ $result['id'] }}/mqdefault.jpg?custom=true&w=196&h=110&stc=true&jpg444=true&jpgq=90&sp=68&sigh=I4T92Vc8kyuXwphhmHCgYMT-kmg">
            </div>
            <div class="player-bar">
                {{--<div class="player-bar-background" style="background-image:url(http://qmusic.be/assets/player-bar-beach-a6ca0cf24da263404a81dbc5413da07b0d42a662f41a0d4ab3426b807995986e.png)"></div>--}}

                {{--<div class="current-track">--}}
                        {{--<span class="title">{{ $result['title'] }}<br>--}}
                            {{--<span class="artist">{{ $result['channelTitle'] }}</span>--}}
                        {{--</span>--}}

                {{--</div>--}}

                <div class="play-console">
                    {{--<div class="back">--}}
                        {{--<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 306 306" xml:space="preserve">--}}
                                {{--<g>--}}
                                    {{--<g id="skip-previous">--}}
                                        {{--<rect width="51" height="306" ></rect>--}}
                                        {{--<polygon points="89.25,153 306,306 306,0"></polygon>--}}
                                    {{--</g>--}}
                                {{--</g>--}}
                            {{--</svg>--}}
                    {{--</div>--}}


                    <div class="play-button">
                        <svg id="svg-play" viewBox="0 0 36 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" data-pause="M11,10 L17,10 17,26 11,26 M20,10 L26,10 26,26 20,26" data-play="M 11 10 L 18 13.74 L 18 22.28 L 11 26 M 18 13.74 L 26 18 L 26 18 L 18 22.28">
                            <path id="ytp-2" d="M 11 10 L 18 13.74 L 18 22.28 L 11 26 M 18 13.74 L 26 18 L 26 18 L 18 22.28">
                            </path>
                        </svg>
                    </div>


                    {{--<div class="forward">--}}
                        {{--<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 306 306" style="enable-background:new 0 0 306 306;" xml:space="preserve">--}}
                                {{--<g>--}}
                                    {{--<g id="skip-next">--}}
                                        {{--<path d="M0,306l216.75-153L0,0V306z M255,0v306h51V0H255z"></path>--}}
                                    {{--</g>--}}
                                {{--</g>--}}
                            {{--</svg>--}}
                    {{--</div>--}}


                    <div class="play-progress-bar">
                        <div id="slider_container" class="middle-center-container slider-container">
                            <div id="slider_tooltip" class="slider-tooltip">
                                    <span id="slider_value">
                                        0:00
                                    </span>
                            </div>
                            <section id="play-progress-container" class="middle-center-container slider-bars">

                                <div id="video-progress" class="slider-drag" data-min-range="0"> </div>
                                <div id="progress-behind"> </div>
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
                                            <div id="vl-progress-behind"> </div>
                                        </section>
                                    </div>
                                </div>

                            </i>
                            <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                            {{--<i class="material-icons">battery_full</i>--}}
                            {{--<i class="fa fa-cc" aria-hidden="true"></i>--}}
                            <i class="fa fa-television" aria-hidden="true"></i>
                            <i id="op-set" class="fa fa-cog hidden" aria-hidden="true">

                                <div class="mdl-card tray-menu flex vertical mdl-shadow--2dp">

                                    <div class="row clickable">
                                        <i class="fa fa-television" aria-hidden="true"></i>
                                    </div>
                                    <div class="row">
                                        <i class="fa fa-cc" aria-hidden="true"></i>
                                    </div>
                                    <div class="row clickable">
                                        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
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

    </div>






    <script type="text/javascript">



        var $playChange = false,
            $playSeek = false,
            $playPaused = false;

        $(function () {




            // !Play progress
            (function(){
                var slider_play = $('#video-progress');
                slider_play.slider({
                    range: 'min',
                    value: slider_play.attr('data-min-range')*100,
                    min: 0,
                    max: 1000,
                    slide: function(event, ui) {

                        player.seekTo(ui.value);
                        var slideVal = ui.value/100,
                                slideMinVal = parseInt(slider_play.attr('data-min-range'));

                        if(slideVal<=slideMinVal) { return false; }

                    },
                    change: function(event, ui) {


                    }
                });
                var $tooltipWidth = parseInt($('.ui-slider-handle').css('left')) - ((parseInt($('#slider_value').innerWidth())/2) + (parseInt($('.ui-slider-handle').innerWidth())/2)) + (parseInt($('.ui-slider-handle').innerWidth())/2);
                $('#slider_tooltip').css({'left':parseInt($tooltipWidth)+'px'});


                // $('#set_minvalue').on('change',function(){
                //     var minValue = $(this).val();
                //     if(minValue<0||minValue>10){
                //         $(this).val(slider_play.slider('value')/100);
                //         return false;
                //     }
                //     slider_play.attr('data-min-range',minValue).slider('value',minValue*100);
                //     $('#slider_value').text(minValue);
                // });
            })();

            // !video volume
            (function(){
                var $vd_volume = $('#vl-progress');
                $vd_volume.slider({
                    range: 'min',
                    //value: 50,
                    value: $vd_volume.attr('data-min-range')*100,
                    min: 0,
                    max: 1000,
                    orientation: "vertical",
                    slide: function(event, ui) {
                    }
                });
            })();

            init();

            function init() {

                var $volume = $('.op-volume'),
                        $con = $('#op-volume'),
                        position = $con.position();

                $volume.css({
                    "left": (position.left - (($volume.width() / 2) - ($con.width() / 2))) + "px",
                    //"top": (position.top - $volume.height()) - 10 + "px"
                    "top": (position.top - $volume.height()) + 10 + "px"
                });

                var $volume = $('.tray-menu'),
                        $con = $('#op-set'),
                        position = $con.position();

                $volume.css({
                    "left": (position.left - (($volume.width() / 2) - ($con.width() / 2))) + "px",
                    "top": (position.top - $volume.height()) - 10 + "px"
                });



                var $playCon = $('.page-watch'),
                    $player = $('#player'),
                    $playWidth = $playCon.width(),
                    $playHeight = $playCon.height();

                var currWidth = $playWidth > 800 ? 800 : $playWidth;
                $player.width(currWidth+1);
                $player.height(calcWideScreen(currWidth));



            }





            // !Play button
            var $path = $("#ytp-2")[0],
                    $svg_play = $('#svg-play'),
                    $pause = $svg_play.data('pause'),
                    $play = $svg_play.data('play'),
                    $play_btn = $('.play-button');

            $(document).on("click", ".play-button", function() {

                //check play with custom play button
                $playChange = true;

                if( !$(this).hasClass('play') ) {
                    $(this).addClass('play');
                    Snap($path).animate({"path": $pause}, 400, mina.easeinout);
                    player.playVideo();
                } else {
                    $(this).removeClass('play');
                    Snap($path).animate({"path": $play}, 400, mina.easeinout);
                    player.pauseVideo();
                }
            });

            $(document).on('mouseover', '.ui-slider-handle', function(){

            });
            $(document).on({
                mouseenter: function(){
                    $('#slider_tooltip').addClass('-active');
                },
                mouseleave: function(){
                    $('#slider_tooltip').removeClass('-active');
                }
            }, '.ui-slider-handle');


            //*! lock controller
            $(document).on("click", ".tray-button .fa-lock", function() {
                $('#player').addClass('unlock');
                $("#audioplayer").addClass('unlock');
                $(this).removeClass('fa-lock').addClass('fa-unlock-alt');
            });
            $(document).on("click", ".tray-button .fa-unlock-alt", function() {
                $('#player').removeClass('unlock');
                $("#audioplayer").removeClass('unlock');
                $(this).removeClass('fa-unlock-alt').addClass('fa-lock');
            });

            //*! switch player
            $(document).on("click", ".tray-button .fa-arrow-circle-right", function() {
                playLoop(true);
                $(this).removeClass('fa-arrow-circle-right').addClass('fa-undo');
            });
            $(document).on("click", ".tray-button .fa-undo", function() {
                playLoop(false);
                $(this).removeClass('fa-undo').addClass('fa-arrow-circle-right');
            });




            $('.fa-television').click(function () {
                launchIntoFullscreen(document.getElementById("player")); // any individual element

            });


            $('#skip-previous').on('click', function () {
                player.previousVideo();
            });

            $('#skip-next').on('click', function () {
                player.nextVideo();
            });

            share();



        });// ! end read

        function share(){

            //! facebook
            $('.socialLinks a.facebook').click(function(){
                FB.ui(
                        {
                            method: 'share',
                            href: '<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>'
                        },
                        // callback
                        function(response) {
//                            if (response && !response.error_message) {
//                                alert('Posting completed.');
//                            } else {
//                                alert('Error while posting.');
//                            }
                        }
                );
            });

        }


        // Find the right method, call on correct element
        function launchIntoExitFullscreen(element) {
            if(element.exitFullscreen) {
                element.exitFullscreen();
            } else if(element.mozCancelFullScreen) {
                element.mozCancelFullScreen();
            } else if(element.webkitExitFullscreen) {
                element.webkitExitFullscreen();
            } else if(element.msExitFullscreen) {
                element.msExitFullscreen();
            }
        }


        function launchIntoFullscreen(element) {
            if(element.requestFullscreen) {
                element.requestFullscreen();
            } else if(element.mozRequestFullScreen) {
                element.mozRequestFullScreen();
            } else if(element.webkitRequestFullscreen) {
                element.webkitRequestFullscreen();
            } else if(element.msRequestFullscreen) {
                element.msRequestFullscreen();
            }
        }




        // !Play button
        function playOn() {

            var $path = $("#ytp-2")[0],
                    $svg_play = $('#svg-play'),
                    $pause = $svg_play.data('pause'),
                    $play = $svg_play.data('play'),
                    $play_btn = $('.play-button');

            if( !$play_btn.hasClass('play') ) {
                $play_btn.addClass('play');
                Snap($path).animate({"path": $pause}, 400, mina.easeinout);
            }
        }
        function playOff() {

            var $path = $("#ytp-2")[0],
                    $svg_play = $('#svg-play'),
                    $pause = $svg_play.data('pause'),
                    $play = $svg_play.data('play'),
                    $play_btn = $('.play-button');

            if( $play_btn.hasClass('play') ) {
                $play_btn.removeClass('play');
                Snap($path).animate({"path": $play}, 400, mina.easeinout);
            }
        }


        var tag = document.createElement('script');

        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        // 3. This function creates an <iframe> (and YouTube player)
        //    after the API code downloads.
        var player;
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                //height: '390',
                width: '640',
                videoId: '{{ $result['id'] }}',
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                },
                playerVars: {
                    'autoplay': 1,
                    'controls' : 0,
                    'modestbranding' : 1,
                    'rel' : 0,
                    'showinfo' : 0,
                }
            });
        }

        // 4. The API will call this function when the video player is ready.
        function onPlayerReady(event) {
            //event.target.playVideo();
            setInterval(function() {
                if (player.getPlayerState() != 2) {
                    //text time
                    $(".time-current").text(player.getCurrentTime().toString().toHHMMSS());
                    $(".time-duration").text(player.getDuration().toString().toHHMMSS());
                }
            }, 250);

            var rangerGo = setInterval(function() {
                $("#video-progress").slider("value", player.getCurrentTime());
                $("#video-progress").slider("option", "max", player.getDuration());
            }, 250);

            setInterval(function() {
                // VOLUME CONTROLS
                //$('#vl-progress').text("volume: " + player.getVolume() + "%");
                player.setVolume($('#vl-progress').slider("value"));
            }, 1);

            $("#video-progress").slider({
                range: "min",
                slide: function(event, ui) {
                    //text time
                    $("#slider_value").text(ui.value.toString().toHHMMSS());

                    onCurrentTime();
                },
                start: function(event, ui) {
                    //player.pauseVideo();
                    clearInterval(rangerGo);
                    onCurrentTime();
                },
                stop: function(event, ui) {
                    player.seekTo(ui.value, true);
                    player.playVideo();
                    rangerGo = setInterval(function() {
                        $("#video-progress").slider("value", player.getCurrentTime());
                        $("#video-progress").slider("option", "max", player.getDuration());
                    }, 250);
                    onCurrentTime();

                }
            });
        }

        function onCurrentTime(){
            var $tooltipWidth = parseInt($('.ui-slider-handle').css('left')) - ((parseInt($('#slider_value').innerWidth())/2) + (parseInt($('.ui-slider-handle').innerWidth())/2)) + (parseInt($('.ui-slider-handle').innerWidth())/2);
            $('#slider_tooltip').css({'left':parseInt($tooltipWidth)+'px'});
        }

        // 5. The API calls this function when the player's state changes.
        //    The function indicates that when playing a video (state=1),
        //    the player should play for six seconds and then stop.
        var done = false,
            loop = false;
        function onPlayerStateChange(event) {

            //play first time
            // if (event.data == YT.PlayerState.PLAYING && !done) {
            //     done = true;
            // }

            if(event.data == -1){
                done = true;
            }


            if(!$playChange){

                if(event.data == YT.PlayerState.PLAYING){
                    playOn();
                }

                //check paused   *!pause then seek solution
                if(event.data == YT.PlayerState.PAUSED){
                    playOff();
                }



            }else{
                $playChange = false;
            }


            // end video
            if(event.data === YT.PlayerState.ENDED){
                playOff();
                if(loop){
                    player.loadVideoById("{{ $result['id'] }}");
                }
            }


        }





        function stopVideo() {
            player.stopVideo();
        }




        function calcWideScreen($width){
            return parseInt(($width*9)/16)+1;
        }

        function playLoop($status){
            loop = $status;
        }




        //
        //var tag = document.createElement('script');
        //tag.src = "https://www.youtube.com/iframe_api";
        //var firstScriptTag = document.getElementsByTagName('script')[0];
        //firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        //
        //function onYouTubeIframeAPIReady() {
        //    var rangerGo;
        //    var player = new YT.Player('player', {
        //        width: '640',
        //        videoId: 'MWpRTOlY1V8',
        //        playerVars: {
        //            'controls': 0,
        //            'showinfo': 0,
        //            'iv_load_policy': 3,
        //            'rel': 0,
        //        },
        //        events: {
        //            onReady: function() {
        //
        //            }
        //        }
        //    });
        //}



        String.prototype.toHHMMSS = function() {
            var sec_num = parseInt(this, 10);
            var hours = Math.floor(sec_num / 3600);
            var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
            var seconds = sec_num - (hours * 3600) - (minutes * 60);

            //if (hours < 10) {
            //    hours = "0" + hours;
            //}
            //
            //if (minutes < 10) {
            //    minutes = "0" + minutes;
            //}

            if (seconds < 10) {
                seconds = "0" + seconds;
            }

            var time = hours + ":" + minutes + ":" + seconds;
            time = time.replace(/^0+/, '');
            time = time.replace(/^[^\w\s]/gi, '');
            return time;
        };



        //player.seekTo(parseFloat($("#seekto").val()));



        //player.seekTo(parseFloat($("#seekto").val()));


        window.fbAsyncInit = function() {
            FB.init({
                appId      : '950643235062155',
                cookie     : true,  // enable cookies to allow the server to access
                                    // the session
                xfbml      : true,  // parse social plugins on this page
                version    : 'v2.7' // use graph api version 2.5
            });
        };
        // Load the SDK asynchronously
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));


    </script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
@stop
