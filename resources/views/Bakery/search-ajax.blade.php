@foreach($data as $product)

    <div class="list-search">
        <a href="{{ url('produtos/' . $product->id . '/' . $product->slug) }}">
            <div class="img">
                <img src="{{ asset('uploads/img/'.$product->image) }}" width="60px">
            </div>
            <div class="cake">
                <p class="name">{{ $product->name }}</p>
                <p class="price">{{ $product->price}}</p>
            </div>
        </a>
    </div>
    <hr>

@endforeach