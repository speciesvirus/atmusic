@extends('layouts.main')

@section('title', 'unbok')

@section('facebook-meta')
    <meta property="og:type"          content="article" />
    <meta property="og:title"         content="{{ session('search') }}" />
    <meta property="og:description"   content="{{ session('search') }}" />
    {{--<meta property="og:image"         content="{{ asset("components/image/ECIR/ecir_logo.jpg") }}" />--}}
@stop

@section('source')

    <link rel="stylesheet" type="text/css" href="{{ asset("components/css/search.css") }}">
    <script src="{{ asset("components/js/search.js") }}"></script>
@stop


@section('content')

    <div class="page-content">

        <div class="feed">

            <section>

                <div class="feed-container cards">

                    @foreach($result['data'][0]['item'] as $key => $value)

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
                        <div class="absolute-center">
                            <a href="javascript://" class="button nextPage" data-next="{{ $result['data'][0]['nextPageToken'] }}">Load More</a>
                        </div>

                </div>



            </section>

        </div>

    </div>


    <script type="text/javascript">

        $(function(){

            $(document).on("click",".nextPage",function(e) {
                e.preventDefault();

                var $this = $(this),
                        $data = $this.data('next');

                $this.toggleClass('loading');
                //$('a.button').removeClass("loading")

                $.ajax({
                    type: 'POST',
                    url: '{{ asset('service/youtube/search/more') }}',
                    data: {
                        q: '{{ session('search') }}',
                        pageToken: $data
                    },
                    success: function(data) {

                        $('.absolute-center').remove();
                        $('.cards').append(data);
                        $('a.button').removeClass("loading")
                    }
                });
            });



        });

    </script>
@stop
