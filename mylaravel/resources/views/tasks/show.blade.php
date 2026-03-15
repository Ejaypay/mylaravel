<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Task</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; background: #f0f4f8;
               display: flex; justify-content: center; padding: 3rem 1rem; }
        .card { background: white; padding: 2rem; border-radius: 12px;
                box-shadow: 0 4px 16px rgba(0,0,0,.1); width: 100%; max-width: 500px; }
        h1 { color: #e3342f; margin-bottom: 1rem; }
        p  { margin-bottom: .8rem; color: #444; line-height: 1.6; }
        .badge { padding: .3rem .8rem; border-radius: 20px; font-size: .9rem; }
        .done { background: #d4edda; color: #155724; }
        .pending { background: #fff3cd; color: #856404; }
        .btn { padding: .6rem 1.2rem; border: none; border-radius: 6px;
               cursor: pointer; font-size: 1rem; text-decoration: none; display: inline-block; }
        .btn-warning  { background: #f6c23e; color: #333; }
        .btn-secondary { background: #ccc; color: #333; margin-left: .5rem; }
    </style>
</head>
<body>
<div class="card">
    <h1>🔍 {{ $task->title }}</h1>

    <p><strong>Description:</strong><br>
        {{ $task->description ?? 'No description provided.' }}</p>

    <p><strong>Status:</strong>
        <span class="badge {{ $task->is_completed ? 'done' : 'pending' }}">
            {{ $task->is_completed ? '✅ Completed' : '⏳ Pending' }}
        </span>
    </p>

    <p><strong>Created:</strong> {{ $task->created_at->format('F d, Y h:i A') }}</p>
    <p><strong>Updated:</strong> {{ $task->updated_at->format('F d, Y h:i A') }}</p>

    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to List</a>
</div>
</body>
</html>