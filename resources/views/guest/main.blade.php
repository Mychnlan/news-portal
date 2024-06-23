<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Berita Terupdate | Vynews.com </title>
    <script src="https://cdn.tailwindcss.com"></script>
    @include('guest.partials.link')
</head>
<body>
    @include('guest.partials.header')
    @yield('content')
    @include('guest.partials.script')
</body>
</html>