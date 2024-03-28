<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Edit Book')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" href="Images/icon.png">

    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #343a40;
            color: #fff;
            padding: 15px 0;
        }

        main {
            flex: 1;
            margin-top: 20px;
        }

        footer {
            background-color: #343a40;
            color: #fff;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="fixed-bottom">
        <!-- Footer content goes here -->
    </footer>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap) scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Your custom scripts can go here -->

</body>

</html>
