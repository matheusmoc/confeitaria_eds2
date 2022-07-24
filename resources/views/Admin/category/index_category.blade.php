@extends('Admin.index')

@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="{{ url('/Admin') }}">
                Pagina inicial</a></li>
            <li class="breadcrumb-item active">
                Gerenciamento de diretório</li>
        </ol>

    </div>
    <div class="col-sm-6 ">
        <a class="btn btn-primary float-right" href="{{ route('Category.create') }}" role="button">Criar</a>
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
                            Seu item</h3>
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
                                    <th>Nome da categoria</th>
                                    <th>Slug</th>
                                    <th>Pertence a: </th>
                                    <th>
                                        Ativar</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->category_name }}</td>
                                    <td>{{ $value->category_slug }}</td>
                                      <td>
                                        @if($value->category_type==1)
                                            <span class="text text-success">Produtos</span>
                                        @else
                                            <span class="text-danger">Notícia</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($value->category_status==1)
                                            <span class="text text-success">Ativado</span>
                                        @else
                                            <span class="text-danger">Desativado</span>
                                        @endif
                                    </td>
                                  
                                    <td class="d-flex ">
                                        <a href="{{ route('Category.edit',[$value->id]) }}" class="mr-3 "><i class="fas fa-edit " title="Edit"></i></a>
                                       <form method="POST" action="{{ route('Category.destroy',[$value->id]) }}">
                                           @method('DELETE')
                                           @csrf
                                            <button  onclick="return confirm('Deseja excluir esta categoria?')" style="border:none;background:none;color: #1b8ffa;">
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
                <nav aria-label="Page navigation" class="float-right">
                     {{ $category->appends(request()->all())->links()  }}  
                </nav>   
            </div>
        </div>               
    </div>
        
@endsection
