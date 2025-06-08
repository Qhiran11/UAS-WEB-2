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
                <ul class="hidden sm:flex items-center">
                    <li class="list">
                        <a href="{{ route('dashboard') }}"
                           class="{{ request()->is('dashboard') ? 'text-white font-bold' : 'text-white' }}
                           block px-2 py-1 rounded font-semibold 
                            hover:scale-105 hover:shadow-lg hover:shadow-white 
                           text-sm">
                            Dashboard
                        </a>
                    </li>
                    <li class="list">
                        <a href="{{ route('komponen.index') }}"
                           class="{{ request()->is('komponen*') ? 'text-white font-bold' : 'text-white' }}
                           block px-2 py-1 rounded font-semibold 
                            hover:scale-105 hover:shadow-lg hover:shadow-white 
                           text-sm">
                            Product
                        </a>
                    </li>
                    {{-- Admin-only links --}}
                    @if (auth()->check() && auth()->user()->role === 'admin')
                    <li class="list">
                        <a href="{{ route('admin.jenis_komponen.index') }}"
                           class="{{ request()->is('admin/jenis_komponen*') ? 'text-white font-bold' : 'text-white' }}
                           block px-2 py-1 rounded font-semibold 
                            hover:scale-105 hover:shadow-lg hover:shadow-white 
                           text-sm">
                            Jenis
                        </a>
                    </li>
                    <li class="list">
                        <a href="{{ route('admin.users.index') }}"
                           class="{{ request()->is('admin/users*') ? 'text-white font-bold' : 'text-white' }}
                           block px-2 py-1 rounded font-semibold 
                            hover:scale-105 hover:shadow-lg hover:shadow-white 
                           text-sm">
                            Kelola User
                        </a>
                    </li>
                    @endif
                </ul>

                {{-- User Status & Profile Link --}}
                <div class="hidden sm:flex items-center gap-4 ml-auto">
                    @auth
                        <a href="{{ route('profile.index') }}" class="flex items-center gap-2 text-white hover:text-zinc-200">
                            <div class="text-right">
                                <div class="font-semibold text-sm">{{ Auth::user()->name }}</div>
                                <div class="text-xs capitalize px-2 py-0.5 rounded-full {{ Auth::user()->role === 'admin' ? 'bg-yellow-400 text-yellow-900' : 'bg-blue-200 text-blue-800' }}">
                                    {{ Auth::user()->role }}
                                </div>
                            </div>
                             <i class="ph-fill ph-user-circle text-3xl"></i>
                        </a>
                    @endauth
                </div>


                {{-- hamburger menu --}}
                <button x-on:click="open = !open" class="block sm:hidden bg-slate-50 border 
                border-slate-400 p-2 rounded">
                    <i class="ph ph-list block text-slate-400"></i>
                </button>

                {{-- mobile navigation --}}
                <div x-show="open" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="bg-white border border-zinc-300 shadow-lg sm:hidden 
                     absolute top-20 right-3 rounded-md w-48 z-10">
                    <ul class="flex flex-col gap-1 p-2">
                        <li>
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-zinc-600 text-sm hover:bg-gray-100 rounded-md">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('komponen.index') }}" class="block px-4 py-2 text-zinc-600 text-sm hover:bg-gray-100 rounded-md">
                                Product
                            </a>
                        </li>
                        {{-- Admin-only links for mobile --}}
                        @if (auth()->check() && auth()->user()->role === 'admin')
                        <li>
                            <a href="{{ route('admin.jenis_komponen.index') }}" class="block px-4 py-2 text-zinc-600 text-sm hover:bg-gray-100 rounded-md">
                                Jenis
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 text-zinc-600 text-sm hover:bg-gray-100 rounded-md">
                                Kelola User
                            </a>
                        </li>
                        @endif
                        <hr class="my-1">
                        <li>
                            <a href="{{ route('profile.index') }}" class="block px-4 py-2 text-zinc-600 text-sm hover:bg-gray-100 rounded-md">
                                Profile
                            </a>
                        </li>
                        <li>
                             <form action="{{ route('auth.logout') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full text-left px-4 py-2 text-red-600 text-sm hover:bg-red-50 rounded-md">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </header>
        </nav>

        <section class="px-3 sm:px-8 py-4 flex flex-col gap-6">
            <h1 class="text-3xl font-bold text-white">{{ $section_title }}</h1>
            {{ $slot }}
        </section>
    </main>
</body>
</html>