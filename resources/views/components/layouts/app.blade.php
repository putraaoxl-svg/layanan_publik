<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Layanan Publik' }}</title>
        <!-- Tailwind CSS via CDN untuk kemudahan development tanpa Vite -->
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Alpine.js untuk interaktivitas (dropdown, toggle, dsb.) -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @livewireStyles
    </head>
    <body class="bg-gray-50 text-gray-900 font-sans antialiased">
        
        <nav class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600">
                            Bapekomdag Jogja
                        </a>
                    </div>
                    <div class="flex items-center space-x-4">
                        @auth('customer')
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600 transition">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <span class="text-blue-600 font-semibold text-sm">{{ strtoupper(substr(auth('customer')->user()->name, 0, 1)) }}</span>
                                    </div>
                                    <span class="hidden sm:inline text-sm font-medium">{{ auth('customer')->user()->name }}</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                <div x-show="open" @click.away="open = false" x-transition
                                     class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-100 py-1 z-50">
                                    <form method="POST" action="{{ route('customer.logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">
                                            Keluar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('customer.login') }}" class="text-gray-700 hover:text-blue-600 text-sm font-medium transition" wire:navigate>Masuk</a>
                            <a href="{{ route('customer.register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition shadow-sm" wire:navigate>Daftar</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <main>
            {{ $slot }}
        </main>

        <footer class="bg-white border-t border-gray-200 mt-12 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-500 text-sm">
                &copy; {{ date('Y') }} Balai Pengembangan Kompetensi Perdagangan Yogyakarta. All rights reserved.
            </div>
        </footer>

        @livewireScripts
    </body>
</html>
