<ul>
    @if (count($users) > 2)
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    @else
        <p>No users found.</p>
    @endif
</ul>
