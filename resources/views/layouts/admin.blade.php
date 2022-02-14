<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{!! 'Bosskokos' !!}</title>

    <!-- Scripts -->
    <script src="{{ asset('adminAssets/js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('adminAssets/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminAssets/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    @yield('style')
    <link href="{{ asset('adminAssets/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminAssets/css/main.css') }}" rel="stylesheet">
</head>
<body>
<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->


<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header text-center">
        <a href="{{ route('admin.index') }}"
{{--           class="brand-logo"--}}
        >
{{--            <img class="logo-compact" src="{{ asset('adminAssets/images/logoEuroLombard.svg') }}" alt="">--}}
            <img class="brand-title dog_title" src="/css/assets/img/dog.png" alt="dog">
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">

                    </div>

                    <ul class="navbar-nav header-right">
                        <li class="nav-item dropdown header-profile">
                            <a href="{{ route('admin.logout') }}" class="dropdown-item">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                <span class="ml-2">Выйти </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="quixnav">
        <div class="quixnav-scroll">
            <ul class="metismenu" id="menu">

                <li class="nav-label">Меню</li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i><span class="nav-text">Пользователи</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('admin.users')}}">Список пользователей</a></li>

                    </ul>
                </li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-book" aria-hidden="true"></i><span class="nav-text">Новости</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('admin.news.index')}}">Новости сайта</a></li>

                    </ul>
                </li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-question-circle" aria-hidden="true"></i><span class="nav-text">Вопрос/ответ</span>
                    </a>
                    <ul aria-expanded="false">

                        <li><a href="{{route('admin.questions.index')}}">Вопрос/ответ</a></li>

                    </ul>
                </li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-wrench" aria-hidden="true"></i><span class="nav-text">Настройки</span>
                    </a>
                    <ul aria-expanded="false">

                        <li><a href="{{route('admin.settings.index')}}">Настройки обратной связи</a></li>

                    </ul>
                </li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-book" aria-hidden="true"></i><span class="nav-text">Словари</span>
                    </a>
                    <ul aria-expanded="false">

                        <li><a href="{{route('admin.dictionaries.edit')}}">Словари</a></li>

                    </ul>
                </li>
            </ul>
        </div>


    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        @yield('content')
    </div>
    <!--**********************************
        Content body end
    ***********************************-->


    <!--**********************************
        Footer start
    ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Developed by <a href="https://zengineers.company/" target="_blank">Zengineers.Company</a> {{ now()->year }}</p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->

    <!--**********************************
       Support ticket button start
    ***********************************-->

    <!--**********************************
       Support ticket button end
    ***********************************-->


</div>
<!--**********************************
    Main wrapper end
***********************************-->

</body>
<!--**********************************
        Scripts
    ***********************************-->
<!-- Required vendors -->
<script src="{{ asset('adminAssets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('adminAssets/js/quixnav-init.js') }}"></script>
<script src="{{ asset('adminAssets/js/custom.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


@yield('script')
</html>
