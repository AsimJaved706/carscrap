@extends('layouts.public')

@section('title', 'Sell Your Scrap, MOT Failure or Unwanted Car | idontwantmycaranymore.co.uk')

@section('content')
    <!-- Hero Banner -->
    <section class="relative bg-gradient-to-br from-[#0F172A] to-slate-900 text-white py-24 lg:py-36 overflow-hidden">
        <!-- Abstract Shapes -->
        <div
            class="absolute top-0 right-0 -mr-20 -mt-20 w-[600px] h-[600px] rounded-full bg-[#16A34A]/20 blur-3xl point-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 -ml-40 -mb-40 w-[500px] h-[500px] rounded-full bg-[#F97316]/20 blur-3xl point-events-none">
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center flex flex-col items-center">

            <div
                class="inline-flex items-center gap-2 mb-6 px-4 py-2 rounded-full bg-slate-800/80 border border-slate-700 backdrop-blur-sm">
                <span class="w-2.5 h-2.5 rounded-full bg-[#16A34A] animate-pulse"></span>
                <span class="text-sm font-semibold tracking-wide text-slate-300">Buying cars right now in West
                    Midlands</span>
            </div>

            <h1 class="text-5xl sm:text-6xl font-black tracking-tight mb-8 leading-[1.1] max-w-4xl mx-auto">
                Turn Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#16A34A] to-green-300">Scrap
                    or Non-Working</span> Car Into Cash
            </h1>

            <p class="text-xl sm:text-2xl text-slate-300 font-medium mb-10 max-w-2xl mx-auto">
                Fill in your details online and we will call you to discuss the price. Free collection included.
            </p>

            <a href="{{ route('quote') }}"
                class="group relative inline-flex items-center justify-center px-8 py-5 text-xl font-bold text-white transition-all duration-300 bg-[#16A34A] rounded-2xl shadow-[0_15px_30px_-5px_rgba(22,163,74,0.4)] hover:shadow-[0_20px_40px_-5px_rgba(22,163,74,0.6)] hover:bg-green-600 hover:-translate-y-1 overflow-hidden">
                <span
                    class="absolute w-0 h-0 transition-all duration-500 ease-out bg-white rounded-full group-hover:w-56 group-hover:h-56 opacity-10"></span>
                <span class="relative">Get My Free Quote Now</span>
                <svg class="relative w-6 h-6 ml-3 transform group-hover:translate-x-1 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3">
                    </path>
                </svg>
            </a>

            <div class="flex flex-wrap justify-center gap-6 mt-14 text-sm font-medium text-slate-400">
                <div
                    class="flex items-center bg-slate-800/50 px-4 py-2 rounded-lg backdrop-blur-sm border border-slate-700/50">
                    <svg class="h-5 w-5 text-[#16A34A] mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg> Instant Bank Transfer
                </div>
                <div
                    class="flex items-center bg-slate-800/50 px-4 py-2 rounded-lg backdrop-blur-sm border border-slate-700/50">
                    <svg class="h-5 w-5 text-[#16A34A] mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg> Zero Hidden Fees
                </div>
                <div
                    class="flex items-center bg-slate-800/50 px-4 py-2 rounded-lg backdrop-blur-sm border border-slate-700/50">
                    <svg class="h-5 w-5 text-[#16A34A] mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg> DVLA Notified For You
                </div>
            </div>

        </div>
    </section>

    <!-- Images & Context Grid -->
    <section id="services" class="py-20 bg-white relative scroll-mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 max-w-3xl mx-auto">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0F172A] mb-4">We buy scrap and damaged cars</h2>
                <div class="w-16 h-1.5 bg-[#F97316] mx-auto rounded-full mb-6"></div>
                <p class="text-lg text-slate-600">Don't let a broken car sit on your driveway. We take the hassle out of
                    selling your vehicle, no matter how badly damaged or old it might be.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <!-- Card 1 -->
                <div
                    class="bg-slate-50 rounded-3xl overflow-hidden group shadow-md hover:shadow-xl transition duration-300">
                    <div class="h-56 overflow-hidden relative">
                        <img src="{{ asset('images/client/1772231266734.png') }}" alt="Scrap Junkyard"
                            class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 font-bold text-white text-xl">Scrap Cars</div>
                    </div>
                    <div class="p-6">
                        <p class="text-slate-600 leading-relaxed">End-of-life vehicles (ELVs) that belong in the
                            scrapyard. We recycle them responsibly at Authorized Treatment Facilities.</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div
                    class="bg-slate-50 rounded-3xl overflow-hidden group shadow-md hover:shadow-xl transition duration-300">
                    <div class="h-56 overflow-hidden relative">
                        <img src="{{ asset('images/client/1772231461280.png') }}" alt="Broken Engine"
                            class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 font-bold text-white text-xl">MOT Failures</div>
                    </div>
                    <div class="p-6">
                        <p class="text-slate-600 leading-relaxed">Failed its MOT because of emissions, brakes, or
                            structural rust? It's often cheaper to sell it to us than to fix it.</p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div
                    class="bg-slate-50 rounded-3xl overflow-hidden group shadow-md hover:shadow-xl transition duration-300">
                    <div class="h-56 overflow-hidden relative">
                        <img src="{{ asset('images/client/1772231667620.png') }}" alt="Car Accident"
                            class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 bg-center">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 font-bold text-white text-xl">Accident Damaged</div>
                    </div>
                    <div class="p-6">
                        <p class="text-slate-600 leading-relaxed">Insurance write-offs, bodywork damage, or severely
                            crashed vehicles. Get cash out of your misfortune instantly.</p>
                    </div>
                </div>
            </div>

            <div class="mt-20 mb-10 text-center">
                <h3 class="text-3xl font-extrabold text-[#0F172A] mb-4">Recent Collections</h3>
                <div class="w-16 h-1.5 bg-[#16A34A] mx-auto rounded-full mb-8"></div>
                <p class="text-slate-600 max-w-2xl mx-auto mb-10">Take a look at some of the vehicles we've recently bought
                    and collected around the West Midlands.</p>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 px-4 sm:px-0">
                    <div class="col-span-2 row-span-2 overflow-hidden rounded-2xl group shadow-sm">
                        <img src="{{ asset('images/client/1772231274686.png') }}" alt="Recent Scrap Car Collection"
                            class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="overflow-hidden rounded-2xl group shadow-sm">
                        <img src="{{ asset('images/client/1772231236284.png') }}" alt="Damaged Car Collection"
                            class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="overflow-hidden rounded-2xl group shadow-sm">
                        <img src="{{ asset('images/client/1772231257449.png') }}" alt="MOT Failure Pickup"
                            class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="overflow-hidden rounded-2xl group shadow-sm">
                        <img src="{{ asset('images/client/1772231282571.png') }}" alt="Junk Car Removal"
                            class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="overflow-hidden rounded-2xl group shadow-sm">
                        <img src="{{ asset('images/client/1772231288802.png') }}" alt="Salvage Vehicle Tow"
                            class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                    </div>
                </div>
            </div>

            <div id="locations"
                class="bg-[#0F172A] rounded-3xl p-8 sm:p-12 text-center text-white relative overflow-hidden scroll-mt-24 mt-8">
                <div
                    class="absolute top-0 right-0 right-0 -mr-20 -mt-20 w-64 h-64 rounded-full bg-[#16A34A]/80 blur-3xl opacity-50">
                </div>
                <div
                    class="absolute bottom-0 left-0 -ml-20 -mb-20 w-64 h-64 rounded-full bg-[#F97316]/20 blur-3xl opacity-50">
                </div>

                <div class="relative z-10 max-w-4xl mx-auto">
                    <h3 class="text-3xl sm:text-4xl font-extrabold mb-4">Areas We Cover</h3>
                    <p class="text-slate-300 text-lg mb-8">
                        We provide <strong class="text-white">free local collection</strong> in the following locations
                        across the West Midlands:
                    </p>

                    <div class="flex flex-wrap justify-center gap-3 sm:gap-4 mb-10">
                        @php
                            $areas = ['Birmingham', 'Coventry', 'Nuneaton', 'Leamington Spa', 'Stratford Upon Avon', 'Redditch', 'Bromsgrove', 'Rugby', 'Wolverhampton'];
                        @endphp

                        @foreach($areas as $area)
                            <div
                                class="bg-slate-800/80 border border-slate-700 backdrop-blur-sm rounded-full px-5 py-2.5 flex items-center shadow-sm hover:border-[#16A34A] hover:bg-slate-800 transition cursor-default">
                                <svg class="w-5 h-5 text-[#F97316] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="font-semibold tracking-wide text-slate-200">{{ $area }}</span>
                            </div>
                        @endforeach
                    </div>

                    <a href="{{ route('quote') }}"
                        class="inline-flex items-center px-8 py-4 bg-[#16A34A] hover:bg-green-600 text-white font-bold rounded-xl transition shadow-[0_10px_25px_-5px_rgba(22,163,74,0.4)] hover:shadow-[0_15px_30px_-5px_rgba(22,163,74,0.5)] transform hover:-translate-y-1 text-lg">
                        Get Your Price <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    </div>
    </section>
@endsection