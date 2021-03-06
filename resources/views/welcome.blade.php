@extends('layouts.main')

@section('title', 'unbok')

@section('meta')
    <link rel="canonical" href="<?php echo "http://$_SERVER[HTTP_HOST]"; ?>">
    <link rel="alternate" media="handheld" href="<?php echo "http://$_SERVER[HTTP_HOST]"; ?>">
    <meta name="description" content="There are many video sharing websites and social communities, Review the best video sharing sites on Unbok">
    <meta name="keywords" content="video, sharing, camera phone, video phone, free, social">
    <link rel="icon" href="{{ asset('components/images/unbok_32.png') }}" sizes="32x32">
    <link rel="icon" href="{{ asset('components/images/unbok_48.png') }}" sizes="48x48">
    <link rel="icon" href="{{ asset('components/images/unbok_96.png') }}" sizes="96x96">
    <link rel="icon" href="{{ asset('components/images/unbok_144.png') }}" sizes="144x144">
    <meta property="og:image" content="{{ asset('components/images/unbok_1200-shraing.png') }}">

@stop

@section('source')
    <link rel="stylesheet" type="text/css" href="{{ asset("components/owl.carousel/dist/assets/owl.carousel.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("components/owl.carousel/dist/assets/owl.theme.default.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("components/css/home.css") }}">
    <script src="{{ asset("components/owl.carousel/dist/owl.carousel.min.js") }}"></script>
@stop
@section('script')
    <script src="{{ asset("components/js/home.js") }}"></script>
@stop

@section('content')

    <div class="page-content">

        <div class="feed">

            {{--<section>--}}
            {{--<div class="feed-container">--}}
            {{--<ul>--}}
            {{--<li>--}}
            {{--<div class="clash-card archer">--}}
            {{--<div class="clash-card__image clash-card__image--archer">--}}
            {{--<img src="https://i.ytimg.com/vi/WvsDpFFC2Js/hqdefault.jpg?custom=true&w=320&h=180&stc=true&jpg444=true&jpgq=90&sp=68&sigh=m7iqIgc6LqvyU7ZQ-dX1798m8Aw" alt="archer" style="display: block;">--}}
            {{--</div>--}}
            {{--<div class="c_info">--}}
            {{--<span id="c_stars" data-star="3.5"><span style="width: 42px;"></span></span>--}}
            {{--<div class="c_num">3.5</div>--}}
            {{--</div>--}}

            {{--<div class="clash-card__unit-description">--}}
            {{--<div class="clash-card__level">ปริศนาฟ้าแลบ วันที่ 22 กรกฎาคม 2559 ตอนที่ 4</div>--}}
            {{--<p class="c_industry">Digital Media</p>--}}
            {{--<p class="c_industry">91,843 views 3 days ago</p>--}}
            {{--</div>--}}

            {{--<div class="clash-card__unit-stats clearfix">--}}
            {{--<a href="https://www.facebook.com/designcouch" target="_blank">--}}
            {{--<i class="fa fa-facebook"></i>--}}
            {{--</a>--}}
            {{--<a href="https://www.twitter.com/designcouch" target="_blank">--}}
            {{--<i class="fa fa-youtube"></i>--}}
            {{--</a>--}}
            {{--<a href="https://www.dribbble.com/designcouch" target="_blank">--}}
            {{--<i class="fa fa-plus-circle"></i>--}}
            {{--</a>--}}
            {{--<a href="https://www.codepen.io/designcouch/public">--}}
            {{--<i class="fa fa-clock-o"></i>--}}
            {{--</a>--}}

            {{--<a href="javascript://" class="more-info">--}}
            {{--<i class="fa fa-user"></i>--}}
            {{--</a>--}}

            {{--</div>--}}

            {{--</div>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--</section>--}}

            <section>
                <div class="feed-container">
                    <h4 class="feed-topic">Recommend</h4>
                    <div class="owl-carousel">



                        @if(isset($result['recommend']))

                            @foreach($result['recommend'] as $key => $value)

                                <div class="card">
                                    <div class="card-thumbnail">
                                        <a href="{{ asset('/'.$value['id']) }}">
                                            <img src="https://i.ytimg.com/vi/{{ $value['id'] }}/mqdefault.jpg?custom=true&w=196&h=110&stc=true&jpg444=true&jpgq=90&sp=68" class="left"/>
                                        </a>
                                    </div>
                                    <div class="right">
                                        <h1><a href="{{ asset('/'.$value['id']) }}">{{ $value['title'] }}</a></h1>
                                        <h2>{{ $value['channelTitle'] }}</h2>
                                        <h2>{{ $value['viewCount'] }} views {{ $value['publishedAt'] }}</h2>

                                        <p>{{ $value['description'] }}</p>


                                        <ul>
                                            <li>
                                                <div class="c_info">
                                                    <span id="c_stars" data-star="{{ $value['rate'] }}"></span>
                                                    <div class="c_num">{{ $value['rate'] }}</div >
                                                </div>
                                            </li>
                                        </ul>

                                    </div>

                                </div>

                            @endforeach

                        @endif



                    </div>
                </div>
            </section>

            <section>
                <div class="feed-container">
                    <h4 class="feed-topic">Music</h4>
                    <div class="owl-carousel">

                        @if(isset($result['music']))

                            @foreach($result['music'] as $key => $value)

                                <div class="card">
                                    <div class="card-thumbnail">
                                        <a href="{{ asset('/'.$value['id']) }}">
                                            <img src="https://i.ytimg.com/vi/{{ $value['id'] }}/mqdefault.jpg?custom=true&w=196&h=110&stc=true&jpg444=true&jpgq=90&sp=68" class="left"/>
                                        </a>
                                    </div>
                                    <div class="right">
                                        <h1><a href="{{ asset('/'.$value['id']) }}">{{ $value['title'] }}</a></h1>
                                        <h2>{{ $value['channelTitle'] }}</h2>
                                        <h2>{{ $value['viewCount'] }} views {{ $value['publishedAt'] }}</h2>

                                        <p>{{ $value['description'] }}</p>

                                        <ul>
                                            <li>
                                                <div class="c_info">
                                                    <span id="c_stars" data-star="{{ $value['rate'] }}"></span>
                                                    <div class="c_num">{{ $value['rate'] }}</div >
                                                </div>
                                            </li>
                                        </ul>

                                    </div>

                                </div>

                            @endforeach

                        @endif



                    </div>
                </div>
            </section>




            <section>
                <div class="feed-container">
                    <h4 class="feed-topic">Movie</h4>
                    <div class="owl-carousel">



                        @if(isset($result['movie']))

                            @foreach($result['movie'] as $key => $value)

                                <div class="card">
                                    <div class="card-thumbnail">
                                        <a href="{{ asset('/'.$value['id']) }}">
                                            <img src="https://i.ytimg.com/vi/{{ $value['id'] }}/mqdefault.jpg?custom=true&w=196&h=110&stc=true&jpg444=true&jpgq=90&sp=68" class="left"/>
                                        </a>
                                    </div>
                                    <div class="right">
                                        <h1><a href="{{ asset('/'.$value['id']) }}">{{ $value['title'] }}</a></h1>
                                        <h2>{{ $value['channelTitle'] }}</h2>
                                        <h2>{{ $value['viewCount'] }} views {{ $value['publishedAt'] }}</h2>

                                        <p>{{ $value['description'] }}</p>


                                        <ul>
                                            <li>
                                                <div class="c_info">
                                                    <span id="c_stars" data-star="{{ $value['rate'] }}"></span>
                                                    <div class="c_num">{{ $value['rate'] }}</div >
                                                </div>
                                            </li>
                                        </ul>

                                        {{--<div class="c_info">--}}
                                            {{--<span id="c_stars" data-star="{{ $value['rate'] }}"></span>--}}
                                            {{--<div class="c_num">{{ $value['rate'] }}</div >--}}
                                        {{--</div>--}}

                                        {{--<ul>--}}
                                            {{--<li><i class="fa fa-eye"></i></li>--}}
                                            {{--<li><i class="fa fa-heart-o"></i></li>--}}
                                            {{--<li><i class="fa fa-envelope-o"></i></li>--}}
                                            {{--<li><i class="fa fa-share-alt"></i></li>--}}
                                        {{--</ul>--}}

                                    </div>

                                </div>

                            @endforeach

                        @endif



                    </div>
                </div>
            </section>




            <section>
                <div class="feed-container">
                    <h4 class="feed-topic">Food</h4>
                    <div class="owl-carousel">



                        @if(isset($result['food']))

                            @foreach($result['food'] as $key => $value)

                                <div class="card">
                                    <div class="card-thumbnail">
                                        <a href="{{ asset('/'.$value['id']) }}">
                                            <img src="https://i.ytimg.com/vi/{{ $value['id'] }}/mqdefault.jpg?custom=true&w=196&h=110&stc=true&jpg444=true&jpgq=90&sp=68" class="left"/>
                                        </a>
                                    </div>
                                    <div class="right">
                                        <h1><a href="{{ asset('/'.$value['id']) }}">{{ $value['title'] }}</a></h1>
                                        <h2>{{ $value['channelTitle'] }}</h2>
                                        <h2>{{ $value['viewCount'] }} views {{ $value['publishedAt'] }}</h2>

                                        <p>{{ $value['description'] }}</p>


                                        <ul>
                                            <li>
                                                <div class="c_info">
                                                    <span id="c_stars" data-star="{{ $value['rate'] }}"></span>
                                                    <div class="c_num">{{ $value['rate'] }}</div >
                                                </div>
                                            </li>
                                        </ul>

                                        {{--<div class="c_info">--}}
                                        {{--<span id="c_stars" data-star="{{ $value['rate'] }}"></span>--}}
                                        {{--<div class="c_num">{{ $value['rate'] }}</div >--}}
                                        {{--</div>--}}

                                        {{--<ul>--}}
                                        {{--<li><i class="fa fa-eye"></i></li>--}}
                                        {{--<li><i class="fa fa-heart-o"></i></li>--}}
                                        {{--<li><i class="fa fa-envelope-o"></i></li>--}}
                                        {{--<li><i class="fa fa-share-alt"></i></li>--}}
                                        {{--</ul>--}}

                                    </div>

                                </div>

                            @endforeach

                        @endif



                    </div>
                </div>
            </section>



            <section>
                <div class="feed-container">
                    <h4 class="feed-topic">Home & Garden</h4>
                    <div class="owl-carousel">

                        @if(isset($result['home']))

                            @foreach($result['home'] as $key => $value)

                                <div class="card">
                                    <div class="card-thumbnail">
                                        <a href="{{ asset('/'.$value['id']) }}">
                                            <img src="https://i.ytimg.com/vi/{{ $value['id'] }}/mqdefault.jpg?custom=true&w=196&h=110&stc=true&jpg444=true&jpgq=90&sp=68" class="left"/>
                                        </a>
                                    </div>
                                    <div class="right">
                                        <h1><a href="{{ asset('/'.$value['id']) }}">{{ $value['title'] }}</a></h1>
                                        <h2>{{ $value['channelTitle'] }}</h2>
                                        <h2>{{ $value['viewCount'] }} views {{ $value['publishedAt'] }}</h2>

                                        <p>{{ $value['description'] }}</p>


                                        <ul>
                                            <li>
                                                <div class="c_info">
                                                    <span id="c_stars" data-star="{{ $value['rate'] }}"></span>
                                                    <div class="c_num">{{ $value['rate'] }}</div >
                                                </div>
                                            </li>
                                        </ul>

                                    </div>

                                </div>

                            @endforeach

                        @endif



                    </div>
                </div>
            </section>

        </div>

    </div>



@stop


