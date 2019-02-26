<nav class="navbar navbar-expand-lg navbar-dark bg-dark" itemscope itemtype="http://schema.org/WPHeader">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
            福利岛
            <meta itemprop="name" content="福利岛">
            <meta itemprop="url" content="{{url('/')}}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item" itemprop="name">
                    <a class="nav-link" href="{{url('/today')}}" itemprop="url">最近更新</a>
                </li>
                @foreach($categories as $key=>$cate)
                    <li class="nav-item" itemprop="name">
                        <a class="nav-link" href="{{url('/category/'.$cate['id'])}}" itemprop="url">{{$cate['name']}}</a>
                    </li>
                @endforeach

                {{--<li class="nav-item dropdown">--}}
                {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"--}}
                {{--aria-haspopup="true" aria-expanded="false">--}}
                {{--Dropdown link--}}
                {{--</a>--}}
                {{--<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
                {{--<a class="dropdown-item" href="#">Action</a>--}}
                {{--<a class="dropdown-item" href="#">Another action</a>--}}
                {{--<a class="dropdown-item" href="#">Something else here</a>--}}
                {{--</div>--}}
                {{--</li>--}}
            </ul>
        </div>
    </div>
</nav>
