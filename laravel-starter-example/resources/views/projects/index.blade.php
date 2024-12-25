<!DOCTYPE html>
<html>
<head>
    <title>Projects</title>
</head>
<body>
<h1>Projects</h1>

<ul>
    @foreach ($projects as $project)
        <li>{{ $project->name }} - {{ $project->description }}</li>
    @endforeach
</ul>
</body>
</html>
