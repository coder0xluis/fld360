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

    .similar {
        font-size: 12px;
        margin-top: 20px;
    }

    .similar .similar-group .col-3 {
        margin-top: 10px;
        padding-left: 6px;
        padding-right: 6px;
    }

    .similar .similar-group .pic {
        display: block;
        max-width: 100%;
        height: 260px;
        margin: 0 auto;
        object-fit: cover;
    }

    .similar .similar-group a .text-truncate {
        display: block;
        margin: 7px 3px;
    }
</style>

@section('content')
    <div class="row detail">
        {{--left area--}}
        <div class="col-12 col-md-9">
            <div>
                <h4>{{$album->title}}</h4>
                <nav aria-label="breadcrumb" itemprop=breadcrumb>
                    <span>分类：</span>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/category/{{$cate->id}}">{{$cate->name}}</a></li>
                        <li class="breadcrumb-item"><a href="/category/{{$sub_cate->id}}">{{$sub_cate->name}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$album->title}}</li>
                    </ol>
                </nav>
            </div>

            {{--{{dd($album,$images, $image)}}--}}
            <a href="/album/{{$album->id}}/{{$next_image?$next_image->id:''}}" title="{{$album->title}}">
                <img class="lazyload pic"
                     src="/images/loading.gif"
                     data-src="{{$image->url}}"
                     alt="{{$album->title}}">
            </a>


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

            @php
                $current_page = $images->keyBy('id')->keys()->search($image->id) +1
            @endphp

            <nav class="text-center" aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item {{$current_page === 1 ? 'disabled':''}}">
                        <a class="page-link"
                           href="/album/{{$album->id}}/{{$current_page > 1 ?$images[$current_page-2]->id:''}}"
                           aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>

                    @foreach($images as $key=>$img)
                        <li class="page-item {{$image->id == $img->id ? 'active':''}} ">
                            <a class="page-link" href="/album/{{$album->id}}/{{$img->id}}">{{$key+1}}</a>
                        </li>
                    @endforeach


                    <li class="page-item {{$current_page === count($images) ? 'disabled':''}}">
                        <a class="page-link"
                           href="/album/{{$album->id}}/{{$current_page < count($images) ?$images[$current_page]->id:''}}"
                           aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="container similar">
                <h5>相似图片</h5>
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