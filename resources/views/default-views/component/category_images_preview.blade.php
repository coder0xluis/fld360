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
        object-fit: cover;
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
    <div class="row cate-head pl-2 pr-2 mb-2 align-items-center">
        <h3 class="cate-name mb-md-0 mb-2 mr-2">{{$cate['name']}}</h3>
        @if(!empty($cate['childs']))
            <ul class="nav" itemscope itemtype="http://schema.org/BreadcrumbList">
                @foreach($cate['childs'] as $child_cate)
                    <li class="nav-item mr-1 mr-md-2" itemprop="itemListElement" itemscope
                        itemtype="http://schema.org/ListItem">
                        <a class="nav-link text-secondary pl-1 pr-1 small"
                           href="{{url('/category/'.$child_cate['id'])}}"
                           title="{{$child_cate['name']}}">
                            {{--{{$child_cate['name']}}--}}
                            {{$child_cate['name'] . (str_contains($child_cate['name'],'图片')?'':'图片')}}
                            <meta itemprop="name" content="{{$child_cate['name']}}">
                            <meta itemprop="item" content="{{url('/category/'.$child_cate['id'])}}">
                            <meta itemprop="position" content="2">
                        </a>
                    </li>
                @endforeach
                <li class="nav-item" itemprop="itemListElement" itemscope
                    itemtype="http://schema.org/ListItem">
                    <a class="nav-link pl-1 pr-1 small" href="{{url('/category/'.$cate['id'])}}"
                       title="{{$cate['name']}}">查看更多</a>
                    <meta itemprop="name" content="{{$cate['name']}}">
                    <meta itemprop="item" content="{{url('/category/'.$cate['id'])}} ">
                    <meta itemprop="position" content="1">
                </li>
            </ul>
        @endif

    </div>
    <div class="row">
        @foreach($cate['albums'] as $album)
            <figure class="col-6 col-md-2 text-center pl-1 pr-1 pl-md-2 pr-md-2 mb-2 mb-md-3" itemscope
                    itemtype="http://schema.org/ImageGallery">
                <a class="position-relative d-block" href="{{url('/album/'.$album->id)}}" title="{{$album->title}}"
                   itemprop="url">
                    <img class="figure-img img-fluid pic lazyload"
                         src="/images/loading.gif"
                         data-src="{{$album->cover}}"
                         alt="{{$album->title}}">
                    <figcaption class="figure-caption d-block text-truncate album-title" itemprop="name">
                        {{$album->title}}
                    </figcaption>
                    <span class="position-absolute pic-count badge badge-secondary m-2 p-1">
                        {{$album->pic_count}}P
                    </span>

                    <meta itemprop="relatedLink" content="{{url('/category/'.$album->cate_id)}}">
                    <meta itemprop="image thumbnailUrl" content="{{$album->cover}}">
                    <meta itemprop="datePublished" content="{{$album->created_at}}">
                </a>
            </figure>

        @endforeach

    </div>

    {{$slot}}
</div>