@extends('layouts.main')

@section('title', 'unbok')

@section('facebook-meta')
    <meta property="og:type"          content="article" />
    <meta property="og:title"         content="สัญญาเพิ่มเติมกลุ่มโรคร้ายแรง" />
    <meta property="og:description"   content="เมื่อตรวจพบว่าเป็นโรคร้ายแรงเป็นครั้งแรกในขณะที่ยังมีชีวิตอยู่ การได้รับชดเชยเงินก้อนจะช่วยในการวางแผนการรักษาได้เป็นอย่างมาก อย่าปล่อยให้โรคร้ายแรงทำร้ายคนทั้งบ้าน ให้เอไอเอ เป็นผู้ดูแลคุณและคนที่คุณรัก" />
    {{--<meta property="og:image"         content="{{ asset("components/image/ECIR/ecir_logo.jpg") }}" />--}}
@stop

@section('source')

    <link rel="stylesheet" type="text/css" href="{{ asset("components/css/home.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("components/css/search.css") }}">

@stop


@section('content')

    <div class="page-content">

        <div class="feed">

            <section>
                <div class="feed-container cards">

                    @foreach($result['data'][0]['item'] as $key => $value)

                        {{--<div class="clash-card archer">--}}
                            {{--<div class="clash-card__image clash-card__image--archer">--}}
                                {{--<img src="https://i.ytimg.com/vi/{{ $value['id'] }}/mqdefault.jpg?custom=true&w=196&h=110&stc=true&jpg444=true&jpgq=90&sp=68&sigh=I4T92Vc8kyuXwphhmHCgYMT-kmg" alt="archer" style="display: block;">--}}
                            {{--</div>--}}
                            {{--<div class="c_info">--}}
                                {{--<span id="c_stars" data-star="3.5"><span style="width: 42px;"></span></span>--}}
                                {{--<div class="c_num">3.5</div>--}}
                            {{--</div>--}}

                            {{--<div class="clash-card__unit-description">--}}
                                {{--<div class="clash-card__level"><a href="{{ asset("/".$value['id']) }}">{{ $value['title'] }}</a></div>--}}
                                {{--<p class="c_industry">{{ $value['channelTitle'] }}</p>--}}
                                {{--<p class="c_industry">{{ $value['viewCount'] }} views {{ $value['publishedAt'] }}</p>--}}
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

                            {{--<div>--}}
                                {{--{{ $value['description'] }}--}}
                            {{--</div>--}}

                        <div class="card">
                            <a href="{{ asset("/".$value['id']) }}">
                                <span class="card-header" style="background-image: url(https://i.ytimg.com/vi/{{ $value['id'] }}/mqdefault.jpg?custom=true&w=196&h=110&stc=true&jpg444=true&jpgq=90&sp=68&sigh=I4T92Vc8kyuXwphhmHCgYMT-kmg);"></span>
                            </a>

                            <div class="card-summary">
                                <a href="{{ asset("/".$value['id']) }}">{{ $value['title'] }}</a>
                                <p class="c_industry">{{ $value['channelTitle'] }}</p>

                                <p>{{ $value['description'] }}</p>
                            </div>
                            <div class="card-meta">
                                <p class="c_industry">{{ $value['viewCount'] }} views {{ $value['publishedAt'] }}</p>
                            </div>
                        </div>

                    @endforeach

                    {{--@foreach($results["pageInfo"] as $key => $value)--}}
                    {{--<p>sda = {{ $results["pageInfo"]['totalResults'] }}</p>--}}
                    {{--@endforeach--}}
                    {{----}}





                    </div>


                </div>




            </section>



        </div>

    </div>

@stop
