@extends('Admin.index')


@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="{{ url('/Admin') }}">
                    Pagina inicial</a></li>
            <li class="breadcrumb-item"><a href="{{ route('Product.index') }}">
                    Gestão de produtos</a></li>
            <li class="breadcrumb-item active">
                Editar</li>
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
                        Editar produtos</h3>
                </div>
                <form method="POST" action="{{ route('Product.update', [$product->id]) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">
                                        Nome do produto</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $product->name }}" onkeyup="ChangeToSlug();" id="slug">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" name="slug"
                                        value="{{ $product->slug }}" id="convert_slug">
                                </div>
                                <div class="form-group">
                                    <label for="category_id">
                                        Categoria</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($category as $key => $cate)
                                            <option value="{{ $cate->id }}"
                                                {{ $cate->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $cate->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">
                                        Descrever</label>
                                    <textarea id="summernote" class="form-control" name="description">{{ $product->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="price">
                                        Preço</label>
                                    <input type="text" id="price" class="form-control" name="price"
                                        value="{{ $product->price }}">
                                </div>
                                <div class="form-group">
                                    <label for="price">Porcentagem de desconto</label>
                                    <input type="text"  id="percent_sale" class="form-control" name="percent_sale"
                                        value="{{ $product->percent_sale }}">
                                </div>
                                <div class="form-group">
                                    <label for="sale_price">
                                        Valor atual com o desconto</label>
                                    <input type="text" class="form-control" id="sale_price" name="sale_price"
                                        value="{{ $product->sale_price }}" readonly>
                                </div>

                                <a class="btn btn-primary mt-3 mb-5" id="myButtonCal"
                                    onclick="calculaDesconto()">Calcular</a>

                                <div class="form-group">
                                    <label for="image">
                                        Foto</label>
                                    <input type="file" class="form-control" name="image" id="image"
                                        onchange="loadFile(event)">
                                    <img src="{{ asset('uploads/img/' . $product->image) }}" width="100"
                                        alt="{{ $product->image }}">
                                </div>
                                <div id="display_image"></div>
                                <div class="form-group">
                                    <label for="images">
                                        Imagens relacionadas</label>
                                    <input type="file" value={{ $product->list_image }}class="form-control"
                                        name="images[]" id="images" multiple='multipart'
                                        onchange="loadListFile(this.files)">
                                    @foreach ($images as $img)
                                        <img src="{{ asset('uploads/img/' . $img) }}" width="40%">
                                    @endforeach
                                </div>
                                <div id="display_images">

                                </div>

                                <div class="form-group">
                                    <label for="status">Ativar</label>
                                    <select class="form-control" id="status" name="status">
                                        @if ($product->status == 1)
                                            <option selected value="1">
                                                Ativado</option>
                                            <option value="0">Desativado</option>
                                        @else
                                            <option value="1">Ativado</option>
                                            <option selected value="0">Desativado</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
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

@section('script')
    <script src="{{ asset('asset/AdminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            $('#summernote').summernote({
                height: 300,
                placeholder: "Descrição do produto"
            });



        })
    </script>
@endsection



<script type="text/javascript">
    // document.getElementById("myButtonCal").addEventListener("click", function(event) {
    //     event.preventDefault()
    // });


    function calculaDesconto() {
        var price = (jQuery('#price').val() == '' ? 0 : jQuery('#price').val());
        var percent_sale = (jQuery('#percent_sale').val() == '' ? 0 : jQuery('#percent_sale').val());

        var result = ((1 - (parseInt(percent_sale) / 100)) * parseInt(price));
        jQuery('#sale_price').val(result);

    }

    function loadFile(event) {

        var image = URL.createObjectURL(event.target.files[0]);
        var display_image = document.getElementById('display_image');
        var newimg = document.createElement('img');

        display_image.innerHTML = '';
        newimg.src = image;
        newimg.width = "100";
        display_image.appendChild(newimg);

    }


    function loadListFile(files) {
        var image = document.getElementById('display_images');
        while (image.firstChild) {
            image.removeChild(image.firstChild);
        }

        for (var i = 0; i < files.length; i++) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var element = document.createElement("img");
                element.setAttribute("src", e.target.result);
                element.style.width = "30%";
                element.style.margin = "3px";
                document.getElementById("display_images").appendChild(element);
            };
            reader.readAsDataURL(files[i]);
        }
    }

    function ChangeToSlug() {
        var slug;

        //Lấy text từ thẻ input title
        slug = document.getElementById("slug").value;
        slug = slug.toLowerCase();
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('convert_slug').value = slug;
    }
</script>


@endsection
