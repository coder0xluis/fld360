<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
          content="海量福利图片每日更新：{{collect($categories)->implode('name',',')}}"/>
    <meta name="google-site-verification" content="poQyj7ya9cVNTQjcgrVTYBMZt-syMKSpk9gRqyG24jA"/>
    <link rel="stylesheet" href="/css/app.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-134838157-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-134838157-1');
    </script>

    <title>@yield('title') - 福利岛</title>
</head>
<body>
@component('default-views.component.head')@endcomponent

<div class="container">
    @yield('content')
</div>

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