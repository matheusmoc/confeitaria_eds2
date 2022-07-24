@extends('Admin.index')


@section('breadcrumb')
<div class="col-sm-6">
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="{{ url('/Admin') }}">Pagina inicial</a></li>
        <li class="breadcrumb-item"><a href="{{ route('Category.index') }}">
            Gerenciar categorias</a></li>
        <li class="breadcrumb-item active">Editar</li>
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
                    Editar categoria</h3>
                </div>
                <form method="POST" action="{{ route('Category.update',[$category->id]) }}">
                   @method('PUT')
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="category_name">
                        Lista de nomes</label>
                      <input type="name" class="form-control" name="category_name"  value="{{$category->category_name  }}" onkeyup="ChangeToSlug();" id="slug">
                    </div>
                    <div class="form-group">
                      <label for="category_slug">Slug</label>
                      <input type="slug" class="form-control" name="category_slug"  value="{{$category->category_slug}}" id="convert_slug">
                    </div>

                    <div class="form-group">
                      <label for="category_type">
                        Pertence a: </label>
                      <select class="form-control" id="category_type" name="category_type">
                          @if($category->category_type==1)
                              <option selected value="1">Produtos</option>
                               <option value="0">
                                Notícia</option>
                          @else
                              <option value="1">Produtos </option>
                              <option selected  value="0">Notícia</option>
                          @endif
                      </select>
                  </div>
                    <div class="form-group">
                        <label for="category_status">
                            Ativar</label>
                        <select class="form-control" id="status" name="category_status">
                            @if($category->category_status==1)
                                <option selected value="1">Ativado</option>
                                 <option value="0">Desativado</option>
                            @else
                                <option value="1">Ativado</option>
                                <option selected  value="0">Desativado</option>
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
 <script type="text/javascript">
    function ChangeToSlug()
    {
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