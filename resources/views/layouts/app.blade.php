<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-200">
    <nav class="dark:bg-gray-900 bg-white shadow p-4 mb-6 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <a href="/">
                <img src="/logo.png" width="50" height="50" alt="Logo"">
</a>
        </div>
        <div class=" flex items-center flex-col space-x-4">
                @auth
                <div class="flex items-center space-x-2">
                    <span class="dark:text-gray-200">{{ auth()->user()->name }}</span>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-red-500">Sair</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-200 hover:underline">Login</a>
                <a href="{{ route('register') }}" class="text-gray-700 dark:text-gray-200 hover:underline">Registrar</a>
                @endauth
        </div>
    </nav>

    <div class="container mx-auto px-4">
        @yield('content')
    </div>
</body>

</html>