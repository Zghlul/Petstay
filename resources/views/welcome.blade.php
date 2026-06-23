@extends('layouts.app')

@section('title', 'PetStay | Premium Pet Hotel & Care')

@section('content')
    <style>
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>

    {{-- Hero Section --}}
    <section class="relative min-h-[870px] flex items-center overflow-hidden hero-gradient pt-16 md:pt-0">
        <div class="container mx-auto px-margin-mobile md:px-margin-desktop grid md:grid-cols-2 gap-xl items-center">
            <div class="z-10 order-2 md:order-1">
                <span class="inline-block px-4 py-1 rounded-full bg-secondary-container/20 text-secondary font-label-md text-label-md mb-md">
                    PREMIUM PET BOARDING
                </span>
                <h1 class="font-display-lg text-display-lg text-primary mb-md leading-tight">
                    Pengalaman Menginap Terbaik untuk Sahabat Anda
                </h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-xl max-w-lg">
                    Nikmati ketenangan pikiran dengan PetStay. Hotel hewan peliharaan mewah kami menyediakan layanan profesional, pemantauan CCTV, dan perawatan personal dari tenaga ahli.
                </p>
                <div class="flex flex-wrap gap-md">
                    <a href="/dashboard" class="bg-primary text-on-primary px-xl py-md rounded-lg font-title-md text-title-md shadow-lg hover:opacity-90 transition-all flex items-center gap-sm">
                        Pesan Sekarang
                        <span class="material-symbols-outlined">calendar_month</span>
                    </a>
                </div>
            </div>
            <div class="relative order-1 md:order-2 h-[400px] md:h-[600px]">
                <div class="absolute inset-0 bg-primary/10 rounded-[2rem] rotate-3 translate-x-4"></div>
                <img 
                    alt="Anjing Golden di Kasur Mewah" 
                    class="w-full h-full object-cover rounded-[2rem] shadow-2xl relative z-10" 
                    src="https://images.unsplash.com/photo-1548199973-03cce0bbc87b?auto=format&fit=crop&q=80&w=800"
                />
                <div class="absolute bottom-10 -left-10 z-20 glass-card p-md rounded-xl shadow-xl hidden lg:block">
                    <div class="flex items-center gap-md">
                        <div class="bg-primary-fixed text-on-primary-fixed w-10 h-10 rounded-full flex items-center justify-center">
                            <span class="material-symbols-outlined">verified</span>
                        </div>
                        <div>
                            <p class="font-title-md text-title-md text-primary">Tenaga Profesional</p>
                            <p class="font-caption text-caption text-on-surface-variant">Tim bersertifikat 24/7</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Services Section --}}
    <section class="py-xl bg-surface" id="services">
        <div class="container mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="flex flex-col md:flex-row justify-between items-end mb-xl gap-md">
                <div>
                    <h2 class="font-headline-lg text-headline-lg text-primary mb-xs">Layanan Kami</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant max-w-2xl">
                        Solusi perawatan khusus yang dirancang untuk menjaga hewan peliharaan Anda tetap sehat, bahagia, dan dimanjakan.
                    </p>
                </div>
                <div class="hidden md:flex gap-sm">
                    <button onclick="slideServices('left')" class="w-10 h-10 rounded-full border border-outline flex items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all" aria-label="Geser kiri">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                    <button onclick="slideServices('right')" class="w-10 h-10 rounded-full border border-outline flex items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all" aria-label="Geser kanan">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>
            </div>
            <div id="services-slider" class="flex flex-nowrap overflow-x-auto gap-lg pb-4 scroll-smooth scrollbar-hide snap-x snap-mandatory -mx-margin-mobile md:mx-0 px-margin-mobile md:px-0">
                @forelse($services ?? [] as $layanan)
                    @php
                        $icon = 'bed';
                        if($layanan->kategori == 'grooming') $icon = 'content_cut';
                        elseif($layanan->kategori == 'medis') $icon = 'medical_services';
                        elseif($layanan->kategori == 'pelatihan') $icon = 'psychology';
                        elseif($layanan->kategori == 'nutrisi') $icon = 'restaurant';
                        elseif($layanan->kategori == 'hiburan') $icon = 'sports_baseball';
                    @endphp
                    <div class="min-w-[280px] md:min-w-[320px] flex-shrink-0 snap-start p-lg bg-surface-container-lowest rounded-xl border border-outline-variant hover:border-primary transition-all group">
                        <div class="w-12 h-12 bg-primary-container/10 text-primary rounded-lg flex items-center justify-center mb-md group-hover:bg-primary group-hover:text-on-primary transition-all">
                            <span class="material-symbols-outlined text-2xl">{{ $icon }}</span>
                        </div>
                        <h3 class="font-title-lg text-title-lg text-primary mb-sm">{{ $layanan->nama_layanan }}</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-md">{{ $layanan->deskripsi }}</p>
                        <p class="text-primary font-bold font-title-md text-title-md mb-md">
                            Rp {{ number_format($layanan->harga, 0, ',', '.') }}
                        </p>
                    </div>
                @empty
                    <p class="text-center text-on-surface-variant w-full py-xl">Data layanan belum tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Why Us Section --}}
    <section class="py-xl bg-surface-container-low" id="why-us">
        <div class="container mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="grid grid-cols-1 md:grid-cols-4 md:grid-rows-2 gap-lg h-auto md:h-[600px]">
                <div class="md:col-span-2 md:row-span-2 bg-primary text-on-primary p-xl rounded-2xl flex flex-col justify-end relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                    <h2 class="font-display-lg text-display-lg mb-md leading-none">Aman. Nyaman. Terpercaya.</h2>
                    <p class="font-body-lg text-body-lg text-on-primary/90 mb-xl">
                        Kami membangun PetStay dengan konsep "Ketenangan Pikiran Total", mengintegrasikan teknologi modern dengan perawatan sepenuh hati.
                    </p>
                    <div class="flex items-center gap-xl border-t border-white/20 pt-xl">
                        <div>
                            <p class="font-display-lg text-display-lg mb-0">24/7</p>
                            <p class="font-caption text-caption text-on-primary/70">Kehadiran Staf Ahli</p>
                        </div>
                        <div>
                            <p class="font-display-lg text-display-lg mb-0">100%</p>
                            <p class="font-caption text-caption text-on-primary/70">Sanitasi Setiap Hari</p>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-2 bg-surface-container-lowest p-lg rounded-2xl border border-outline-variant flex items-center gap-lg">
                    <div class="w-16 h-16 bg-secondary-container/20 text-secondary rounded-full flex shrink-0 items-center justify-center">
                        <span class="material-symbols-outlined text-3xl">videocam</span>
                    </div>
                    <div>
                        <h4 class="font-title-lg text-title-lg text-primary mb-xs">Pemantauan Real-Time</h4>
                        <p class="font-body-md text-body-md text-on-surface-variant">
                            Akses siaran langsung berkualitas tinggi dari ruangan hewan peliharaan Anda kapan saja.
                        </p>
                    </div>
                </div>
                <div class="bg-surface-container-lowest p-lg rounded-2xl border border-outline-variant flex flex-col justify-between group cursor-pointer hover:border-primary transition-colors">
                    <span class="material-symbols-outlined text-primary text-3xl">security</span>
                    <div>
                        <h4 class="font-title-md text-title-md text-primary mb-xs">Sistem Keamanan</h4>
                        <p class="font-caption text-caption text-on-surface-variant">Keamanan fasilitas maksimum.</p>
                    </div>
                </div>
                <div class="bg-surface-container-lowest p-lg rounded-2xl border border-outline-variant flex flex-col justify-between group cursor-pointer hover:border-primary transition-colors">
                    <span class="material-symbols-outlined text-primary text-3xl">health_and_safety</span>
                    <div>
                        <h4 class="font-title-md text-title-md text-primary mb-xs">Laporan Kesehatan</h4>
                        <p class="font-caption text-caption text-on-surface-variant">Daftar periksa kebugaran harian.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

        {{-- Rooms Section --}}
    <section class="py-xl" id="rooms">
        <div class="container mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="flex flex-col md:flex-row justify-between items-end mb-xl gap-md">
                <div>
                    <h2 class="font-headline-lg text-headline-lg text-primary mb-xs">Akomodasi Mewah</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        Pilih tingkat kenyamanan yang sempurna untuk hewan peliharaan kesayangan Anda.
                    </p>
                </div>
                <div class="hidden md:flex gap-sm">
                    <button onclick="slideRooms('left')" class="w-10 h-10 rounded-full border border-outline flex items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all" aria-label="Geser kiri">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                    <button onclick="slideRooms('right')" class="w-10 h-10 rounded-full border border-outline flex items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all" aria-label="Geser kanan">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>
            </div>

            @php
                // Kelompokkan berdasarkan kombinasi tipe_kamar + fasilitas + harga
                // sehingga kamar dengan fasilitas berbeda tetap muncul meski tipe sama
                $groupedRooms = collect($rooms ?? [])->groupBy(function($room) {
                    return strtolower($room->tipe_kamar) . '|' . $room->fasilitas . '|' . $room->harga_per_malam;
                });
            @endphp
            
            <div id="rooms-slider" class="flex flex-nowrap overflow-x-auto gap-lg pb-4 scroll-smooth scrollbar-hide snap-x snap-mandatory -mx-margin-mobile md:mx-0 px-margin-mobile md:px-0">
                @forelse($groupedRooms as $key => $roomsByType)
                    @php
                        $room = $roomsByType->first();
                        
                        $statusBadgeClass = 'bg-emerald-500/15 text-emerald-800';
                        if(strtolower($room->status_kamar) == 'terisi') $statusBadgeClass = 'bg-red-500/15 text-red-800';
                        elseif(strtolower($room->status_kamar) == 'maintenance') $statusBadgeClass = 'bg-amber-500/15 text-amber-800';

                        if(!empty($room->foto)) {
                            $fotoPath = asset('storage/' . $room->foto);
                        } else {
                            if(strtolower($room->tipe_kamar) == 'deluxe') {
                                $fotoPath = 'https://images.unsplash.com/photo-1596207869680-e8832185cf15?auto=format&fit=crop&q=80&w=600';
                            } elseif(strtolower($room->tipe_kamar) == 'vip') {
                                $fotoPath = 'https://images.unsplash.com/photo-1522037576655-7a93ce0f4d10?auto=format&fit=crop&q=80&w=600';
                            } else {
                                $fotoPath = 'https://images.unsplash.com/photo-1541781774459-bb2af2f05b55?auto=format&fit=crop&q=80&w=600';
                            }
                        }
                    @endphp
                    
                    <div class="min-w-[280px] md:min-w-[320px] flex-shrink-0 snap-start bg-surface-container-lowest rounded-xl shadow-lg overflow-hidden border @if(strtolower($room->tipe_kamar) == 'deluxe') border-2 border-primary @else border border-outline-variant @endif flex flex-col relative group">
                        @if(strtolower($room->tipe_kamar) == 'deluxe')
                            <div class="absolute top-0 right-0 z-20">
                                <div class="bg-primary text-on-primary font-label-sm text-label-sm px-4 py-1 rounded-bl-xl">PALING POPULER</div>
                            </div>
                        @endif
                        
                        <div class="relative h-48 overflow-hidden">
                            <img 
                                alt="{{ ucfirst($room->tipe_kamar) }} Room" 
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                src="{{ $fotoPath }}" 
                            />
                            <div class="absolute top-4 left-4">
                                <span class="{{ $statusBadgeClass }} text-label-sm font-label-sm px-3 py-1 rounded-full backdrop-blur-sm">
                                    {{ ucfirst($room->status_kamar) }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="p-lg flex-grow flex flex-col justify-between">
                            <div>
                                <div class="flex justify-between items-start mb-sm">
                                    <h3 class="font-title-lg text-title-lg text-primary">
                                        @if(strtolower($room->tipe_kamar) == 'vip') Royal @endif
                                        {{ ucfirst($room->tipe_kamar) }} Suite
                                    </h3>
                                    <p class="text-primary font-bold font-title-md text-title-md">
                                        Rp {{ number_format($room->harga_per_malam, 0, ',', '.') }}
                                        <span class="font-caption text-caption text-on-surface-variant">/malam</span>
                                    </p>
                                </div>
                                <p class="text-sm text-on-surface-variant mb-lg truncate">{{ $room->fasilitas }}</p>
                            </div>
                            <a href="/dashboard" class="text-center w-full py-sm rounded-lg @if(strtolower($room->tipe_kamar) == 'deluxe') bg-primary text-on-primary shadow-md @else border border-primary text-primary @endif font-title-md text-title-md hover:bg-primary hover:text-on-primary transition-all block mt-auto">
                                Pilih {{ ucfirst($room->tipe_kamar) }}
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-on-surface-variant w-full py-xl">Belum ada data kamar tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Testimonial Section --}}
    <section class="py-xl bg-primary overflow-hidden relative">
        <div class="absolute inset-0 paw-pattern opacity-10"></div>
        <div class="container mx-auto px-margin-mobile md:px-margin-desktop relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <span class="material-symbols-outlined text-secondary-container text-5xl mb-md">format_quote</span>
                <div class="relative">
                    <div class="testimonial-slide active animate-fade-in">
                        <p class="font-headline-md text-headline-md text-on-primary italic mb-xl leading-relaxed">
                            "Tingkat profesionalisme di PetStay tak tertandingi. Saya bisa mengecek webcam kapan saja untuk melihat Milo bermain dan dirawat. Benar-benar seperti hotel bintang 5 untuk peliharaan saya!"
                        </p>
                        <div class="flex flex-col items-center">
                            <div class="w-16 h-16 rounded-full border-2 border-secondary-container p-1 mb-sm">
                                <img 
                                    alt="Customer" 
                                    class="w-full h-full object-cover rounded-full" 
                                    src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&q=80&w=150"
                                />
                            </div>
                            <h5 class="font-title-lg text-title-lg text-on-primary">Andi Pratama</h5>
                            <p class="font-caption text-caption text-on-primary/70">Pemilik Milo (Golden Retriever)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-xl">
        <div class="container mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="bg-surface-container-high rounded-[2rem] p-xl flex flex-col md:flex-row items-center justify-between gap-xl border border-outline-variant">
                <div class="max-w-xl">
                    <h2 class="font-headline-lg text-headline-lg text-primary mb-md">
                        Siap memberikan liburan terbaik untuk hewan Anda?
                    </h2>
                    <p class="font-body-lg text-body-lg text-on-surface-variant">
                        Bergabunglah dengan lebih dari 2.000 pemilik hewan yang mempercayakan PetStay untuk merawat sahabat tersayang mereka setiap hari.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-md w-full md:w-auto">
                    <a href="/dashboard" class="bg-primary text-center text-on-primary px-xl py-md rounded-lg font-title-md text-title-md whitespace-nowrap hover:opacity-90 transition-all">
                        Cek Ketersediaan
                    </a>
                    <a href="#footer" class="bg-white text-center text-primary border border-outline-variant px-xl py-md rounded-lg font-title-md text-title-md whitespace-nowrap hover:bg-surface-container-low transition-all">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script>
        function slideServices(direction) {
            const slider = document.getElementById('services-slider');
            const scrollAmount = 340; 
            slider.scrollBy({ left: direction === 'left' ? -scrollAmount : scrollAmount, behavior: 'smooth' });
        }

        function slideRooms(direction) {
            const slider = document.getElementById('rooms-slider');
            const scrollAmount = 340; 
            slider.scrollBy({ left: direction === 'left' ? -scrollAmount : scrollAmount, behavior: 'smooth' });
        }
    </script>
@endsection