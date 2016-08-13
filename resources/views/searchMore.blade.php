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