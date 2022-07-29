@extends('Admin.index')


@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="{{ url('/Admin') }}">Página inicial</a></li>
            <li class="breadcrumb-item"><a href="{{ route('Coupon.index') }}">Gerenciamento de promoções</a></li>
            <li class="breadcrumb-item active">Atualizar</li>
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
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Atualização da promoção</h3>
                </div>
                <form method="POST" action="{{ route('Coupon.update',[$coupon->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="ten_ct">
                                        Nome do evento</label>
                                    <input type="text" class="form-control" name="ten_ct" value="{{ $coupon->ten_ct }}">
                                </div>
                                <div class="form-group">
                                    <label for="loai_ct">
                                        Tipo do evento</label>
                                    <select class="form-control" id="loai_ct" name="loai_ct" value="{{ $coupon->loai_ct }}">
                                        <option>
                                            Desconto em %</option>
                                        <option>
                                            Desconto de acordo com o preço</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="muc_giam">
                                        Taxa de redução</label>
                                    <input type="text" class="form-control" name="muc_giam" value="{{ $coupon->muc_giam }}">
                                </div>
                                <div class="form-group">
                                    <label for="ma_km">
                                        Código promocional</label>
                                    <input type="text" class="form-control" name="ma_km" value="{{ $coupon->ma_km }}">
                                </div>
                                <div class="form-group">
                                    <label for="so_luong">Quantidade</label>
                                    <input type="text" class="form-control" name="so_luong" value="{{ $coupon->so_luong }}">
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nhom_sp">
                                        Aplicar ao grupo de produtos</label>
                                    <select name="nhom_sp" class="form-control">
                                        @foreach ($category as $key => $cate)
                                            <option value="{{ $cate->id }}" {{ $cate->id == $coupon->nhom_sp ? 'selected' : '' }}>{{ $cate->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="san_pham">Produtos</label>
                                    <select name="san_pham" class="form-control">
                                        @foreach ($product as $key => $pro)
                                            <option value="{{ $pro->id }}" {{ $pro->id == $coupon->san_pham ? 'selected' : '' }}>{{ $pro->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tg_bat_dau">início</label>
                                    <input type="date" class="form-control" name="tg_bat_dau" value="{{ $coupon->tg_bat_dau }}">
                                </div>

                                <div class="form-group">
                                    <label for="tg_ket_thuc">Término</label>
                                    <input type="date" class="form-control" name="tg_ket_thuc" value="{{ $coupon->tg_ket_thuc }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script src="{{ asset('asset/AdminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script>
@endsection


@endsection
