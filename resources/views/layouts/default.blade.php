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
        <link rel="shortcut icon" href="../../../public/img/favicon.ico" />
        <link rel="stylesheet" href="../../../libs/bootstrap/bootstrap-grid-3.3.1.min.css" />
        <link rel="stylesheet" href="../../../public/libs/font-awesome-4.2.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="../../../libs/fancybox/jquery.fancybox.css" />
        <link rel="stylesheet" href="../../../libs/owl-carousel/owl.carousel.css" />
        <link rel="stylesheet" href="../../../libs/countdown/jquery.countdown.css" />
        <link rel="stylesheet" href="../../../public/css/fonts.css" />
        <link rel="stylesheet" href="../../../public/css/main.css" />
        <link rel="stylesheet" href="../../../public/css/media.css" />
    </head>
    @endsection
    @yield('head')
    
    <body>
        @section('header')
        <header class="head">
            @if(session()->has('message'))
            <div class="alert">
                <script>alert('{{session()->get('message')}}');</script>
            </div>
            
            @endif
            <div class="col-md-5 left">
                <div class="top_menu">
                    <ul>
                        <li><a href="/"><span>Blog</span></a></li><li><a href="/categories">Категории</a></li><li><a href="/about">О проекте</a></li><li><a href="/contacts">Контакты</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 right">
                <div class="search_form">
                    <form action="{{route('search_p')}}" method="POST">
                        {!!csrf_field()!!}
                        <input class="search_line" type="text" name="search" placeholder="Найти статью" required>
                        <input class="btn" type="submit" name="send_search" value="Поиск">
                    </form>
                </div>
            </div>
            <div class="col-md-3 right">
                <div class="LogInReg">
                    @if (Auth::guest())

                    <a class="LogIn_btn" href="">Вход \ Регистрация<i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                    <div class="form_LogIn" style="display: none;">
                        <form action="/login" method="POST">
                            {!! csrf_field() !!}
                            @if ($errors->has('login') || $errors->has('password'))
                            <script>alert('Неверный логин или пароль');</script>
                            <label>Неверный логин или пароль</label>
                            @endif
                            <input type="text" name="login" placeholder="Ваш логин" value="{{old('login')}}">
                            <input type="password" name="password" placeholder="Ваш пароль">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить
                                </label>
                            </div>
                            <input class="btn" type="submit" name="send_logIn" value="Войти">
                            <a class="btn" href="/register">Регистрация</a>
                        </form>
                    </div>

                    @else
                    <a class="userNameBtn" href="">{{ Auth::user()->name }} <i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                    <div class="infoUser" style="display: none;">
                        <a href="/profile/{{ Auth::user()->id }}">Личный кабинет</a>
                        @if(Auth::user()->login == 'admin' && Auth::user()->email == 'admin@admin.admin')
                        <hr>
                        <a href="/admin">Админ-панель</a>
                        @endif
                        <hr>
                        <a href="/logout">Выйти</a> 
                    </div>
                    @endif
                </div>
            </div>
        </header>
        @endsection
        @yield('header')
        
        @section('content')
        @endsection
        @yield('content')
        
        @section('footer')
        <footer>
            <p>Designed and develop by Bolgar Max | 2017</p>
            <a href="https://laravel.com/">Developed by Laravel Framework</a>
        </footer>
        @endsection
        @yield('footer')
        
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