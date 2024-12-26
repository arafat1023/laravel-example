@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-4">{{ $project->name }}</h1>

    <div class="bg-white rounded-lg shadow p-6"> {{-- Styled container --}}
        @include('partials.project-details')

        <a href="{{ route('projects.index') }}" class="inline-block mt-4 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to Projects</a>
    </div>
@endsection
