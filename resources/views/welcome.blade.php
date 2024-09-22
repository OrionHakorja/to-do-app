<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Table</title>
    <!-- Bootstrap CSS for styling (optional, can be replaced with your own CSS) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">
        <a href="{{ route('welcome') }}" style="text-decoration: none; color: inherit;">Tasks List</a>
    </h2>
    <form method="GET" action="{{ route('tasks.search') }}" class="mb-4">
        @csrf
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search tasks..." value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Priority</th>
            <th>Due date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <!-- Loop through the data passed from the controller -->
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->priority }}</td>
                <td>{{$task->expires_at }}</td>
                <td>
                                        <!-- Actions like Edit or Delete -->
                                        <a href="{{route('tasks.edit', $task->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{route('tasks.delete', $task->id)}}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    <a href="{{route('tasks.create')}}" class="btn btn-primary btn-sm">Create new</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Pagination Links (optional if you have pagination) -->
    {{--    {{ $users->links() }}--}}
</div>

<!-- Bootstrap JS (optional if you need it for components) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
