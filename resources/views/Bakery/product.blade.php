@extends('Bakery.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/bakery/product.css') }}">
@endsection

@section('content')
    <!-- end header -->
    <div class="banner-product">
        <div class="container-fluid">
            <div class="heading-product">
                <div class="title-product">Produtos</div>
                <a>Página inicial</a>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                <a>Produtos</a>
            </div>

        </div>

    </div>
    <!-- end banner product -->

    <div class="products">
        <button class="icon-menu" id="iconMenu">
            <i class="fa fa-filter" aria-hidden="true"></i>
        </button>
        <div class="container">
            <div class="row justify-content-sm-center">
                <!-- col-left -->
                <div class="col-lg-3 col-md-0 col-sm-0 product-left">
                    <div class="product-list-moblie" id="nav-product-list">
                        <div class="nav-product-list" id="nav-product">
                            <div class=" product-list">
                                <div class="name-list ">
                                    <p>Produtos</p>
                                    <i class="fa fa-chevron-left rotate" aria-hidden="true"></i>
                                </div>

                                <div class="content" id="category">
                                    @foreach ($category as $key => $value)
                                        <a onclick="categoryFunction({{ $value->id }})"
                                            name="category">{{ $value->category_name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class=" product-list">
                                <div class="name-list ">
                                    <p>Novidades</p>
                                    <i class="fa fa-chevron-left rotate" aria-hidden="true"></i>
                                </div>
                                <div class="content">
                                    <a>Promoção</a>
                                    <a>Mais vendidos</a>
                                    <a>Produto mais recente</a>
                                </div>
                            </div>
                            <div class=" product-list">
                                <div class="name-list ">
                                    <p>Faixa de preço</p>
                                    <i class="fa fa-chevron-left rotate" aria-hidden="true"></i>
                                </div>
                                <div class="content">
                                    <form>
                                        <div class="price-list custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input " name="price_input"
                                                id="min_price" value="1" label="50">
                                            <label class="custom-control-label" for="min_price">Abaixo 50,00</label>
                                        </div>
                                        <div class="price-list custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input " name="price_input"
                                                id="between_price" value="2" label="100">
                                            <label class="custom-control-label" for="between_price">De 50,00 a
                                                100,00</label>
                                        </div>
                                        <div class="price-list custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="price_input"
                                                id="max_price" value="3" label="120">
                                            <label class="custom-control-label" for="max_price">De 100,00 ou mais</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-left -->
                <!-- col-right -->
                <div class="col-lg-9 col-md-12 col-sm-12 product-right">
                    <div class=" row product-sort justify-content-end">
                        <label for="sort" class="col-sm-4 col-md-3 col-lg-3 col-xl-2">Ordenado por: </label>
                        <select class=" col-sm-4 col-md-4 col-lg-3" id="option-sort">
                            <option selected value="1"> Predefinido</option>
                            <option value="2">Preço de baixo a alto</option>
                            <option value="3">Preço de alto a baixo</option>
                        </select>
                    </div>

                    <div id="name-show">
                        <p>

                        </p>
                       <i class="fa fa-times" aria-hidden="true" onclick="closeFunction()"></i>
                    </div>

                    <div class="list-product">
                        <div class="row ">
                            @foreach ($product as $key => $value)
                                <div class=" col-12 col-md-4 col-lg-4 col-sm-6 p-md-3  p-3 animate__animated animate__fadeInRight"
                                    style="animation-delay: 0.1s;">
                                    <div class="card-product ">
                                        <a href="{{ url('detalhe-produto/' . $value->id . '/' . $value->slug) }}">
                                            <img src="{{ asset('uploads/img/' . $value->image) }}" width="100%">
                                            @if ($value->sale_price > 0)
                                                <div class="sale">
                                                    {{ $value->percent_sale }}
                                                </div>
                                            @endif
                                            <div class="favorite">
                                                <a href="#" onclick="favoriteProduct({{ $value->id }})" style="color:red">
                                                    <i class="{{ $value->like ? 'fa fa-heart' : 'fa fa-heart-o text-dark' }}"
                                                        aria-hidden="true" title="Favorito"></i>
                                                </a>
                                            </div>
                                        </a>

                                        <div class="content-product">
                                            <p class="heading-product">{{ $value->name }}</p>
                                            <div class="price-product">
                                                @if ($value->sale_price == 0)
                                                    <span
                                                        class="price-sale">{{ number_format($value->price) }}R$</span>
                                                @else
                                                    <span
                                                        class="price">{{ number_format($value->price) }}R$</span>
                                                    <span
                                                        class="price-sale ">{{ number_format($value->sale_price) }}R$</span>
                                                @endif
                                            </div>
                                            <div class="rate-product">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            <div class="order-product">
                                                <a href="javascript:" onclick="AddCart({{ $value->id }})"
                                                    title="Adicionar ao carrinho"> Adicionar ao carrinho
                                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- pagination -->
                    <div class="paginate">
                        {{ $product->links() }}
                    </div>
                    <!-- end pagination -->
                </div>
                <!--end col-right -->
            </div>
        </div>
    </div>
    <!-- end product -->
@endsection

@section('js')
    <script src="{{ asset('asset/js/bakery/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('asset/js/bakery/product.js') }}"></script>
    <script>
        function categoryFunction(id) {
            $.ajax({
                url: `{{ url('produtos/${id}') }}`,
                type: "GET",

            }).done(function(res) {
                $('.list-product').html(res);
                $('#name-show').hide();
                $('.paginate').hide();
            })
        }

        $('#option-sort').on('change', function() {
            var sort_number = $(this).val();
            $.ajax({
                url: `{{ url('pedido/${sort_number}') }}`,
                type: "GET",

            }).done(function(res) {
                $('.list-product').html(res);
                $('#name-show').hide();
                $('.paginate').hide();
            })
        })

        $("input[name='price_input']").on('click', function() {
            var value_id = $(this).val();
            var nameShow = document.getElementById('#name-show');

            $.ajax({
                url: `{{ url('preços/${value_id}') }}`,
                type: "GET",

            }).done(function(res) {
                $('.list-product').html(res);
                $('#name-show').show();

                if (value_id == 1) {
                    $('#name-show p').html('Preço: Abaixo de 50.00');
                } else if (value_id == 2) {
                    $('#name-show p').html('Preço: 50.00 - 100.00');
                } else {
                    $('#name-show p').html('Preço: 100.00 - ou mais');
                }

            })
        })

        function closeFunction(){
            window.location.reload();
        }

        function favoriteProduct(id) {
            $.ajax({

                url: `{{ asset('favoritos/${id}') }}`,
                type: "GET",
            }).done(function(response) {
                if (response) {

                    if (response.fail) {
                        alertify.warning(response.fail);
                    } else {
                        alertify.success('Favoritos adicionados com sucesso');
                    }

                    setTimeout(() => {

                        location.reload();
                    }, 1000);
                }

            });
        }
    </script>
@endsection
