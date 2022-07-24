@extends('Admin.index')


@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="{{ url('/Admin') }}">
                Pagina inicial</a></li>
            <li class="breadcrumb-item"><a href="{{ route('Category.index') }}">Gerenciar controle deslizante</a></li>
            <li class="breadcrumb-item active">
                Editar</li>
        </ol>

    </div>
@endsection

@section('content')

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
                            Editar controle deslizante</h3>
                    </div>
                    <form method="POST" action="{{ route('Slider.update',[$slider->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="slider_name">
                                    Controle deslizante de nome</label>
                                <input type="text" class="form-control" name="slider_name"
                                    value="{{ $slider->slider_name }}">
                            </div>
                            <div class="form-group">
                                <label for="slider_link">
                                    Descrever</label>
                                <input type="text" class="form-control" name="slider_link"
                                    value="{{ $slider->slider_link }}">
                            </div>
                            <div class="form-group">
                                <label for="slider_image">
                                    Foto</label>
                                <input type="file" class="form-control" name="slider_image"
                                    value="{{ old('slider_image') }}">
                                    <img src="{{ asset('uploads/img/'.$slider->slider_image) }}" width="100" alt="{{$slider->slider_image }}">
                            </div>
                            <div class="form-group">
                                <label for="slider_status">Ativar</label>
                                <select class="form-control" id="slider_status" name="slider_status">
                                    @if ($slider->status == 1)
                                        <option selected value="1">Ativado</option>
                                        <option value="0">Desativado</option>
                                    @else
                                        <option value="1">Ativado</option>
                                        <option selected value="0">Desativado</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
