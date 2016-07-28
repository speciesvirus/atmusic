$(function () {


    // !Play button
    var $path  = $("#ytp-2")[0],
        $pause = $('#svg-play').data('pause'),
        $play = $('#svg-play').data('play');

    $(document).on("click", ".play-button", function() {

        if( !$(this).hasClass('play') ) {
            $(this).addClass('play');
            Snap($path).animate({"path": $pause}, 400, mina.easeinout);
        } else {
            $(this).removeClass('play');
            Snap($path).animate({"path": $play}, 400, mina.easeinout);
        }
    });


    // !Play progress
    (function(){
        $('#slider_drag').slider({
            range: 'min',
            value: $('#slider_drag').attr('data-min-range')*100,
            min: 0,
            max: 1000,
            slide: function(event, ui) {
                var slideVal = ui.value/100,
                    slideMinVal = parseInt($('#slider_drag').attr('data-min-range'));
                if(slideVal<=slideMinVal) { return false; }
                $('#slider_value').text(slideVal);
                $('#slider_tooltip').css({'left':parseInt($('.ui-slider-handle').css('left'))-50+'px'});
            },
            change: function(event, ui) {
                $('#slider_tooltip').css({'left':parseInt($('.ui-slider-handle').css('left'))-50+'px'});
            }
        });
        $('#slider_value').text($('#slider_drag').slider('value')/100);
        $('#slider_tooltip').css({'left':parseInt($('.ui-slider-handle').css('left'))-50+'px'});

        $('#set_minvalue').on('change',function(){
            var minValue = $(this).val();
            if(minValue<0||minValue>10){
                $(this).val($('#slider_drag').slider('value')/100);
                return false;
            }
            $('#slider_drag').attr('data-min-range',minValue).slider('value',minValue*100);
            $('#slider_value').text(minValue);
        });
    })();


    init();
    // $('#op-volume').click(function() {
    //     $('.tray-menu').toggleClass('open');
    //     $(this).toggleClass('tray-button--active');
    // });
    $('#op-volume').click(function() {


        var $volume = $('.op-volume'),
            $con = $('#op-volume');
        var position = $con.position();

        $volume.css({
                "left": (position.left - (($volume.width() / 2) - ($con.width() / 2))) + "px",
                "top": (position.top - $volume.height()) - 10 + "px"
        });

        $volume.toggleClass('open');
        $(this).toggleClass('tray-button--active');
    });


    function init() {

        var $volume = $('.op-volume'),
            $con = $('#op-volume');
        var position = $con.position();

        $volume.css({
            "left": (position.left - (($volume.width() / 2) - ($con.width() / 2))) + "px",
            "top": (position.top - $volume.height()) - 10 + "px"
        });

    }


    //$('#search input')
    //    .focus(function () { this.select(); })
    //    .mouseup(function (e) { e.preventDefault(); })
    //    .autocomplete({
    //        position: {
    //            my: "left top",
    //            at: "left bottom",
    //            offset: "0, 5",
    //            collision: "none"
    //        },
    //        source: function (request, response) {
    //            $.ajax({
    //                url: "http://clients1.google.com/complete/search?q=" + request.term + "&hl=en&client=partner&source=gcsc&partnerid={GOOGLESEARCHID}&ds=cse&nocache=" + Math.random().toString(),
    //                dataType: "jsonp",
    //                success: function (data) {
    //                    response($.map(data[1], function (item) {
    //                        return {
    //                            label: item[0],
    //                            value: item[0]
    //                        };
    //                    }));
    //                }
    //            });
    //        },
    //        autoFill: true,
    //        minChars: 0,
    //        select: function (event, ui) {
    //            $(this).closest('input').val(ui.item.value);
    //            $(this).closest('form').trigger('submit');
    //        }
    //    });
    $('#search input').autocomplete({
        source: function(request, response) {
            $.getJSON("http://suggestqueries.google.com/complete/search?callback=?",
                {
                    "hl": "en", // Language
                    "jsonp": "suggestCallBack", // jsonp callback function name
                    "q": request.term, // query term
                    "client": "youtube" // force youtube style response, i.e. jsonp
                }
            );
            suggestCallBack = function (data) {
                var suggestions = [];
                $.each(data[1], function (key, val) {
                    suggestions.push({"label": val[0], "value": val[0]});
                });
                suggestions.length = 10; // prune suggestions list to only 5 items
                response(suggestions);
            };
        }
    });




    // -------------------------------------------------------------
    //   Basic Navigation
    // -------------------------------------------------------------
    var $frame  = $('.sub-menu-list-item');
    var $wrap   = $frame.parent();

    // Call Sly on frame
    $frame.sly({
        horizontal: 1,
        itemNav: 'basic',
        smart: 1,
        activateOn: 'click',
        mouseDragging: 1,
        touchDragging: 1,
        releaseSwing: 1,
        //startAt: 3,
        //scrollBar: $wrap.find('.scrollbar'),
        scrollBy: 1,
        //pagesBar: $wrap.find('.pages'),
        activatePageOn: 'click',
        speed: 300,
        elasticBounds: 1,
        easing: 'easeOutExpo',
        dragHandle: 1,
        dynamicHandle: 1,
        clickBar: 1

    });
    sly_reload($frame);


    $(window).resize(function (e) {

        sly_reload($frame);

    });







});




function sly_reload($frame){

    var $width = $(window).width(),
        windowInnerWidth = $(window).innerWidth(),
        pageMargin = 10,
        //liMargin = 30,
        //liPadding = 20;
        liMargin = 0,
        liPadding = 0;

    var newsListPagespanWidth = windowInnerWidth - pageMargin * 2;

    $frame.css({
        'width': newsListPagespanWidth.toString() + 'px'
    });

    $frame.find('li').css({
        //'width': liWidth.toString() + 'px'
        'width': '213.81px'
    });

    $frame.sly('reload');

}






