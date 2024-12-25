@extends('layouts.app')

@section('content')
    <h1>Projects</h1>

    <ul>
        @foreach ($projects as $project)
            <li><a href="/projects/{{ $project->id }}">{{ $project->name }}</a> - {{ $project->description }}</li>
        @endforeach
    </ul>
@endsection
