<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/css/app.css">

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