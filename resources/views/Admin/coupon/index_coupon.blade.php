@extends('Admin.index')

@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="{{ url('/Admin') }}">
                Pagina inicial</a></li>
            <li class="breadcrumb-item active">
                Gerencia de promoção</li>
        </ol>

    </div>
    <div class="col-sm-6 ">
        <a class="btn btn-primary float-right" href="{{ route('Coupon.create') }}" role="button">Mais</a>
    </div>
@endsection
@section('content')
    <div class="container-fuiler">
        <div class="row">
            <div class="col-12">
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Produtos</h3>
                        <div class="card-tools">
                            <form action="">
                                <div class="input-group input-group-sm" style="width:350px;">
                                    <input type="text" name="search" class="form-control float-right"
                                        placeholder="Search">

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
                                    <th>
                                        Nome do evendo</th>
                                     <th>
                                       Grupo de produtos</th>
                                    <th>
                                        Taxa de redução</th>
                                    <th>Quantidade</th>
                                    <th>
                                        início</th>
                                    <th>
                                        Término</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($coupon as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->ten_ct }}</td>
                                    <td>{{ $value->category->category_name }}</td>
                                    <td>{{ $value->muc_giam }}</td>
                                    <td>{{ $value->so_luong }}</td>
                                    <td>{{ $value->tg_bat_dau  }}</td>
                                    <td>{{ $value->tg_ket_thuc  }}</td>

                                    <td class="d-flex ">
                                        <a href="{{route('Coupon.show',[$value->id])}}" class="mr-3 "><i class="fa fa-eye" title="View"></i></a>
                                        <a href="{{ route('Coupon.edit',[$value->id]) }}" class="mr-3 "><i class="fas fa-edit " title="Edit"></i></a>
                                       <form method="POST" action="{{ route('Coupon.destroy',[$value->id]) }}">
                                           @method('DELETE')
                                           @csrf
                                            <button  onclick="return confirm('Deseja excluir esta promoção?')" style="border:none;background:none;color: #1b8ffa;">
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
