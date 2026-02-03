@extends('layouts.admin')

@section('header', 'Add Product')

@section('content')
    <div class="max-w-4xl mx-auto">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Basic Info -->
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>

                    <div>
                        <label for="slug" class="block mb-2 text-sm font-medium text-gray-900">Slug</label>
                        <input type="text" id="slug" name="slug" value="{{ old('slug') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>

                    <div>
                        <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                        <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="brand_id" class="block mb-2 text-sm font-medium text-gray-900">Brand</label>
                        <select id="brand_id" name="brand_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            <option value="">Select Brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Pricing & Stock -->
                <div class="space-y-4">
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price ($)</label>
                        <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>

                    <div>
                        <label for="discount_price" class="block mb-2 text-sm font-medium text-gray-900">Discount Price ($)</label>
                        <input type="number" step="0.01" id="discount_price" name="discount_price" value="{{ old('discount_price') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>

                    <div>
                        <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">Stock Quantity</label>
                        <input type="number" id="stock" name="stock" value="{{ old('stock') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>

                    <div>
                        <label for="sku" class="block mb-2 text-sm font-medium text-gray-900">SKU</label>
                        <input type="text" id="sku" name="sku" value="{{ old('sku') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>

                    <div>
                        <label for="priority" class="block mb-2 text-sm font-medium text-gray-900">Priority (Higher values show first)</label>
                        <input type="number" id="priority" name="priority" value="{{ old('priority', 0) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                <textarea id="description" name="description" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>{{ old('description') }}</textarea>
            </div>

            <!-- Variants -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Sizes</label>
                    <div class="flex flex-wrap gap-4">
                        @foreach(['6', '7', '8', '9', '10', '11', '12'] as $size)
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="sizes[]" value="{{ $size }}" class="form-checkbox h-5 w-5 text-blue-600">
                                <span class="ml-2 text-gray-700">{{ $size }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Colors</label>
                    <div class="flex flex-wrap gap-4">
                        @foreach(['Black', 'White', 'Red', 'Blue', 'Green', 'Yellow', 'Multi'] as $color)
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="colors[]" value="{{ $color }}" class="form-checkbox h-5 w-5 text-blue-600">
                                <span class="ml-2 text-gray-700">{{ $color }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <label for="images" class="block mb-2 text-sm font-medium text-gray-900">Product Images</label>
                <input type="file" id="images" name="images[]" multiple class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
            </div>

            <div class="mt-8">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Save Product</button>
            </div>

             @if ($errors->any())
                <div class="mt-4 text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
@endsection
