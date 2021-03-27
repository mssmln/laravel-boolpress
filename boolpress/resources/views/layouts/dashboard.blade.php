<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('admin.partials.header')

    <nav>
        <ul>
            <li><a href="">dashboard</a></li>
            <li><a href="">posts</a></li>
            <li><a href="">users</a></li>
            <li><a href="">categories</a></li>
            <li><a href="">tags</a></li>
        </ul>
    </nav>

    <main>@yield('content')</main>

</body>
</html>