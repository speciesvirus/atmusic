$(function () {
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
    });
});
