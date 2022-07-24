@extends('Admin.index')


@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="{{ url('/Admin') }}">Pagina inicial</a></li>
            <li class="breadcrumb-item"><a href="{{ route('Blog.index') }}">Gerenciar postagens</a></li>
            <li class="breadcrumb-item active">{{ $blog->name_blog }}</li>
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
                    <h3 class="card-title">Editar postagem</h3>
                </div>
                <form method="POST" action="{{ route('Blog.update',[$blog->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name_blog">Título do artigo</label>
                                    <input type="text" class="form-control" name="name_blog" value="{{ $blog->name_blog }}"
                                        onkeyup="ChangeToSlug();" id="slug">
                                </div>
                               
                                <div class="form-group">
                                    <label for="synopsis_blog">Resumo do artigo</label>
                                    <textarea  class="form-control" name="synopsis_blog">{{ $blog->synopsis_blog }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="description_blog">Conteúdo</label>
                                    <textarea id="summernote" class="form-control" name="description_blog">
                                        {{ $blog->description_blog }}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="slug_blog">Slug</label>
                                    <input type="text" class="form-control" name="slug_blog" value="{{ $blog->slug_blog}}"
                                        id="convert_slug">
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Categoria</label>
                                    <select name="category_blog" class="form-control">
                                        @foreach ($category as $key => $value)
                                            <option value="{{ $value->id }}" {{ $value->id==$blog->category_blog ? 'selected':'' }}>{{ $value->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="img_blog">Foto</label>
                                    <input type="file" class="form-control" name="img_blog" id="img_blog"
                                        onchange="loadFile(event)">
                                        <img src="{{ asset('uploads/img/'.$blog->img_blog) }}" width="100" alt="{{$blog->img_blog  }}">
                                </div>
                                <div id="display_image"></div>
                                <div class="form-group">
                                    <label for="tag_blog">Tag</label>
                                    <input type="text" class="form-control" name="tag_blog" value="{{ $blog->tag_blog }}">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="status_blog">Ativar</label>
                                    <select class="form-control" id="status" name="status_blog">
                                       @if($blog->status_blog==1)
                                            <option selected value="1">Ativados</option>
                                            <option  value="0">Desativado</option>
                                        @else
                                            <option  value="1">Ativado</option>
                                            <option selected value="0">Desativado</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Editar</button>
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
                
            });



        })
    </script>
@endsection



<script type="text/javascript">
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
          while(image.firstChild){
              image.removeChild(image.firstChild);
          }
       
       for(var i= 0; i< files.length;i++){
           var reader = new FileReader();
           reader.onload = function(e){
               var element = document.createElement("img");
                    element.setAttribute("src",e.target.result);
                    element.style.width="30%";
                    element.style.margin="3px";
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
