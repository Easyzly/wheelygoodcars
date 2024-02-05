<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css')}}">
</head>
<body>
    <header>
        <div class="header">
            <a href="{{ route('home') }}">Home</a>
        </div>
    </header>
    <nav>
        <a href="">Location</a>
        <a href="">Location</a>
        <a href="">Location</a>
    </nav>

    <main>
        @yield('content')
    </main>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
