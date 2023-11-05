<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task</title>
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <p class="mb-3 font-medium text-3xl first-letter:uppercase">@yield('title')</p>


    @if (session()->has('success'))
        <div x-data="{ flash: true }">
            <div class="relative mb-10 rounded border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700"
                x-show="flash">
                <strong class=" font-bold">Success!</strong>
                <div>{{ session('success') }}</div>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        @click="flash = false" stroke="currentColor" class="h-6 w-6 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </div>
        </div>
    @endif
    <div class="main">
        @yield('content')
    </div>
</body>

</html>
