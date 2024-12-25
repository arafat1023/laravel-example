@extends('layouts.app')

@section('content')
    <h1>{{ $project->name }}</h1>

    <div class="main-content"> {{-- Added a container div --}}
        @include('partials.project-details')

        <a href="{{ route('projects.index') }}">Back to Projects</a>
    </div>
@endsection

