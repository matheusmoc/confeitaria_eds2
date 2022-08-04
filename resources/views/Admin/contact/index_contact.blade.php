@extends('Admin.index')

@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="{{ url('/Admin') }}">Pagina inicial</a></li>
            <li class="breadcrumb-item active">Gerenciamento de pedidos</li>
        </ol>

    </div>
@endsection
@section('content')
    <div class="container-fuiler">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Gerenciamento de contatos </h3>
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
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Número de telefone</th>
                                    <th>Data de envio</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $key => $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->phone }}</td>
                                        <td>{{ $value->created_at->format('m/d/Y') }}</td>
                                        <td class="d-flex ">
                                            <a href="{{ route('Contact.show', [$value->id]) }}" class="btn btn-success mr-3 ">Ver mensagem</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
                <nav aria-label="Page navigation" class="float-right">
                    {{ $contacts->links() }}
                </nav>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
    </script>
@endsection
