<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <!-- Memanggil Bootstrap dari folder public/bs/css -->
    <link rel="stylesheet" href="{{ asset('bs/css/bootstrap.min.css') }}">
    
    <!-- Tambahkan ini agar ikon bi-person dkk muncul -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net">


    @stack('css')
</head>
<body class="bg-light">

    @yield('body')

    <!-- Memanggil JS Bootstrap dari folder public/bs/js -->
    <script src="{{ asset('bs/js/bootstrap.bundle.min.js') }}"></script>
    
    @stack('js')
</body>
</html>
