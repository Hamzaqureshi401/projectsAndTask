@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>All Tasks</h2>

        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task Name</th>
                    <th>Priority</th>
                    <th>Project Name</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="sort">
                @foreach ($tasks as $task)
                    <tr style="cursor: pointer;" class="sortable-row" id="{{ $loop->index }}" data-task-id="{{ $task->id }}">
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->task_name }}</td>
                        <td>{{ $task->priority }}</td>
                        <td>{{ $task->project->name }}</td>
                        <td>{{ $task->created_at }}</td>
                        <td>
                            <a href="{{ route('editTask', $task->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('deleteTask', $task->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>



       $(document).ready(function() {
    $('#myTable tbody').sortable({
        cursor: 'move',
        axis: 'y',
        update: function(e, ui) {
            var changedRowIds = [];
            $('#myTable tbody tr').each(function(index) {
                var taskId = $(this).data('task-id');
                changedRowIds.push(taskId);
            });

            console.log('Changed row IDs:', changedRowIds);
            
            $.ajax({
                type: 'POST',
                url: '/reOrderTask',
                data: { changedRowIds: changedRowIds,
                _token: '{{ csrf_token() }}',
                 }, 
                success: function(response) {
                    console.log("Priorities updated successfully.");
                     if (response) {
                            alert(response.message);
                        }
                },
                
            });
        }
    });
});


    </script>
@endsection
