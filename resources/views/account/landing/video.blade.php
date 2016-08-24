
@if($result != null)

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
                        <p class="excerpt">{{ $result['snippet']['description'] }}</p>

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
                    <h2>Media</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="">
                        <ul class="to_do">
                            <li>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        Option one is this and that — be sure to include why it's great
                                    </label>
                                </div>
                                <p>
                                    <input type="checkbox" class="flat"> Schedule meeting with new client </p>
                            </li>
                            <li>
                                <p>
                                    <input type="checkbox" class="flat"> Create email address for new intern</p>
                            </li>
                            <li>
                                <p>
                                    <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                            </li>
                            <li>
                                <p>
                                    <input type="checkbox" class="flat"> Copy backups to offsite location</p>
                            </li>
                            <li>
                                <p>
                                    <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                            </li>
                            <li>
                                <p>
                                    <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                            </li>
                            <li>
                                <p>
                                    <input type="checkbox" class="flat"> Create email address for new intern</p>
                            </li>
                            <li>
                                <p>
                                    <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                            </li>
                            <li>
                                <p>
                                    <input type="checkbox" class="flat"> Copy backups to offsite location</p>
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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="temperature"><b>Monday</b>, 07:30 AM
                                <span>F</span>
                                <span><b>C</b></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="weather-icon">
                                <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="weather-text">
                                <h2>Texas <br><i>Partly Cloudy Day</i></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="weather-text pull-right">
                            <h3 class="degrees">23</h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row weather-days">
                        <div class="col-sm-2">
                            <div class="daily-weather">
                                <h2 class="day">Mon</h2>
                                <h3 class="degrees">25</h3>
                                <canvas id="clear-day" width="32" height="32"></canvas>
                                <h5>15 <i>km/h</i></h5>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="daily-weather">
                                <h2 class="day">Tue</h2>
                                <h3 class="degrees">25</h3>
                                <canvas height="32" width="32" id="rain"></canvas>
                                <h5>12 <i>km/h</i></h5>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="daily-weather">
                                <h2 class="day">Wed</h2>
                                <h3 class="degrees">27</h3>
                                <canvas height="32" width="32" id="snow"></canvas>
                                <h5>14 <i>km/h</i></h5>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="daily-weather">
                                <h2 class="day">Thu</h2>
                                <h3 class="degrees">28</h3>
                                <canvas height="32" width="32" id="sleet"></canvas>
                                <h5>15 <i>km/h</i></h5>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="daily-weather">
                                <h2 class="day">Fri</h2>
                                <h3 class="degrees">28</h3>
                                <canvas height="32" width="32" id="wind"></canvas>
                                <h5>11 <i>km/h</i></h5>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="daily-weather">
                                <h2 class="day">Sat</h2>
                                <h3 class="degrees">26</h3>
                                <canvas height="32" width="32" id="cloudy"></canvas>
                                <h5>10 <i>km/h</i></h5>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end of weather widget -->
    </div>

@else

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Description</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
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

    <div class="row">


        <!-- Start to do list -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>To Do List <small>Sample tasks</small></h2>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- End to do list -->

        <!-- start of weather widget -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daily active users <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

            </div>

        </div>
        <!-- end of weather widget -->
    </div>

@endif
