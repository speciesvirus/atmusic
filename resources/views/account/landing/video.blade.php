
@if($result != null)

    <form rel="async" method="post" action="{{ asset('/service/video/post/'.$result['id']) }}">
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Description</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="dashboard-widget-content">

                            <iframe id="yt-embed" src="https://www.youtube.com/embed/{{ $result['id'] }}" frameborder="0" allowfullscreen></iframe>

                            <h2 class="title">
                                <a href="{{ $result['id'] }}" target="_blank">{{ $result['snippet']['title'] }}</a>
                            </h2>
                            <div class="byline">
                                <span>{{ number_format($result['statistics']['viewCount']) }} views</span> by <a>{{ $result['snippet']['channelTitle'] }}</a>
                            </div>
                            <p class="excerpt"><pre>{{ $result['snippet']['description'] }}</pre></p>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">


            <!-- Start to do list -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Download</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="">
                            <ul class="to_do">
                                <li>
                                    <div class="checkbox-input {{ isset($social[1][3]) ? 'has-warning' : (isset($social[1][1]) ? ($social[1][1]['user'] ? 'has-success' : null) : null) }}">
                                        <input type="text" class="form-control" name="1" placeholder="Jook" value="{{ isset($social[1][1])?$social[1][1]['url']:null }}">
                                        <span class="help-inline">{{ isset($social[1][3]['url']) ? '* '.$social[1][3]['url'] : null }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox-input {{ isset($social[3][3]) ? 'has-warning' : (isset($social[3][1]) ? ($social[3][1]['user'] ? 'has-success' : null) : null) }}">
                                        <input type="text" class="form-control" name="3" placeholder="KKBox" value="{{ isset($social[3][1])?$social[3][1]['url']:null }}">
                                        <span class="help-inline">{{ isset($social[3][3]) ? '* '.$social[3][3]['url'] : null }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox-input">
                                        <input type="text" class="form-control" placeholder="iTunes">
                                    </div>
                                </li>
                                {{--<li>--}}
                                {{--<div class="checkbox checkbox-input">--}}
                                {{--<label>--}}
                                {{--<input type="checkbox" value="">--}}
                                {{--<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>--}}
                                {{--<p class="">iTunes</p>--}}
                                {{--<input type="text" class="form-control" placeholder="">--}}
                                {{--</label>--}}
                                {{--</div>--}}
                                {{--</li>--}}


                            </ul>
                        </div>
                    </div>
                </div>

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Media</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="">
                            <ul class="to_do">
                                <li>
                                    <div class="checkbox-input {{ isset($social[2][3]) ? 'has-warning' : (isset($social[2][1]) ? ($social[2][1]['user'] ? 'has-success' : null) : null) }}">
                                        <input type="text" class="form-control" name="2" placeholder="facebook" value="{{ isset($social[2][1])?$social[2][1]['url']:null }}">
                                        <span class="help-inline">{{ isset($social[2][3]) ? '* '.$social[2][3]['url'] : null }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox-input">
                                        <input type="text" class="form-control" placeholder="google plus">
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox-input">
                                        <input type="text" class="form-control" placeholder="twitter">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End to do list -->

            <!-- start of weather widget -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Social</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="">
                            <ul class="to_do">
                                <li>
                                    <div class="checkbox-input">
                                        <input type="text" class="form-control" placeholder="Jook">
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox-input">
                                        <input type="text" class="form-control" placeholder="KKBox">
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox-input">
                                        <input type="text" class="form-control" placeholder="iTunes">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Music</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="">
                            <ul class="to_do">
                                <li>
                                    <div class="checkbox-input">
                                        <input type="text" class="form-control" placeholder="Chord Tab">
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox-input">
                                        <input type="text" class="form-control" placeholder="SiamZone">
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of weather widget -->




        </div>

        <div class="_fx _lf _btm _w100 _dsa">
            <div class="clearfix">
                <div class="_fr">
                    <a href="#" class="btn btn-default" id="discard" role="button">Discard</a>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </form>


@else

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Description</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">

                        Video not found!

                    </div>
                </div>
            </div>
        </div>

    </div>

@endif
