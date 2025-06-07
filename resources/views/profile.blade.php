<x-template_default title="Profile" section-title="Profile">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        {{-- Form Update Informasi --}}
        <div class="md:col-span-2">
            <form action="{{ route('profile.update') }}" method="POST" class="bg-white p-6 rounded-lg shadow">
                @csrf
                @method('PUT')
                <h3 class="text-lg font-semibold border-b pb-2 mb-4">Informasi Akun</h3>
                
                @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
                @endif
                
                <div class="flex flex-col gap-2 mb-4">
                    <label for="name" class="font-semibold text-sm">Name</label>
                    <input type="text" id="name" name="name" class="px-3 py-2 border border-zinc-300 rounded-md" value="{{ old('name', $user->name) }}">
                    @error('name')<p class="text-red-500 text-xs">{{$message}}</p>@enderror
                </div>

                <div class="flex flex-col gap-2 mb-4">
                    <label for="email" class="font-semibold text-sm">Email</label>
                    <input type="email" id="email" name="email" class="px-3 py-2 border border-zinc-300 rounded-md" value="{{ old('email', $user->email) }}">
                    @error('email')<p class="text-red-500 text-xs">{{$message}}</p>@enderror
                </div>
                
                <div class="flex flex-col gap-2 mb-4">
                    <label class="font-semibold text-sm">Role</label>
                    <div class="px-3 py-2 bg-zinc-100 border border-zinc-300 rounded-md capitalize">{{ $user->role }}</div>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md font-semibold hover:bg-blue-700">Update Profile</button>
            </form>
        </div>

        {{-- Form Update Password --}}
        <div>
            <form action="{{ route('profile.password.update') }}" method="POST" class="bg-white p-6 rounded-lg shadow">
                @csrf
                @method('PUT')
                 <h3 class="text-lg font-semibold border-b pb-2 mb-4">Ubah Password</h3>
                 
                <div class="flex flex-col gap-2 mb-4">
                    <label for="current_password" class="font-semibold text-sm">Password Saat Ini</label>
                    <input type="password" id="current_password" name="current_password" class="px-3 py-2 border border-zinc-300 rounded-md">
                     @error('current_password', 'updatePassword')<p class="text-red-500 text-xs">{{$message}}</p>@enderror
                </div>
                <div class="flex flex-col gap-2 mb-4">
                    <label for="password" class="font-semibold text-sm">Password Baru</label>
                    <input type="password" id="password" name="password" class="px-3 py-2 border border-zinc-300 rounded-md">
                    @error('password', 'updatePassword')<p class="text-red-500 text-xs">{{$message}}</p>@enderror
                </div>
                <div class="flex flex-col gap-2 mb-4">
                    <label for="password_confirmation" class="font-semibold text-sm">Konfirmasi Password Baru</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="px-3 py-2 border border-zinc-300 rounded-md">
                </div>
                <button type="submit" class="bg-gray-700 text-white px-4 py-2 rounded-md font-semibold hover:bg-gray-800">Ubah Password</button>
            </form>
        </div>
    </div>
    
    {{-- Tombol Logout --}}
    <div class="mt-6 flex justify-end">
        <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 border border-red-600 text-white px-4 py-2 rounded-md font-semibold hover:bg-red-700">
                Logout
            </button>
        </form>
    </div>
</x-template_default>