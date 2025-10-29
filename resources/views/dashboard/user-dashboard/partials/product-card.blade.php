<div class="product-card bg-white rounded-3xl shadow-xl overflow-hidden group 
            transition-all duration-300 hover:shadow-2xl hover:shadow-indigo-300/50 hover:scale-[1.02]
            " 
    data-category-id="{{ $product->category_id }}" 
    data-category-name="{{ $product->category->name }}" 
    data-product-id="{{ $product->id }}">

    {{-- Image Container (Fixed Aspect Ratio) --}}
    <div class="product-image-container relative aspect-square w-full overflow-hidden bg-gray-100">
        
        @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" 
                 alt="{{ $product->name }}" 
                 class="product-image w-full h-full object-cover transition duration-500 group-hover:opacity-90 group-hover:scale-105">
        @else
            <!-- Placeholder for products without an image -->
            <img src="{{ asset('images/placeholder.png') }}" 
                 alt="{{ $product->name }}" 
                 class="product-image product-placeholder w-full h-full object-cover opacity-50">
        @endif
    </div>

    {{-- Product Info (Padding for breathing room) --}}
    <div class="product-info p-4 sm:p-5">
        
        {{-- Product Name: Bold and Concise --}}
        <h3 class="product-name text-lg font-bold text-gray-900 truncate mb-1">{{ $product->name }}</h3>
        
        {{-- Category Tag --}}
        <p class="product-category text-xs font-medium text-indigo-500 mb-2">
            {{ $product->category->name ?? 'Uncategorized' }}
        </p>

        {{-- Stock information and Price --}}
        <div class="flex items-center justify-between mt-2">
            
            {{-- Price: The main event, large and emphasized --}}
            <p class="product-price text-2xl font-black text-indigo-600">${{ number_format($product->price, 2) }}</p>
            
            {{-- Stock Badge --}}
            <p class="product-stock text-xs font-bold px-3 py-1 rounded-full 
                      @if ($product->stock == 0) 
                          bg-gray-200 text-gray-500 
                      @elseif ($product->stock < 5) 
                          bg-red-100 text-red-600 
                      @else 
                          bg-green-100 text-green-600 
                      @endif">
                @if ($product->stock == 0)
                    SOLD OUT
                @elseif ($product->stock < 5)
                    LOW STOCK ({{ $product->stock }})
                @else
                    IN STOCK
                @endif
            </p>
        </div>
    </div>

    {{-- Action Buttons (Aligned and Tappy) --}}
    <div class="product-actions flex justify-between p-4 border-t border-gray-100">
        
        {{-- Favorite Button --}}
        <button class="action-btn favorite-btn p-3 rounded-full border-2 border-pink-400 text-pink-500 
                      hover:bg-pink-100 transition duration-200 shadow-md hover:shadow-lg" 
                data-product-id="{{ $product->id }}">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
            </svg>
        </button>

        {{-- Add to Cart Button --}}
        <button class="action-btn add-to-cart-btn flex items-center px-4 py-3 ml-3 rounded-full text-sm font-semibold text-white 
                      {{ $product->stock == 0 ? 'bg-gray-400 cursor-not-allowed' : 'bg-indigo-600 hover:bg-indigo-700 shadow-lg shadow-indigo-500/50' }} 
                      transition duration-200 transform hover:scale-[1.05]" 
                data-product-id="{{ $product->id }}"
                data-product-name="{{ $product->name }}"
                data-product-price="{{ $product->price }}"
                data-product-image="{{ asset('storage/' . $product->image) }}"
                {{ $product->stock == 0 ? 'disabled' : '' }}>
            @if ($product->stock > 0)
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="mr-1"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                Add to Cart
            @else
                Sold Out
            @endif
        </button>
    </div>
</div>
