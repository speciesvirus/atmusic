$(function () {

    


     $('#op-set').click(function() {
         $('.tray-menu').toggleClass('open');
         $(this).toggleClass('tray-button--active');
     });



    // !* search ------------
    $('#search').submit(function(e){
        e.preventDefault();

        var $this = $(this),
            $val = $this.find('input').val();

        $server = window.location.hostname;
        window.location = '/atmusic/search/'+$val;
    });

    $('#search-btn').click(function(){
        $('#search').submit();
    });


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
        },
        select: function (event, ui) {
            $('#search input').val(ui.item.value);
            $('#search').submit();
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






