@extends('layouts.admin')

@section('header', 'Orders')

@section('content')
    <div class="mb-6">
        <h2 class="text-lg font-medium text-gray-900">All Orders</h2>
    </div>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">Order ID</th>
                    <th scope="col" class="py-3 px-6">Customer</th>
                    <th scope="col" class="py-3 px-6">Total</th>
                    <th scope="col" class="py-3 px-6">Status</th>
                    <th scope="col" class="py-3 px-6">Date</th>
                    <th scope="col" class="py-3 px-6">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">#{{ $order->id }}</td>
                        <td class="py-4 px-6">{{ $order->user ? $order->user->name : 'Guest' }}</td>
                        <td class="py-4 px-6">${{ number_format($order->total_amount, 2) }}</td>
                        <td class="py-4 px-6">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                {{ $order->status === 'delivered' ? 'bg-green-100 text-green-800' : 
                                   ($order->status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="py-4 px-6">{{ $order->created_at->format('M d, Y') }}</td>
                        <td class="py-4 px-6">
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="font-medium text-blue-600 hover:underline">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
