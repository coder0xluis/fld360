@extends('default-views.component.base')
@section('title',$album->title.' - '.$sub_cate->name)
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
                <nav aria-label="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                    <span>分类：</span>
                    <ol class="breadcrumb">
                        @if(!empty($cate))
                            <li class="breadcrumb-item" itemprop="itemListElement" itemscope
                                itemtype="http://schema.org/ListItem">
                                <a href="{{url('/category/'.$cate->id)}}">
                                    {{$cate->name}}
                                </a>
                                <meta itemprop="item" content="{{url('/category/'.$cate->id)}}">
                                <meta itemprop="name" content="{{$cate->name}}">
                                <meta itemprop="position" content="1"/>
                            </li>
                        @endif
                        <li class="breadcrumb-item" itemprop="itemListElement" itemscope
                            itemtype="http://schema.org/ListItem">
                            <a href="{{url('/category/'.$sub_cate->id)}}">
                                {{$sub_cate->name}}
                            </a>
                            <meta itemprop="item" content="{{url('/category/'.$sub_cate->id)}}">
                            <meta itemprop="name" content="{{$sub_cate->name}}">
                            @if(!empty($cate))
                                <meta itemprop="position" content="2"/>
                            @else
                                <meta itemprop="position" content="1"/>
                            @endif
                        </li>
                        <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope
                            itemtype="http://schema.org/ListItem">
                            {{$album->title}}
                            <meta itemprop="item" content="{{url()->current()}}">
                            <meta itemprop="name" content="{{$album->title}}">
                            <meta itemprop="position" content="3"/>
                        </li>
                    </ol>
                </nav>
            </div>

            <figure itemscope itemtype="http://schema.org/ImageGallery">
                <a href="{{$images_paginate->hasMorePages() ? $images_paginate->nextPageUrl() :url()->current()}}">
                    <img class="figure-img lazyload pic"
                         src="/images/loading.gif"
                         data-src="{{$images_paginate->first()->url}}"
                         alt="{{$album->title}}">
                </a>


                <meta itemprop="url" content="{{url()->current()}}">
                <meta itemprop="name" content="{{$album->title}}">
                <meta itemprop="image thumbnailUrl" content="{{$images_paginate->first()->url}}">
                {{--<meta itemprop="contentUrl" content="{{$images_paginate->first()->url}}">--}}
                <meta itemprop="datePublished" content="{{$album->created_at}}">
                @if(!$tags->isEmpty())
                    <meta itemprop="keywords" content="{{$sub_cate->name.','.$tags->implode('name',',')}}">
                @endif

                @if($images_paginate->hasMorePages())
                    <meta itemprop="relatedLink" content="{{$images_paginate->nextPageUrl()}}">
                @endif

            </figure>
            @if($images_paginate->hasMorePages())
                <p class="small text-dark text-center mt-2">点击图片可浏览下一页</p>
            @endif


            <div class="text-center mt-1 mt-md-3">
                <div class="text-center">
                    <iframe src="https://rcm-cn.amazon-adsystem.com/e/cm?o=28&p=283&l=ur1&category=hpc&banner=1A1RPH84SECHP1F4ZC82&f=ifr&linkID=9a4ac322575f88aa645ccc9650e52329&t=fld360-23&tracking_id=fld360-23"
                            width="650" height="45" scrolling="no" border="0" marginwidth="0" style="border:none;"
                            frameborder="0"></iframe>
                </div>
                {{$images_paginate->links()}}
            </div>


            @if(!$tags->isEmpty())
                <div class="tags">
                    <span>标签：</span>
                    <div class="tags-group">
                        @foreach($tags as $tag)
                            <a class="btn btn-info btn-sm text-white" href="{{url('/tag/'.$tag->id)}}" rel="tag"
                               title="{{$tag->name}}">
                                {{$tag->name}}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif


            <div class="container similar">
                <h5 class="mt-2 mb-2">猜你喜欢</h5>
                <div class="row similar-group">
                    @foreach($similar_albums as $album)
                        <figure class="col-6 col-md-3 pl-1 pr-1 pl-md-2 pr-md-2" itemscope
                                itemtype="http://schema.org/ImageObject">
                            <a href="{{url('/album/'.$album->id)}}" title="{{$album->title}}" itemprop="url">
                                <img class="figure-img lazyload pic"
                                     src="/images/loading.gif"
                                     data-src="{{$album->cover}}"
                                     alt="{{$album->title}}">
                                <figcaption
                                        class="figure-caption text-truncate text-center"
                                        itemprop="name caption">
                                    {{$album->title}}
                                </figcaption>

                                <meta itemprop="image thumbnail" content="{{$album->cover}}">
                                <meta itemprop="contentUrl" content="{{$album->cover}}">
                                <meta itemprop="datePublished" content="{{$album->created_at}}">
                            </a>
                        </figure>
                    @endforeach
                </div>
            </div>
        </div>

        {{--right side bar--}}
        <div class="col-12 col-md-3">

            <div class="text-center mb-md-3">
                <iframe src="https://rcm-cn.amazon-adsystem.com/e/cm?o=28&p=12&l=ur1&category=hpc&banner=1V2JRJ1839H3AW9EXF02&f=ifr&linkID=bb3e6b1fe24d86910bd17a3cec340f54&t=fld360-23&tracking_id=fld360-23"
                        width="300" height="250" scrolling="no" border="0" marginwidth="0" style="border:none;"
                        frameborder="0"></iframe>
            </div>
            <div class="hot">
                <h5>推荐图集</h5>
                <div class="list-group list-group-flush">
                    @foreach($recommend_albums as $album)
                        <div itemscope itemtype="http://schema.org/ImageObject">
                            <a href="{{url('/album/'.$album->id)}}" class="list-group-item text-truncate"
                               title="{{$album->title}}"
                               itemprop="url">
                                {{$album->title}}</a>
                            <meta itemprop="name caption" content="{{$album->title}}">
                            <meta itemprop="image thumbnail" content="{{$album->cover}}">
                            <meta itemprop="contentUrl" content="{{$album->cover}}">
                            <meta itemprop="datePublished" content="{{$album->created_at}}">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="today-pics">
                <h5>今日更新</h5>
                <div class="list-group list-group-flush">
                    @foreach($today_albums as $album)
                        <div itemscope itemtype="http://schema.org/ImageObject">
                            <a href="{{url('/album/'.$album->id)}}" class="list-group-item text-truncate"
                               title="{{$album->title}}"
                               itemprop="url">
                                {{$album->title}}
                            </a>
                            <meta itemprop="name caption" content="{{$album->title}}">
                            <meta itemprop="image thumbnail" content="{{$album->cover}}">
                            <meta itemprop="contentUrl" content="{{$album->cover}}">
                            <meta itemprop="datePublished" content="{{$album->created_at}}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection