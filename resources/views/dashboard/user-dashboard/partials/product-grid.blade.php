<div class="product-grid grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 p-4 md:p-8 bg-gray-50 rounded-lg" id="productGrid">
    @forelse($products as $product)
        @include('dashboard.user-dashboard.partials.product-card', ['product' => $product])
    @empty
        <p class="col-span-full text-center text-lg text-gray-500 py-10">No products are currently available.</p>
    @endforelse
</div>
