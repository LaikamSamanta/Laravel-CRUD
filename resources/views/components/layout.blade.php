@props([
    'title' => 'Bez title'
])

<!doctype html>
<html lang="en" data-theme="coffee">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
  </body>
  <body>
  <x-navbar />
    <main class="w-full bg-stone-900 text-white p-4">
{{ $slot }}
</main>
</body>
</html>