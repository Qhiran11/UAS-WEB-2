<x-auth-layout title="Login">
    <div class="w-full p-6 bg-white border border-zinc-200 shadow-md rounded-lg">
        
        <h2 class="text-center text-2xl font-bold text-zinc-800 mb-2">Welcome Back</h2>
        <p class="text-center text-sm text-zinc-600 mb-6">Login with your account</p>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-4">
            @csrf
            @method('POST')

            @error('email')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="flex flex-col gap-2">
                <label for="email" class="font-semibold text-sm text-zinc-700">Email</label>
                <input type="email" id="email" name="email"
                    class="px-3 py-2 border border-zinc-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Your Email" value="{{ old('email') }}">
            </div>

            <div class="flex flex-col gap-2">
                <label for="password" class="font-semibold text-sm text-zinc-700">Password</label>
                <input type="password" id="password" name="password"
                    class="px-3 py-2 border border-zinc-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Your Password">
            </div>

            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md text-center gap-2 cursor-pointer mt-4 transition duration-300">
                <span>Login</span>
            </button>

            <p class="text-zinc-600 text-sm text-center mt-4">
                Don't have an account?
                <a href="{{ route('auth.register') }}" class="text-blue-600 hover:text-blue-800 font-semibold underline">
                    Register Now
                </a>
            </p>
        </form>
    </div>
</x-auth-layout>