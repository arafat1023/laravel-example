@extends('layouts.app')

@section('content')
    <form action="/users" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Add User</button>
    </form>
@endsection
