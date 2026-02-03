@extends('layouts.shop')

@section('content')
    <!-- Hero Section -->
    <!-- Hero Section -->
    <div class="relative bg-gray-900 overflow-hidden h-screen max-h-[800px]">
        <div class="max-w-7xl mx-auto h-full">
            <div class="relative z-10 pb-8 bg-transparent h-full flex items-center lg:w-full lg:pb-28 xl:pb-32">
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28 w-full">
                    <div class="sm:text-center lg:text-left lg:w-1/2 relative z-20">
                        <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-7xl animate-fade-in-up">
                            <span class="block xl:inline">Premium Footwear</span>
                            <span class="block text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400 xl:inline">For Everyone</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-300 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0 animate-fade-in-up animation-delay-200">
                            Discover the latest collection of trendy and comfortable shoes. Elevate your style with our exclusive range designed for comfort and durability.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start animate-fade-in-up animation-delay-400">
                            <div class="rounded-md shadow">
                                <a href="{{ route('shop.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10 transition-all transform hover:scale-105 shadow-lg hover:shadow-blue-500/50">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        
        <!-- Hero Slider Background -->
        <div class="absolute inset-0 w-full h-full lg:w-1/2 lg:left-1/2 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-transparent to-transparent z-10"></div>
            <div id="hero-slider" class="relative w-full h-full">
                <!-- Slide 1 -->
                <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100 slide-item transform scale-105 animate-slow-zoom">
                    <img class="w-full h-full object-cover" src="{{ asset('images/Men.png') }}" alt="Men's Collection">
                </div>
                <!-- Slide 2 -->
                <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 slide-item transform scale-105 animate-slow-zoom">
                    <img class="w-full h-full object-cover" src="{{ asset('images/Women.png') }}" alt="Women's Collection">
                </div>
                <!-- Slide 3 -->
                <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 slide-item transform scale-105 animate-slow-zoom">
                    <img class="w-full h-full object-cover" src="{{ asset('images/Kids.png') }}" alt="Kids' Collection">
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const slides = document.querySelectorAll('#hero-slider .slide-item');
                let currentSlide = 0;
                
                if(slides.length > 0) {
                    setInterval(() => {
                        slides[currentSlide].classList.remove('opacity-100');
                        slides[currentSlide].classList.add('opacity-0');
                        currentSlide = (currentSlide + 1) % slides.length;
                        slides[currentSlide].classList.remove('opacity-0');
                        slides[currentSlide].classList.add('opacity-100');
                    }, 4000); 
                }
            });
        </script>
    </div>

    <!-- Categories Section -->
    <div class="bg-white py-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-extrabold text-gray-900 mb-12 text-center">Shop by Category</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($categories as $category)
                    <div class="relative rounded-2xl overflow-hidden group shadow-2xl hover:shadow-3xl transition-all duration-500 h-96">
                        @php
                            $fallbackImages = [
                                'Men' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&q=80&w=800',
                                'Women' => 'https://images.unsplash.com/photo-1543163521-1bf539c55dd2?auto=format&fit=crop&q=80&w=800',
                                'Kids' => 'https://images.unsplash.com/photo-1514989940723-e8e51635b782?auto=format&fit=crop&q=80&w=800'
                            ];
                            $image = $category->image ? asset('storage/' . $category->image) : ($fallbackImages[$category->name] ?? 'https://via.placeholder.com/400x300');
                        @endphp
                        <img src="{{ $image }}" alt="{{ $category->name }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-8">
                            <h3 class="text-3xl font-bold text-white mb-2 transform translate-y-4 group-hover:translate-y-0 transition duration-300">{{ $category->name }}</h3>
                             <span class="text-blue-300 opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition duration-500 delay-100 font-medium">Explore Collection &rarr;</span>
                        </div>
                        <a href="{{ route('shop.index', ['category' => $category->slug]) }}" class="absolute inset-0 z-20"></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Featured Products Section -->
    <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-extrabold text-gray-900">Featured Products</h2>
                <p class="mt-4 text-gray-500">Handpicked selections to upgrade your wardrobe.</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($featuredProducts as $product)
                    <div class="group relative bg-white border border-gray-100 rounded-2xl flex flex-col overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="aspect-w-1 aspect-h-1 bg-gray-100 group-hover:opacity-90 relative overflow-hidden h-64">
                             @php
                                $productImage = $product->images->first() ? asset('storage/' . $product->images->first()->image_path) : 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&q=80&w=600';
                             @endphp
                             <img src="{{ $productImage }}" alt="{{ $product->name }}" class="w-full h-full object-center object-cover transition duration-500 group-hover:scale-105">
                             @if($loop->iteration % 2 == 0)
                                <span class="absolute top-4 right-4 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">HOT</span>
                             @endif
                        </div>
                        <div class="flex-1 p-6 flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">
                                    <a href="{{ route('shop.show', $product->id) }}">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <p class="text-sm text-gray-500 mb-2">{{ $product->category->name }}</p>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <p class="text-xl font-extrabold text-blue-600">${{ number_format($product->price, 2) }}</p>
                                <div class="bg-blue-50 p-2 rounded-full text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-16 text-center">
                <a href="{{ route('shop.index') }}" class="btn-primary inline-flex items-center">
                    View All Products 
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
    </div>
@endsection
