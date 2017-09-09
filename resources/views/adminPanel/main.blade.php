@section('head')
<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ru">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>{{$title}}</title>
        <meta name="description" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="favicon.png" />
        <link rel="stylesheet" href="../../../libs/bootstrap/bootstrap-grid-3.3.1.min.css" />
        <link rel="stylesheet" href="../../../libs/font-awesome-4.2.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="../../../libs/fancybox/jquery.fancybox.css" />
        <link rel="stylesheet" href="../../../libs/owl-carousel/owl.carousel.css" />
        <link rel="stylesheet" href="../../../libs/countdown/jquery.countdown.css" />
        <link rel="stylesheet" href="../../../public/css/fonts.css" />
        <link rel="stylesheet" href="../../../public/css/adminPanel.css" />
        <link rel="stylesheet" href="../../../public/css/media.css" />
    </head>
    @endsection
    @yield('head')
    <body>
        @section('header')
        @if(session()->has('message'))
        <div class="alert">
            <script>alert('{{session()->get('message')}}');</script>
        </div>
        @endif
        <header class="admin_head">
            <div class="col-md-12 centre">
                <a href="/">На главную</a>
                <a href="/admin">Панель</a>
                <a href="{{ route('admin_add_post_p') }}">Добавить пост</a>
                <a href="{{ route('admin_update') }}">Обновить пост</a>
                <a href="{{ route('admin_comments') }}">Комментарии</a>
            </div>
        </header>
        @endsection
        @yield('header')

        @section('content')
        <h2>Список пользователей</h2>
        <p>(выберите пользователя для редактирования)</p>
        <ul>
            @foreach($users as $user) 
            <li>
                <a href="/admin/user/{{$user->id}}">{{$user->name}}</a>
            </li>
            @endforeach
        </ul>
        @endsection
        @yield('content')

        @section('scripts')
        <!--[if lt IE 9]>
        <script src="libs/html5shiv/es5-shim.min.js"></script>
        <script src="libs/html5shiv/html5shiv.min.js"></script>
        <script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
        <script src="libs/respond/respond.min.js"></script>
        <![endif]-->
        <script src="../../../libs/jquery/jquery-1.11.1.min.js"></script>
        <script src="../../../libs/jquery-mousewheel/jquery.mousewheel.min.js"></script>
        <script src="../../../libs/fancybox/jquery.fancybox.pack.js"></script>
        <script src="../../../libs/waypoints/waypoints-1.6.2.min.js"></script>
        <script src="../../../libs/scrollto/jquery.scrollTo.min.js"></script>
        <script src="../../../libs/owl-carousel/owl.carousel.min.js"></script>
        <script src="../../../libs/countdown/jquery.plugin.js"></script>
        <script src="../../../libs/countdown/jquery.countdown.min.js"></script>
        <script src="../../../libs/countdown/jquery.countdown-ru.js"></script>
        <script src="../../../libs/landing-nav/navigation.js"></script>
        <script src="../../../public/js/common.js"></script>
        <!-- Yandex.Metrika counter --><!-- /Yandex.Metrika counter -->
        <!-- Google Analytics counter --><!-- /Google Analytics counter -->
        @endsection
        @yield('scripts')
    </body>
</html>