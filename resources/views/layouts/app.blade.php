<!DOCTYPE html>
<html class="light scroll-smooth" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'PetStay | Premium Pet Hotel & Care')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-surface": "#221a16", "surface-tint": "#ad330d", "outline-variant": "#e1bfb6",
                        "on-error-container": "#93000a", "on-secondary": "#ffffff", "tertiary-fixed": "#e9e2cc",
                        "on-surface-variant": "#59413b", "surface-container-lowest": "#ffffff", "tertiary": "#605c4b",
                        "outline": "#8d7169", "surface-container-highest": "#f0dfd9", "on-primary-container": "#fffbff",
                        "inverse-primary": "#ffb5a0", "surface": "#fff8f6", "secondary-container": "#fec330",
                        "on-error": "#ffffff", "surface-container-high": "#f6e5df", "error-container": "#ffdad6",
                        "tertiary-fixed-dim": "#ccc6b1", "primary": "#a9310a", "on-tertiary-fixed": "#1e1c0e",
                        "on-background": "#221a16", "inverse-on-surface": "#ffede7", "on-tertiary": "#ffffff",
                        "on-secondary-fixed": "#261a00", "surface-variant": "#f0dfd9", "secondary-fixed-dim": "#f8bd2a",
                        "secondary": "#795900", "tertiary-container": "#797562", "surface-dim": "#e8d6d1",
                        "surface-container": "#fceae4", "secondary-fixed": "#ffdfa0", "primary-container": "#cb4922",
                        "inverse-surface": "#382e2a", "on-primary-fixed": "#3b0900", "surface-container-low": "#fff1ec",
                        "background": "#fff8f6", "on-secondary-container": "#6f5100", "on-tertiary-fixed-variant": "#4a4737",
                        "surface-bright": "#fff8f6", "on-primary": "#ffffff", "on-tertiary-container": "#fffbff",
                        "primary-fixed": "#ffdbd1", "on-primary-fixed-variant": "#872100", "error": "#ba1a1a",
                        "primary-fixed-dim": "#ffb5a0", "on-secondary-fixed-variant": "#5c4300"
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                    spacing: { "margin-mobile": "16px", "lg": "24px", "sm": "12px", "margin-desktop": "64px", "gutter": "16px", "xs": "4px", "xl": "32px", "base": "8px", "md": "16px" },
                    fontFamily: {
                        "headline-md": ["Inter"], "headline-lg-mobile": ["Inter"], "body-sm": ["Inter"],
                        "headline-lg": ["Inter"], "label-sm": ["Inter"], "body-md": ["Inter"],
                        "headline-sm": ["Inter"], "label-md": ["Inter"], "body-lg": ["Inter"],
                        "title-md": ["Inter"], "title-lg": ["Inter"], "display-lg": ["Inter"], "caption": ["Inter"]
                    },
                    fontSize: {
                        "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                        "headline-lg-mobile": ["28px", {"lineHeight": "36px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                        "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "label-sm": ["12px", {"lineHeight": "16px", "letterSpacing": "0.02em", "fontWeight": "500"}],
                        "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                        "headline-sm": ["20px", {"lineHeight": "28px", "fontWeight": "600"}],
                        "label-md": ["14px", {"lineHeight": "16px", "letterSpacing": "0.01em", "fontWeight": "600"}],
                        "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                        "title-md": ["16px", {"lineHeight": "24px", "fontWeight": "600"}],
                        "title-lg": ["20px", {"lineHeight": "28px", "fontWeight": "600"}],
                        "display-lg": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "caption": ["12px", {"lineHeight": "16px", "fontWeight": "400"}]
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined { 
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; 
            vertical-align: middle; 
        }
        .active-nav-border { 
            position: relative; 
        }
        .active-nav-border::after { 
            content: ''; 
            position: absolute; 
            bottom: -4px; 
            left: 0; 
            width: 100%; 
            height: 2px; 
            background-color: currentColor; 
        }
        .hero-gradient { 
            background: linear-gradient(135deg, rgba(169, 49, 10, 0.05) 0%, rgba(254, 195, 48, 0.05) 100%); 
        }
        .glass-card { 
            background: rgba(255, 255, 255, 0.85); 
            backdrop-filter: blur(12px); 
            border: 1px solid rgba(225, 191, 182, 0.3); 
        }
        .paw-pattern { 
            background-image: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M10 10c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm10 0c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm10 0c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zM15 20c2.2 0 4-1.8 4-4s-1.8-4-4-4-4 1.8-4 4 1.8 4 4 4zm10 0c2.2 0 4-1.8 4-4s-1.8-4-4-4-4 1.8-4 4 1.8 4 4 4z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E"); 
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md overflow-x-hidden">

    <header class="bg-surface dark:bg-surface-dim border-b border-outline-variant flex justify-between items-center w-full px-lg h-16 sticky top-0 z-40">
        <div class="flex items-center gap-md">
            <a href="/" class="font-headline-md text-headline-md font-bold text-primary">PetStay</a>
        </div>
        
        <nav class="hidden md:flex items-center gap-lg">
            <a class="{{ request()->routeIs('landing') ? 'text-primary font-bold active-nav-border' : 'text-on-surface-variant' }} font-title-md text-title-md hover:bg-surface-container-high transition-colors px-sm py-xs rounded" 
               href="{{ route('landing') }}">Home</a>
            <a class="{{ request()->routeIs('services') ? 'text-primary font-bold active-nav-border' : 'text-on-surface-variant' }} font-title-md text-title-md hover:bg-surface-container-high transition-colors px-sm py-xs rounded" 
               href="{{ route('services') }}">Services</a>
            <a class="{{ request()->routeIs('rooms') ? 'text-primary font-bold active-nav-border' : 'text-on-surface-variant' }} font-title-md text-title-md hover:bg-surface-container-high transition-colors px-sm py-xs rounded" 
               href="{{ route('rooms') }}">Rooms</a>
            <a class="{{ request()->routeIs('why-us') ? 'text-primary font-bold active-nav-border' : 'text-on-surface-variant' }} font-title-md text-title-md hover:bg-surface-container-high transition-colors px-sm py-xs rounded" 
               href="{{ route('why-us') }}">Why Us</a>
        </nav>

        <div class="flex items-center gap-md">
            @auth('admin')
                <a href="/admin" class="bg-primary text-on-primary px-4 py-2 rounded-lg font-title-md text-title-md hover:opacity-90 transition-all flex items-center gap-xs">
                    <span class="material-symbols-outlined">admin_panel_settings</span>
                    <span class="hidden sm:inline">Admin Panel</span>
                </a>
            @elseauth('pelanggan')
                <a href="/dashboard" class="bg-primary text-on-primary px-4 py-2 rounded-lg font-title-md text-title-md hover:opacity-90 transition-all flex items-center gap-xs">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span class="hidden sm:inline">Dashboard</span>
                </a>
            @else
                <a href="/dashboard/login" class="text-primary border border-primary px-4 py-2 rounded-lg font-title-md text-title-md hover:bg-primary/5 transition-all">
                    Login
                </a>
                <a href="/admin/login" class="text-on-surface-variant font-medium text-title-md hover:underline hidden sm:block">
                    Admin
                </a>
            @endauth
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-surface-container-lowest pt-xl pb-lg border-t border-outline-variant mt-xl">
        <div class="container mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-xl mb-xl">
                <div class="col-span-1 md:col-span-1">
                    <span class="font-headline-md text-headline-md font-bold text-primary mb-md block">PetStay</span>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-lg">Menentukan standar baru untuk akomodasi dan perawatan hewan mewah sejak 2018.</p>
                    <div class="flex gap-md">
                        <a class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all" href="#">
                            <span class="material-symbols-outlined text-xl">face_nod</span>
                        </a>
                        <a class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all" href="#">
                            <span class="material-symbols-outlined text-xl">camera</span>
                        </a>
                        <a class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all" href="#">
                            <span class="material-symbols-outlined text-xl">alternate_email</span>
                        </a>
                    </div>
                </div>
                <div>
                    <h6 class="font-title-md text-title-md text-primary mb-lg">Tautan Cepat</h6>
                    <ul class="space-y-sm">
                        <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors" href="#rooms">Kamar Tersedia</a></li>
                        <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors" href="#services">Grooming & Spa</a></li>
                        <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">Paket Harga</a></li>
                    </ul>
                </div>
                <div>
                    <h6 class="font-title-md text-title-md text-primary mb-lg">Dukungan</h6>
                    <ul class="space-y-sm">
                        <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">Hubungi Support</a></li>
                        <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">FAQ</a></li>
                        <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">Kebijakan Privasi</a></li>
                    </ul>
                </div>
                <div>
                    <h6 class="font-title-md text-title-md text-primary mb-lg">Hubungi Kami</h6>
                    <div class="space-y-md">
                        <div class="flex items-start gap-sm text-on-surface-variant">
                            <span class="material-symbols-outlined text-primary">location_on</span>
                            <p class="font-body-md text-body-md">Jl. Sudirman No. 12,<br/>Jakarta Pusat, Indonesia</p>
                        </div>
                        <div class="flex items-center gap-sm text-on-surface-variant">
                            <span class="material-symbols-outlined text-primary">call</span>
                            <p class="font-body-md text-body-md">0812-3456-7801</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-lg border-t border-outline-variant flex flex-col md:flex-row justify-between items-center gap-md">
                <p class="font-caption text-caption text-on-surface-variant">© 2026 PetStay Hotel. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Micro-interaction
        const cards = document.querySelectorAll('.bg-surface-container-lowest, .border-2');
        cards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-8px)';
                card.style.transition = 'transform 0.3s ease';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if(target) target.scrollIntoView({ behavior: 'smooth' });
            });
        });
    </script>
</body>
</html>