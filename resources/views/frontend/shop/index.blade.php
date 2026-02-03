@extends('layouts.shop')

@section('content')
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Sidebar Filters -->
                <div class="w-full md:w-1/4 space-y-8">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Categories</h3>
                        <ul class="space-y-2">
                            <li><a href="{{ route('shop.index') }}" class="text-gray-600 hover:text-blue-600 {{ !request('category') ? 'font-bold text-blue-600' : '' }}">All Categories</a></li>
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('shop.index', ['category' => $category->slug]) }}" 
                                       class="text-gray-600 hover:text-blue-600 {{ request('category') == $category->slug ? 'font-bold text-blue-600' : '' }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Brands</h3>
                        <ul class="space-y-2">
                             <li><a href="{{ route('shop.index') }}" class="text-gray-600 hover:text-blue-600 {{ !request('brand') ? 'font-bold text-blue-600' : '' }}">All Brands</a></li>
                            @foreach($brands as $brand)
                                <li>
                                    <a href="{{ route('shop.index', array_merge(request()->all(), ['brand' => $brand->slug])) }}" 
                                       class="text-gray-600 hover:text-blue-600 {{ request('brand') == $brand->slug ? 'font-bold text-blue-600' : '' }}">
                                        {{ $brand->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="w-full md:w-3/4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($products as $product)
                            <div class="group relative bg-white border border-gray-200 rounded-lg flex flex-col overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                <div class="aspect-w-3 aspect-h-4 bg-gray-200 group-hover:opacity-75 sm:aspect-none sm:h-64">
                                     <img src="{{ $product->images->first() ? asset('storage/' . $product->images->first()->image_path) : 'https://via.placeholder.com/300' }}" alt="{{ $product->name }}" class="w-full h-64 object-cover object-center">
                                </div>
                                <div class="flex-1 p-4 flex flex-col justify-between">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">
                                            <a href="{{ route('shop.show', $product->id) }}">
                                                <span aria-hidden="true" class="absolute inset-0"></span>
                                                {{ $product->name }}
                                            </a>
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500">{{ $product->category->name }}</p>
                                    </div>
                                    <div class="mt-2 flex items-center justify-between">
                                        <p class="text-lg font-bold text-gray-900">${{ number_format($product->price, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-12 text-gray-500">
                                No products found.
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-8">
                        {{ $products->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
