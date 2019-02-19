<style>
    .cate-preview {
        display: inline-block;
        /*margin: 25px 0 15px;*/
    }

    .cate-preview .cate-head {
        overflow: hidden;
    }

    .cate-preview .col-2 {
        padding: 0 8px;
    }

    .cate-preview .pic {
        max-width: 100%;
        height: 255px;
    }

    .cate-preview .child-cates .cate-item {
        color: #585858;
        padding: auto 0.25rem;
    }

    .cate-preview .album-title {
        color: #585858;
    }

    .cate-preview .pic-count {
        top: 0;
        right: 0;
    }
</style>
<div class="cate-preview mt-3 mb-3">
    <div class="row cate-head pl-2 pr-2 align-items-center">
        <h4 class="cate-name mb-0 mr-2">{{$cate['name']}}</h4>
        @if(!empty($cate['childs']))
            <ul class="nav">
                @foreach($cate['childs'] as $child_cate)
                    <li class="nav-item mr-1">
                        <a class="nav-link text-secondary pl-1 pr-1" href="/category/{{$child_cate['id']}}"
                           title="{{$child_cate['name']}}">
                            {{$child_cate['name']}}
                        </a>
                    </li>
                    {{--<a class="btn btn-sm btn-link cate-item " href="/category/{{$child_cate['id']}}"--}}
                    {{--title="{{$child_cate['name']}}">{{$child_cate['name']}}</a>--}}
                @endforeach
                <li class="nav-item">
                    <a class="nav-link pl-1 pr-1" href="/category/{{$cate['id']}}"
                       title="{{$cate['name']}}">查看更多</a>
                </li>
            </ul>
        @endif

        {{--<div class="d-flex child-cates">--}}
        {{--@if(!empty($cate['childs']))--}}
        {{--@foreach($cate['childs'] as $child_cate)--}}
        {{--<a class="btn btn-sm btn-link cate-item " href="/category/{{$child_cate['id']}}"--}}
        {{--title="{{$child_cate['name']}}">{{$child_cate['name']}}</a>--}}
        {{--@endforeach--}}
        {{--@endif--}}
        {{--</div>--}}

    </div>
    <div class="row">
        @foreach($cate['albums'] as $album)
            <figure class="col-6 col-md-2 text-center pl-1 pr-1 pl-md-2 pr-md-2 mb-2 mb-md-3">
                <a class="position-relative d-block" href="/album/{{$album->id}}" title="{{$album->title}}">
                    <img class="figure-img img-fluid pic lazyload"
                         src="/images/loading.gif"
                         data-src="{{$album->cover}}"
                         alt="{{$album->title}}">
                    <figcaption class="figure-caption d-block text-truncate album-title">
                        {{$album->title}}
                    </figcaption>

                    <span class="position-absolute pic-count badge badge-secondary m-2 p-1">{{$album->pic_count}}
                        P</span>
                </a>
            </figure>

        @endforeach

    </div>

    {{$slot}}
</div>