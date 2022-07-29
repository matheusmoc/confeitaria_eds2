@extends('Bakery.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/bakery/checkout.css') }}">
@endsection

@section('content')
    <div class="banner-product">
        <div class="container-fluid">
            <div class="heading-product">
                <div class="title-product">Pagamento</div>
                <a>Pagina inicial</a>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                <a>Carrinho</a>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                <a>Pagamento</a>
            </div>

        </div>

    </div>
    <!-- end banner product -->
    <div class="check-out">
        <div class="conteiner">
            <form method="POST" action="{{ route('bill') }}">
                @csrf
                <div class="row justify-content-lg-center justify-content-md-center">
                    <div class="col-12 col-xl-6 col-lg-6 col-md-10 col-sm-12">
                        <div class="inf-left">
                            @if (Auth::check())
                                <p class="title-checkout">Informações do cliente</p>
                                <div class="form-group">
                                    <label for="name">
                                        Nome completo</label>
                                    <input type="text" name="name" id="name" value="{{ Auth::user()->name }}"
                                        disabled>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}"
                                        disabled>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="phone">Número de telefone</label>
                                <input class="form-control mb-3 col-md-4" type="text" id="phone" name="phone"
                                    onkeydown="return mascaraTelefone(event)" placeholder="Digite seu telefone">
                            </div>

                            <div class="form-group">
                                <label for="address">Endereço</label>
                                <input class="form-control mb-3 col-md-2" type="text" id="cep" name="address"
                                    onblur="pesquisacep(this.value);" placeholder="CEP">
                                <input class="form-control mb-3" type="text" id="cidade" name="andress"
                                    placeholder="Cidade" readonly>
                                <input class="form-control mb-3" type="text" id="rua" name="address"
                                    placeholder="Bairro" readonly>
                                <input class="form-control mb-3" type="text" id="bairro" name="address"
                                    placeholder="Rua" readonly>
                                <input class="form-control mb-3" type="text" style="width: 60px" name="address"
                                    placeholder="Nº">
                            </div>
                            <div class="form-group">
                                <label for="note">Informações adicionais</label>
                                <textarea id="note" rows="4" name="note"></textarea>
                            </div>

                        </div>

                    </div>
                    <div class=" col-12 col-xl-5 col-lg-6 col-md-8 col-sm-12">
                        <div class="inf-right">
                            <div class="header-right">
                                <div class="title-checkout">Meus pedidos</div>
                                <!-- <hr class="height-checkout"> -->
                            </div>
                            <div class="bill">
                                @foreach (Cart::content() as $key => $item)
                                    <div class="item-bill">
                                        <p class="name-product">{{ $item->name }} x {{ $item->qty }}</p>
                                        <p class="price-product">R$ {{ number_format($item->price) }} </p>
                                    </div>
                                @endforeach
                                <div class="total-bill-pay">
                                    <p class="name-product">Total</p>
                                    <p class="price-product">R$ {{ Cart::subtotal(0) }} </p>
                                </div>

                                <hr class="m-4">

                                <div class="col-md-12">
                                    <label class="font-weight-bolder ">
                                        <div class="alert alert-danger " role="alert">
                                            Antes de finalizar o pagamento, por favor selecione uma data de entrega
                                            desejada.
                                        </div>
                                    </label>
                                    <div>
                                        <input class="form-control" type="date" name="date_order">
                                    </div>
                                </div>
                            </div>

                            <hr class="m-4">

                            <div class="header-right">
                                <div class="title-checkout">Formas de pagamento</div>
                                <!-- <hr class="height-checkout"> -->
                            </div>
                            <div class="item-pay mt-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pay" id="exampleRadios1"
                                        value="1">
                                    {{-- <label class="form-check-label" for="exampleRadios1">
                                        ....
                                    </label> --}}
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pay" id="exampleRadios1"
                                        value="3">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Pagar na entrega
                                    </label>
                                </div>
                            </div>

                            <div>
                                <button type="submit" id='pagar'
                                class="btn btn-checkout w-75 font-weight-bold p-3">Realizar pagamento</button>
                            </div>

                        </div>


                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('asset/js/bakery/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('asset/js/bakery/cart.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script>
        const inputTel = document.querySelector("#phone");

        function mascaraTelefone(event) {
            let tecla = event.key;
            let telefone = event.target.value.replace(/\D+/g, "");

            if (/^[0-9]$/i.test(tecla)) {
                telefone = telefone + tecla;
                let tamanho = telefone.length;

                if (tamanho >= 12) {
                    return false;
                }

                if (tamanho > 10) {
                    telefone = telefone.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
                } else if (tamanho > 5) {
                    telefone = telefone.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
                } else if (tamanho > 2) {
                    telefone = telefone.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
                } else {
                    telefone = telefone.replace(/^(\d*)/, "($1");
                }

                event.target.value = telefone;
            }

            if (!["Backspace", "Delete"].includes(tecla)) {
                return false;
            }
        }

        $("#cep").keypress(function() {
            $(this).mask('00.000-000');
        });


        (function() {

            const cep = document.querySelector("input[id=cep]");

            cep.addEventListener('blur', e => {
                const value = cep.value.replace(/[^0-9]+/, ''); //MASK = PADRÃO
                const url = `https://viacep.com.br/ws/${value}/json/`;

                fetch(url)
                    .then(response => response.json())
                    .then(json => {

                        if (json.logradouro) {
                            document.querySelector('input[id=rua]').value = json.logradouro;
                            document.querySelector('input[id=bairro]').value = json.bairro;
                            document.querySelector('input[id=cidade]').value = json.localidade;
                            document.querySelector('input[id=estado]').value = json.uf;
                        }
                    });
            });
        })();

        const cidade = document.querySelector('#cidade')
        const pagar = document.querySelector('#pagar')
        pagar.addEventListener('click', event => {
            if (cidade.value != 'Montes Claros') {
                event.preventDefault();
                alert('Infelizmente não entregamos em sua região');
                cidade.focus();
            }
        })
    </script>
@endsection
