@extends('Admin.index')


@section('breadcrumb')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Página inicial do administrador</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $order }}</h3>

                        <p>Pedidos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('Order.order') }}" class="small-box-footer">Mais info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>00,00<sup style="font-size: 20px">R$</sup></h3>

                        <p>Venda total</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $user }}</h3>

                        <p>Usuários registrados</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('Customer.customer') }}" class="small-box-footer">Mais info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Visitantes</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                   Pedidos em aberto</h3>
            </div>
            <div class="card-body">
                <form class="pt-2 pb-2" method="GET" action="">
                    <div class="row">
                        <div class="col">
                            <input type="date" class="form-control" name="date_from">
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" name="date_to">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Procurar</button>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">Nº</th>
                            <th>
                                Nome do cliente</th>
                            <th>
                                Data do pedido</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bill as $key => $value)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $value->user->name }}</td>
                                <td>{{ $value->created_at }}</td>
                                <td>{{ $value->total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
