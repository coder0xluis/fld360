@extends('default-views.component.base')
@section('title',$current_cate->name)
<style>
    .categories .nav {
        border-bottom: 1px solid #c5c5c5;
        margin: 15px 0;
    }

    .categories .pic-item {
        padding-left: 7px;
        padding-right: 7px;
        text-align: center;
    }

    .categories .pic {
        /*background-color: #F5F5F5;*/
    }

    .categories .pic img {
        display: block;
        max-width: 100%;
        height: 260px;
        margin: 0px auto;
        object-fit: cover;
    }

    .categories .pic .pic-title {
        display: block;
        color: #5e5d5b;
        padding: 7px 0;
    }

    .categories .pagination {
        margin: 20px 0 30px;
        display: inline-flex;
    }

    .categories .pic-count {
        top: 0;
        right: 0;
    }

</style>
@section('content')
    <div class="categories">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link {{$category['id']==$current_cid?'disabled':''}}"
                   href="/category/{{$category['id']}}"
                   title="{{$category['name']}}">全部</a>
            </li>
            @if(!empty($category['childs']))
                @foreach($category['childs'] as $cate)
                    <li class="nav-item">
                        <a class="nav-link {{$cate['id']==$current_cid?'disabled':''}}" href="/category/{{$cate['id']}}"
                           title="{{$cate['name'] . (str_contains($cate['name'],'图片')?'':'图片')}}">
                            {{$cate['name'] . (str_contains($cate['name'],'图片')?'':'图片')}}
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>

        <div class="row">
            @foreach($albums as $album)
                <figure class="pic-item col-6 col-md-2 pl-1 pr-1">
                    <a class="pic d-block position-relative" href="/album/{{$album->id}}" title="{{$album->title}}">
                        <img class="figure-img lazyload"
                             src="/images/loading.gif"
                             data-src="{{$album->cover}}"
                             alt="{{$album->title}}">
                        <span class="position-absolute pic-count badge badge-secondary m-2 p-1">{{$album->pic_count}}
                            P</span>
                    </a>
                    <figcaption class="figure-caption pic-title text-truncate m-2 mt-0 mb-0">
                        <a class="text-secondary" href="/album/{{$album->id}}"
                           title="{{$album->title}}">{{$album->title}}</a>
                    </figcaption>

                    {{--<div class="album-tags text-left">--}}
                    {{--@if($album->tags)--}}
                    {{--@foreach($album->tags as $tag)--}}
                    {{--<a class="btn btn-sm btn-secondary text-truncate p-1" href="/tag/{{$tag->id}}"--}}
                    {{--title="{{$tag->name}}">{{$tag->name}}</a>--}}
                    {{--@endforeach--}}
                    {{--@endif--}}
                    {{--</div>--}}
                </figure>
            @endforeach
        </div>

        <div class="">
            {{$albums->onEachSide(1)->links()}}
        </div>

    </div>
@endsection