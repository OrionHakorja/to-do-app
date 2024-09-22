<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Creation Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-top: 10px;
            color: #555;
        }
        input[type="text"],
        textarea,
        select,
        input[type="datetime-local"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        textarea {
            resize: vertical;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 20px;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Create a New Task</h2>
    <form action="{{route('tasks.update', $task->id)}}" method="POST">
        @csrf
        @method('PUT')
        <!-- Task Name -->
        <label for="name">Task Name:</label>
        <input type="text" id="name" name="name" required value="{{$task->name}}">

        <!-- Task Description -->
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required>{{$task->description}}</textarea>

        <!-- Task Priority -->
        <label for="priority">Priority:</label>
        <select id="priority" name="priority" required>
            <option value="high">High</option>
            <option value="medium">Medium</option>
            <option value="low">Low</option>
        </select>

        <!-- Task Expiration Date/Time -->
        <label for="expires_at">Expires At:</label>
        <input type="datetime-local" id="expires_at" name="expires_at" required value="{{$task->expires_at}}">

        <!-- Submit Button -->
        <input type="submit" value="Edit Task">
    </form>
</div>

</body>
</html>
