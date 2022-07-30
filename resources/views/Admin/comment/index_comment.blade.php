@extends('Admin.index')

@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="{{ url('/Admin') }}">
                Pagina inicial</a></li>
            <li class="breadcrumb-item active">
                Gerenciar avaliações - Comentários</li>
        </ol>

    </div>
@endsection
@section('content')
    <div class="container-fuiler">
        <div class="row">
            <div class="col-12">
                {{-- thông báo thêm dữ liệu không thành công --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- thông báo thêm dữ liệu thành công --}}
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Gerenciar avaliações - comentar</h3>
                        <div class="card-tools">
                            <form action="">
                                <div class="input-group input-group-sm" style="width:350px;">
                                    <input type="text" name="search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append ">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>
                                        Nome do membro</th>
                                    <th>
                                        Nome do produto</th>
                                    <th>
                                        Conteúdo do comentário</th>
                                    <th>
                                        Número de estrelas</th>
                                    <th>Ativar</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comment as $key => $value)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $value->user->email }}</td>
                                        <td>{{ $value->product->name }}</td>
                                        <td>{{ $value->content }}</td>
                                        <td>{{ $value->rating }}</td>
                                        <td>
                                            <form method="GET" action="{{ route('delete_comment',[$value->id]) }}">

                                                <button onclick="return confirm('Deseja excluir este comentário?')"
                                                    style="border:none;background:none;color: #1b8ffa;">
                                                    <i class="fas fa-trash-alt" title="Delete"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
