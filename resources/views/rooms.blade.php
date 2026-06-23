@extends('layouts.app')

@section('title', 'Luxury Accommodations - PawStay')

@section('content')
    <style>
        .room-card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .room-card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .image-zoom {
            transition: transform 0.6s ease;
        }
        .group:hover .image-zoom {
            transform: scale(1.08);
        }
    </style>

    <div class="container mx-auto px-margin-mobile md:px-margin-desktop py-xl space-y-xl">

        {{-- Hero Section --}}
        <header class="text-center md:text-left">
            <h1 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface mb-md">
                Luxury Accommodations
            </h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
                Discover a sanctuary designed for your pet's comfort. From cozy standard rooms to our signature royal suites, we offer the perfect home away from home.
            </p>
        </header>

        {{-- Room Tiers Bento Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-12 gap-lg">

            {{-- Standard Suite --}}
            <div class="md:col-span-4 bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm flex flex-col border border-outline-variant room-card-hover">
                <div class="h-64 relative group overflow-hidden">
                    <img 
                        class="w-full h-full object-cover image-zoom" 
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuD9zTT_N7aGXUcTq2KifANAAT39qj2fC0FMTStJ8ZmMoqA3qrAR3izArWAuy3mn-69VZGxlkgIHas7JMvsE91thw59MezawMNysIG3_mn_F2Mumi9Imst7rWF9xv-dJ5p2-0U0xyoiwBin1ZjKX__ytuFQfpEfQT2DiciF3U7uSTuesaDffSVC76S3VZHZ5UV6xYIGc4jLf7lniiyVlw23mJ5uFvNq9yrJdnckY3WJgBZf86AiRgZ0DiBwoIhOr_S870BwqG07_d_g" 
                        alt="Standard Suite Room" 
                    />
                    <div class="absolute top-md right-md bg-secondary-container text-on-secondary-container px-md py-xs rounded-full font-label-sm text-label-sm">
                        {{ ucfirst($standardRoom->tipe_kamar ?? 'Standard') }}
                    </div>
                </div>
                <div class="p-lg flex flex-col flex-grow">
                    <div class="flex justify-between items-start mb-md">
                        <h3 class="font-headline-sm text-headline-sm text-on-surface">
                            {{ ucfirst($standardRoom->tipe_kamar ?? 'Standard') }} Suite
                        </h3>
                        <span class="text-primary font-bold text-headline-sm">
                            Rp {{ number_format($standardRoom->harga_per_malam ?? 150000, 0, ',', '.') }}
                            <span class="text-on-surface-variant text-body-sm font-normal">/malam</span>
                        </span>
                    </div>
                    <ul class="space-y-sm mb-lg flex-grow">
                        @php 
                            $fasilitasStd = explode(',', $standardRoom->fasilitas ?? 'Orthopedic Bedding, Individual Feeding, Daily Playtime');
                        @endphp
                        @foreach($fasilitasStd as $item)
                            <li class="flex items-center gap-sm text-on-surface-variant">
                                <span class="material-symbols-outlined text-primary" style="font-size: 20px; font-variation-settings: 'FILL' 1;">check_circle</span>
                                <span class="font-body-sm text-body-sm">{{ trim($item) }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <a 
                        href="/dashboard" 
                        class="w-full py-md bg-surface-container text-primary font-label-md rounded-lg hover:bg-primary hover:text-on-primary transition-colors duration-300 text-center block"
                    >
                        Check Availability
                    </a>
                </div>
            </div>

            {{-- Deluxe Suite --}}
            <div class="md:col-span-8 bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm flex flex-col md:flex-row border border-outline-variant room-card-hover">
                <div class="md:w-1/2 h-80 md:h-full relative group overflow-hidden">
                    <img 
                        class="w-full h-full object-cover image-zoom" 
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBub8fZUryuHC90_aD-27fSRJzbLvvDjVeVtY8KEEa2wOlFUzQIDBHEzDOoh8lZPUrKKca5F3zpDkOjcDgiTqSjXdU7jIXJRxsXZkyWK16qiP-BVHFNrc05CyT8zzKAdj5PdC6oxjumV8bBxYWqZV6fga_uidn8POJ1AGxPjjGZclAwGH3UuPEd9RV2bvGr7Wa76z6t65TgKqXcWVUneBUnLIdjASUTg-4_gMJatk4Fl6F_HmXGofR3WC0f17v4tEDH8A1jjclYkSA" 
                        alt="Deluxe Suite Room" 
                    />
                </div>
                <div class="md:w-1/2 p-lg flex flex-col">
                    <div class="flex justify-between items-start mb-md">
                        <div>
                            <span class="text-secondary font-bold text-label-sm uppercase tracking-wider">Most Popular</span>
                            <h3 class="font-headline-md text-headline-md text-on-surface">
                                {{ ucfirst($deluxeRoom->tipe_kamar ?? 'Deluxe') }} Suite
                            </h3>
                        </div>
                        <span class="text-primary font-bold text-headline-sm">
                            Rp {{ number_format($deluxeRoom->harga_per_malam ?? 300000, 0, ',', '.') }}
                            <span class="text-on-surface-variant text-body-sm font-normal">/malam</span>
                        </span>
                    </div>
                    <p class="text-on-surface-variant mb-lg font-body-md text-body-md">
                        A spacious upgrade for active pets who enjoy the fresh air and digital check-ins from their owners.
                    </p>
                    <div class="grid grid-cols-2 gap-md mb-lg">
                        @php 
                            $fasilitasDel = explode(',', $deluxeRoom->fasilitas ?? '24/7 Webcam Access, Private Patio, Premium Mattress, Mini Grooming');
                        @endphp
                        @foreach($fasilitasDel as $item)
                            <div class="flex items-center gap-sm text-on-surface-variant">
                                <span class="material-symbols-outlined text-primary" style="font-size: 20px; font-variation-settings: 'FILL' 1;">check_circle</span>
                                <span class="font-body-sm text-body-sm">{{ trim($item) }}</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-auto">
                        <a 
                            href="/dashboard" 
                            class="w-full py-md bg-primary text-on-primary font-label-md rounded-lg hover:opacity-90 transition-opacity text-center block"
                        >
                            Check Availability
                        </a>
                    </div>
                </div>
            </div>

            {{-- Royal VIP Suite --}}
            <div class="md:col-span-12 bg-primary text-on-primary rounded-xl overflow-hidden shadow-lg flex flex-col lg:flex-row relative group room-card-hover">
                <div class="lg:w-3/5 h-96 lg:h-auto relative overflow-hidden">
                    <img 
                        class="w-full h-full object-cover image-zoom" 
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCJY7sGZdDjsGuo-nbQNmVmm2OBrLJrr2qGGFsvNAQsHWztYU_5gCdM_uHZ5fjPLEst1DnX97Uc_lK-_934rkLpaMoJseN7sCFsoNPwLhzonc1dr8yemz_98cQGYtMk41Tddh4RwB6ohhRGCwf4qYIoBXOQXdkoR7rx5guWAGusWEAk5EO8GhnWn81LpvepWykJ19cr0_tKObsMc1T94TvD0vON4hX0VcQzDrP_LJMrman4QqzZ7XkWyWKpyYKyggSbE4ZfjXUxcFM" 
                        alt="Royal VIP Suite" 
                    />
                </div>
                <div class="lg:w-2/5 p-xl flex flex-col justify-center relative z-10">
                    <div class="mb-lg">
                        <h2 class="font-headline-lg text-headline-lg mb-sm">
                            {{ ucfirst($vipRoom->tipe_kamar ?? 'Royal VIP') }} Suite
                        </h2>
                        <p class="font-body-lg text-body-lg opacity-90">
                            The pinnacle of pet hospitality. Full-service pampering with every luxury imaginable for your beloved companion.
                        </p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-md mb-xl">
                        @php 
                            $fasilitasVip = explode(',', $vipRoom->fasilitas ?? 'Personal Concierge, Pet Cinema Access, Gourmet Meal Plan, Private Swim Sessions');
                        @endphp
                        @foreach($fasilitasVip as $item)
                            <div class="flex items-center gap-md">
                                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="font-label-md">{{ trim($item) }}</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="flex flex-col md:flex-row items-center gap-lg">
                        <div class="text-center md:text-left">
                            <span class="block font-headline-md text-headline-md">
                                Rp {{ number_format($vipRoom->harga_per_malam ?? 500000, 0, ',', '.') }}
                            </span>
                            <span class="text-label-sm uppercase opacity-75">Per Night All Inclusive</span>
                        </div>
                        <a 
                            href="/dashboard" 
                            class="flex-grow py-md px-xl bg-on-primary text-primary font-bold rounded-lg hover:bg-surface-container-low transition-colors text-center block"
                        >
                            Check Availability
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Room Features Section --}}
        <section class="py-xl bg-surface-container-low rounded-xl px-lg border border-outline-variant">
            <div class="text-center mb-xl">
                <h2 class="font-headline-md text-headline-md text-on-surface mb-sm">Unmatched Standard Features</h2>
                <p class="text-on-surface-variant font-body-md max-w-xl mx-auto">
                    Every room at PawStay, regardless of tier, includes these premium care standards.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-xl">
                <div class="text-center p-md">
                    <div class="w-16 h-16 bg-primary-container text-on-primary-container rounded-full flex items-center justify-center mx-auto mb-md">
                        <span class="material-symbols-outlined" style="font-size: 32px;">visibility</span>
                    </div>
                    <h4 class="font-headline-sm text-headline-sm mb-sm text-on-surface">24/7 Monitoring</h4>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                        Our facility is staffed around the clock by certified pet care specialists who conduct regular wellness checks.
                    </p>
                </div>
                <div class="text-center p-md">
                    <div class="w-16 h-16 bg-primary-container text-on-primary-container rounded-full flex items-center justify-center mx-auto mb-md">
                        <span class="material-symbols-outlined" style="font-size: 32px;">thermostat</span>
                    </div>
                    <h4 class="font-headline-sm text-headline-sm mb-sm text-on-surface">Climate Controlled</h4>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                        Medical-grade HVAC systems maintain perfect temperature and humidity with HEPA-filtered air in all rooms.
                    </p>
                </div>
                <div class="text-center p-md">
                    <div class="w-16 h-16 bg-primary-container text-on-primary-container rounded-full flex items-center justify-center mx-auto mb-md">
                        <span class="material-symbols-outlined" style="font-size: 32px;">sanitizer</span>
                    </div>
                    <h4 class="font-headline-sm text-headline-sm mb-sm text-on-surface">Daily Sanitization</h4>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                        We use pet-safe, hospital-grade cleaning protocols twice daily to ensure a pristine and healthy environment.
                    </p>
                </div>
            </div>
        </section>

        {{-- CTA Section --}}
        <section class="relative overflow-hidden rounded-xl bg-surface-container-highest p-xl text-center border border-outline-variant">
            <div class="relative z-10">
                <h2 class="font-headline-md text-headline-md text-on-surface mb-md">Ready to book your pet's stay?</h2>
                <p class="text-on-surface-variant font-body-lg mb-lg">
                    Join over 5,000 happy pet owners who trust PawStay for premium care.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-md">
                    <a 
                        href="/dashboard" 
                        class="bg-primary text-on-primary px-xl py-md rounded-lg font-label-md transition-all hover:opacity-90 text-center block"
                    >
                        Book a Room
                    </a>
                    <a 
                        href="{{ route('why-us') }}" 
                        class="bg-surface-container-lowest text-primary border border-primary px-xl py-md rounded-lg font-label-md transition-all hover:bg-surface-container text-center block"
                    >
                        Schedule a Tour
                    </a>
                </div>
            </div>
        </section>

    </div>
@endsection