@extends('layouts.shop')

@section('content')
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
                <!-- Image Gallery -->
                <div class="flex flex-col-reverse">
                    <div class="mt-6 w-full max-w-2xl mx-auto lg:max-w-none">
                        <div class="grid grid-cols-4 gap-6">
                            @foreach($product->images as $image)
                                <div class="relative h-24 bg-white rounded-md flex items-center justify-center text-sm font-medium uppercase text-gray-900 cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring focus:ring-offset-4 focus:ring-opacity-50" onclick="document.getElementById('main-image').src='{{ asset('storage/' . $image->image_path) }}'">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="" class="absolute inset-0 w-full h-full object-center object-cover rounded-md">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="w-full aspect-w-1 aspect-h-1">
                        <img id="main-image" src="{{ $product->images->first() ? asset('storage/' . $product->images->first()->image_path) : 'https://via.placeholder.com/600' }}" alt="{{ $product->name }}" class="w-full h-full object-center object-cover sm:rounded-lg">
                    </div>
                </div>

                <!-- Product Info -->
                <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
                    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">{{ $product->name }}</h1>
                    
                    <div class="mt-3">
                        <p class="text-3xl text-gray-900">${{ number_format($product->price, 2) }}</p>
                    </div>

                    <div class="mt-6">
                        <h3 class="sr-only">Description</h3>
                        <div class="text-base text-gray-700 space-y-6">
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>

                    <form class="mt-6" action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <!-- Colors -->
                        @if($product->colors && count($product->colors) > 0)
                            <div class="mt-6">
                                <h3 class="text-sm text-gray-900 font-medium">Color</h3>
                                <div class="mt-2 flex items-center space-x-3">
                                    @foreach($product->colors as $color)
                                        <label class="relative -m-0.5 p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-400">
                                            <input type="radio" name="color" value="{{ $color }}" class="sr-only" required>
                                            <span aria-hidden="true" class="h-8 w-8 border border-black border-opacity-10 rounded-full" style="background-color: {{ strtolower($color) === 'multi' ? 'linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet)' : strtolower($color) }}"></span>
                                            <span class="ml-2 text-sm text-gray-600">{{ $color }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Sizes -->
                        @if($product->sizes && count($product->sizes) > 0)
                            <div class="mt-8">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-sm text-gray-900 font-medium">Size</h3>
                                </div>
                                <div class="mt-2 grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                                    @foreach($product->sizes as $size)
                                        <label class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 bg-white shadow-sm text-gray-900 cursor-pointer">
                                            <input type="radio" name="size" value="{{ $size }}" class="sr-only" required>
                                            <span id="size-choice-{{ $loop->index }}-label">{{ $size }}</span>
                                            <span class="absolute -inset-px rounded-md pointer-events-none border-2 border-transparent group-focus:border-blue-500" aria-hidden="true"></span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="mt-10 flex sm:flex-col1">
                            <button type="submit" class="w-full bg-blue-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Add to Cart</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Related Products -->
             @if($relatedProducts->count() > 0)
                <div class="mt-16">
                    <h2 class="text-2xl font-extrabold text-gray-900 mb-6">You may also like</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($relatedProducts as $related)
                            <div class="group relative bg-white border border-gray-200 rounded-lg flex flex-col overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                <div class="aspect-w-3 aspect-h-4 bg-gray-200 group-hover:opacity-75 sm:aspect-none sm:h-64">
                                    <img src="{{ $related->images->first() ? asset('storage/' . $related->images->first()->image_path) : 'https://via.placeholder.com/300' }}" alt="{{ $related->name }}" class="w-full h-full object-center object-cover sm:w-full sm:h-full">
                                </div>
                                <div class="flex-1 p-4 flex flex-col justify-between">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">
                                            <a href="{{ route('shop.show', $related->id) }}">
                                                <span aria-hidden="true" class="absolute inset-0"></span>
                                                {{ $related->name }}
                                            </a>
                                        </h3>
                                    </div>
                                    <p class="text-sm font-medium text-gray-900">${{ number_format($related->price, 2) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
