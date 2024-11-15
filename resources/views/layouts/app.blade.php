<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idea Tracker</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <nav class="navbar">
        <div class="nav-brand">Idea Tracker</div>
        <div class="nav-links">
            <a href="{{ route('ideas.index') }}" class="nav-link">All Ideas</a>
            <a href="{{ route('ideas.create') }}" class="nav-link">New Idea</a>
        </div>
    </nav>

    <main class="container">
        @if(session('success'))
            <div class="alert alert-success" id="success-message">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <script>
        setTimeout(function() {
            let successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 3000);
    </script>
</body>
</html>
