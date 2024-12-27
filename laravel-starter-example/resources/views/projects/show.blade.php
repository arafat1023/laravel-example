@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-4">{{ $project->name }}</h1>

    <div class="bg-white rounded-lg shadow p-6">
        @include('partials.project-details')

        <div class="mt-4 flex space-x-4">
            <a href="{{ route('projects.edit', $project) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Project</a>

            <form action="{{ route('projects.destroy', $project) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" onclick="return confirm('Are you sure you want to delete this project?')">Delete Project</button>
            </form>
        </div>

        <a href="{{ route('projects.index') }}" class="inline-block mt-4 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to Projects</a>
    </div>
@endsection
