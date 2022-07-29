@extends('Bakery.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/bakery/contact.css') }}">
   <style>
       .anh{
           padding:50px;
           text-align: center;
           width: 50%;
       }
       .btn-red{
           background-color: white;
           color: tomato;
           border: 1px solid tomato;
           font-size: 20px;
       }
       .btn-red:hover{
         color: white;
        background-color:tomato;
       }
   </style>
@endsection

@section('content')
    <div class="banner-product">
        <div class="container-fluid">
            <div class="heading-product">
                <div class="title-product">Sucesso no pedido</div>
                <a> Pagina inicial</a>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                <a>Pedido</a>
            </div>

        </div>
    </div>

   <div class="container anh">
       <h2 style="color:rgb(230, 79, 52)">Pedido realizado com sucesso!</h2>
       <img src="{{ asset('asset/img/Image/shipper.jpg') }}" with="100%">
       <div class="button-home">
            <a class="btn btn-red " href="{{ route('index') }}" role="button"> Voltar para a página principal</a>
       <a class="btn btn-red" href="{{ route('order') }}" role="button">Visualizar o status do pedido</a>
       </div>

   </div>
@endsection

@section('js')
    <script src="{{ asset('asset/js/bakery/owl.carousel.min.js') }}"></script>
@endsection
