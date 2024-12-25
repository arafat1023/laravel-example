<div class="project-details">
    <h3>Project Details</h3>
    <p><strong>Name:</strong> {{ $project->name }}</p>
    <p><strong>Description:</strong> {{ $project->description }}</p>
    @if ($project->created_at)
        <p><strong>Created At:</strong> {{ $project->created_at->format('Y-m-d H:i:s') }}</p>
    @endif
    @if ($project->updated_at)
        <p><strong>Updated At:</strong> {{ $project->updated_at->format('Y-m-d H:i:s') }}</p>
    @endif
</div>
