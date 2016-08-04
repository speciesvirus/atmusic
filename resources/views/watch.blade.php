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
    {{--<script src="{{ asset("components/js/watch.js") }}"></script>--}}
@stop


@section('content')

    <div class="page-watch" style="background-image: url('{{ $result['thumbnails'] }}')">
        <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
        {{--<div class="player-container">--}}
            {{----}}
        {{--</div>--}}
        <div id="player"></div>
    </div>

    <div id="audioplayer" class="">
        <div class="cover" data-role="maximize">
            <img src="https://i.ytimg.com/vi/{{ $result['id'] }}/mqdefault.jpg?custom=true&w=196&h=110&stc=true&jpg444=true&jpgq=90&sp=68&sigh=I4T92Vc8kyuXwphhmHCgYMT-kmg" data-cover-placeholder="https://i.ytimg.com/vi/{{ $result['id'] }}/mqdefault.jpg?custom=true&w=196&h=110&stc=true&jpg444=true&jpgq=90&sp=68&sigh=I4T92Vc8kyuXwphhmHCgYMT-kmg">
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
                    "top": (position.top - $volume.height()) - 10 + "px"
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
                $player.width(currWidth);
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

        });

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
                    'showinfo' : 0
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
        var done = false;
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



        }





        function stopVideo() {
            player.stopVideo();
        }




        function calcWideScreen($width){
            return parseInt(($width*9)/16);
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


    </script>
@stop
