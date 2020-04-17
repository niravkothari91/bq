<div class="might-like-section mt-5">
    <div class="row">
        <div class="col-lg-9 offset-1">
            <p class="lead text-warning font-weight-bold m-3 text-capitalize">You might also like...</p>
            <div class="row">
                @foreach ($mightAlsoLike as $product)
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <img src="{{ productImage($product->image) }}" alt="product" class="img-responsive w-75 d-align-center">
                        <a href="{{ route('shop.show', $product->slug) }}">
                            <p class="text-warning lead">{{ $product->name }}</p>
                            <p class="text-muted lead font-weight-bold">{{ $product->presentPrice() }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>