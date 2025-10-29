@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-8">
<h1 class="text-4xl font-extrabold text-gray-900 mb-8 border-b pb-2">Order Management Dashboard</h1>

<div class="bg-white shadow-xl rounded-lg overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($orders as $order)
                <tr class="hover:bg-gray-50 transition duration-150">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#{{ $order->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $order->user->name ?? 'Guest User' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order->created_at->format('M d, Y H:i') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-700">${{ number_format($order->total_price, 2) }}</td>
                    
                    <td class="px-6 py-4 whitespace-nowrap">
                        @php
                            $color = [
                                'Pending' => 'yellow', 
                                'Processing' => 'blue', 
                                'Shipped' => 'indigo', 
                                'Delivered' => 'green',
                                'Cancelled' => 'red'
                            ][$order->status] ?? 'gray';
                        @endphp
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $color }}-100 text-{{ $color }}-800">
                            {{ $order->status }}
                        </span>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="flex space-x-2 items-center">
                            @csrf
                            @method('PUT')
                            
                            <select name="status" class="form-select border-gray-300 rounded-md shadow-sm text-sm" required>
                                <option value="Pending" {{ $order->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Processing" {{ $order->status === 'Processing' ? 'selected' : '' }}>Processing</option>
                                <option value="Shipped" {{ $order->status === 'Shipped' ? 'selected' : '' }}>Shipped</option>
                                <option value="Delivered" {{ $order->status === 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                <option value="Cancelled" {{ $order->status === 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            
                            <button type="submit" class="bg-indigo-500 text-white p-2 rounded-md hover:bg-indigo-600 transition duration-150 text-xs font-semibold">
                                Update
                            </button>
                            
                            {{-- Link to view order details --}}
                            <a href="#" class="text-gray-500 hover:text-indigo-600 p-2" title="View Details">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </a>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-lg text-gray-500">No orders found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $orders->links() }}
</div>


</div>
@endsection