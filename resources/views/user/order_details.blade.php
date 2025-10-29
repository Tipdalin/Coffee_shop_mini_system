@extends('layouts.user_app')

@section('content')

<div class="container mx-auto px-4 py-8">
<div class="max-w-4xl mx-auto bg-white shadow-xl rounded-lg p-8">
<div class="flex justify-between items-center border-b pb-4 mb-6">
<h1 class="text-3xl font-bold text-gray-900">Order #{{ $order->id }} Details</h1>
<span class="text-lg font-semibold text-gray-600">Placed on: {{ $order->created_at->format('M d, Y') }}</span>
</div>

    <!-- Status and Summary -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 border-b pb-6">
        <div class="p-4 bg-gray-50 rounded-lg">
            <p class="text-sm font-medium text-gray-500">Order Status</p>
            @php
                $color = [
                    'Pending' => 'yellow', 
                    'Processing' => 'blue', 
                    'Shipped' => 'indigo', 
                    'Delivered' => 'green',
                    'Cancelled' => 'red'
                ][$order->status] ?? 'gray';
            @endphp
            <span class="text-2xl font-extrabold text-{{ $color }}-600 block mt-1">{{ $order->status }}</span>
        </div>
        <div class="p-4 bg-gray-50 rounded-lg">
            <p class="text-sm font-medium text-gray-500">Total Charged</p>
            <p class="text-2xl font-extrabold text-gray-900 block mt-1">${{ number_format($order->total_price, 2) }}</p>
        </div>
        <div class="p-4 bg-gray-50 rounded-lg">
            <p class="text-sm font-medium text-gray-500">Shipping Address</p>
            <p class="text-base text-gray-700 mt-1">
                [Placeholder for User Address]
            </p>
        </div>
    </div>

    <!-- Order Items -->
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Items Ordered</h2>
    <div class="space-y-4">
        @foreach ($order->items as $item)
            <div class="flex justify-between items-center p-4 border border-gray-100 rounded-lg hover:bg-gray-50 transition duration-150">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gray-100 rounded-md"></div>
                    <div>
                        <p class="text-lg font-semibold text-gray-900">{{ $item->product->name }}</p>
                        <p class="text-sm text-gray-500">Unit Price: ${{ number_format($item->product->price, 2) }}</p>
                    </div>
                </div>
                
                <div class="text-right">
                    <p class="text-base text-gray-700">Qty: {{ $item->quantity }}</p>
                    <p class="text-xl font-bold text-indigo-600">${{ number_format($item->price, 2) }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Back Button -->
    <div class="mt-8 text-center">
        <a href="{{ route('order.history') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-medium">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Order History
        </a>
    </div>
</div>


</div>
@endsection