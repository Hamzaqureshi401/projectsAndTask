@extends('layouts.app')

@section('content')
   <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->name }}</td>
                <td>
                    <a href="{{ route('project.tasks', ['projectId' => $project->id]) }}" class="btn btn-primary">View Tasks</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
