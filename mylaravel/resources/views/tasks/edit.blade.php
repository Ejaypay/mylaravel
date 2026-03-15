<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; background: #f0f4f8;
               display: flex; justify-content: center; padding: 3rem 1rem; }
        .card { background: white; padding: 2rem; border-radius: 12px;
                box-shadow: 0 4px 16px rgba(0,0,0,.1); width: 100%; max-width: 500px; }
        h1 { color: #e3342f; margin-bottom: 1.5rem; }
        label { display: block; font-weight: bold; margin-bottom: .3rem; color: #333; }
        input[type="text"], textarea {
            width: 100%; padding: .6rem .8rem; border: 1px solid #ccc;
            border-radius: 6px; font-size: 1rem; margin-bottom: 1rem; }
        .checkbox-row { display: flex; align-items: center; gap: .5rem; margin-bottom: 1rem; }
        .error { color: red; font-size: .85rem; margin-top: -.8rem; margin-bottom: .8rem; }
        .btn { padding: .6rem 1.2rem; border: none; border-radius: 6px;
               cursor: pointer; font-size: 1rem; text-decoration: none; }
        .btn-primary   { background: #e3342f; color: white; }
        .btn-secondary { background: #ccc; color: #333; margin-left: .5rem; }
    </style>
</head>
<body>
<div class="card">
    <h1>✏️ Edit Task</h1>

    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')

        <label for="title">Title *</label>
        <input type="text" id="title" name="title"
               value="{{ old('title', $task->title) }}">
        @error('title') <p class="error">{{ $message }}</p> @enderror

        <label for="description">Description</label>
        <textarea id="description" name="description"
                  rows="4">{{ old('description', $task->description) }}</textarea>

        <div class="checkbox-row">
            <input type="checkbox" id="is_completed" name="is_completed"
                   {{ $task->is_completed ? 'checked' : '' }}>
            <label for="is_completed" style="margin:0;">Mark as Completed</label>
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>