<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen">

    @include('layouts.navigation') <!-- Breezeが提供するナビゲーション -->

    <main class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-md rounded-xl">
        @yield('content')
    </main>

</body>
</html>
