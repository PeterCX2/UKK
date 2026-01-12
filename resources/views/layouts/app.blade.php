<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite('resources/css/app.css')
        <title>@yield('title', 'StudyQuest')</title>
    </head>
    <body class="p-6">
        <h1 class="font-heading text-4xl font-extrabold mb-4">@yield('subtitle')</h1>
        <main class="min-h-screen bg-neutral-primary-soft p-6">
            @yield('content')
        </main>
    </body>
</html>