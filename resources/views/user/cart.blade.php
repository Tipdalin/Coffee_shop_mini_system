@extends('layouts.user_app')

@section('content')

<div class="container mx-auto px-4 py-8">
<h1 class="text-4xl font-extrabold text-gray-900 mb-8 border-b pb-2">Your Shopping Cart</h1>

@if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
        <p>{{ session('success') }}</p>
    </div>
@endif

@if (session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
        <p>{{ session('error') }}</p>
    </div>
@endif

@if (count($cartItems) > 0)
    <div class="lg:flex lg:space-x-8">
        <!-- Cart Items List -->
        <div class="flex-1 space-y-4">
            @foreach ($cartItems as $item)
                <div class="bg-white p-6 shadow-md rounded-lg flex items-center justify-between transition duration-300 hover:shadow-lg">
                    <div class="flex items-center space-x-4">
                        <!-- Product Image/Placeholder -->
                        <div class="w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500 font-semibold">
                            Item
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">{{ $item->product->name }}</h2>
                            <p class="text-gray-600">Price: ${{ number_format($item->product->price, 2) }}</p>
                        </div>
                    </div>

                    <div class="text-right">
                        <p class="text-lg text-gray-700">Quantity: <span class="font-bold">{{ $item->quantity }}</span></p>
                        <p class="text-xl font-bold text-indigo-600 mt-1">Subtotal: ${{ number_format($item->subtotal, 2) }}</p>
                        
                        <!-- Placeholder for Update/Remove Buttons -->
                        <div class="mt-2 text-sm text-gray-400">
                            <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a> | 
                            <a href="#" class="text-red-500 hover:text-red-700">Remove</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Summary Card -->
        <div class="lg:w-1/3 mt-8 lg:mt-0 bg-white p-6 shadow-xl rounded-lg border border-indigo-100 sticky top-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-4 border-b pb-3">Order Summary</h2>
            
            <div class="flex justify-between text-gray-600 mb-2">
                <span>Items Total:</span>
                <span class="font-semibold">${{ number_format($cartTotal, 2) }}</span>
            </div>

            <div class="flex justify-between text-gray-600 mb-4">
                <span>Shipping Estimate:</span>
                <span class="font-semibold">$5.00</span>
            </div>

            <div class="flex justify-between text-2xl font-extrabold text-gray-900 border-t pt-4">
                <span>Grand Total:</span>
                <span>${{ number_format($cartTotal + 5.00, 2) }}</span>
            </div>

            <form method="POST" action="{{ route('order.place') }}" class="mt-6">
                @csrf
                <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition duration-300 shadow-md">
                    Proceed to Checkout
                </button>
            </form>
        </div>
    </div>
@else
    <div class="text-center bg-white p-10 rounded-lg shadow-md">
        <p class="text-2xl text-gray-600 mb-4">Your cart is empty.</p>
        <a href="{{ route('menu.index') }}" class="inline-block bg-indigo-500 text-white px-6 py-2 rounded-lg hover:bg-indigo-600 transition">
            Start Shopping
        </a>
    </div>
@endif


</div>
@endsection