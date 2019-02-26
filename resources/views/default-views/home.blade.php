@extends('default-views.component.base')

@section('title','福利图片每日更新')

@section('content')

    @foreach($categories as $category)
        @component('default-views.component.category_images_preview',['cate'=>$category])
            {{--<p class="alert alert-success text-center">广告位</p>--}}
        @endcomponent
    @endforeach

    @component('default-views.component.tags')
    @endcomponent

@endsection



