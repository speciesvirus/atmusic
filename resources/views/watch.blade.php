<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link rel="stylesheet" type="text/css" href="{{ asset("components/jquery-ui/themes/base/jquery-ui.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("components/css/reset.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("components/bootstrap/dist/css/bootstrap.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("components/font-awesome/css/font-awesome.min.css") }}">



    <script src="{{ asset("components/jquery/dist/jquery.min.js") }}"></script>
    <script src="{{ asset("components/jquery-ui/jquery-ui.min.js") }}"></script>
    <script src="{{ asset("components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("components/sly/dist/sly.min.js") }}"></script>
    <script src="{{ asset("components/js/script.js") }}"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/utils/Draggable.min.js"></script>
    <style>

        body {
            background-color: #03A9F4;
            overflow: hidden;
            font-family: 'Ropa Sans', sans-serif;
            text-align:center;
        }

        body,
        html {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        .container {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        svg {
            width: 100%;
            height:100%;
            visibility: hidden;
        }

        .upText,
        .downText {
            text-anchor: middle;
            font-weight: 700;
            font-size: 14px;
            fill: #03A9F4;
            letter-spacing: 0.4px;
            user-select: none;
            -webkit-user-select: none;
            pointer-events: none;
            text-rendering: optimizeSpeed;
        }

        .upText {
            font-size: 24px;
        }

        #dragger{
            -webkit-tap-highlight-color: rgba(0,0,0,0);
        }

        .downText {
            letter-spacing: -0.4px;
        }
    </style>
    </head>
    <body>



    <div class="container">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="0 0 600 600">
            <defs>
                <filter id="goo" color-interpolation-filters="sRGB">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="8" result="blur" />
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 21 -7" result="cm" />

                </filter>
            </defs>
            <g id="dragGroup">
                <path id="dragBar" fill="#FFFFFF" d="M447,299.5c0,1.4-1.1,2.5-2.5,2.5h-296c-1.4,0-2.5-1.1-2.5-2.5l0,0c0-1.4,1.1-2.5,2.5-2.5
		h296C445.9,297,447,298.1,447,299.5L447,299.5z" />
                <g id="displayGroup">
                    <g id="gooGroup" filter="url(#goo)">
                        <circle id="display" fill="#FFFFFF" cx="146" cy="299.5" r="16" />
                        <circle id="dragger" fill="#FFFFFF"  stroke="#03A9F4" stroke-width="0" cx="146" cy="299.5" r="15" />

                    </g>
                    <text class="downText" x="146" y="304">0</text>
                    <text class="upText" x="145" y="266">0</text>
                </g>


            </g>
        </svg>

    </div>


    </body>
    </html>




<script type="text/javascript">


    var xmlns = "http://www.w3.org/2000/svg",
            select = function(s) {
                return document.querySelector(s);
            },
            selectAll = function(s) {
                return document.querySelectorAll(s);
            },
            container = select('.container'),
            dragger = select('#dragger'),
            dragVal,
            maxDrag = 300

    //center the container cos it's pretty an' that
    TweenMax.set(container, {
        position: 'absolute',
        top: '50%',
        left: '50%',
        xPercent: -50,
        yPercent: -50
    })
    TweenMax.set('svg', {
        visibility: 'visible'
    })

    TweenMax.set('#upText', {
        alpha: 0,
        transformOrigin: '50% 50%'
    })

    TweenLite.defaultEase = Elastic.easeOut.config(0.4, 0.1);

    var tl = new TimelineMax({
        paused: true
    });
    tl.addLabel("blobUp")
            .to('#display', 1, {
                attr: {
                    cy: '-=40',
                    r: 30
                }
            })
            .to('#dragger', 1, {
                attr: {
                    //cy:'-=2',
                    r: 8
                }
            }, '-=1')
            .set('#dragger', {
                strokeWidth: 4
            }, '-=1')
            .to('.downText', 1, {
                //alpha:0,
                alpha: 0,
                transformOrigin: '50% 50%'
            }, '-=1')
            .to('.upText', 1, {
                //alpha:1,
                alpha: 1,
                transformOrigin: '50% 50%'
            }, '-=1')
            .addPause()
            .addLabel("blobDown")
            .to('#display', 1, {
                attr: {
                    cy: 299.5,
                    r: 0
                },
                ease: Expo.easeOut
            })
            .to('#dragger', 1, {
                attr: {
                    //cy:'-=35',
                    r: 15
                }
            }, '-=1')
            .set('#dragger', {
                strokeWidth: 0
            }, '-=1')
            .to('.downText', 1, {
                alpha: 1,
                ease: Power4.easeOut
            }, '-=1')
            .to('.upText', 0.2, {
                alpha: 0,
                ease: Power4.easeOut,
                attr: {
                    y: '+=45'
                }
            }, '-=1')

    Draggable.create(dragger, {
        type: 'x',
        cursor: 'pointer',
        throwProps: true,
        bounds: {
            minX: 0,
            maxX: maxDrag
        },
        onPress: function() {

            tl.play('blobUp')
        },
        onRelease: function() {
            tl.play('blobDown')
        },
        onDrag: dragUpdate,
        onThrowUpdate: dragUpdate
    })

    function dragUpdate() {
        dragVal = Math.round((this.target._gsTransform.x / maxDrag) * 100);
        select('.downText').textContent = select('.upText').textContent = dragVal;
        TweenMax.to('#display', 1.3, {
            x: this.target._gsTransform.x

        })

        TweenMax.staggerTo(['.upText', '.downText'], 1, {
            // x:this.target._gsTransform.x,
            cycle: {
                attr: [{
                    x: this.target._gsTransform.x + 146
                }]
            },
            ease: Elastic.easeOut.config(1, 0.4)
        }, '0.02')
    }

    TweenMax.to(dragger, 1, {
        x: 150,
        onUpdate: dragUpdate,
        ease: Power1.easeInOut
    })

</script>
