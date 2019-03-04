<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords"
          content="高清,无码,福利,私房照,写真,性感写真,素材,头像,微信头像,情侣头像,qq头像,女生头像,漫画,搞笑,壁纸,电脑壁纸,手机壁纸,风景,帅哥,明星,空姐,人体艺术,美女图片,欧美图片,图片大全,天下美图,好看的图片"/>
    <meta name="description"
          content="海量福利高清无码图片每日更新：{{collect($categories)->implode('name',',')}}"/>
    <meta name="google-site-verification" content="poQyj7ya9cVNTQjcgrVTYBMZt-syMKSpk9gRqyG24jA"/>
    <link rel="stylesheet" href="/css/app.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-134838157-1"></script>
    <link rel="icon" type="image/x-icon" href="/images/website-icon.png"/>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-134838157-1');
    </script>

    {{--google adsense--}}
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-0602636427871603",
            enable_page_level_ads: true
        });
    </script>

    <title>@yield('title') - 福利岛</title>
</head>
<body>
@component('default-views.component.head')@endcomponent

<div class="container">
    @yield('content')
</div>

@component('default-views.component.friend-links')
@endcomponent


@component('default-views.component.foot')
@endcomponent

<script src="/js/app.js" type="text/javascript"></script>

<script>
    $(function () {
        $('img.lazyload').lazyload();
    })
</script>
</body>
</html>