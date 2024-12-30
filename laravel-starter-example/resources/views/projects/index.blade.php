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

                @if ($project->tasks->isNotEmpty())
                    <ul class="ml-4 pl-4 list-disc text-sm text-gray-600">  {{-- Sub-list for tasks --}}
                        @foreach ($project->tasks as $task)
                            <li>{{ $task->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <span class="text-gray-600 ml-4">No tasks assigned.</span>  {{-- Handle no tasks --}}
                @endif
            </li>
        @endforeach
    </ul>
@endsection
