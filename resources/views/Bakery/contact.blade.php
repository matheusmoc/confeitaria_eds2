@extends('Bakery.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/bakery/contact.css') }}">
@endsection

@section('content')
    <div class="banner-product">
        <div class="container-fluid">
            <div class="heading-product">
                <div class="title-product">Contato</div>
                <a>Página inicial</a>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                <a>Contato</a>
            </div>

        </div>

    </div>
    <!-- end banner product -->
    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 contact-left">
                    <h4>Envie uma mensagem para nossa equipe</h4>
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
                    <form action="{{ route('post_contact') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nome completo </label>
                            <input type="text" id="name" name="name" placeholder="Digite seu nome">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email"  placeholder="Digite seu email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Número de telefone</label>
                            <input type="text" id="phone" name="phone" onkeydown="return mascaraTelefone(event)" placeholder="Digite seu telefone">
                        </div>
                        <div class="form-group">
                            <label for="contact-text">Mensagem</label>
                            <textarea id="contact-text" rows="3" name="content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-submit">Enviar</button>
                    </form>
                </div>
                <div class="col-lg-6 col-md-6 contact-right">
                    <div class="contact-text">
                        <div class="item-contact">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <div class="item-text">
                                <p class="heading">Endereço</p>
                                <p>Rua doutor luís frança de souza, 395, Morada do sol, Montes Claros - MG</p>
                            </div>

                        </div>
                        <div class="item-contact">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <div class="item-text">
                                <p class="heading">Número</p>
                                <p>(38) 99143-5365</p>
                            </div>
                        </div>
                        <div class="item-contact">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <div class="item-text">
                                <p class="heading">Email</p>
                                <p>cantinhodoce@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact -->
    <div class="map">
        <div class="container">
            <h4 class="p-4">Mapa</h4>
            <div class="mapouter">
                <div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas"
                        src="https://maps.google.com/maps?q=Doutor%20lu%C3%ADs%20fran%C3%A7a%20de%20souza&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                        href="https://123movies-to.org">123 movies</a><br>
                    <style>
                        .mapouter {
                            position: relative;
                            text-align: right;
                            height: 500px;
                            width: 600px;
                        }
                    </style><a href="https://www.embedgooglemap.net">embedded maps</a>
                    <style>
                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            height: 500px;
                            width: 600px;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
    <!-- end map -->
@endsection

@section('js')
    <script src="{{ asset('asset/js/bakery/owl.carousel.min.js') }}"></script>
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
    </script>
@endsection
