@extends('Admin.index')

@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="{{ url('/Admin') }}">
                Pagina inicial</a></li>
            <li class="breadcrumb-item active">
                Gerenciar favoritos</li>
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
                        <h3 class="card-title">
                            Gerenciar favoritos </h3>
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
                                    <th>Nome do membro</th>
                                    <th>Nome do produto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fav as $key => $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->user->email }}</td>
                                        <td>{{ $value->product->name }}</td>
                                        <td>{{ $value->id->sum(); }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
                <nav aria-label="Page navigation" class="float-right">
                    {{ $fav->links() }}
                </nav>
            </div>
        </div>
    </div>

@endsection
