@extends('layouts.app')

@section('content')
    <h1>About Us</h1>

    @if (isset($recentProjects))
        <p>Recent Projects ARE available here (THIS SHOULD NOT SHOW).</p>
    @else
        <p>Recent Projects are NOT available here (THIS SHOULD SHOW).</p>
    @endif

    @if (isset($categories))
        <p>Categories ARE available here (THIS SHOULD SHOW).</p>
    @else
        <p>Categories are NOT available here (THIS SHOULD NOT SHOW).</p>
    @endif
@endsection
