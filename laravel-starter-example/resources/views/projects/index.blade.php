@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Projects</h1>

    <ul class="list-disc pl-6 space-y-2"> {{-- Added list styling and spacing --}}
        @foreach ($projects as $project)
            <li>
                <a href="{{ route('projects.show', $project) }}" class="text-blue-500 hover:underline"> {{-- Styled link --}}
                    {{ $project->name }}
                </a>
                <span class="text-gray-600"> - {{ $project->description }}</span> {{-- Styled description --}}
            </li>
        @endforeach
    </ul>
@endsection
