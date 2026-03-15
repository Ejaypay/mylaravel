<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greet Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f4f8;
        }
        .card {
            background: white;
            padding: 2rem 3rem;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
            text-align: center;
        }
        h1 { color: #e3342f; }
        p  { color: #555; }
    </style>
</head>
<body>
    <div class="card">
        <h1>👋 Hello, {{ $name }}!</h1>
        <p>Welcome to your first Laravel Blade view.</p>
        <p>You're doing great — routes, controllers, and views are all working!</p>
    </div>
</body>
</html>