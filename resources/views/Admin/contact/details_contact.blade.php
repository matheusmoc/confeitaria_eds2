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
            <div class="card card-primary p-5">
                <h3 class="text-center p-4"> Contato: </h3>
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="col">Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                        </tr>
                        @foreach ($contacts as $key => $value)
                            <tr>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h4 class="p-2"><strong>Mensagem:</strong></h4>
                <p class="text-muted mb-5">{{ $value->created_at->format('m/d/Y - h:i:s')}}</p>
                <p><h5>{{ $value->content }}<h5></p>

            </div>
        </div>
    </div>
</div>


@endsection
