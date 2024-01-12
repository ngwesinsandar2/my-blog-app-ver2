<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.ico') }}" />
    <title>My Blog App</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="bg-[var(--primary)]">
        <div class="px-10 py-4">
            <x-navbar />
        </div>

        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
