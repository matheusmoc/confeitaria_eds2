@extends('Bakery.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/bakery/details-blog.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/bakery/details-product.css') }}">
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

        .note-editable.card-block {

            outline: none;
        }

        .note-editor.note-frame .note-statusbar {
            border-top: 0px;
        }

        .popover-content.note-children-container {
            display: none;
        }

        textarea.note-codable {
            display: none;
        }
        textarea#summernote {
            display: none;
        }

    </style>
@endsection

@section('content')
    <div class="banner-product">
        <div class="container-fluid">
            <div class="heading-product">
                <div class="title-product">Detalhes do blog</div>
                <a>Pagina inicial</a>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                <a>Blog</a>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                <a>Detalhes do blog</a>
            </div>

        </div>

    </div>
    <!-- end banner product -->
    <div class="detail-blog">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9 col-md-8 col-sm-12">
                    <div class="blog-content">
                        <h2 class="text-center">{{ $detail_blog->name_blog }}</h2>
                        <p class="text-center">By Admin - {{ $detail_blog->created_at }}</p>
                        <p>
                            <textarea id="summernote" name="description">{{ $detail_blog->description_blog }}</textarea>
                        </p>
                    </div>
                    <hr>
                    <div class="member-comment pt-4">
                        <div class="title-comment">Comentários recentes</div>
                        {{-- @foreach ($comment_user as $key => $value)
                        <div class="content-comment">
                            <div class="image-member ">
                                <img src="{{ asset('asset/img/Image/user.png') }}" width="90px" height="80px">
                            </div>
                            <div class="content-detail-comment">
                                <span>{{ $value->user->name }}<small class="text-muted">{{ $value->created_at }}</small></span>
                                <p class="name-member">{{ $value->content }}</p>
                            </div>
                        </div>
                       @endforeach --}}
                       <div class="content-comment" id="content-comment"></div>
                    </div>
                    <div class="title-comment pt-4">Deixe um comentário</div>

                    <form method="GET" action="">
                        @csrf
                        @if (Auth::check())
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nome</label>
                                <input type="name" id="name" value="{{ Auth::user()->name  }}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" id="email" value="{{Auth::user()->email  }}" disabled>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="note">Detalhes</label>
                                <input type="hidden" value={{ $detail_blog->id }} name="detail_blog_id">
                                <textarea id="comment-content" rows="4"></textarea>

                            </div>
                            <button type="submit" class=" btn-sub " id="btn-comment">Enviar</button>
                        </div>
                        @else
                        <a class="btn login-comment m-3" href="#" data-toggle="modal" data-target="#exampleModal">Por favor, faça login</a>
                        @endif
                    </form>

                </div>
                <!-- end colum-left -->
                <div class="col-12 col-lg-3 col-md-4 col-sm-12">
                    <div class="item-blog">
                        <form action="{{ route('search_blog') }}" method="GET">
                            <input type="text" placeholder="Search" name="search">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </form>
                        <div class="categories-blog">
                            <h4 class="text-center">Temas</h4>
                            <div class="item-categories">
                                <ul>
                                    <li><a href="#">Como fazer doces</a></li>
                                    <li><a href="#">Como fazer bolo de aniversário</a></li>
                                    <li><a href="#">Como fazer bolos finos</a></li>
                                    <li><a href="#">Como confeccionar decorações</a></li>
                                </ul>

                            </div>
                        </div>
                        <div class="categories-blog">
                            <h4 class="text-center">Notícias em destaque</h4>
                            @foreach ($blog as $key => $value)
                                <div class="item-categories">
                                    <a href={{ url('detalhe-blog/'.$value->id .'/' . $value->slug_blog) }}>
                                        <div class="list-blog">
                                            <div class="img-blog">
                                                <img src="{{ asset('uploads/img/' . $value->img_blog) }}" width="90px"
                                                    height="110px">
                                            </div>
                                            <div class="text-blog">
                                                <p class="title">{{ $value->name_blog }}</p>
                                                <p> <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                    {{ $value->created_at }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="categories-blog">
                            <h4 class="text-center">Tag</h4>
                            <div class="item-categories">
                                
                                @foreach ($tag as $key)
                                    <a href="#" class="tag">{{ $key }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end colum-right -->
            </div>


        </div>
    </div>

@endsection

@section('js')

    <script src="{{ asset('asset/js/bakery/owl.carousel.min.js') }}"></script>

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

         var _csrf = '{{ csrf_token() }}';
        $('#btn-comment').click(function(ev) {
            ev.preventDefault();
            let content = $('#comment-content').val();
            let _commentUrl = "{{ route('comment_blog', $detail_blog->id) }}";

            $.ajax({
                url: _commentUrl,
                type: 'GET',
                data: {
                    content: content,
                    _token: _csrf
                },
                success: function(res) {
                    if (res) {
                        $('#content-comment').html(res);
                        setTimeout(() => {

                            location.reload();
                        }, 1000);
                    }


                }
            });
        })


    </script>
@endsection
