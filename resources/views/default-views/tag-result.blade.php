@extends('default-views.component.base')
@section('title',$tag->name)
<style>
    .tag-result .pic img {
        display: block;
        max-width: 100%;
        height: 260px;
        margin: 0px auto;
    }

    .tag-result .pic-count {
        top: 0;
        right: 0;
    }

    .tag-result .pagination {
        display: inline-flex;
    }

</style>
@section('content')
    @component('default-views.component.tags')
    @endcomponent

    <div class="tag-result">
        <div class="row mt-4 mb-4">
            @foreach($albums as $album)
                <figure class="col-6 col-md-2 pic-item pl-1 pr-1 pl-md-2 pr-md-2">
                    <a class="pic d-block position-relative" href="/album/{{$album->id}}" title="{{$album->title}}">
                        <img class="figure-img lazyload"
                             src="/images/loading.gif"
                             data-src="{{$album->cover}}"
                             alt="{{$album->title}}">
                        <figcaption class="figure-caption pic-title text-truncate">{{$album->title}}</figcaption>
                        <span class="position-absolute pic-count badge badge-secondary m-2 p-1">
                            {{$album->pic_count}}P
                        </span>
                    </a>
                </figure>
            @endforeach
        </div>

        <div class="text-center">
            {{$albums->links()}}
        </div>
    </div>
@endsection