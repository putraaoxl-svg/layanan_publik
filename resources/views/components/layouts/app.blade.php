<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Layanan Publik' }}</title>
        <!-- Tailwind CSS via CDN untuk kemudahan development tanpa Vite -->
        <script src="https://cdn.tailwindcss.com"></script>
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
                            <a href="#" class="text-gray-700 hover:text-blue-600">{{ auth('customer')->user()->name }}</a>
                        @else
                            <a href="{{ route('customer.login') ?? '#' }}" class="text-gray-700 hover:text-blue-600">Login</a>
                            <a href="{{ route('customer.register') ?? '#' }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">Daftar</a>
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
