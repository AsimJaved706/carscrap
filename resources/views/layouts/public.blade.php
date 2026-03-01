<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Sell Your Scrap Car Today | idontwantmycaranymore.co.uk')</title>
    <meta name="description"
        content="@yield('meta_description', 'We buy scrap cars in Birmingham and surrounding areas. Turn your non-runner, MOT failure or damaged car into cash. Free collection and instant bank transfer.')">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="font-['Inter',sans-serif] text-slate-800 antialiased selection:bg-[#16A34A] selection:text-white bg-[#F8FAFC] flex flex-col min-h-screen">

    <!-- Top Contact Bar -->
    <div class="bg-slate-900 text-slate-300 text-xs py-2 hidden sm:block border-b border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex items-center gap-6">
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $site_settings['contact_phone'] ?? '01210000000') }}"
                    class="flex items-center hover:text-white transition">
                    <svg class="w-4 h-4 mr-1.5 text-[#16A34A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                        </path>
                    </svg>
                    {{ $site_settings['contact_phone'] ?? '0121 000 0000' }}
                </a>
                <a href="mailto:{{ $site_settings['contact_email'] ?? 'info@idontwantmycaranymore.co.uk' }}"
                    class="flex items-center hover:text-white transition">
                    <svg class="w-4 h-4 mr-1.5 text-[#16A34A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    {{ $site_settings['contact_email'] ?? 'info@idontwantmycaranymore.co.uk' }}
                </a>
            </div>
            <div class="flex items-center gap-2 font-medium">
                <span class="w-2 h-2 rounded-full bg-[#16A34A] animate-pulse"></span>
                We are currently buying cars in the West Midlands
            </div>
        </div>
    </div>

    <!-- Main Navigation Header -->
    <header class="bg-[#0F172A] py-4 text-white sticky top-0 z-50 shadow-lg shadow-black/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">

            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-2 cursor-pointer group">
                <img src="{{ asset('images/client/Logo.png') }}" alt="idontwantmycaranymore logo"
                    class="h-10 sm:h-12 w-auto object-contain transition-transform group-hover:scale-105">
            </a>

            <!-- Desktop Links -->
            <nav class="hidden md:flex flex-1 justify-center space-x-8">
                <a href="{{ route('home') }}"
                    class="text-slate-300 hover:text-white font-semibold text-sm tracking-wide transition">Home</a>
                <a href="{{ route('home') }}#services"
                    class="text-slate-300 hover:text-white font-semibold text-sm tracking-wide transition">What We
                    Buy</a>
                <a href="{{ route('home') }}#locations"
                    class="text-slate-300 hover:text-white font-semibold text-sm tracking-wide transition">Locations</a>
            </nav>

            <!-- CTA -->
            <div class="flex items-center gap-4">
                <a href="{{ route('quote') }}"
                    class="bg-[#F97316] hover:bg-orange-600 text-white px-5 sm:px-6 py-2.5 rounded-full font-bold transition shadow-[0_4px_14px_0_rgba(249,115,22,0.39)] hover:shadow-[0_6px_20px_rgba(249,115,22,0.23)] transform hover:-translate-y-0.5 inline-flex items-center text-sm">
                    Get a Free Quote
                    <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <main class="flex-grow flex flex-col">
        @yield('content')
    </main>

    <!-- Professional Footer -->
    <footer
        class="bg-[#0F172A] text-slate-400 border-t border-slate-800/80 pt-16 pb-8 mt-auto relative overflow-hidden">
        <!-- Background accent -->
        <div
            class="absolute top-0 right-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-[#16A34A]/5 blur-3xl pointer-events-none">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12 border-b border-slate-800 pb-12">

                <!-- Brand Col -->
                <div class="col-span-1 md:col-span-2 lg:col-span-1">
                    <a href="{{ route('home') }}" class="inline-block mb-6">
                        <img src="{{ asset('images/client/Logo.png') }}" alt="idontwantmycaranymore logo"
                            class="h-12 w-auto object-contain filter brightness-0 invert">
                    </a>
                    <p class="text-sm leading-relaxed mb-6">
                        We are a premium, heavily-rated scrap car buying service operating locally across the West
                        Midlands. We offer instant cash, free collection, and handle all your DVLA paperwork.
                    </p>
                    <div class="flex items-center gap-3 text-white">
                        @if(!empty($site_settings['facebook_url']))
                            <a href="{{ $site_settings['facebook_url'] }}" target="_blank" rel="noopener noreferrer"
                                class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-[#16A34A] transition cursor-pointer">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                </svg>
                            </a>
                        @endif
                        @if(!empty($site_settings['instagram_url']))
                            <a href="{{ $site_settings['instagram_url'] }}" target="_blank" rel="noopener noreferrer"
                                class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-[#16A34A] transition cursor-pointer">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Links Col -->
                <div>
                    <h4 class="text-white font-bold text-lg mb-6">Quick Links</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-[#16A34A] transition flex items-center"><svg
                                    class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>Home</a></li>
                        <li><a href="{{ route('quote') }}"
                                class="hover:text-[#16A34A] transition flex items-center"><svg class="w-3 h-3 mr-2"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>Get a Free Quote</a></li>
                        <li><a href="{{ route('home') }}#services"
                                class="hover:text-[#16A34A] transition flex items-center"><svg class="w-3 h-3 mr-2"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>How It Works</a></li>
                        <li><a href="{{ route('home') }}#locations"
                                class="hover:text-[#16A34A] transition flex items-center"><svg class="w-3 h-3 mr-2"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>Areas We Cover</a></li>
                    </ul>
                </div>



                <!-- Contact Col -->
                <div>
                    <h4 class="text-white font-bold text-lg mb-6">Contact Us</h4>
                    <ul class="space-y-4 text-sm">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#F97316] mr-3 shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <span
                                class="text-white font-medium">{{ $site_settings['contact_phone'] ?? '0121 000 0000' }}</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#F97316] mr-3 shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="text-white font-medium">{{ $site_settings['contact_email'] ??
                                'info@idontwantmycaranymore.co.uk' }}</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#F97316] mr-3 shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <span
                                    class="block text-white font-medium whitespace-pre-line">{{ $site_settings['business_hours'] ?? "Mon - Sat: 8:00 AM - 6:00 PM\nSun: Closed" }}</span>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="flex flex-col md:flex-row justify-between items-center text-sm">
                <p>&copy; {{ date('Y') }} idontwantmycaranymore.co.uk. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-white transition">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    @stack('scripts')
</body>

</html>