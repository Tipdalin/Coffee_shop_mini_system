<div class="order-sidebar p-4 h-100">
    <h3 class="order-title mb-4">Order</h3>
    
    {{-- Order Item List --}}
    <div class="order-items-list mb-4">
        {{-- Example Order Item (Loop this for cart items) --}}
        @foreach (['Matcha Oat Milk (x2)', 'Cacao Milk', 'Iced Latte'] as $item)
        <div class="d-flex align-items-center justify-content-between order-item p-2 mb-2">
            <div class="d-flex align-items-center">
                {{-- Replace with a dynamic image source --}}
                                <span class="ms-3 item-name">{{ $item }}</span>
            </div>
            <span class="item-price">{{ $item == 'Matcha Oat Milk (x2)' ? '$5.98' : ($item == 'Cacao Milk' ? '$1.99' : '$1.59') }}</span>
        </div>
        @endforeach
    </div>
    
    {{-- Summary and Checkout --}}
    <div class="order-summary mt-5 pt-3">
        <div class="d-flex justify-content-between summary-line">
            <span>Sub Total :</span>
            <span class="fw-bold">$9.56</span>
        </div>
        <div class="d-flex justify-content-between summary-line">
            <span>Tax (10%) :</span>
            <span class="fw-bold">$0.956</span>
        </div>
        <hr>
        <div class="d-flex justify-content-between total-line">
            <span>Total :</span>
            <span class="total-price">$8.604</span>
        </div>
        
        <div class="text-center mt-4">
            <button class="btn btn-lg pay-now-btn w-100">Pay Now</button>
        </div>
    </div>
</div>