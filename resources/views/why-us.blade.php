@extends('layouts.app')

@section('title', 'Why Us | PawStay Pet Hotels')

@section('content')
    <style>
        .bento-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(2, minmax(180px, auto));
            gap: 24px;
        }
        @media (max-width: 768px) {
            .bento-grid {
                grid-template-columns: 1fr;
                grid-template-rows: auto;
            }
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, padding 0.3s ease;
        }
        .accordion-content.active {
            max-height: 500px;
        }
    </style>

    <div class="container mx-auto px-margin-mobile md:px-margin-desktop py-xl space-y-xl">

        {{-- Hero Section: Our Mission --}}
        <section class="grid grid-cols-1 md:grid-cols-2 gap-xl items-center bg-surface-container-lowest rounded-xl p-lg shadow-sm border border-outline-variant/30">
            <div class="space-y-md">
                <span class="text-primary font-label-md tracking-wider uppercase">Our Mission</span>
                <h1 class="font-headline-lg text-headline-lg text-on-surface">A Second Home for Your Furry Family</h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                    At PawStay, we believe a hotel for pets shouldn't just be a place to stay—it should be a place where they thrive. Since 2018, our mission has been to provide an environment so warm and engaging that your pet won't even realize you're gone. We combine luxury with love, ensuring safety through technology and comfort through genuine care.
                </p>
                <div class="flex gap-md pt-md">
                    <div class="flex items-center gap-base">
                        <span class="material-symbols-outlined text-primary">favorite</span>
                        <span class="font-label-md">Compassionate Care</span>
                    </div>
                    <div class="flex items-center gap-base">
                        <span class="material-symbols-outlined text-primary">house</span>
                        <span class="font-label-md">Home-like Comfort</span>
                    </div>
                </div>
            </div>
            <div class="relative group">
                <div class="absolute -inset-2 bg-secondary-container/20 rounded-[2rem] blur-xl transition-all group-hover:blur-2xl"></div>
                <img 
                    class="relative rounded-xl object-cover w-full aspect-[4/3] shadow-lg" 
                    alt="A professional, heart-warming photograph of a happy golden retriever being hugged by a smiling caregiver" 
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuA0Osd_phiyCB45pMQ-aFxSYi9r-Z2_xDJlI-KHymyHvg0IzEZ8So88xPumIafz1dCiUTPLe0il92kG3qTtrwFoCAV54XpFTpqGGfJCUysviTBGIkY5RdaZWo07UeXhxdgQmi3DgTiS1TD2uTvR0DG7gLHX40OnDAz0pOfBO0iDcf-2CAjikKw1o4PdwNoFItYp32bmszTp-63iF0nUBo0kW-XcmcYVGMm93T73EsaaPOQlouoXgtS1imuX_ID8rcvNhFyv3NVIxiA" 
                />
            </div>
        </section>

        {{-- The PawStay Difference: Bento Grid --}}
        <section class="space-y-lg">
            <div class="text-center max-w-2xl mx-auto space-y-sm">
                <h2 class="font-headline-md text-headline-md text-on-surface">The PawStay Difference</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">
                    We go beyond the basics to ensure your pet's safety, security, and happiness through premium amenities and expert staff.
                </p>
            </div>
            <div class="bento-grid">
                {{-- Feature 1: Certified Caregivers --}}
                <div class="md:col-span-2 md:row-span-1 bg-surface-container-low p-lg rounded-xl border border-outline-variant/20 hover:shadow-md transition-shadow flex flex-col justify-between">
                    <div class="space-y-sm">
                        <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary">verified_user</span>
                        </div>
                        <h3 class="font-headline-sm text-headline-sm">Certified Caregivers</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">
                            Our staff undergoes rigorous behavioral and medical training. Every team member is pet CPR and First Aid certified, providing professional peace of mind.
                        </p>
                    </div>
                </div>
                
                {{-- Feature 2: Biometric Security --}}
                <div class="md:col-span-1 md:row-span-1 bg-surface-container-high p-lg rounded-xl border border-outline-variant/20 flex flex-col items-center text-center justify-center space-y-md">
                    <span class="material-symbols-outlined text-primary text-4xl">fingerprint</span>
                    <h3 class="font-label-md text-label-md">Biometric Security</h3>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">Secure check-in and room access.</p>
                </div>

                {{-- Feature 3: Real-time Webcams --}}
                <div class="md:col-span-1 md:row-span-2 bg-secondary-container p-lg rounded-xl border border-outline-variant/20 flex flex-col">
                    <div class="space-y-sm flex-grow">
                        <span class="material-symbols-outlined text-on-secondary-container text-4xl">videocam</span>
                        <h3 class="font-headline-sm text-headline-sm text-on-secondary-container">Live Cam Access</h3>
                        <p class="font-body-sm text-body-sm text-on-secondary-container/80">
                            Missing your buddy? Log in anytime from our app to watch your pet play or nap in high-definition video feeds.
                        </p>
                    </div>
                    <img 
                        class="rounded-lg mt-md object-cover h-32 w-full" 
                        alt="Smartphone screen showing real-time webcam feed of dogs playing" 
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAhKkm69P6fMX8fFFdmRw-Af7kgbpS_r5n5BmJx05U9H8QkvusN-81R4CD5F9RXeNtV-O6CZAHXbUVik0yDtVMufIskvQ3_OrW7E73JVW_TY9hI2u8pdqYaQNMVQq_5PO9Hi_icwo0Z9n5kzfpVdW-mT6deEWzeHcgE33JIAg-Vy7NNhCQXz3_RiYpbUVDUTHJxA5xA0AwH2uB5clhqSunkvjdkN2X-R3-T5YiVO8Dnc0zifZXivJSl_HlOgIzJHrBE18-A-gJ-Oeo" 
                    />
                </div>

                {{-- Feature 4: Medical Care --}}
                <div class="md:col-span-1 md:row-span-1 bg-surface-container-lowest p-lg rounded-xl border border-outline-variant/20 shadow-sm flex flex-col justify-center gap-xs">
                    <span class="material-symbols-outlined text-primary">medical_services</span>
                    <h3 class="font-label-md">24/7 Vet on Call</h3>
                </div>

                {{-- Feature 5: Experience Stats --}}
                <div class="md:col-span-2 md:row-span-1 bg-primary text-on-primary p-lg rounded-xl flex items-center justify-around gap-md">
                    <div class="text-center">
                        <div class="text-3xl font-bold">2018</div>
                        <div class="text-label-sm opacity-90 uppercase">Established</div>
                    </div>
                    <div class="w-px h-12 bg-on-primary/20"></div>
                    <div class="text-center">
                        <div class="text-3xl font-bold">2,000+</div>
                        <div class="text-label-sm opacity-90 uppercase">Happy Pets</div>
                    </div>
                    <div class="w-px h-12 bg-on-primary/20"></div>
                    <div class="text-center">
                        <div class="text-3xl font-bold">4.9/5</div>
                        <div class="text-label-sm opacity-90 uppercase">Avg. Rating</div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Experience & Trust Section --}}
        <section class="grid grid-cols-1 md:grid-cols-3 gap-lg py-xl">
            <div class="md:col-span-1 space-y-md">
                <h2 class="font-headline-md text-headline-md text-on-surface">Proven Excellence</h2>
                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                    With over 5 years of specialized pet hospitality experience, we've mastered the art of canine and feline comfort. Our facility is designed to reduce anxiety and promote healthy social interaction.
                </p>
                <div class="p-md bg-secondary-fixed/30 rounded-xl border border-secondary-fixed">
                    <p class="italic text-on-secondary-fixed font-body-sm">
                        "The only place I trust with my senior pup. The staff treats him like their own."
                    </p>
                    <p class="mt-sm font-label-sm text-secondary">— Sarah J., Member since 2019</p>
                </div>
            </div>
            <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-md">
                <div class="group overflow-hidden rounded-xl bg-surface shadow-sm border border-outline-variant/10">
                    <img 
                        class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500" 
                        alt="Veterinary station inside a pet hotel" 
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCjv0c5OsWf_7gr1SL6EMaiGh3U_wq-R4xh6PNMnNAHDSoLTTfM5zARtPVQGSLhyReRXgAbGoFV3HGNeJxHYj23PHTuiwJt3m3tjlddUI5pI37TZCQThNAPmdFeQYXfLhMPYWm1ntIKEbmNwvZ08fqonUZ5L4YxGzPBOhiol-_BtJtgYmK8gFe59IwVoOUSX1L1S3DVDLnpPhlLYUWtk3poCY7ASC_MxHqtx0Cew4Cma5wzFZlprWBMNZhsqftaaB6kIxKgb0hBe34" 
                    />
                    <div class="p-md">
                        <h4 class="font-headline-sm text-headline-sm">Health First</h4>
                        <p class="text-body-sm text-on-surface-variant">Daily wellness checks and customized feeding plans for every guest.</p>
                    </div>
                </div>
                <div class="group overflow-hidden rounded-xl bg-surface shadow-sm border border-outline-variant/10">
                    <img 
                        class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500" 
                        alt="Safe outdoor play area for dogs" 
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBTu0eZ3IFwKUVJ3RJ4H4dXoktd8026R-MQvavpywbOgM__cHck-ajMWb06w4UaTioMBrqItHcBwJFqvdJt78SeOVrb_5B2t39RiZioF9Yq8oUa8gx0r4YuFaTulQN53NrsakzHYzp0PO6OWS13MB8MG_rl36QFrvJttaK3Ybb_JbXKgZNL5HUJgLMjefKJxJ74gdWXK_gVhZGJDYAo3Npowuaj3IeVGZQG0qod45XwQyJc3EyP_BBUs6XNMRm8skoSXp1e7bqSzh0" 
                    />
                    <div class="p-md">
                        <h4 class="font-headline-sm text-headline-sm">Active Lifestyles</h4>
                        <p class="text-body-sm text-on-surface-variant">Scheduled group play and 1-on-1 enrichment activities tailored to your pet.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- FAQ Section --}}
        <section class="max-w-3xl mx-auto space-y-lg pt-xl">
            <div class="text-center space-y-sm">
                <h2 class="font-headline-md text-headline-md text-on-surface">Common Questions</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">
                    Everything you need to know before your pet's first stay.
                </p>
            </div>
            <div class="space-y-md">
                {{-- Accordion Item 1 --}}
                <div class="border border-outline-variant rounded-xl bg-surface-container-lowest overflow-hidden">
                    <button class="w-full flex justify-between items-center p-lg text-left hover:bg-surface-container-low transition-colors" onclick="toggleAccordion(this)" type="button">
                        <span class="font-headline-sm text-headline-sm text-on-surface">What vaccinations are required?</span>
                        <span class="material-symbols-outlined transition-transform duration-300">expand_more</span>
                    </button>
                    <div class="accordion-content">
                        <div class="p-lg pt-0 text-on-surface-variant font-body-md border-t border-outline-variant/10">
                            For the safety of all guests, we require up-to-date Rabies, Distemper/Parvo (DHPP), and Bordetella vaccinations. We also recommend Canine Influenza vaccinations.
                        </div>
                    </div>
                </div>

                {{-- Accordion Item 2 --}}
                <div class="border border-outline-variant rounded-xl bg-surface-container-lowest overflow-hidden">
                    <button class="w-full flex justify-between items-center p-lg text-left hover:bg-surface-container-low transition-colors" onclick="toggleAccordion(this)" type="button">
                        <span class="font-headline-sm text-headline-sm text-on-surface">Can I bring my pet's own food?</span>
                        <span class="material-symbols-outlined transition-transform duration-300">expand_more</span>
                    </button>
                    <div class="accordion-content">
                        <div class="p-lg pt-0 text-on-surface-variant font-body-md border-t border-outline-variant/10">
                            Absolutely! In fact, we encourage it to prevent digestive upset. Please bring pre-portioned bags for each meal. If you prefer, we also offer our high-quality house blend.
                        </div>
                    </div>
                </div>

                {{-- Accordion Item 3 --}}
                <div class="border border-outline-variant rounded-xl bg-surface-container-lowest overflow-hidden">
                    <button class="w-full flex justify-between items-center p-lg text-left hover:bg-surface-container-low transition-colors" onclick="toggleAccordion(this)" type="button">
                        <span class="font-headline-sm text-headline-sm text-on-surface">What happens in a medical emergency?</span>
                        <span class="material-symbols-outlined transition-transform duration-300">expand_more</span>
                    </button>
                    <div class="accordion-content">
                        <div class="p-lg pt-0 text-on-surface-variant font-body-md border-t border-outline-variant/10">
                            We have a vet on call 24/7. In the event of an emergency, we will immediately contact you and transport your pet to our partner veterinary clinic or the nearest emergency animal hospital.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- CTA Section --}}
        <section class="relative bg-surface-container-highest rounded-[2rem] p-xl overflow-hidden text-center space-y-lg border border-outline-variant/20">
            <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 w-64 h-64 bg-primary/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 translate-y-1/2 -translate-x-1/4 w-64 h-64 bg-secondary-container/20 rounded-full blur-3xl"></div>
            <div class="relative z-10 space-y-md">
                <h2 class="font-headline-lg text-headline-lg text-on-surface">Ready for a Stress-Free Stay?</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl mx-auto">
                    Join our family of 2,000+ happy pets. Book your tour or reservation today and see why we're the most trusted name in pet hospitality.
                </p>
                <div class="flex flex-col sm:flex-row gap-md justify-center pt-md">
                    <a href="/dashboard" class="bg-primary text-on-primary px-xl py-md rounded-xl font-label-md shadow-lg shadow-primary/20 hover:bg-primary-container transition-all text-center block">
                        Reserve a Room
                    </a>
                    <a href="{{ route('rooms') }}" class="bg-surface-container-lowest text-primary border border-primary px-xl py-md rounded-xl font-label-md hover:bg-surface-container-low transition-all text-center block">
                        Take a Virtual Tour
                    </a>
                </div>
                <div class="flex items-center justify-center gap-xs text-on-surface-variant pt-base">
                    <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="font-label-sm ml-sm">Rated 4.9/5 by our community</span>
                </div>
            </div>
        </section>
    </div>

    <script>
        function toggleAccordion(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('.material-symbols-outlined');
            
            content.classList.toggle('active');
            
            if (content.classList.contains('active')) {
                icon.style.transform = 'rotate(180deg)';
            } else {
                icon.style.transform = 'rotate(0deg)';
            }
        }
    </script>
@endsection