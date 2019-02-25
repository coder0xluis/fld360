<style>
    .component-tags {
        display: inline-block;
    }

    .component-tags .tag-item {
        color: #FFF;
    }
</style>
<div class="component-tags mt-3 mb-3">
    <h5>热门标签</h5>
    <div itemscope>
        @foreach($tags as $tag)
            <a href="/tag/{{$tag->id}}" class="tag-item btn btn-secondary btn-sm mr-2 mt-2"
               rel="tag" itemprop="tag" title="{{$tag->name}}">{{$tag->name}}</a>
        @endforeach
    </div>
</div>