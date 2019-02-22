@extends('default-views.component.base')
@section('title',$album->title)
<style>
    .detail {
        margin: 25px auto;
    }

    .detail span {
        color: #5e5d5b;
    }

    .detail .breadcrumb {
        background: none !important;
        display: inline-flex !important;
        padding: 0.5rem 0 !important;
        margin-bottom: 0 !important;
    }

    .detail .pic {
        display: block;
        max-width: 100%;
        margin: 0px auto;
    }

    .detail .pagination {
        margin: 1rem auto;
        display: inline-flex !important;
    }

    .detail .tags {
        margin: 1rem 0;
    }

    .hot, .today-pics {
        margin-bottom: 30px;
    }

    .hot .list-group-item,
    .today-pics .list-group-item {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
        color: #5e5d5b;
    }

    .hot .list-group-item:first-child,
    .today-pics .list-group-item:first-child {
        border-top: 0;
    }

    .hot .list-group-item,
    .today-pics .list-group-item {
        background: none;
    }

    .detail .similar {
        font-size: 12px;
        margin-top: 20px;
    }

    .detail .similar .similar-group .col-3 {
        margin-top: 10px;
        padding-left: 6px;
        padding-right: 6px;
    }

    .detail .similar .similar-group .pic {
        display: block;
        max-width: 100%;
        height: 260px;
        margin: 0 auto;
        object-fit: cover;
    }

    .detail .similar .similar-group a .text-truncate {
        display: block;
        margin: 7px 3px;
    }

    .detail .pagination {
        display: inline-flex;
    }
</style>

@section('content')
    <div class="row detail">
        {{--left area--}}
        <div class="col-12 col-md-9">
            <div>
                <h4>{{$album->title}}</h4>
                <nav aria-label="breadcrumb">
                    <span>分类：</span>
                    <ol class="breadcrumb" itemprop="breadcrumb">
                        <li class="breadcrumb-item"><a href="/category/{{$cate->id}}">{{$cate->name}}</a></li>
                        <li class="breadcrumb-item"><a href="/category/{{$sub_cate->id}}">{{$sub_cate->name}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$album->title}}</li>
                    </ol>
                </nav>
            </div>

            {{--{{dd($album,$images, $image)}}--}}
            {{--            {{dd($images_paginate->first())}}--}}
            <a href="/album/{{$album->id}}/{{$next_image?$next_image->id:''}}" title="{{$album->title}}">
                <img class="lazyload pic"
                     src="/images/loading.gif"
                     data-src="{{$images_paginate->first()->url}}"
                     alt="{{$album->title}}">
            </a>
            {{--<p class="small text-dark text-center mt-2">点击图片可浏览下一页</p>--}}


            @if(!$tags->isEmpty())
                <div class="tags" itemscope>
                    <span>标签：</span>
                    <div class="tags-group" itemprop="keywords">
                        @foreach($tags as $tag)
                            <a class="btn btn-info btn-sm text-white" href="/tag/{{$tag->id}}" rel="tag"
                               itemprop="tag" title="{{$tag->name}}">{{$tag->name}}</a>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="text-center mt-1 mt-md-3">
                {{$images_paginate->links()}}
            </div>


            <div class="container similar">
                <h5 class="mt-2 mb-2">猜你喜欢</h5>
                <div class="row similar-group">
                    @foreach($similar_albums as $album)
                        <figure class="col-6 col-md-3 pl-1 pr-1 pl-md-2 pr-md-2">
                            <a href="/album/{{$album->id}}" title="{{$album->title}}">
                                <img class="figure-img lazyload pic"
                                     src="/images/loading.gif"
                                     data-src="{{$album->cover}}"
                                     alt="{{$album->title}}">
                                <figcaption
                                        class="figure-caption text-truncate text-center">{{$album->title}}</figcaption>
                            </a>
                        </figure>
                    @endforeach
                </div>
            </div>
        </div>

        {{--right side bar--}}
        <div class="col-12 col-md-3">
            <div class="hot">
                <h5>推荐图集</h5>
                <div class="list-group list-group-flush">
                    @foreach($recommend_albums as $album)
                        <a href="/album/{{$album->id}}" class="list-group-item text-truncate" title="{{$album->title}}">
                            {{$album->title}}</a>
                    @endforeach
                </div>
            </div>

            <div class="today-pics">
                <h5>今日更新</h5>
                <div class="list-group list-group-flush">
                    @foreach($today_albums as $album)
                        <a href="/album/{{$album->id}}" class="list-group-item text-truncate" title="{{$album->title}}">
                            {{$album->title}}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection