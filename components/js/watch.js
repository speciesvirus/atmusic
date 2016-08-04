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
        $("#audioplayer").addClass('unlock');
        $(this).removeClass('fa-lock').addClass('fa-unlock-alt');
    });
    $(document).on("click", ".tray-button .fa-unlock-alt", function() {
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
        width: '500',
        videoId: 'M7lc1UVf-VE',
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        },
        playerVars: {
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