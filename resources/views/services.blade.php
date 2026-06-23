@extends('layouts.app')

@section('title', 'Our Services | PawStay Pet Hotel')

@section('content')
    <div class="container mx-auto px-margin-mobile md:px-margin-desktop py-xl space-y-xl">
        
        <!-- Hero Section -->
        <section class="relative py-xl overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-xl items-center">
                <div class="z-10">
                    <span class="inline-block bg-secondary-container text-on-secondary-container px-sm py-xs rounded-full text-label-sm font-label-sm mb-md">
                        CARE YOU CAN TRUST
                    </span>
                    <h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface mb-md">
                        World-Class Care for Your Best Friend
                    </h1>
                    <p class="text-on-surface-variant font-body-lg text-body-lg mb-lg max-w-lg">
                        From luxury stays to professional grooming, we offer a comprehensive suite of services designed to keep your pet happy, healthy, and pampered.
                    </p>
                    <div class="flex gap-md">
                        <a href="#our-signature-services" class="bg-primary text-on-primary px-xl py-md rounded-lg font-label-md transition-all active:scale-95 shadow-md inline-flex items-center">
                            View All Packages
                        </a>
                        <a href="{{ route('rooms') }}" class="border border-outline text-primary px-xl py-md rounded-lg font-label-md transition-all hover:bg-surface-container active:scale-95 inline-flex items-center">
                            Our Facility
                        </a>
                    </div>
                </div>
                <div class="relative group">
                    <div class="absolute -inset-4 bg-primary/10 rounded-full blur-3xl group-hover:bg-primary/20 transition-all"></div>
                    <div class="relative rounded-xl overflow-hidden shadow-xl aspect-square md:aspect-video">
                        <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDrK_Ayl-zo_88UbtvFOVZ0Wg-7xqDXWm0EwFSxE74Pg4-WEclTLjwu0GQZlEZXBREVHwC-99yhX7UtpWG9wVZlH-A8qLrqUrC8mLaOmLMJZoAjSJ6YFiHmLRefQpMpsLG5U1joTHHRhkXuXtQpWPvl-IwKRggJnWoMY04Zf6SkpndjtSFQGRXkzAUufEqAMWleSi6EfxWECa3aAygiPZGMptvf1gKvbD-KtjspSxPTD-k_vaDjUgu1jaFWHc8hgz8eiFlG8dTb4IE" alt="Golden Retriever in suite" />
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Bento Grid -->
        <section class="py-xl">
            <div class="text-center mb-xl">
                <h2 class="font-headline-md text-headline-md text-on-surface mb-sm" id="our-signature-services">Our Signature Services</h2>
                <div class="h-1 w-24 bg-primary mx-auto rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-12 gap-lg auto-rows-min">
                
                <!-- 1. Premium Boarding -->
                <div class="md:col-span-8 group relative bg-surface-container-lowest rounded-xl p-xl shadow-sm border border-outline-variant service-card-hover transition-all flex flex-col md:flex-row gap-lg overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-bl-full transition-all group-hover:w-40 group-hover:h-40"></div>
                    <div class="md:w-1/3">
                        <div class="icon-bg w-16 h-16 bg-primary-fixed rounded-xl flex items-center justify-center text-primary mb-md transition-transform duration-500">
                            <span class="material-symbols-outlined text-4xl">hotel</span>
                        </div>
                        <h3 class="font-headline-sm text-headline-sm mb-sm">
                            {{ $boardingRoom->tipe_kamar ?? 'Premium Boarding' }} Suite
                        </h3>
                        <p class="text-on-surface-variant font-body-md mb-md">
                            {{ $boardingRoom->fasilitas ?? 'Luxury overnight stays with personalized attention.' }}
                        </p>
                        <ul class="space-y-sm mb-lg">
                            @php 
                                $fasilitas = explode(',', $boardingRoom->fasilitas ?? 'AC, Kamar Luas, Kasur Empuk');
                            @endphp
                            @foreach($fasilitas as $item)
                            <li class="flex items-center gap-sm text-body-sm text-on-surface-variant">
                                <span class="material-symbols-outlined text-primary text-body-md" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                {{ trim($item) }}
                            </li>
                            @endforeach
                        </ul>
                        <div class="flex items-center justify-between">
                            <span class="text-primary font-bold text-lg">Rp {{ number_format($boardingRoom->harga_per_malam ?? 500000, 0, ',', '.') }}/malam</span>
                            <a href="/dashboard" class="text-primary font-label-md flex items-center gap-xs group-hover:translate-x-2 transition-transform">
                                Book Now <span class="material-symbols-outlined">arrow_right_alt</span>
                            </a>
                        </div>
                    </div>
                    <div class="md:w-2/3 h-48 md:h-full rounded-xl overflow-hidden relative">
                        <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAPppvTM8BLr_IL3tjOWJUk8ddHUy6rPdm8ckw_KNQ_9mEAmDnWy8Bva4353hf25EtzGTOQSDm2bpUazsrRbtnMRHVB4B1Py78JgP9UjJbZ5C765FujwSIo8oIZzRq_y7oLMR2BqVun79iYnjkog2QvQAs8cNbB1ZUVnARoEh-ZHK9BYhNQG5mxLLKqyN5ZuytsRnSqWQZAx29Zcl-Gv2pPZPZ5UlRuQ8l4ZUiYJUlG1xqw2HjR3jVqlPX0doEK1hsXeEQSltILD9U" alt="Luxury Room" />
                    </div>
                </div>

                <!-- 2. Professional Grooming -->
                <div class="md:col-span-4 bg-surface-container-lowest rounded-xl p-xl shadow-sm border border-outline-variant service-card-hover transition-all flex flex-col justify-between overflow-hidden relative">
                    <div class="icon-bg w-14 h-14 bg-secondary-fixed rounded-xl flex items-center justify-center text-secondary mb-md transition-transform duration-500">
                        <span class="material-symbols-outlined text-3xl">content_cut</span>
                    </div>
                    <div>
                        <h3 class="font-headline-sm text-headline-sm mb-sm">{{ $grooming->nama_layanan ?? 'Professional Grooming' }}</h3>
                        <p class="text-on-surface-variant font-body-sm mb-md">{{ $grooming->deskripsi ?? 'Complete spa experiences including stylish haircuts and baths.' }}</p>
                        <div class="rounded-lg overflow-hidden h-32 mb-md">
                            <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCQAzfCIMXFg_ZqOgra7o7d0Hr8-dnbfY3NsQP4WZQCVjeb7cObeXp49ZUFoFMY3CTXKSzIH9j6oATcla6w5v39o0qFSxoQK5e2x6rgJcTI92t2OMMGGb30bUQSjvvVvPFlxiW6N0JONhSSGpeBgdNfr7t8uNr2KGuRKAO4o2Yr2piELtojFTZk2in5NnELnn0l8VRbvkLLkwyIbz_jjWwFhp9I4U-PsJzSWGgNDXn1QhxJ489aqDVXDMdGeVyovqN_n0rbnmz3LhE" alt="Grooming" />
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold text-lg">Rp {{ number_format($grooming->harga ?? 150000, 0, ',', '.') }}</span>
                            <a href="/dashboard" class="text-primary font-label-md flex items-center gap-xs">
                                Book Now <span class="material-symbols-outlined">chevron_right</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 3. Medical Supervision -->
                <div class="md:col-span-4 bg-surface-container-lowest rounded-xl p-xl shadow-sm border border-outline-variant service-card-hover transition-all flex flex-col justify-between overflow-hidden">
                    <div class="icon-bg w-14 h-14 bg-tertiary-fixed rounded-xl flex items-center justify-center text-tertiary mb-md transition-transform duration-500">
                        <span class="material-symbols-outlined text-3xl">medical_services</span>
                    </div>
                    <div>
                        <h3 class="font-headline-sm text-headline-sm mb-sm">{{ $medical->nama_layanan ?? 'Medical Supervision' }}</h3>
                        <p class="text-on-surface-variant font-body-sm mb-md">{{ $medical->deskripsi ?? '24/7 health monitoring and medication administration.' }}</p>
                        <div class="bg-surface-container p-md rounded-lg mb-md">
                            <div class="flex items-center gap-sm">
                                <span class="material-symbols-outlined text-error">monitor_heart</span>
                                <span class="text-label-sm">Active Monitoring Active</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold text-lg">Rp {{ number_format($medical->harga ?? 100000, 0, ',', '.') }}</span>
                            <a href="/dashboard" class="text-primary font-label-md flex items-center gap-xs">
                                View Protocols <span class="material-symbols-outlined">chevron_right</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 4. Pet Training -->
                <div class="md:col-span-8 bg-surface-container-lowest rounded-xl p-xl shadow-sm border border-outline-variant service-card-hover transition-all flex flex-col md:flex-row-reverse gap-lg overflow-hidden">
                    <div class="md:w-1/3 flex flex-col justify-center">
                        <div class="icon-bg w-14 h-14 bg-primary-fixed rounded-xl flex items-center justify-center text-primary mb-md transition-transform duration-500">
                            <span class="material-symbols-outlined text-3xl">psychology</span>
                        </div>
                        <h3 class="font-headline-sm text-headline-sm mb-sm">{{ $training->nama_layanan ?? 'Pet Training' }}</h3>
                        <p class="text-on-surface-variant font-body-md mb-md">{{ $training->deskripsi ?? 'Positive reinforcement training focusing on obedience and social skills.' }}</p>
                        <div class="flex flex-wrap gap-xs mb-lg">
                            <span class="bg-surface-container text-on-surface px-sm py-xs rounded-full text-label-sm">Obedience</span>
                            <span class="bg-surface-container text-on-surface px-sm py-xs rounded-full text-label-sm">Socialization</span>
                            <span class="bg-surface-container text-on-surface px-sm py-xs rounded-full text-label-sm">Agility</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold text-lg">Rp {{ number_format($training->harga ?? 100000, 0, ',', '.') }}</span>
                            <a href="/dashboard" class="text-primary font-label-md flex items-center gap-xs">
                                Reserve Session <span class="material-symbols-outlined">chevron_right</span>
                            </a>
                        </div>
                    </div>
                    <div class="md:w-2/3 h-48 md:h-64 rounded-xl overflow-hidden shadow-inner">
                        <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBAo51YMshPGBZKucEvxC9yXUGrnCOl5JWU6KePQiOkv2m8UpNW8Myt0t6oxjml0erMfuSwW7MN7A9KCjNxBvcZthZUIftJ7oQFamF6LxvgyYuyqLCb1WdRw_v3peiW1yWms-xiHP6jSiOFkSDXe3GYgWDVqVPLVx084x7tlQwXbAq3oP6hbWVYb9nOyyHmDDY6v0kUMKPLWgZ33P_oRm4X_Q5qtZBLpK4bjsRh0AjNWJvvrMmuUGu9LhcNb5GpbWKfYG5ejrPE7NQ" alt="Dog Training" />
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Choose Us Section -->
        <section class="bg-surface-container-low py-xl mt-xl overflow-hidden">
            <div class="flex flex-col md:flex-row gap-xl items-center">
                <div class="md:w-1/2">
                    <h2 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface mb-lg">
                        Why Choose Our Services?
                    </h2>
                    <div class="space-y-lg">
                        <div class="flex gap-md">
                            <div class="bg-primary-container text-on-primary-container w-12 h-12 rounded-full flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined">groups</span>
                            </div>
                            <div>
                                <h4 class="font-headline-sm text-headline-sm mb-xs">Professional Staff</h4>
                                <p class="text-on-surface-variant text-body-md">Our team consists of certified pet handlers and lovers who treat every guest like family.</p>
                            </div>
                        </div>
                        <div class="flex gap-md">
                            <div class="bg-secondary-container text-on-secondary-container w-12 h-12 rounded-full flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined">shield_with_heart</span>
                            </div>
                            <div>
                                <h4 class="font-headline-sm text-headline-sm mb-xs">Safe Environment</h4>
                                <p class="text-on-surface-variant text-body-md">State-of-the-art security and 24/7 monitoring ensure your pet's safety.</p>
                            </div>
                        </div>
                        <div class="flex gap-md">
                            <div class="bg-surface-container-highest text-primary w-12 h-12 rounded-full flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined">workspace_premium</span>
                            </div>
                            <div>
                                <h4 class="font-headline-sm text-headline-sm mb-xs">Certified Quality</h4>
                                <p class="text-on-surface-variant text-body-md">We maintain the highest industry standards for cleanliness and nutrition.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 grid grid-cols-2 gap-md h-[400px]">
                    <div class="rounded-xl overflow-hidden shadow-lg h-full relative">
                        <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBCKhi2rKWGKK19DrEfbTCQC78DiOQ3B_XiLYkcfkhUrPWenLR_rbMTiBrKx2WM6p1Ihqr7dmGf-Hqj-nkAIWEVUvhZWWxAQoE9vAq5yAmdh7fwElKj0AisR9gPXkgumSVJCa9IZC-z1bz6JIPIzfSc_v73Wzgz6WTaWxKy64OJzZWPR5FcCemPeBuDzhpCGTcIdR5s8ym1BRdaNOfEPKhkcSU7sQmQs2Nqg3sMi5QZHnjj0Srfk6d1T4smiwSkfSAAZik_WO-kqUE" alt="Hand petting dog" />
                    </div>
                    <div class="space-y-md h-full">
                        <div class="rounded-xl overflow-hidden shadow-lg h-1/2">
                            <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDRx4YuruQBTRLQExhgDVGvNf5vz37sSbP6B_cGYIjb59dkouvfof-YZul7eztrkYd8osx-PYIaZ6P7vlPUGgVe8iyeqPzSr0MOfg2HHi39mlAFks1HtnW6D0kpVxOKaA7NAixprXyXT8ASoflzXf5trnEU4vnvt9xCBjMESg_5vUqi6qU8Lc81ALyTSsKUtjxlfRtfiKFVWhQj13QkrF7_87PHF1aRhZ6OlL54RTyklOtcTJ0vjTTI-Dm1sIhqiDdw8WNOVsXN0A4" alt="Monitoring station" />
                        </div>
                        <div class="rounded-xl bg-primary-container p-lg h-1/2 flex flex-col justify-center text-on-primary-container">
                            <span class="text-headline-lg font-bold">10k+</span>
                            <span class="text-body-sm opacity-90 uppercase tracking-widest font-bold">Happy Stays</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-xl">
            <div class="max-w-4xl mx-auto bg-inverse-surface text-inverse-on-surface rounded-2xl p-xl md:p-32 text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-64 h-64 bg-primary/20 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
                <div class="absolute bottom-0 right-0 w-64 h-64 bg-secondary/20 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>
                <h2 class="font-headline-lg text-headline-lg mb-md relative z-10">Ready to treat your pet to the best?</h2>
                <p class="text-body-lg mb-xl opacity-80 max-w-xl mx-auto relative z-10">Join thousands of happy pet parents and book your pet's next vacation or spa day with us.</p>
                <div class="flex flex-col sm:flex-row gap-md justify-center relative z-10">
                    <a href="/dashboard" class="bg-primary text-on-primary px-xl py-md rounded-lg font-label-md transition-all active:scale-95 shadow-lg inline-flex items-center justify-center">Book Your First Stay</a>
                    <a href="{{ route('why-us') }}" class="bg-surface-container-lowest text-on-surface px-xl py-md rounded-lg font-label-md transition-all hover:bg-surface active:scale-95 inline-flex items-center justify-center">Schedule a Tour</a>
                </div>
            </div>
        </section>

        <!-- FAB -->
        <a href="/dashboard" class="fixed bottom-lg right-lg bg-primary text-on-primary w-14 h-14 rounded-full shadow-xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all z-40 group">
            <span class="material-symbols-outlined text-2xl">add</span>
            <span class="absolute right-full mr-md bg-inverse-surface text-inverse-on-surface px-md py-sm rounded-lg text-label-sm whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity">Book a Service</span>
        </a>
    </div>
@endsection