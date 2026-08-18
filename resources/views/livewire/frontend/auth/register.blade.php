<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-indigo-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-lg w-full">
        {{-- Header --}}
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-block">
                <h1 class="text-3xl font-extrabold text-blue-600">Bapekomdag Jogja</h1>
            </a>
            <h2 class="mt-4 text-2xl font-bold text-gray-900">Buat Akun Baru</h2>
            <p class="mt-2 text-sm text-gray-500">
                Sudah punya akun?
                <a href="{{ route('customer.login') }}" class="font-medium text-blue-600 hover:text-blue-500 transition" wire:navigate>
                    Masuk di sini
                </a>
            </p>
        </div>

        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
            <form wire:submit="register" class="space-y-5">

                {{-- Tipe Klien --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tipe Klien</label>
                    <div class="grid grid-cols-2 gap-3">
                        <label class="relative flex items-center justify-center p-3 border rounded-lg cursor-pointer transition
                            {{ $client_type === 'individual' ? 'border-blue-500 bg-blue-50 ring-2 ring-blue-500' : 'border-gray-300 hover:border-gray-400' }}">
                            <input wire:model.live="client_type" type="radio" name="client_type" value="individual" class="sr-only">
                            <div class="text-center">
                                <svg class="mx-auto h-6 w-6 {{ $client_type === 'individual' ? 'text-blue-600' : 'text-gray-400' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                                <span class="mt-1 block text-sm font-medium {{ $client_type === 'individual' ? 'text-blue-700' : 'text-gray-600' }}">Perorangan</span>
                            </div>
                        </label>
                        <label class="relative flex items-center justify-center p-3 border rounded-lg cursor-pointer transition
                            {{ $client_type === 'institutional' ? 'border-blue-500 bg-blue-50 ring-2 ring-blue-500' : 'border-gray-300 hover:border-gray-400' }}">
                            <input wire:model.live="client_type" type="radio" name="client_type" value="institutional" class="sr-only">
                            <div class="text-center">
                                <svg class="mx-auto h-6 w-6 {{ $client_type === 'institutional' ? 'text-blue-600' : 'text-gray-400' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                </svg>
                                <span class="mt-1 block text-sm font-medium {{ $client_type === 'institutional' ? 'text-blue-700' : 'text-gray-600' }}">Instansi</span>
                            </div>
                        </label>
                    </div>
                    @error('client_type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Nama Lengkap --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input wire:model="name" id="name" type="text" placeholder="Masukkan nama lengkap"
                        class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400
                               focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition
                               @error('name') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input wire:model.blur="email" id="email" type="email" autocomplete="email" placeholder="nama@email.com"
                        class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400
                               focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition
                               @error('email') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- NIK/NIP/NRP --}}
                <div>
                    <label for="id_number" class="block text-sm font-medium text-gray-700 mb-1">NIK / NIP / NRP</label>
                    <input wire:model="id_number" id="id_number" type="text" placeholder="Masukkan nomor identitas"
                        class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400
                               focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition
                               @error('id_number') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                    @error('id_number')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- No. Telepon / WA --}}
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">No. Telepon / WA</label>
                    <input wire:model="phone" id="phone" type="tel" placeholder="08xxxxxxxxxx"
                        class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400
                               focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition
                               @error('phone') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Instansi Asal --}}
                <div>
                    <label for="origin_institution" class="block text-sm font-medium text-gray-700 mb-1">Instansi Asal</label>
                    <input wire:model="origin_institution" id="origin_institution" type="text" placeholder="Nama instansi / perusahaan"
                        class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400
                               focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition
                               @error('origin_institution') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                    @error('origin_institution')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Jabatan (Opsional) --}}
                <div>
                    <label for="position" class="block text-sm font-medium text-gray-700 mb-1">Jabatan <span class="text-gray-400 font-normal">(opsional)</span></label>
                    <input wire:model="position" id="position" type="text" placeholder="Jabatan / posisi saat ini"
                        class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400
                               focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                </div>

                <hr class="border-gray-200">

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input wire:model="password" id="password" type="password" autocomplete="new-password" placeholder="Minimal 8 karakter"
                        class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400
                               focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition
                               @error('password') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                    <input wire:model="password_confirmation" id="password_confirmation" type="password" autocomplete="new-password" placeholder="Ulangi password"
                        class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400
                               focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                </div>

                {{-- Submit --}}
                <div class="pt-2">
                    <button type="submit"
                        class="w-full flex justify-center items-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white
                               bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500
                               transition duration-200 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed"
                        wire:loading.attr="disabled">
                        <svg wire:loading wire:target="register" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span wire:loading.remove wire:target="register">Daftar Akun</span>
                        <span wire:loading wire:target="register">Memproses...</span>
                    </button>
                </div>
            </form>
        </div>

        {{-- Footer --}}
        <p class="mt-6 text-center text-xs text-gray-400">
            &copy; {{ date('Y') }} Balai Pengembangan Kompetensi Perdagangan Yogyakarta
        </p>
    </div>
</div>
