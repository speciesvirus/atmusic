@extends('layouts.main')

@section('title', 'unbok')

@section('facebook-meta')
    <meta property="og:type"          content="article" />
    <meta property="og:title"         content="สัญญาเพิ่มเติมกลุ่มโรคร้ายแรง" />
    <meta property="og:description"   content="เมื่อตรวจพบว่าเป็นโรคร้ายแรงเป็นครั้งแรกในขณะที่ยังมีชีวิตอยู่ การได้รับชดเชยเงินก้อนจะช่วยในการวางแผนการรักษาได้เป็นอย่างมาก อย่าปล่อยให้โรคร้ายแรงทำร้ายคนทั้งบ้าน ให้เอไอเอ เป็นผู้ดูแลคุณและคนที่คุณรัก" />
    {{--<meta property="og:image"         content="{{ asset("components/image/ECIR/ecir_logo.jpg") }}" />--}}
@stop

@section('source')

    <link rel="stylesheet" type="text/css" href="{{ asset("components/css/form.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("components/css/account.css") }}">

@stop



@section('content')

    <div class="page-content">

        <div class="container">

            <div id="legend">
                <h3 class="page-header">Account</h3>
            </div>

            <div class="row tile_count">

                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-trophy"></i> Ranking</span>
                    <div class="count green">2,500</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-eye"></i> Visitor</span>
                    <div class="count">4,567</div>
                    <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-hand-o-up"></i> Total Connections</span>
                    <div class="count">7,325</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="green"><i class="fa fa-thumbs-o-up"></i></i> Approved</span>
                    <div class="count">2500</div>

                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="red"><i class="fa fa-thumbs-o-down"></i></i> Disapprove</span>
                    <div class="count">123.50</div>

                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="orange"><i class="fa fa-thumb-tack"></i></i> Waiting</span>
                    <div class="count">2,315</div>

                </div>



            </div>

            {{--<div class="row">--}}


                {{--<div class="col-md-4 col-sm-4 col-xs-12">--}}
                    {{--<div class="x_panel tile fixed_height_320">--}}
                        {{--<div class="x_title">--}}
                            {{--<h2>App Versions</h2>--}}
                            {{--<ul class="nav navbar-right panel_toolbox">--}}
                                {{--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                                {{--</li>--}}
                                {{--<li class="dropdown">--}}
                                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                                    {{--<ul class="dropdown-menu" role="menu">--}}
                                        {{--<li><a href="#">Settings 1</a>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="#">Settings 2</a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="clearfix"></div>--}}
                        {{--</div>--}}
                        {{--<div class="x_content">--}}
                            {{--<h4>App Usage across versions</h4>--}}
                            {{--<div class="widget_summary">--}}
                                {{--<div class="w_left w_25">--}}
                                    {{--<span>0.1.5.2</span>--}}
                                {{--</div>--}}
                                {{--<div class="w_center w_55">--}}
                                    {{--<div class="progress">--}}
                                        {{--<div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">--}}
                                            {{--<span class="sr-only">60% Complete</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="w_right w_20">--}}
                                    {{--<span>123k</span>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}

                            {{--<div class="widget_summary">--}}
                                {{--<div class="w_left w_25">--}}
                                    {{--<span>0.1.5.3</span>--}}
                                {{--</div>--}}
                                {{--<div class="w_center w_55">--}}
                                    {{--<div class="progress">--}}
                                        {{--<div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">--}}
                                            {{--<span class="sr-only">60% Complete</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="w_right w_20">--}}
                                    {{--<span>53k</span>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}
                            {{--<div class="widget_summary">--}}
                                {{--<div class="w_left w_25">--}}
                                    {{--<span>0.1.5.4</span>--}}
                                {{--</div>--}}
                                {{--<div class="w_center w_55">--}}
                                    {{--<div class="progress">--}}
                                        {{--<div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">--}}
                                            {{--<span class="sr-only">60% Complete</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="w_right w_20">--}}
                                    {{--<span>23k</span>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}
                            {{--<div class="widget_summary">--}}
                                {{--<div class="w_left w_25">--}}
                                    {{--<span>0.1.5.5</span>--}}
                                {{--</div>--}}
                                {{--<div class="w_center w_55">--}}
                                    {{--<div class="progress">--}}
                                        {{--<div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">--}}
                                            {{--<span class="sr-only">60% Complete</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="w_right w_20">--}}
                                    {{--<span>3k</span>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}
                            {{--<div class="widget_summary">--}}
                                {{--<div class="w_left w_25">--}}
                                    {{--<span>0.1.5.6</span>--}}
                                {{--</div>--}}
                                {{--<div class="w_center w_55">--}}
                                    {{--<div class="progress">--}}
                                        {{--<div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">--}}
                                            {{--<span class="sr-only">60% Complete</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="w_right w_20">--}}
                                    {{--<span>1k</span>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-md-4 col-sm-4 col-xs-12">--}}
                    {{--<div class="x_panel tile fixed_height_320 overflow_hidden">--}}
                        {{--<div class="x_title">--}}
                            {{--<h2>Device Usage</h2>--}}
                            {{--<ul class="nav navbar-right panel_toolbox">--}}
                                {{--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                                {{--</li>--}}
                                {{--<li class="dropdown">--}}
                                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                                    {{--<ul class="dropdown-menu" role="menu">--}}
                                        {{--<li><a href="#">Settings 1</a>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="#">Settings 2</a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="clearfix"></div>--}}
                        {{--</div>--}}
                        {{--<div class="x_content">--}}
                            {{--<table class="" style="width:100%">--}}
                                {{--<tr>--}}
                                    {{--<th style="width:37%;">--}}
                                        {{--<p>Top 5</p>--}}
                                    {{--</th>--}}
                                    {{--<th>--}}
                                        {{--<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">--}}
                                            {{--<p class="">Device</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">--}}
                                            {{--<p class="">Progress</p>--}}
                                        {{--</div>--}}
                                    {{--</th>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--<canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<table class="tile_info">--}}
                                            {{--<tr>--}}
                                                {{--<td>--}}
                                                    {{--<p><i class="fa fa-square blue"></i>IOS </p>--}}
                                                {{--</td>--}}
                                                {{--<td>30%</td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td>--}}
                                                    {{--<p><i class="fa fa-square green"></i>Android </p>--}}
                                                {{--</td>--}}
                                                {{--<td>10%</td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td>--}}
                                                    {{--<p><i class="fa fa-square purple"></i>Blackberry </p>--}}
                                                {{--</td>--}}
                                                {{--<td>20%</td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td>--}}
                                                    {{--<p><i class="fa fa-square aero"></i>Symbian </p>--}}
                                                {{--</td>--}}
                                                {{--<td>15%</td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td>--}}
                                                    {{--<p><i class="fa fa-square red"></i>Others </p>--}}
                                                {{--</td>--}}
                                                {{--<td>30%</td>--}}
                                            {{--</tr>--}}
                                        {{--</table>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}


                {{--<div class="col-md-4 col-sm-4 col-xs-12">--}}
                    {{--<div class="x_panel tile fixed_height_320">--}}
                        {{--<div class="x_title">--}}
                            {{--<h2>Quick Settings</h2>--}}
                            {{--<ul class="nav navbar-right panel_toolbox">--}}
                                {{--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                                {{--</li>--}}
                                {{--<li class="dropdown">--}}
                                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                                    {{--<ul class="dropdown-menu" role="menu">--}}
                                        {{--<li><a href="#">Settings 1</a>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="#">Settings 2</a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="clearfix"></div>--}}
                        {{--</div>--}}
                        {{--<div class="x_content">--}}
                            {{--<div class="dashboard-widget-content">--}}
                                {{--<ul class="quick-list">--}}
                                    {{--<li><i class="fa fa-calendar-o"></i><a href="#">Settings</a>--}}
                                    {{--</li>--}}
                                    {{--<li><i class="fa fa-bars"></i><a href="#">Subscription</a>--}}
                                    {{--</li>--}}
                                    {{--<li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>--}}
                                    {{--<li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>--}}
                                    {{--</li>--}}
                                    {{--<li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>--}}
                                    {{--<li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>--}}
                                    {{--</li>--}}
                                    {{--<li><i class="fa fa-area-chart"></i><a href="#">Logout</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}

                                {{--<div class="sidebar-widget">--}}
                                    {{--<h4>Profile Completion</h4>--}}
                                    {{--<canvas width="150" height="80" id="foo" class="" style="width: 160px; height: 100px;"></canvas>--}}
                                    {{--<div class="goal-wrapper">--}}
                                        {{--<span class="gauge-value pull-left">$</span>--}}
                                        {{--<span id="gauge-text" class="gauge-value pull-left">3,200</span>--}}
                                        {{--<span id="goal-text" class="goal-value pull-right">$5,000</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}



            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>History</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content _xcl">
                            <div class="dashboard-widget-content">

                                <ul class="list-unstyled timeline widget">

                                    @if($histories != null)
                                        @foreach($histories as $history)
                                            <li>
                                                <div class="block">
                                                    <div class="block_content">
                                                        <h2 class="title _st{{ $history->status }}">{{ $history->video }}</h2>
                                                        <div class="byline">
                                                            <span>{{ date('F d, Y', strtotime($history->created_at)) }}</span> - <a>{{ $history->name }}</a>
                                                        </div>
                                                        <p class="excerpt">{{ $history->title }} : {{ $history->description }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-8 col-sm-8 col-xs-12">



                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Video  <small>description</small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="dashboard-widget-content">

                                        <form class="form-inline" id="formVideoSearch">
                                            <input type="text" class="form-control" id="videoInput" placeholder="Youtube URL ex.https://www.youtube.com/watch?v=xxxxxxxxxxx">
                                            <button type="submit" class="btn btn-default">Find</button>
                                        </form>

                                        {{--<div class="col-md-4 hidden-small">--}}
                                            {{--<h2 class="line_30">125.7k Views from 60 countries</h2>--}}

                                            {{--<table class="countries_list">--}}
                                                {{--<tbody>--}}
                                                {{--<tr>--}}
                                                    {{--<td>United States</td>--}}
                                                    {{--<td class="fs15 fw700 text-right">33%</td>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<td>France</td>--}}
                                                    {{--<td class="fs15 fw700 text-right">27%</td>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<td>Germany</td>--}}
                                                    {{--<td class="fs15 fw700 text-right">16%</td>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<td>Spain</td>--}}
                                                    {{--<td class="fs15 fw700 text-right">11%</td>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<td>Britain</td>--}}
                                                    {{--<td class="fs15 fw700 text-right">10%</td>--}}
                                                {{--</tr>--}}
                                                {{--</tbody>--}}
                                            {{--</table>--}}
                                        {{--</div>--}}
                                        {{--<div id="world-map-gdp" class="col-md-8 col-sm-12 col-xs-12" style="height:230px;"></div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="video-description">

                    </div>

                </div>
            </div>
        </div>

    </div>

@stop





@section('script')

    <script type="text/javascript">


        var $formVideo = $('#formVideoSearch'),
            $divVideo = $('.video-description');

        $formVideo.submit(function (e) {
            e.preventDefault();

            $.post( "{{ route('post.video.find') }}", { id: $formVideo.find('input').val() }, function( data ) {
                console.log( data );
                $divVideo.html(data);
                ytSize();
                //console.log( data.items.length );

            });
        });



        $(window).resize(function(){
            ytSize();
            _submitBottom();
        });

        $(window).on('scroll', function() {
            _submitBottom();
        });




        function ytSize(){
            var $player = $('#yt-embed'),
                $playWidth = $player.width();

            $player.height(calcWideScreen($playWidth));
        }

        function calcWideScreen($width){
            return parseInt(($width*9)/16);
        }

        function _submitBottom(){

            var $d = $('._dsa'),
                $bo = $('body').height() - $(window).height(),
                $fh = $('.footer').height(),
                $wd = $(window).scrollTop();

            if ($wd > $bo - $fh) {
                var $ch = $wd - ($bo - $fh);
                $d.css('bottom',$ch);

            } else {
                $d.css('bottom',0);
                //mainMenu.removeClass('brand-hide');
            }

        }


    </script>

@stop
