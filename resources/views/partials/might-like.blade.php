<div class="might-like-section">
    <div class="container">
        <h2>You might also like...</h2>
        <div class="might-like-grid">
            @foreach ($mightAlsoLike as $product)
                <a href="{{ route('shop.show', $product->slug) }}" class="might-like-product">
                    <div class="might-like-product-image"><img src="{{ productImage($product->image) }}" alt="product"></div>
                    <div class="float-bottom">
                        <div class="might-like-product-name">{{ $product->name }}</div>
                        <div class="might-like-product-price">{{ $product->presentPrice() }}</div>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
</div>
