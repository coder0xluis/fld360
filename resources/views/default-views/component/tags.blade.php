<style>
    .component-tags .tag-item {
        color: #FFF;
    }
</style>
<div class="component-tags container my-3">
    <h6>热门标签</h6>

    @foreach($tags as $tag)
        <a href="/tag/{{$tag->id}}" class="tag-item btn btn-secondary btn-sm mr-2 mt-2"
           role="button" title="{{$tag->name}}">{{$tag->name}}</a>
    @endforeach
</div>