<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Coffee - POS Interface</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    
    * {
    font-family: 'Inter', sans-serif;
    }
    
    .smooth-scroll {
    scroll-behavior: smooth;
    }
    
    .hover-lift {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .hover-lift:hover {
    transform: translateY(-4px); /* Slightly less lift for a tighter UI */
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    /* Custom scrollbar for checkout */
    .checkout-scroll::-webkit-scrollbar {
        width: 6px;
    }
    .checkout-scroll::-webkit-scrollbar-thumb {
        background-color: #cbd5e1; /* slate-300 */
        border-radius: 3px;
    }
    .checkout-scroll {
        scrollbar-width: thin;
        scrollbar-color: #cbd5e1 transparent;
    }

</style>
</head>
<body class="antialiased bg-slate-50 text-slate-900 smooth-scroll">

{{-- 
    To create the POS-like interface, I'm replacing the original fixed navigation and hero section 
    with a cleaner, full-screen layout that places the main content (products) next to the checkout. 
    The original script for the product array is kept but the surrounding HTML is changed.
--}}

<div class="flex h-screen overflow-hidden">
    
    <div class="flex-1 flex flex-col overflow-hidden">
        
        <header class="bg-white border-b border-slate-200 p-4 flex justify-between items-center sticky top-0 z-10">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-green-600 rounded-lg"></div> 
                <span class="text-xl font-semibold text-slate-900">Coffee POS</span>
            </div>
            <div class="flex items-center gap-4">
                <svg class="w-6 h-6 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                <svg class="w-6 h-6 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-2.81A2 2 0 0018.57 12H17V9.5a3 3 0 00-6 0V12h-.57A2 2 0 004 14.19L2.405 17h5M12 21a2 2 0 01-2-2h4a2 2 0 01-2 2z"></path></svg>
                <div class="flex items-center gap-2">
                    <span class="text-sm font-medium">Adam</span>
                    <div class="w-8 h-8 bg-slate-400 rounded-full"></div>
                </div>
            </div>
        </header>

        <div class="p-6 flex items-center gap-4 border-b border-slate-200 bg-white">
            <button class="flex items-center gap-1 text-green-600 font-medium text-sm hover:text-green-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                <span>ADD NEW ITEM</span>
            </button>
            <div class="flex-1 relative max-w-lg">
                <input type="text" placeholder="Search items here..." class="w-full pl-4 pr-12 py-2 border border-slate-300 rounded-lg focus:ring-green-500 focus:border-green-500 text-sm">
                <button class="absolute right-0 top-0 mt-2 mr-3 text-slate-500 hover:text-green-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto p-6">
            
            <div id="products-grid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-8">
                {{-- Products are duplicated and simplified to match the look of the image --}}
                @php
                    $products = [
                        ['name' => 'Costa Coffee', 'price' => 7.99, 'image' => 'https://images.unsplash.com/photo-1541167760496-1c4b8e8f237e?auto=format&fit=crop&w=200&q=80'],
                        ['name' => 'Mocha/Hot Cho', 'price' => 9.99, 'image' => 'https://images.unsplash.com/photo-1551021464-966567584149?auto=format&fit=crop&w=200&q=80'],
                        ['name' => 'Caramel Latte', 'price' => 5.54, 'image' => 'https://images.unsplash.com/photo-1610488583489-3224b7a70a84?auto=format&fit=crop&w=200&q=80'],
                        ['name' => 'Costa Coffee', 'price' => 7.99, 'image' => 'https://images.unsplash.com/photo-1541167760496-1c4b8e8f237e?auto=format&fit=crop&w=200&q=80'],
                        ['name' => 'Mocha/Hot Cho', 'price' => 9.99, 'image' => 'https://images.unsplash.com/photo-1551021464-966567584149?auto=format&fit=crop&w=200&q=80'],
                        ['name' => 'Costa Coffee', 'price' => 7.99, 'image' => 'https://images.unsplash.com/photo-1541167760496-1c4b8e8f237e?auto=format&fit=crop&w=200&q=80'],
                        ['name' => 'Mocha/Hot Cho', 'price' => 9.99, 'image' => 'https://images.unsplash.com/photo-1551021464-966567584149?auto=format&fit=crop&w=200&q=80'],
                        ['name' => 'Caramel Latte', 'price' => 5.54, 'image' => 'https://images.unsplash.com/photo-1610488583489-3224b7a70a84?auto=format&fit=crop&w=200&q=80'],
                        ['name' => 'Costa Coffee', 'price' => 7.99, 'image' => 'https://images.unsplash.com/photo-1541167760496-1c4b8e8f237e?auto=format&fit=crop&w=200&q=80'],
                        ['name' => 'Mocha/Hot Cho', 'price' => 9.99, 'image' => 'https://images.unsplash.com/photo-1551021464-966567584149?auto=format&fit=crop&w=200&q=80'],
                    ];
                @endphp

                @foreach ($products as $product)
                    <div class="bg-white rounded-xl overflow-hidden border border-slate-200 text-center shadow-sm cursor-pointer hover-lift">
                        <div class="h-32 flex items-center justify-center overflow-hidden">
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-full object-cover">
                        </div>
                        <div class="p-3">
                            <p class="text-sm font-medium truncate">{{ $product['name'] }}</p>
                            <span class="text-sm font-semibold text-green-600">${{ $product['price'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center text-slate-500">
                <p class="text-sm">Scroll down to see more categories...</p>
            </div>
            
        </div>
        
        <footer class="bg-white border-t border-slate-200 p-3 flex justify-center sticky bottom-0 z-10">
            <div class="flex gap-4">
                <button class="flex flex-col items-center justify-center w-24 h-16 rounded-lg bg-green-500 text-white shadow-lg">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1010 10A10.011 10.011 0 0012 2zm0 18a8 8 0 118-8A8 8 0 0112 20zM12 6a4 4 0 104 4 4.004 4.004 0 00-4-4zm0 6a2 2 0 11-2-2A2.002 2.002 0 0112 12z"></path></svg>
                    <span class="text-xs font-medium mt-1">Coffee</span>
                </button>
                <button class="flex flex-col items-center justify-center w-24 h-16 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1010 10A10.011 10.011 0 0012 2zm0 18a8 8 0 118-8A8 8 0 0112 20zM12 6a4 4 0 104 4 4.004 4.004 0 00-4-4zm0 6a2 2 0 11-2-2A2.002 2.002 0 0112 12z"></path></svg>
                    <span class="text-xs font-medium mt-1">Beverages</span>
                </button>
                <button class="flex flex-col items-center justify-center w-24 h-16 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1010 10A10.011 10.011 0 0012 2zm0 18a8 8 0 118-8A8 8 0 0112 20zM12 6a4 4 0 104 4 4.004 4.004 0 00-4-4zm0 6a2 2 0 11-2-2A2.002 2.002 0 0112 12z"></path></svg>
                    <span class="text-xs font-medium mt-1">BBQ</span>
                </button>
                <button class="flex flex-col items-center justify-center w-24 h-16 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1010 10A10.011 10.011 0 0012 2zm0 18a8 8 0 118-8A8 8 0 0112 20zM12 6a4 4 0 104 4 4.004 4.004 0 00-4-4zm0 6a2 2 0 11-2-2A2.002 2.002 0 0112 12z"></path></svg>
                    <span class="text-xs font-medium mt-1">Snacks</span>
                </button>
                <button class="flex flex-col items-center justify-center w-24 h-16 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1010 10A10.011 10.011 0 0012 2zm0 18a8 8 0 118-8A8 8 0 0112 20zM12 6a4 4 0 104 4 4.004 4.004 0 00-4-4zm0 6a2 2 0 11-2-2A2.002 2.002 0 0112 12z"></path></svg>
                    <span class="text-xs font-medium mt-1">Deserts</span>
                </button>
            </div>
        </footer>

    </div>

    <div class="w-96 bg-white border-l border-slate-200 flex flex-col h-full">
        
        <div class="p-5 border-b border-slate-200">
            <h2 class="text-xl font-bold">Checkout</h2>
        </div>
        
        <div class="flex-1 overflow-y-auto checkout-scroll p-5 space-y-4">
            
            @php
                $cart_items = [
                    ['name' => 'Risus Fringilla', 'qty' => 2, 'price' => 35.00],
                    ['name' => 'Commodo Fusce', 'qty' => 2, 'price' => 35.00],
                    ['name' => 'Lorem Pharetra', 'qty' => 2, 'price' => 35.00],
                    // Duplicating items for scroll effect and visual fidelity
                    ['name' => 'Item Alpha', 'qty' => 1, 'price' => 12.50],
                    ['name' => 'Item Beta', 'qty' => 3, 'price' => 8.00],
                    ['name' => 'Item Gamma', 'qty' => 1, 'price' => 50.00],
                    ['name' => 'Item Delta', 'qty' => 2, 'price' => 15.00],
                    ['name' => 'Item Epsilon', 'qty' => 1, 'price' => 20.00],
                    ['name' => 'Item Zeta', 'qty' => 4, 'price' => 6.50],
                ];
            @endphp

            <div class="flex text-sm text-slate-500 border-b pb-2">
                <span class="w-1/2">Name</span>
                <span class="w-1/4 text-center">QTY</span>
                <span class="w-1/4 text-right">Price</span>
            </div>

            @foreach ($cart_items as $item)
                <div class="flex items-center text-sm">
                    <div class="w-1/2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-slate-400 cursor-pointer hover:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        <span class="text-slate-700 font-medium truncate">{{ $item['name'] }}</span>
                    </div>
                    <div class="w-1/4 flex justify-center items-center gap-1">
                        <button class="w-5 h-5 flex items-center justify-center text-green-600 border border-green-600 rounded-full hover:bg-green-50 transition-colors">-</button>
                        <span class="font-medium text-slate-900">{{ $item['qty'] }}</span>
                        <button class="w-5 h-5 flex items-center justify-center text-green-600 border border-green-600 rounded-full hover:bg-green-50 transition-colors">+</button>
                    </div>
                    <span class="w-1/4 text-right font-medium text-slate-900">${{ number_format($item['price'], 2) }}</span>
                </div>
            @endforeach

        </div>
        
        <div class="p-5 border-t border-slate-200">
            
            <div class="space-y-2 text-sm mb-4">
                <div class="flex justify-between">
                    <span class="text-slate-600">Discount (%)</span>
                    <span class="text-slate-900 font-medium">20</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-slate-600">Sub Total</span>
                    <span class="text-slate-900 font-medium">$84.00</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-green-600 font-medium">Tax 1.5%</span>
                    <span class="text-slate-900 font-medium">$1.50</span>
                </div>
            </div>

            <div class="flex justify-between items-center py-3 border-t border-slate-200 mb-4">
                <span class="text-lg font-bold">Total</span>
                <span class="text-lg font-bold text-slate-900">$85.50</span>
            </div>

            <div class="flex gap-2 mb-4">
                <button class="flex-1 border border-red-500 text-red-500 py-3 rounded-lg font-medium hover:bg-red-50 transition-colors">
                    Cancel Order
                </button>
                <button class="flex-1 border border-slate-900 text-slate-900 py-3 rounded-lg font-medium hover:bg-slate-100 transition-colors">
                    Hold Order
                </button>
            </div>
            
            <button class="w-full bg-green-600 text-white py-3 rounded-lg font-bold text-lg hover:bg-green-700 transition-colors shadow-lg shadow-green-200/50">
                Pay ($85.50)
            </button>
        </div>
        
    </div>

</div>

</body>
</html>