<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="app.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <title>MDC-GIS-SHS | @yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="antialiased bg-black hold-transition sidebar-mini layout-fixed layout-navbar-fixed"
    style="
            background-image: url('/images/background.jpg');
            background-repeat: no-repeat;
            background-size: 100%;
        ">

    <div class="wrapper py-8 px-4 lg:px-0">
        @yield('content')

    </div>
    @yield('scripts')
</body>

</html>

<style>
    @media (max-width: 640px) {
        body {
            background-size: 1000px auto !important;
        }
    }
</style>
