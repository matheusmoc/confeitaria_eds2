<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/bakery/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/bakery/owl.theme.default.min.css') }}">


    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/bakery/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/bakery/product.css') }}">
    <link rel="icon" href="{{ asset('asset/img/Image/logo.png') }}" type="image/x-icon">
    @yield('css')
    <title> Cantinho doce</title>
</head>

<body>
    <div class="container-fluid">
        <div class="wrapper">
            <div class="header">
                <nav class="nav-header">
                    <div class="logo-header">
                        <div class="logo mt-3 mr-4">
                            <a href="{{ route('index') }}" class="title-blog"
                                style="text-decoration: none; color:palevioletred; margin-right:20px;">Cantinho Doce</a>
                            {{-- <img src="{{ asset('#') }}"
                                    class="animate__animated animate__bounce" width="130px" height="90px"> --}}

                        </div>
                        <div class="search ">
                            <form action="{{ route('search_product') }}" method="GET">
                                <input type="text" name="search" placeholder="Procurar ..." class="search-ajax"
                                    value="{{ old('tukhoa') }}">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </form>
                        </div>
                        <div class="show-search">

                        </div>
                    </div>

                    <div class="content-header" id="content-header">
                        <li class="item-header"><a href="{{ route('index') }}">início</a></li>
                        <li class="item-header"><a href="{{ route('product') }}">produtos</a></li>
                        <li class="item-header"><a href="{{ route('blog') }}">notícias</a></li>
                        <li class="item-header"><a href="{{ route('contact') }}">contato</a></li>
                    </div>
                    <div class="icon-header">
                        <a href="#" class="icon-search">
                            <i class="fa fa-search" id="icon-search" aria-hidden="true"></i>

                            <div class="search-nav" id="search-nav">
                                <form action="{{ route('search_product') }}" method="GET">
                                    <i class="fa fa-times icon-close" id="icon-close" aria-hidden="true"></i>
                                    <input type="text" value="{{ old('tukhoa') }}" name="search"
                                        placeholder="Procurar produtos...">
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                </form>

                            </div>
                        </a>
                        @if (Auth::check())
                            <a href="{{ route('information_user') }}" class="icon-user" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-expanded="false">
                                <small>{{ Auth::user()->name }}</small>
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('information_user') }}">Seu painel</a>
                                <a class="dropdown-item" href="{{ route('logOut') }}">Desconectar-se</a>
                            </div>
                        @else
                            <a href="#" class="icon-user " data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                        @endif

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <ul class="nav nav-tabs header-form" id="myTab" role="tablist">
                                        <li class="nav-item title-form " role="presentation">
                                            <a class="nav-link active" id="log-in" data-toggle="tab"
                                                href="#login" role="tab" aria-controls="home"
                                                aria-selected="true">Home</a>
                                        </li>
                                        <li class="nav-item title-form " role="presentation">
                                            <a class="nav-link " id="register-tab" data-toggle="tab"
                                                href="#register" role="tab" aria-controls="profile"
                                                aria-selected="false">Registre-se</a>
                                        </li>
                                    </ul>
                                    <div class="modal-body body-form">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="login" role="tabpanel"
                                                aria-labelledby="log-in">
                                                <form class="form-login" action="{{ route('post-login') }}"
                                                    method="POST">
                                                    @csrf
                                                    {{-- @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>

                                                    @endif --}}

                                                    {{-- Notification of more successful data --}}
                                                    {{-- @if (session('status'))
                                                        <div class="alert alert-success" role="alert">
                                                            {{ session('status') }}
                                                        </div>
                                                    @endif --}}
                                                    <div class="form-group">
                                                        <input type="email" placeholder="E-mail" name="email">

                                                    </div>
                                                    <div class="form-group ">
                                                        <input type="password" placeholder="Senha" name="password">
                                                    </div>
                                                    <button type="submit" class="btn btn-login"
                                                        id="btn-login">Conectar</button>
                                                    <div class="social-user">
                                                        <p class="heading-social text-center">Logar com: </p>
                                                        <div class="social-list">

                                                            {{-- implementar redirect --}}
                                                            <a href="#">
                                                                <img
                                                                    src="{{ asset('asset/img/Image/facebook.svg') }}">
                                                            </a>

                                                            <a href="{{ url('/redirect') }}">
                                                                <img src="{{ asset('asset/img/Image/google.svg') }}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="register-account">Não possui uma conta?
                                                        <a data-toggle="tab" href="#register"
                                                            data-toggle="tab">Resgistrar-se</a>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="tab-pane fade" id="register" role="tabpanel"
                                                aria-labelledby="register-tab">
                                                <form action="{{ route('postregister') }}" method="POST"
                                                    class="form-register">
                                                    @csrf

                                                    @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>

                                                    @endif


                                                    @if (session('status'))
                                                        <div class="alert alert-success" role="alert">
                                                            {{ session('status') }}
                                                        </div>
                                                    @endif

                                                    <div class="form-group">
                                                        <input type="text" placeholder="Nome" name="name">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" placeholder="E-mail" name="email">
                                                    </div>
                                                    <div class="form-group ">
                                                        <input type="password" placeholder="Senha" name="password">
                                                    </div>
                                                    <div class="form-group ">
                                                        <input type="password" placeholder="Confirmar senha"
                                                            name="re-password">
                                                    </div>
                                                    <button type="submit" class="btn btn-signup"
                                                        id="btn-signup">Registrar</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @if (Auth::check())
                            <a href="{{ route('user_favorite') }}" class="notice-heart">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                                <span class="heart">{{ $count_favorite }}</span>
                            </a>
                        @else
                            <a href="" class="notice-heart">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                                <span class="heart">{{ $count_favorite }}</span>
                            </a>
                        @endif
                        <a href="{{ route('Cart') }}" class="notice-cart" id="notice-cart">
                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                            <span class="cart">{{ Cart::count() }}</span>
                        </a>

                        <a href="#" class="icon-bar" id="icon-bar">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </a>
                    </div>


                </nav>
            </div>
            <!-- end header -->
            @yield('content')


            <footer>
                <div class="footer-top">
                    <div class="container-fluid">
                        <div class="container">
                            <div class="mail">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="heading-mail">
                                            <h3>INSCREVA-SE PARA RECEBER NOVIDADES</h3>
                                        </div>
                                        <div class="title-mail">
                                            <p>Inscreva-se para receber informações promocionais e atualizações de
                                                produtos mais recentes do Cantinho doce.</p>
                                        </div>
                                        <div class="form-mail">
                                            <form class="form-inline">
                                                <input class="form-control mx-sm-auto" type="text"
                                                    placeholder="Email" aria-label="Email">
                                                <button class="btn  ml-md-3 m-sm-2 mx-sm-auto mx-auto mt-2"
                                                    type="submit">Enviar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-main">
                    <div class="container-fluid">
                        <div class="container">
                            <div class="row ">
                                <div class="col-8 col-lg-2 col-md-5 col-sm-6 pb-md-5 pb-sm-4 pb-4">
                                    <div class="footer-1">
                                        <div class="footer-logo">
                                            <a href="{{ route('index') }}" class="title-footer">Cantinho Doce</a>
                                            {{-- <img src="{{ asset('#') }}" width="100%"> --}}
                                            <div class="footer-icon text-center">
                                                <a href="#" title="Facebook"><i class="fa fa-facebook-square"
                                                        aria-hidden="true"></i></a>
                                                <a href="#" title="Instagram"> <i class="fa fa-instagram"
                                                        aria-hidden="true"></i></a>
                                                <a href="#" title="Twitter"> <i class="fa fa-twitter-square"
                                                        aria-hidden="true"></i></a>
                                                <a href="#" title="Youtube"><i class="fa fa-youtube-play"
                                                        aria-hidden="true"></i></a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 col-md-6 col-sm-6 pb-sm-4 ">
                                    <div class="footer-2">
                                        <div class="footer-title">Contato</div>
                                        <hr class="footer-line">
                                        <div class="footer-item">
                                            <ul>
                                                <li><i class="fa fa-home" aria-hidden="true"></i> Rua Doutor Luís
                                                    França de Souza, Morada do sol, 395, Montes Claros - MG</li>
                                                <li><i class="fa fa-phone-square" aria-hidden="true"></i> (38)
                                                    99143-5365
                                                </li>
                                                <li><i class="fa fa-envelope" aria-hidden="true"></i>
                                                    cantinhodoce@gmail.com
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 col-md-6 col-sm-6">
                                    <div class="footer-2">
                                        <div class="footer-title">Sobre nós</div>
                                        <hr class="footer-line">
                                        <div class="footer-item">
                                            <ul>
                                                <li> <a href="#">Sobre nós</a></li>
                                                <li><a href="#"> Notícias do produtos</a></li>
                                                <li><a href="#"> Entre em contato conosco</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 col-md-6 col-sm-6 ">
                                    <div class="footer-3">
                                        <div class="footer-title">Política</div>
                                        <hr class="footer-line">
                                        <div class="footer-item">
                                            <ul>
                                                <li> <a href="#">Pagamentos</a></li>
                                                <li><a href="#"> Envio do produto</a></li>
                                                <li><a href="#"> Reembolso</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <p class="text-center p-2">Cantinho Doce &copy; 2022</p>
                </div>

            </footer>
            <!-- end footer -->
            <div class="scroll" onclick="topFunction()" id="scroll">
                <i class="fa fa-arrow-up" aria-hidden="true"></i>
            </div>
            <!-- end scroll -->
        </div>
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

        @include('sweetalert::alert')

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>

        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script> --}}


        @yield('js')

        <script async src="{{ asset('asset/js/bakery/index.js') }}"></script>

        <script>
            $('.search-ajax').keyup(function() {

                var _search = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: "{{ route('search_ajax') }}?search=" + _search,
                    success: function(res) {

                        $('.show-search').html(res);

                    }
                })
            })

            function AddCart(id) {
                $.ajax({
                    url: `{{ asset('https://cantinho-doce.herokuapp.com/adicionar-carrinho/${id}') }}`,
                    type: "GET",
                }).done(function(response) {
                    console.log(response);
                    if (response) {
                        alertify.success('Produto adicionado');
                        setTimeout(() => {

                            location.reload();
                        }, 1000);
                    }
                });
            }

            // $('#btn-login').on('click', function() {
            //     $.ajax({
            //         type: 'POST',
            //         url: "{{ route('post-login') }}",

            //     }).done(function(respone){
            //          if (response) {

            //                 if (response.fail) {
            //                     alertify.warning(response.fail);
            //                 } else {
            //                     alertify.success('Favorito adicionado com sucesso');
            //                 }

            //                 setTimeout(() => {

            //                     location.reload();
            //                 }, 1000);
            //             }
            //     })
            // })
        </script>
</body>

</html>
