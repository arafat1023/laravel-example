<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'My Laravel App')</title>
</head>
<body>
<header>
    <h1>Header Content</h1>
    <nav>
        <a href="/">Home</a>
        <a href="/users">User List</a>
        <a href="/add-user">Add User</a>
    </nav>
</header>
<main>
    @yield('content')
</main>
<footer>
    Footer Content
</footer>
</body>
</html>
