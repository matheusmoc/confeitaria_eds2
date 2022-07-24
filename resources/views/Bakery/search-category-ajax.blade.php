
<div class="row ">
    @foreach ($product as $key => $value)
        <div class=" col-12 col-md-4 col-lg-4 col-sm-6 p-md-3  p-3 animate__animated animate__fadeInRight"
            style="animation-delay: 0.1s;">
            <div class="card-product ">
                <a href="{{ url('produtos/' . $value->id . '/' . $value->slug) }}">
                    <img src="{{ asset('uploads/img/' . $value->image) }}" width="100%">
                    @if ($value->sale_price > 0)
                        <div class="sale">
                            {{ $value->percent_sale }}
                        </div>
                    @endif
                    <div class="favorite">
                        <a href="#" onclick="favoriteProduct({{ $value->id }})" style="color:red">
                            <i class="{{ $value->like ? 'fa fa-heart' : 'fa fa-heart-o text-dark' }}"
                                aria-hidden="true" title="Favoritos"></i>
                        </a>
                    </div>
                </a>

                <div class="content-product">
                    <p class="heading-product">{{ $value->name }}</p>
                    <div class="price-product">
                        @if ($value->sale_price == 0)
                            <span class="price-sale">{{ number_format($value->price) }}R$</span>
                        @else
                            <span class="price">{{ number_format($value->price) }}R$</span>
                            <span class="price-sale ">{{ number_format($value->sale_price) }}R$</span>
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
                        <a href="javascript:" onclick="AddCart({{ $value->id }})" title="Adicionar ao carrinho">Adicionar ao carrinho
                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    @endforeach
</div>

{{-- <script>
    var  a = document.querySelector('#name-show');
    a.innerText ="4354353";
</script> --}}
