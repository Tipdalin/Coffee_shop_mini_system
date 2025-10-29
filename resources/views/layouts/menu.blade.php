@extends('layouts.app') {{-- Assume a main layout file exists --}}

@section('content')
<div class="container-fluid py-4 GenZ-background">
    {{-- Header/Navigation --}}
    @include('partials.header')

    <div class="row mt-4">
        {{-- Left/Center: Menu Categories & Items --}}
        <div class="col-lg-8 col-md-7">
            <div class="d-flex justify-content-around mb-4">
                {{-- Category Tabs --}}
                <button class="btn category-tab active" data-category="coffee">☕ Coffee</button>
                <button class="btn category-tab" data-category="non-coffee">🍵 Non Coffee</button>
                <button class="btn category-tab" data-category="snack">🍩 Snack</button>
            </div>

            {{-- Menu Items Grid --}}
            <div class="row menu-items-container">
                {{-- Example Item (Use @foreach for real data) --}}
                <div class="col-md-4 mb-4 product-card" data-category="coffee" data-name="Cacao Milk" data-price="1.99">
                    <div class="item-inner-card p-2 rounded-3 shadow-sm hover-grow">
                        <img src="..." class="img-fluid rounded-2 item-image" alt="Cacao Milk">
                        <h5 class="item-name mt-2">Cacao Milk</h5>
                        <p class="item-price text-pink">$1.99</p>
                        <button class="btn btn-sm add-to-cart-btn">❤️</button>
                    </div>
                </div>

                {{-- ... other items ... --}}

            </div>
        </div>

        {{-- Right: Order Summary (The 'Cart') --}}
        <div class="col-lg-4 col-md-5">
            <div class="order-panel p-3 rounded-4 shadow-lg sticky-top">
                <h2 class="order-title mb-3">🛒 Order</h2>

                {{-- Order Items List --}}
                <div id="order-list" class="mb-4">
                    {{-- Items will be added here by JS --}}
                </div>

                <hr>

                {{-- Totals --}}
                <div class="totals-section">
                    <div class="d-flex justify-content-between">
                        <span>Sub Total :</span> <span id="sub-total">$0.00</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Tax (10%) :</span> <span id="tax-amount">$0.00</span>
                    </div>
                    <div class="d-flex justify-content-between fw-bold fs-5 mt-2">
                        <span>Total :</span> <span id="final-total" class="text-pink">$0.00</span>
                    </div>
                </div>

                <button class="btn btn-pay mt-4 w-100 p-2 rounded-pill">Pay Now ✨</button>
            </div>
        </div>
    </div>
</div>
@endsection