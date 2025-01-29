<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <!-- Liens CSS ici -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <!-- Header -->
    @include('layouts.header')

    <div class="main-container">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Content -->
        <div class="content">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Scripts JS -->
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
