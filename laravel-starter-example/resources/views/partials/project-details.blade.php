<div class="mb-4"> {{-- Added margin bottom --}}
    <h3 class="text-xl font-semibold mb-2">Project Details</h3>
    <p><strong class="font-medium">Name:</strong> {{ $project->name }}</p>
    <p><strong class="font-medium">Description:</strong> {{ $project->description }}</p>
    @if ($project->created_at)
        <p><strong class="font-medium">Created At:</strong> {{ $project->created_at->format('Y-m-d H:i:s') }}</p>
    @endif
    @if ($project->updated_at)
        <p><strong class="font-medium">Updated At:</strong> {{ $project->updated_at->format('Y-m-d H:i:s') }}</p>
    @endif
</div>
