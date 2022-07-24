@extends('Admin.index')


@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="{{ url('/Admin') }}">
                Pagina inicial</a></li>
            <li class="breadcrumb-item"><a href="{{ route('Coupon.index') }}">
                Gerenciamento de promoções</a></li>
            <li class="breadcrumb-item active">
                Promoção</li>
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

                <h3 class="text-center" style="color:tomato; padding:10px 0px">{{ $coupon->ten_ct }}</h3>
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="col">Tipo de evento:</th>
                            <td>{{ $coupon->loai_ct }}</td>
                        </tr>
                        <tr>
                            <th scope="col">
                                Grupo de produtos aplicado:</th>
                            <td>{{ $coupon->category->category_name }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Produtos:</th>
                            <td>{{ $coupon->product->name }}</td>
                        </tr>
                        <tr>
                            <th scope="col">
                                Quantidade:</th>
                            <td>{{ $coupon->so_luong }}</td>
                        </tr>
                        <tr>
                            <th scope="col">
                                Taxa de redução:</th>
                            <td>{{ $coupon->muc_giam }}</td>
                        </tr>

                        <tr>
                            <th scope="col">Código promocional:</th>
                            <td>{{ $coupon->ma_km }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Início:</th>
                            <td>{{ $coupon->tg_bat_dau}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Término:</th>
                            <td>{{ $coupon->tg_ket_thuc }}</td>
                        </tr>



                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>


@endsection
