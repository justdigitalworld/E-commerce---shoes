@extends('layouts.admin')

@section('header', 'Categories')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-lg font-medium text-gray-900">All Categories</h2>
        <a href="{{ route('admin.categories.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add Category</a>
    </div>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">Name</th>
                    <th scope="col" class="py-3 px-6">Slug</th>
                    <th scope="col" class="py-3 px-6">Image</th>
                    <th scope="col" class="py-3 px-6">Priority</th>
                    <th scope="col" class="py-3 px-6">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">{{ $category->name }}</td>
                        <td class="py-4 px-6">{{ $category->slug }}</td>
                        <td class="py-4 px-6">
                            @if($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-12 h-12 object-cover rounded">
                            @else
                                <span class="text-gray-400">No Image</span>
                            @endif
                        </td>
                        <td class="py-4 px-6">{{ $category->priority }}</td>
                        <td class="py-4 px-6 flex space-x-2">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
