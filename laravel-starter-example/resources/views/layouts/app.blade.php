<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $appName }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
<nav class="bg-white p-4 border-b">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('projects.index') }}" class="font-bold text-lg">{{ $appName }} - {{ $appDescription }}</a>

        <div class="flex items-center"> {{-- Group the dropdown and other nav items --}}
            @if (isset($categories))
                <div class="relative inline-block text-left mr-4"> {{-- Added margin right --}}
                    <button type="button" class="inline-flex w-full justify-center rounded-md bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
                        Categories
                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            @foreach($categories as $category)
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1">{{$category}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            {{-- Add other navigation items here if needed --}}
        </div>
    </div>
</nav>

<div class="container mx-auto mt-8">
    <div class="flex">
        <div class="w-3/4 pr-4">
            @yield('content')
        </div>
        @if (isset($recentProjects))
            <div class="w-1/4">
                <div class="bg-white rounded-lg shadow p-4">
                    <h3 class="font-semibold mb-2">Recent Projects</h3>
                    <ul>
                        @if ($recentProjects->count())
                            @foreach ($recentProjects as $project)
                                <li class="mb-1"><a href="{{ route('projects.show', $project) }}" class="text-blue-500 hover:underline">{{ $project->name }}</a></li>
                            @endforeach
                        @else
                            <li>No recent projects.</li>
                        @endif
                    </ul>
                </div>
            </div>
        @endif
    </div>
</div>

<footer class="bg-gray-200 text-center py-4 mt-8">
    <p>&copy; {{ $currentYear }} {{ $appName }}. All rights reserved.</p>
</footer>
</body>
</html>
