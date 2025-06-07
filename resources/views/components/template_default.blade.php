@props(["title", "section_title" => ""])
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
<body class="body">
    <main>
        <nav>
            <header x-data="{ open: false }"
            class="flex items-center justify-between sm:justify-start gap-8 border-b 
            sticky top-0 px-3 sm:px-8 py-4 navbar">

                <img class="img_logo" src="\images\Logo.png" alt="Logo">
                <h2 class="text-lg sm:text-l font-bold">Q-Store</h2>   

                {{-- desktop navigation --}}
                <ul class="hidden sm:flex">
                    <li class="list">
                        <a href="{{ route('dashboard') }}"
                           class="{{ request()->is('dashboard') ? 'text-white' : 'text-white' }}
                           }} block px-2 py-1 rounded font-semibold 
                            hover:scale-105 hover:shadow-lg hover:shadow-white 
                            
                           text-sm">
                            Dashboard
                        </a>
                    </li>
                    <li class="list">
                        <a href="{{ route('komponen.index') }}"
                           class="{{ request()->is('dashboard') ? 'text-white' : 'text-white' }}
                           }} block px-2 py-1 rounded font-semibold 
                            hover:scale-105 hover:shadow-lg hover:shadow-white 
                            
                           text-sm">
                            Product
                        </a>
                    </li>
                    <li class="list">
                        <a href="{{ route('jenis_komponen.index') }}"
                           class="{{ request()->is('jenis_komponen') ? 'text-white' : 'text-white' }}
                           }} block px-2 py-1 rounded font-semibold 
                            hover:scale-105 hover:shadow-lg hover:shadow-white 
                            
                           text-sm">
                            Jenis
                        </a>
                    </li>
                    {{-- Di dalam <ul class="hidden sm:flex"> --}}
                    @if (auth()->check() && auth()->user()->role === 'admin')
                    <li class="list">
                        <a href="{{ route('admin.users.index') }}"
                        class="{{ request()->is('admin/users') ? 'text-white' : 'text-white' }}
                        }} block px-2 py-1 rounded font-semibold hover:scale-105 hover:shadow-lg hover:shadow-white text-sm">
                            Kelola User
                        </a>
                    </li>
                    @endif
                    
                </ul>

                {{-- hamburger menu --}}
                <button x-on:click="open = !open" class="block sm:hidden bg-slate-50 border 
                border-slate-400 p-2">
                    <i class="ph ph-list block text-slate-400"></i>
                </button>

                {{-- mobile navigation --}}
                <div x-show="open" class="bg-white border border-zinc-300 shadow-lg sm:hidden 
                absolute top-12 right-3">
                    <ul class="flex flex-col gap-2">
                        <li x-on:click="open = !open">
                            <a href="{{ route('dashboard') }}"
                               class="block px-4 py-2 text-zinc-600 text-sm hover:bg-gray-100">
                                Dashboard
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </header>
        </nav>

        <section class="px-3 sm:px-8 py-4 flex flex-col gap-6">
            <h1 class="text-3xl font-bold">{{ $section_title }}</h1>
            {{ $slot }}
        </section>
    </main>
</body>
</html>



