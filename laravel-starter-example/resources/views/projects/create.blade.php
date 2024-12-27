@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Create Project</h1>

        <form action="{{ route('projects.store') }}" method="POST" class="flex flex-col space-y-4">
            @csrf
            <div class="flex flex-col">
                <label for="name" class="text-sm font-medium mb-2">Name:</label>
                <input type="text" id="name" name="name" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex flex-col">
                <label for="description" class="text-sm font-medium mb-2">Description:</label>
                <textarea id="description" name="description" class="rounded-md border border-gray-300 p-2 h-40 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Create</button>
        </form>

        <a href="{{ route('projects.index') }}" class="text-blue-500 hover:underline mt-4">Back to Projects</a>
    </div>
@endsection
