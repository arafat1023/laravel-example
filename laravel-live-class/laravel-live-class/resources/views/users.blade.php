@extends('layouts.app')

@section('title', 'User List')

@section('content')
    <ul>
        @if (count($users) > 0)
            @foreach ($users as $user)
                <li>
                    <a href="/users/{{ $user->id }}">{{ $user->name }}</a>
                </li>
            @endforeach
        @else
            <p>No users found.</p>
        @endif
    </ul>
@endsection
