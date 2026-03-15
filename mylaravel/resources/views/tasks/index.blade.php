<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tasks</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; background: #f0f4f8; padding: 2rem; }
        .container { max-width: 750px; margin: auto; }
        h1 { color: #e3342f; margin-bottom: 1rem; }
        .btn { padding: .5rem 1rem; border: none; border-radius: 6px;
               cursor: pointer; text-decoration: none; font-size: .9rem; }
        .btn-primary { background: #e3342f; color: white; }
        .btn-warning { background: #f6c23e; color: #333; }
        .btn-danger  { background: #cc0000; color: white; }
        .btn-info    { background: #3490dc; color: white; }
        .alert { padding: .8rem 1rem; background: #d4edda; color: #155724;
                 border-radius: 6px; margin-bottom: 1rem; }
        table { width: 100%; border-collapse: collapse; background: white;
                border-radius: 10px; overflow: hidden;
                box-shadow: 0 2px 10px rgba(0,0,0,.08); }
        th, td { padding: .9rem 1rem; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #e3342f; color: white; }
        .badge { padding: .2rem .6rem; border-radius: 20px; font-size: .8rem; }
        .done { background: #d4edda; color: #155724; }
        .pending { background: #fff3cd; color: #856404; }
    </style>
</head>
<body>
<div class="container">
    <h1>📋 Task List</h1>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <a href="{{ route('tasks.create') }}" class="btn btn-primary"
       style="display:inline-block; margin-bottom:1rem;">+ New Task</a>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Status</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td>
                    <span class="badge {{ $task->is_completed ? 'done' : 'pending' }}">
                        {{ $task->is_completed ? '✅ Done' : '⏳ Pending' }}
                    </span>
                </td>
                <td>{{ $task->created_at->format('M d, Y') }}</td>
                <td style="display:flex; gap:.4rem; flex-wrap:wrap;">
                    <a href="{{ route('tasks.show', $task) }}"
                       class="btn btn-info">View</a>
                    <a href="{{ route('tasks.edit', $task) }}"
                       class="btn btn-warning">Edit</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                          onsubmit="return confirm('Delete this task?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center; color:#999; padding:2rem;">
                    No tasks yet. Create one!
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>