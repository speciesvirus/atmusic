@extends('layouts.main')

@section('title', 'memo')

@section('facebook-meta')
    <meta property="og:type"          content="article" />
    <meta property="og:title"         content="สัญญาเพิ่มเติมกลุ่มโรคร้ายแรง" />
    <meta property="og:description"   content="เมื่อตรวจพบว่าเป็นโรคร้ายแรงเป็นครั้งแรกในขณะที่ยังมีชีวิตอยู่ การได้รับชดเชยเงินก้อนจะช่วยในการวางแผนการรักษาได้เป็นอย่างมาก อย่าปล่อยให้โรคร้ายแรงทำร้ายคนทั้งบ้าน ให้เอไอเอ เป็นผู้ดูแลคุณและคนที่คุณรัก" />
    {{--<meta property="og:image"         content="{{ asset("components/image/ECIR/ecir_logo.jpg") }}" />--}}
@stop




@section('content')

    <div class="page-content">
        <ul>
            <li>
                <div class="clash-card archer">
                    <div class="clash-card__image clash-card__image--archer">
                        <img src="https://i.ytimg.com/vi/WvsDpFFC2Js/hqdefault.jpg?custom=true&w=320&h=180&stc=true&jpg444=true&jpgq=90&sp=68&sigh=m7iqIgc6LqvyU7ZQ-dX1798m8Aw" alt="archer" style="display: block;">
                    </div>
                    <div class="c_info">
                        <span id="c_stars" data-star="3.5"><span style="width: 42px;"></span></span>
                        <div class="c_num">3.5</div>
                    </div>

                    <div class="clash-card__unit-description">
                        <div class="clash-card__level">ปริศนาฟ้าแลบ วันที่ 22 กรกฎาคม 2559 ตอนที่ 4</div>
                        <p class="c_industry">Digital Media</p>
                        <p class="c_industry">91,843 views 3 days ago</p>
                    </div>

                    <div class="clash-card__unit-stats clearfix">
                        <a href="https://www.facebook.com/designcouch" target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://www.twitter.com/designcouch" target="_blank">
                            <i class="fa fa-youtube"></i>
                        </a>
                        <a href="https://www.dribbble.com/designcouch" target="_blank">
                            <i class="fa fa-plus-circle"></i>
                        </a>
                        <a href="https://www.codepen.io/designcouch/public">
                            <i class="fa fa-clock-o"></i>
                        </a>

                        <a href="javascript://" class="more-info">
                            <i class="fa fa-user"></i>
                        </a>

                    </div>

                </div>
            </li>
        </ul>
    </div>

@stop
