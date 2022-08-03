<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="{{ asset('asset/AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/AdminLTE/dist/css/adminlte.min.css') }}">


      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>

      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 @yield('css')

</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/Admin') }}"> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            {{-- @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
  <!-- /.navbar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/Admin') }}" class="brand-link">
      <p class="text-center mb-0">Admin</p>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">

            <a href="{{ route('Order.order') }}" class="nav-link">
              <i class="fas fa-file-alt"></i>
              <p>
                Gerenciamento de pedidos</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('Category.index') }}" class="nav-link">
              <i class="fas fa-file-alt"></i>
              <p> Gerenciar categorias</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('Product.index') }}" class="nav-link">
              <i class="fas fa-hamburger"></i>
              <p>
                Gestão de produtos</p>
            </a>
          </li>



          <li class="nav-item">
            <a href="{{ route('Customer.customer') }}" class="nav-link">
              <i class="fas fa-users"></i>
              <p>
                Gerenciar usuários</p>
            </a>
          </li>
{{--
          <li class="nav-item">
            <a href="{{ route('Coupon.index') }}" class="nav-link">
              <i class="fas fa-tags"></i>
              <p>
                Gerenciamento de promoções</p>
            </a>
          </li> --}}


          <li class="nav-item">
            <a href="{{ route('Comment.index') }}" class="nav-link">
              <i class="fas fa-user-edit"></i>
              <p>
                Gerenciar comentários</p>
            </a>
          </li>



          <li class="nav-item menu-close">
            <a href="#" class="nav-link ">
              <i class="fas fa-newspaper"></i>
              <p>
                Gerenciamento de notícia
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              {{-- <li class="nav-item">
                <a href="{{ route('Slider.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Gerenciar controles deslizantes</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="{{ route('Blog.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gerenciar postagens</p>
                </a>
              </li>

            </ul>
          </li>

          {{-- <li class="nav-item">
            <a href="{{ route('Favorite.favorite_cus') }}" class="nav-link">
              <i class="fas fa-heart"></i>
              <p>Gerenciar favoritos</p>
            </a>
          </li> --}}


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

            @yield('breadcrumb')

        </div>
      </div>
    </div>
    <div class="content">

      @yield('content')


    </div>
  </div>

</div>

<!-- CSS -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

<script src="{{ asset('asset/AdminLTE/plugins/jquery/jquery.min.js ') }}"></script>
<script src="{{ asset('asset/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js ') }}"></script>
 @yield('script')
 @yield('script2')

<script src="{{ asset('asset/AdminLTE/dist/js/adminlte.js ') }}"></script>
<script src="{{ asset('asset/AdminLTE/plugins/chart.js/Chart.min.js ') }}"></script>
<script src="{{ asset('asset/AdminLTE/dist/js/demo.js ') }}"></script>
<script src="{{ asset('asset/AdminLTE/dist/js/pages/dashboard3.js ') }}"></script>


</body>
</html>
