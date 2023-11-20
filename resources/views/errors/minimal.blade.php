<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 items-center">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-start">
                <div class="px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider">
                    @yield('code')
                </div>

                <div class="ml-4 text-lg text-gray-500 uppercase tracking-wider">
                    @yield('message')
                    <a href="{{ route('dashboard') }}" class="ml-4 text-blue-500">Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
