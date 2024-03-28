<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="Images/icon.png">
</head>

<body>

<header class="text-center">
    <h1>@yield('header')</h1>
</header>

<main class="container mt-4">
    @yield('content')
</main>

<footer>

</footer>

<!-- Bootstrap JS and Popper.js (required for Bootstrap) scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
