@extends('layouts.app')

@section('content')

<div class="container mx-auto p-4">
<div class="max-w-xl mx-auto bg-white shadow-lg rounded-xl p-8">
<h1 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">Create New Category</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        {{-- Name Field --}}
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                   class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('name') border-red-500 @enderror"
                   placeholder="e.g., Electronics">
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Description Field --}}
        <div class="mb-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description (Optional)</label>
            <textarea name="description" id="description" rows="3"
                      class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('description') border-red-500 @enderror"
                      placeholder="A brief description of this category...">{{ old('description') }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Actions --}}
        <div class="flex justify-between items-center">
            <a href="{{ route('categories.index') }}" class="text-gray-600 hover:text-gray-800 text-sm font-medium">
                &larr; Back to List
            </a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-200">
                Save Category
            </button>
        </div>
    </form>
</div>


</div>
@endsection