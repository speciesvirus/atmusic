$.fn.stars = function() {
    return $(this).each(function() {
        var num = $(this).data("star");
        $(this).html($("<span />").width(Math.max(0, Math.min(5, num)) * 12));
    })
};



$(function(){

    $('.owl-carousel').owlCarousel({

        items: 1,
        //lazyLoad: true,
        margin: 0,
        nav: true,
        dots: false,
        autoWidth: true
    });

    $("span#c_stars").stars();

});

