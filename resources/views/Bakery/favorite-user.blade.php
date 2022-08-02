@extends('Bakery.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/bakery/contact.css') }}">
    <style>
        .border-table {
            border-right: 4px solid tomato;
        }

        .infor-user {
            padding: 30px 0px;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            color: black;
        }

        a:hover {
            text-decoration: none;
            color: tomato;
        }

        h3 {
            color: tomato;
            text-align: center;
            padding-bottom: 10px;
        }

        .show {
            padding: 10px 0px;

        }

        .item {

            display: flex;
        }

        .item p {
            margin-left: 8px;
        }
    </style>
@endsection

@section('content')
    <div class="banner-product">
        <div class="container-fluid">
            <div class="heading-product">
                <div class="title-product">Produto favorito</div>
                <a>Pagina inicial</a>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                <a>Perfil</a>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                <a>Produto favorito</a>
            </div>

        </div>

    </div>
    <div class="container infor-user">
        <div class="row">
            <div class="col-12 col-lg-4 col-md-4 border-table">
                <div class="list-group list-group-flush">
                    <a href="{{ route('information_user') }}"class="list-group-item infor" value='1'>Informação
                        pessoal</a>
                    <a href="{{ route('order') }}"class="list-group-item infor" value='2'> Informações do pedido</a>
                    <a href="{{ route('user_favorite') }}" class="list-group-item infor" value='3'>Produto favorito</a>
                    <a class="list-group-item infor" value='4'>Comentários do produto</a>
                </div>
            </div>
            <div class="col-12 col-lg-8 col-md-8">
                <div class="show">
                    <h3>Produto favorito</h3>
                    <div class="row">
                        @foreach ($product as $key => $value)
                            <div class="col-10 col-md-4 col-lg-4 col-sm-6 p-3">
                                <div class="card-product ">
                                    <a
                                        href="{{ url('detalhe-produto/' . $value->product->id . '/' . $value->product->slug) }}">
                                        <img src="{{ asset('uploads/img/' . $value->product->image) }}" width="100%">

                                        @if ($value->status == '0')
                                            <div class="sale text-danger font-weight-bold">Esgotado</div>
                                        @elseif ($value->percent_sale > 0)
                                            <div class="sale">
                                                {{ $value->percent_sale }}
                                            </div>
                                        @elseif ($value->sale_price == $value->price)
                                            <div class="sale">Disponível</div>
                                        @endif

                                        <div class="favorite">
                                            <a href="#" onclick="favoriteProduct({{ $value->id }})"
                                                style="color:red">
                                                <i class="{{ $value->like ? 'fa fa-heart' : 'fa fa-heart-o text-dark' }}"
                                                    aria-hidden="true" title="Favorito"></i>
                                            </a>
                                        </div>
                                    </a>

                                    <div class="content-product">
                                        <p class="heading-product">{{ $value->product->name }}</p>
                                        <div class="price-product">
                                            @if ($value->sale_price == $value->price)
                                                <span class="price-sale">{{ number_format($value->product->price) }}
                                                    R$</span>
                                            @else
                                                <span class="price">{{ number_format($value->product->price) }} R$</span>
                                                <span class="price-sale ">{{ number_format($value->product->sale_price) }}
                                                    R$</span>
                                            @endif
                                        </div>
                                        <div class="rate-product">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                        @if ($value->status == '0')
                                            <div class="order-product" style="background-color: rgb(202, 10, 10);">
                                                <a href="javascript:" title="Esgotado" disabled>
                                                    Esgotado
                                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        @else
                                            <div class="order-product">
                                                <a href="javascript:" onclick="AddCart({{ $value->id }})"
                                                    title="Adicionar ao carrinho">
                                                    Adicionar ao carrinho
                                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('asset/js/bakery/owl.carousel.min.js') }}"></script>

    <script>
        // function AddCart(id) {
        //     $.ajax({
        //         url: `{{ asset('adicionar-carrinho/${id}/') }}`,
        //         type: "GET",
        //     }).done(function(response) {
        //         if (response) {
        //             alertify.success('Produto adicionado');
        //             setTimeout(() => {

        //                 location.reload();
        //             });
        //         }
        //     });
        // }
    </script>
@endsection
