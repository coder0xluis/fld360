<style>
    .cate-preview {
        display: inline-block;
        margin: 25px 0 15px;
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
<div class="container cate-preview">
    <div class="cate-head d-flex">
        <h3 class="cate-name float-left">{{$cate['name']}}</h3>
        <div class="d-flex child-cates">
            {{--@foreach($cate['childs'] as $child_cate)--}}
                {{--<a class="btn btn-sm btn-link cate-item " href="/category/{{$child_cate['id']}}"--}}
                   {{--title="{{$child_cate['name']}}">{{$child_cate['name']}}</a>--}}
            {{--@endforeach--}}
        </div>
        <a class="cate-more btn btn-sm btn-link" href="/category/{{$cate['id']}}" title="{{$cate['name']}}">查看更多</a>
    </div>
    <div class="row">
        @foreach($cate['albums'] as $album)

            <figure class="col-2 text-center mb-3">
                <a class="position-relative d-block" href="/album/{{$album->id}}" title="{{$album->title}}">
                    <img class="figure-img img-fluid pic lazyload"
                         src="/images/loading.gif"
                         data-src="{{$album->cover}}"
                         alt="{{$album->title}}">
                    <figcaption class="figure-caption d-block text-truncate album-title p-y-2">
                        {{$album->title}}
                    </figcaption>

                    <span class="position-absolute pic-count badge badge-secondary m-2 p-1">{{$album->pic_count}}P</span>
                </a>
            </figure>

        @endforeach

    </div>

    {{$slot}}
</div>