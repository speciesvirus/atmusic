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














"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var _React = React;
var Component = _React.Component;
var Children = _React.Children;
var PropTypes = _React.PropTypes;
var _ReactMotion = ReactMotion;
var Motion = _ReactMotion.Motion;
var spring = _ReactMotion.spring;

var PlayPause = function (_Component) {
    _inherits(PlayPause, _Component);

    function PlayPause() {
        _classCallCheck(this, PlayPause);

        return _possibleConstructorReturn(this, _Component.apply(this, arguments));
    }

    PlayPause.prototype.render = function render() {
        var _props = this.props;
        var toggle = _props.toggle;
        var onClick = _props.onClick;

        return React.createElement(
            Motion,
            {
                style: { scale: spring(toggle ? 1 : 0, [300, 30]) }
            },
            function (_ref) {
                var scale = _ref.scale;
                return React.createElement(
                    "button",
                    {
                        type: "button",
                        className: "play-pause",
                        onClick: onClick
                    },
                    React.createElement("span", {
                        className: "play-pause__playhead",
                        style: {
                            transform: "scaleX(" + (1 - scale) + ")",
                            WebkitTransform: "scaleX(" + (1 - scale) + ")"
                        }
                    }),
                    React.createElement("span", {
                        className: "play-pause__pausehead",
                        style: {
                            transform: "scaleX(" + scale + ")",
                            WebkitTransform: "scaleX(" + scale + ")"
                        }
                    })
                );
            }
        );
    };

    return PlayPause;
}(Component);

var App = function (_Component2) {
    _inherits(App, _Component2);

    function App(props) {
        _classCallCheck(this, App);

        var _this2 = _possibleConstructorReturn(this, _Component2.call(this, props));

        _this2.state = {
            isPlaying: false
        };
        return _this2;
    }

    App.prototype.render = function render() {
        var _this3 = this;

        var isPlaying = this.state.isPlaying;

        return React.createElement(PlayPause, {
            toggle: isPlaying,
            onClick: function onClick() {
                return _this3.setState({ isPlaying: !isPlaying });
            }
        });
    };

    return App;
}(Component);

React.render(React.createElement(App, null), document.getElementById('app'));