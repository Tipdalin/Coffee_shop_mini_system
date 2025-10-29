<div class="row row-cols-2 row-cols-md-3 g-3 product-grid">
    {{-- Example Product Card (Loop this for all products) --}}
    @foreach ([1, 2, 3, 4, 5, 6] as $item)
    <div class="col">
        <div class="card product-card">
            <div class="card-body">
                <div class="product-category-tab {{ $item % 3 == 1 ? 'coffee-bg' : ($item % 3 == 2 ? 'noncoffee-bg' : 'snack-bg') }}">
                    {{ $item % 3 == 1 ? 'Coffee' : ($item % 3 == 2 ? 'Non Coffee' : 'Snack') }}
                </div>
                
                <div class="product-image-container">
                    {{-- Replace with a dynamic image source --}}
                                    </div>
                
                <p class="product-title">Cacao Milk</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="product-price">$1.99</span>
                    <button class="btn btn-sm product-action-btn" data-product-id="{{ $product->id }}">
    <i class="bi bi-heart"></i>
    <i class="bi bi-plus-circle"></i>
</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>