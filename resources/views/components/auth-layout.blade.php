@props(['title'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="stylesheet" type="text/css"
          href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
    <title>{{ $title }}</title>
</head>
<body class="bg-zinc-900">
    <main class="flex flex-col items-center justify-center min-h-screen p-4">
        
        {{-- Logo di Tengah Atas --}}
        <div class="mb-8 flex flex-col items-center gap-3">
            <img class="w-16 h-16" src="\images\Logo.png" alt="Logo">
            <h1 class="text-2xl font-bold text-white">Q-Store</h1>
        </div>
        
        {{-- Slot untuk Konten Form --}}
        <div class="w-full max-w-md">
             {{ $slot }}
        </div>

    </main>
</body>
</html>