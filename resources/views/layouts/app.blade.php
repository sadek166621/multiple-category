<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Category System</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1>My Laravel Project</h1>
            <nav>
                <a href="{{ route('categories.index') }}">View Categories</a>
                <a href="{{ route('categories.create') }}">Create Category</a>
            </nav>
        </header>
        
        <main>
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
