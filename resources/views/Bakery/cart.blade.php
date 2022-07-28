@extends('Bakery.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/bakery/cart.css') }}">
@endsection
@section('content')
    <div class="banner-product">
        <div class="container-fluid">
            <div class="heading-product">
                <div class="title-product">Carrinho</div>
                <a>Pagina inicial</a>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                <a>Carrinho</a>
            </div>

        </div>

    </div>
    <!-- end banner product -->
    <div class="table-product">
        <div class="container-fluid">

            <table class="table">
                <tr class="header-table" style="width: 100%">
                    <th scope="col-2">Foto</th>
                    <th scope="col-2">Nome do produto</th>
                    <th scope="col-2">Quantidade</th>
                    <th scope="col-2">Preço unitário</th>
                    <th scope="col-2" colspan="1"></th>
                    <th scope="col-2">Data da entrega desejada</th>
                    <th></th>
                </tr>
                </thead>
                <td>
                </td>
                <tbody>
                    @foreach (Cart::content() as $key => $item)
                        <tr class="item-table">
                            <td><img src="{{ asset('uploads/img/' . $item->options->image) }}" width="90px"
                                    height="80px"></td>
                            <td class="name-item-product">{{ $item->name }}</td>
                            <td>
                                <div class="quantity">

                                    <button class="btn-dec" onclick="decrementValue()" type="button">-</button>

                                    <input class="qty" type="text" id="qty-{{ $key }}" name="quantity"
                                        value="{{ $item->qty }}" min="1" max="50" readonly>

                                    <button class="btn-inc" onclick="incrementValue()" type="button">+</button>

                                    <a class="btn btn-light text-white" style="background: rgb(245, 93, 38)"
                                        onclick="SaveCart('{{ $key }}')">
                                        Adicionar quantidade
                                    </a>
                                </div>
                            </td>

                            @if ($item->sale_price)
                                <td> R$ <input class="price" type="text" style="border: none;" size="6"
                                        value="{{ number_format($item->sale_price) }}" readonly></td>
                                <td> <input class="price-product" type="text" style="border: none;" size="6"
                                        value="{{ number_format($item->sale_price) }}" hidden></td>
                            @else
                                <td> R$ <input class="price" type="text" style="border: none;" size="6"
                                        value="{{ number_format($item->price) }}" readonly></td>
                                <td> <input class="price-product" type="text" style="border: none;" size="6"
                                        value="{{ number_format($item->price) }}" hidden></td>
                            @endif




                            <td class="col-3">
                                <label class="text-danger font-weight-bolder">Antes de finalizar o
                                    pagamento, por favor
                                    selecione uma data de entrega desejada</label>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal2">
                                    Agendar
                                </button>
                            </td>
                            <!-- Modal -->

                            {{-- <form action="{{ route('') }}" method="post"></form>
                            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="modal-body">
                                                <input class="form-control" type="date" name="date_order">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form> --}}
                            <!-- Button trigger modal -->


                            <td class="icon-delete">
                                <a href="javasvript:" onclick="DeleteCart('{{ $key }}')"><i class="fa fa-times"
                                        aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    <tr class="item-total">
                        <td colspan="4" class="title-total">Total:</td>
                        <td colspan="3" class="title-price price-product">
                            <div class="bold">
                                R$ {{ Cart::subtotal(0) }}
                            </div>

                    </tr>
                    <tr class="item-total">
                        <td colspan="7"></td>
                    </tr>
                </tbody>

            </table>
            <!-- end table -->
            @foreach (Cart::content() as $key => $item)
                <div class="card-item-product">
                    <img src="{{ asset('uploads/img/' . $item->options->image) }}" width="90px" height="80px">
                    <a href="javasvript:" onclick="DeleteCart('{{ $key }}')"><i class="fa fa-times"
                            aria-hidden="true"></i></a>
                    <div class="item-product">
                        <div class="title-product">Produtos:</div>
                        <div class="name-product">{{ $item->name }}</div>
                    </div>
                    <div class="item-product">
                        <div class="title-product">Preço:</div>
                        <div class="price-product">R$ {{ number_format($item->price) }}</div>
                    </div>
                    <div class="item-product">
                        <div class="title-product">Quantidade:</div>
                        <div class="text-product">
                            <div class="quantity">
                                <button type="button">-</button>
                                <input type="text" class=".value-item" id="{{ $key }}" name="quantity"
                                    value="{{ $item->qty }}">
                                <button type="button">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="item-product">
                        <div class="title-product">Atualizar</div>
                        <div class="text-product">
                            <a onclick="SaveCart('{{ $key }}')" style="position: initial;">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="item-product">
                        <div class="title-product title-price-product">Total:</div>

                        <div id="price" class="price-product">R$ {{ number_format($item->price * $item->qty) }}
                        </div>

                    </div>
                </div>
            @endforeach
            <!-- end card -->
            {{-- <div class="discount">
                <input type="text" name="discount" id="discount" placeholder="código de desconto">
                <button type="button" class="btn btn-discount">Cupom de desconto</button>
            </div> --}}
            <div class="row justify-content-end">
                <div class="col-12 col-lg-4 col-md-7">
                    <div class="total-bill">
                        <div class="list-bill">
                            <p class="title-bill">Preço total:</p>
                            <p class="price-bill" id="resultado">R$ {{ Cart::subtotal(0) }} </p>
                        </div>
                        {{-- <div class="list-bill">
                            <p class="title-bill">Desconto:</p>
                            <p class="price-bill">R$ 0</p>
                        </div> --}}
                        <div class="list-bill">
                            <p class="title-bill">Valor total:</p>
                            <p class="price-bill" id="resultado">R$ {{ Cart::subtotal(0) }} </p>
                        </div>
                        <div class="payment">
                            @if (Auth::check())
                                <a href="{{ route('pay_bill') }}">
                                    <p>Continuar com o pagamento</p>
                                </a>
                            @else
                                <a href="" data-toggle="modal" data-target="#thongbao">
                                    <p>Continuar com o pagamento</p>
                                </a>
                                <div class="modal fade" id="thongbao" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Notificação</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Por favor, faça o login para continuar com o seu pedido!
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn "
                                                    style="background-color: tomato;color:white;"
                                                    data-dismiss="modal">Aceitar</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('asset/js/bakery/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('asset/js/bakery/cart.js') }}"></script>
    <script>
        function DeleteCart(id) {
            $.ajax({
                url: `{{ asset('deletar-do-carrinho/${id}') }}`,
                type: "GET",

            }).done(function(response) {
                console.log(response);
                if (response) {
                    alertify.success('Excluído com sucesso');
                    setTimeout(() => {

                        location.reload();
                    }, 1000);

                }
            });
        }

        function SaveCart(id) {
            const qty = document.querySelector('#qty-' + id).value;


            console.log(qty);
            $.ajax({
                url: `{{ url('salvar-no-carrinho/${id}/${qty}') }}`,
                type: "GET",
            }).done(function(response) {
                console.log(response);

                if (response) {
                    alertify.success("Pedido atualizado");
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                }
            });
        }



        // function incrementValue() {
        //     var price = $('.price').val();
        //     var priceProduct = $('.price-product').val();

        //     var result = (parseInt(priceProduct) + parseInt(price));
        //     jQuery('.price-product').val(result);
        // }

        // function decrementValue() {
        //     var priceProductDec = $('.price-product').val();
        //     var priceDec = $('.price').val();
        //     if (priceProductDec == priceDec) {
        //         return;
        //     }
        //     var resultDec = (parseInt(priceProductDec) - parseInt(priceDec))
        //     jQuery('.price-product').val(resultDec);
        // }
    </script>
@endsection
