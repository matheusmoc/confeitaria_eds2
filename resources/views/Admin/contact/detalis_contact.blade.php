@extends('Admin.index')


@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="{{ url('/Admin') }}">Página inicial/a></li>
            <li class="breadcrumb-item"><a href="{{ route('Order.order') }}">Gerenciamento de pedidos</a></li>
            <li class="breadcrumb-item active"> Detalhes do pedido</li>
        </ol>

    </div>
@endsection

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('asset/AdminLTE/plugins/summernote/summernote-bs4.min.css') }}">
@endsection

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">

                <h3 class="text-center p-4">
                   Mensagem: <span
                        style="color:tomato; padding:10px 0px"> {{ $order->user->name }} - {{ $order->id }}</span> </h3>
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="col">Produtos</th>
                            <th>Quantidade</th>
                            <th>
                                Preço</th>
                        </tr>
                        @foreach ($contacts as $key => $value)
                            <tr>
                                <td>{{ $value->content }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
