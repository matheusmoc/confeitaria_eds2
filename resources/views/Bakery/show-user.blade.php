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
        a{
            text-decoration: none;
            color:black;
        }
        a:hover{
            text-decoration: none;
            color:tomato;
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


    </style>
@endsection

@section('content')
    <div class="banner-product">
        <div class="container-fluid">
            <div class="heading-product">
                <div class="title-product">Informações</div>
                <a>Pagina inicial</a>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                <a>Perfil</a>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                <a>Informação de pedido</a>
            </div>

        </div>

    </div>
    <div class="container-fluid infor-user">
        <div class="row">
            <div class="col-12 col-lg-4 col-md-4 border-table">
                <div class="list-group list-group-flush">
                    <a href="{{ route('information_user') }}"class="list-group-item infor" >Informação pessoal</a>
                    <a  href="{{ route('order') }}"class="list-group-item infor" >Informações de pedido</a>
                    <a href="{{ route('user_favorite')}}" class="list-group-item infor">Produto favorito</a>
                    <a class="list-group-item infor" >Comentários do produto</a>
                </div>
            </div>
            <div class="col-12 col-lg-8 col-md-8">
                <div class="show">
                    <h3> Informações sobre pedidos</h3>
                    <table class="table">
                        <thead>
                            <tr>

                                <th scope="col">Código do pedido</th>
                                <th scope="col">A pagar</th>
                                <th scope="col">Pedido total</th>
                                <th scope="col">Data de realização do pedido</th>
                                <th scope="col">Data de entrega sugerida por você</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($show as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>
                                        @if($value->pay == 1)
                                            <p>...</p>
                                        @elseif($value->pay == 2)
                                            <p>Pagamento no cartão</p>
                                        @elseif($value->pay == 3)
                                            <p>Pagamento na entrega</p>
                                        @endif
                                    </td>
                                    <td>{{ $value->total }}</td>
                                    <td>{{ $value->created_at->format('m/d/Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($value->date_order)->format('m/d/Y') }}</td>
                                    <td>
                                        @if($value->status == "new")
                                            <p class="text-warning">Aguardando confirmação</p>
                                        @elseif($value->status == "confirm")
                                            <p class="text-success">Pedido confirmado</p>
                                        @elseif($value->status == "cancel")
                                            <p class="text-danger">Pedido cancelado</p>
                                        @else
                                            <p class="text-primary">Entrega em andamento</p>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('asset/js/bakery/owl.carousel.min.js') }}"></script>
@endsection





