@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add Project</h2>
        <form action="/projects" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Project Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
