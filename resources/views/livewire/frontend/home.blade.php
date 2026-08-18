<div>
    <!-- Hero Section -->
    <div class="bg-blue-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                Layanan Publik Terpadu
            </h1>
            <p class="mt-4 text-xl max-w-3xl mx-auto text-blue-100">
                Daftar pelatihan kompetensi dan sewa fasilitas di Balai Pengembangan Kompetensi Perdagangan Yogyakarta dengan mudah dan cepat.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Pelatihan Section -->
        <div class="mb-16">
            <div class="flex justify-between items-end mb-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Pelatihan Tersedia</h2>
                    <p class="mt-2 text-gray-600">Tingkatkan kompetensi Anda dengan mengikuti program pelatihan kami.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($trainings as $training)
                    <div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden flex flex-col">
                        @if($training->images && count($training->images) > 0)
                            <img src="{{ Storage::url($training->images[0]) }}" alt="{{ is_string($training->name) ? $training->name : (is_array($training->name) ? ($training->name['id'] ?? '') : '') }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="flex items-center justify-between mb-2">
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 capitalize">
                                    {{ $training->type instanceof \UnitEnum ? (method_exists($training->type, 'getLabel') ? $training->type->getLabel() : $training->type->value) : str_replace('_', ' ', $training->type) }}
                               </span>
                               <span class="text-sm text-gray-500">
                                    Sisa Kuota: {{ $training->max_quota - $training->filled_quota }}
                               </span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ is_string($training->name) ? $training->name : (is_array($training->name) ? ($training->name['id'] ?? '') : '') }}</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ strip_tags(is_string($training->description) ? $training->description : (is_array($training->description) ? ($training->description['id'] ?? '') : '')) }}</p>
                            
                            <div class="mt-auto space-y-2 text-sm text-gray-500 mb-4">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    {{ \Carbon\Carbon::parse($training->start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($training->end_date)->format('d M Y') }}
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    {{ $training->location }}
                                </div>
                            </div>

                            <a href="{{ route('trainings.show', $training->id) ?? '#' }}" class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Lihat Detail & Daftar
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-gray-50 rounded-lg border border-gray-200 p-8 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum Ada Pelatihan</h3>
                        <p class="mt-1 text-sm text-gray-500">Saat ini tidak ada pelatihan yang sedang dibuka.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Fasilitas Section -->
        <div>
            <div class="flex justify-between items-end mb-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Fasilitas Tersedia</h2>
                    <p class="mt-2 text-gray-600">Pesan ruangan kelas dan fasilitas penunjang untuk kegiatan Anda.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($facilities as $facility)
                    <div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden flex flex-col">
                        @if($facility->photos && $facility->photos->count() > 0)
                            <img src="{{ Storage::url($facility->photos->first()->path) }}" alt="{{ is_string($facility->name) ? $facility->name : (is_array($facility->name) ? ($facility->name['id'] ?? '') : '') }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="flex items-center justify-between mb-2">
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 capitalize">
                                    {{ $facility->type instanceof \UnitEnum ? (method_exists($facility->type, 'label') ? $facility->type->label() : $facility->type->value) : str_replace('_', ' ', $facility->type) }}
                               </span>
                               <span class="text-lg font-bold text-gray-900">
                                    Rp {{ number_format($facility->price_per_day, 0, ',', '.') }}<span class="text-sm font-normal text-gray-500">/hari</span>
                               </span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ is_string($facility->name) ? $facility->name : (is_array($facility->name) ? ($facility->name['id'] ?? '') : '') }}</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ strip_tags(is_string($facility->description) ? $facility->description : (is_array($facility->description) ? ($facility->description['id'] ?? '') : '')) }}</p>
                            
                            <div class="mt-auto flex items-center text-sm text-gray-500 mb-4">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                Kapasitas: {{ $facility->capacity ?? '-' }} Orang
                            </div>

                            <a href="{{ route('facilities.show', $facility->id) ?? '#' }}" class="w-full inline-flex justify-center items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Cek Ketersediaan
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-gray-50 rounded-lg border border-gray-200 p-8 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum Ada Fasilitas</h3>
                        <p class="mt-1 text-sm text-gray-500">Saat ini data fasilitas belum tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</div>
