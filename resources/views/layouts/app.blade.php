<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b border-none bg-white shadow">
        <div class="container mx-auto flex justify-between item-center">
            <h1 class="text-4xl font-extrabold">DevStagram</h1>

            <nav class="flex gap-2 items-center">
                <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login') }}">Login</a>
                <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Crear Cuenta</a>
            </nav>
        </div>
    </header>
    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>
        @yield('contenido')
    </main>

    <footer class="flex justify-center pt-5 uppercase font-bold text-gray-500">
        DevStagram - Todos los derechos reservados {{ now()->year }}
    </footer>
</body>

</html>