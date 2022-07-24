@extends('Admin.index')


@section('breadcrumb')
    <div class="col-sm-12">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="{{ url('/Admin') }}">Pagina inicial</a></li>
            <li class="breadcrumb-item"><a href="{{ route('Blog.index') }}">Gerenciar postagens</a></li>
            <li class="breadcrumb-item active">{{ $blog->slug_blog }}</li>
        </ol>

    </div>
@endsection





@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('asset/AdminLTE/plugins/summernote/summernote-bs4.min.css') }}">
    <style>
        .note-toolbar.card-header {
            display: none;
        }
        .note-resizebar {
            display: none;
         }
         .note-editor.note-frame.card {
             border: none;
             box-shadow: none;
        }
        .note-editor.note-frame .note-statusbar {
            border-top:0px;
        }

    </style>
@endsection

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                {{-- <div class="card-header">
                    <h3 class="card-title">Sản phẩm</h3>
                </div> --}}
                <div class="row">
                    <div class="col-md-4">
                        <div class="imgae m-4">
                            <img src="{{ asset('uploads/img/' . $blog->img_blog) }}" class="mx-auto d-block"
                                width="100%" height="500px">
                        </div>
                        <div class="tag m-4">
                            <b>Tags: </b>{{ $blog->tag_blog }}
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="product m-4">
                            <p class="text-center" style="font-size:32px; font-weight:bold; color:rgb(207, 60, 34)">
                                {{ $blog->name_blog }}</p>
                            <div class="content" style="padding-top:20px; font-size:20px">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                Título do artigo</th>
                                            <td class="text-danger"> {{ $blog->name_blog }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Slug</th>
                                            <td> {{ $blog->slug_blog }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                Categoria </th>
                                            <td> {{ $blog->category->category_name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                Resumo do artigo</th>
                                            <td>
                                                
                                                    {{ $blog->synopsis_blog}}
                                               
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                Status</th>
                                            <td>
                                                @if ($blog->status == 1)
                                                    <span class="text text-success">Ativado</span>
                                                @else
                                                    <span class="text-danger">Desativado</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="container">
                           
                         <textarea id="summernote" name="description">
                             <p style="font-size:25px;font-weight:bold">Conteúdo</p>
                             {{ $blog->description_blog }}
                            </textarea>
                        </div>
                       
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@section('script')
    <script src="{{ asset('asset/AdminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $('#summernote').summernote({
            callbacks: {
                onPaste: function(e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData(
                        'Text');

                    e.preventDefault();

                    // Firefox fix
                    setTimeout(function() {
                        document.execCommand('insertText', false, bufferText);
                    }, 10);
                }
            }
        });
    </script>
@endsection
@endsection
