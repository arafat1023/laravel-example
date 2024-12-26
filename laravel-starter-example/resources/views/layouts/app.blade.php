<!DOCTYPE html>
<html>
<head>
    <title>{{ $appName }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<nav>
    <a href="{{ route('projects.index') }}">{{ $appName }} - {{ $appDescription }}</a>
</nav>

<div class="container">
    @yield('content')
</div>

<footer>
    <p>&copy; {{ $currentYear }} {{ $appName }}. All rights reserved.</p>
</footer>
</body>
</html>

