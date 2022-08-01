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
                        <h3 class="card-title">Gerenciamento de pedidos </h3>
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
                                    <th>Endereço</th>
                                    <th>Forma de pagamento</th>
                                    <th>Data da realização do pedido</th>
                                    <th>Data de entrega sugerida pelo cliente</th>
                                    <th>Pedido total</th>
                                    <th></th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $key => $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->user->name }}</td>
                                        <td>{{ $value->phone }}</td>
                                        <td>{{ $value->address }}</td>
                                        <td>
                                            @if ($value->pay == 1)
                                                <P>...</P>
                                            @elseif($value->pay == 2)
                                                <p>ATM</p>
                                            @else
                                                <p>
                                                    Pagamento na entrega</p>
                                            @endif
                                        </td>
                                        <td>{{ $value->created_at->format('m/d/Y') }}</td>
                                        <td>{{ $value->date_order->format('m/d/Y') }}</td>
                                        <td>{{ $value->total }}</td>
                                        <td class="d-flex ">
                                            <a href="{{ route('Order.show', [$value->id]) }}" class="mr-3 ">Ver detalhes</a>
                                        </td>
                                        <td>
                                            <select value="{{ $value->status }}" class="form-control"
                                                id="order{{ $key }}" name="status">
                                                <option value="new" class="text-warning">
                                                    Pedido realizado</option>
                                                <option value="confirm" class="text-success">Pedido confirmado</option>
                                                <option value="cancel" class="text-danger">
                                                    Pedido cancelado</option>
                                                <option value="delivery" class="text-info">
                                                    Entrega em andamento</option>
                                            </select>
                                        </td>


                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
                <nav aria-label="Page navigation" class="float-right">
                    {{ $order->links() }}
                </nav>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">

    let value =''

        @foreach ($order as $key => $value)
            @if($value->status == "new")
                document.getElementById('order{{ $key }}').getElementsByTagName('option')[0].selected = 'selected'
            @elseif ($value->status == "confirm")
                document.getElementById('order{{ $key }}').getElementsByTagName('option')[1].selected = 'selected'
            @elseif($value->status == "cancel")
                 document.getElementById('order{{ $key }}').getElementsByTagName('option')[2].selected = 'selected'
            @else($value->status == 'delivery')
                document.getElementById('order{{ $key }}').getElementsByTagName('option')[3].selected = 'selected'
            @endif

            document.getElementById('order{{ $key }}').addEventListener( 'change',() =>{
            let status = document.getElementById('order{{ $key }}').value;


            $.ajax({
                url: "{{ route('confirm_order') }}",
                data: {
                    id: '{{ $value->id }}',
                    status
                },
                 type: "GET",
                 }).done(function(response) {
                    if(response) {
                        alertify.success('Atualizado com sucesso');
                        setTimeout(() => {

                            location.reload();
                        }, 1000);

                    }
                 });
            })
        @endforeach

    </script>
@endsection
