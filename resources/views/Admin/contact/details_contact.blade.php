@extends('Admin.index')


@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="{{ url('/Admin') }}">Página inicial/a></li>
            <li class="breadcrumb-item"><a href="{{ route('Order.order') }}">Gerenciamento de contatos</a></li>
            <li class="breadcrumb-item active"> Ver mensagens</li>
        </ol>

    </div>
@endsection

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('asset/AdminLTE/plugins/summernote/summernote-bs4.min.css') }}">
@endsection

<div class="container">
    <div class="row">
        <div class="col-12 container">
            <div class="card card-primary p-5">
                <h3 class="text-center p-4">
                    <span style="color:tomato; padding:10px 0px"> Contato :</span>
                </h3>
                <table class="table">
                    <tbody>
                        @foreach ($contacts as $key => $value)
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                            </tr>
                            <tr>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    <h3 class="mb-5">Mensagem:</h3>
                </div>
                <div>
                    <p>{{ $value->content }}</p>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
