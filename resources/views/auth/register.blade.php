<x-template_default title="Register" section-title="Create Account">
    <div class="flex justify-center">
        <div class="w-full max-w-lg p-6 bg-white border border-zinc-200 shadow-md rounded-lg">
            <h2 class="text-center text-2xl font-bold text-zinc-800 mb-2">Register for Q-Store</h2>
            <p class="text-center text-sm text-zinc-600 mb-6">Register using your email</p>
            
            <form action="{{ route('auth.store') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                @method('POST')

                <div class="flex flex-col gap-2">
                    <label for="name" class="font-semibold text-sm text-zinc-700">Name</label>
                    <input type="text" id="name" name="name"
                        class="px-3 py-2 border border-zinc-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                        placeholder="Your name" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label for="email" class="font-semibold text-sm text-zinc-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="px-3 py-2 border border-zinc-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                        placeholder="Your email" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label for="password" class="font-semibold text-sm text-zinc-700">Password</label>
                    <input type="password" id="password" name="password"
                        class="px-3 py-2 border border-zinc-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror"
                        placeholder="Your password">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label for="confirm_password" class="font-semibold text-sm text-zinc-700">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="px-3 py-2 border border-zinc-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Confirm your password">
                </div>

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md text-center gap-2 cursor-pointer mt-4 transition duration-300">
                    <span>Register</span>
                </button>

                <p class="text-zinc-600 text-sm text-center mt-4">
                    Already have an account?
                    <a href="{{ route('auth.login') }}" class="text-blue-600 hover:text-blue-800 font-semibold underline">Login Here!</a>
                </p>
            </form>
        </div>
    </div>
</x-template_default>