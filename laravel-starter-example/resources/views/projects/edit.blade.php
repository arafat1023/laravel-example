@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Edit Project</h1>

        <form action="{{ route('projects.update', $project) }}" method="POST" class="flex flex-col space-y-4">
            @csrf
            @method('PUT') {{-- Important for updating --}}

            <div class="flex flex-col">
                <label for="name" class="text-sm font-medium mb-2">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $project->name) }}" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="description" class="text-sm font-medium mb-2">Description:</label>
                <textarea id="description" name="description" class="rounded-md border border-gray-300 p-2 h-40 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $project->description) }}</textarea>
                @error('description')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Update</button>
        </form>

        <a href="{{ route('projects.index') }}" class="text-blue-500 hover:underline mt-4">Back to Projects</a>
    </div>
@endsection
