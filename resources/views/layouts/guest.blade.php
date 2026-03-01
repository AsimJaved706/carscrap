<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-['Inter',sans-serif] text-slate-900 antialiased bg-[#F8FAFC]">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

        <!-- Logo Section -->
        <div class="mb-8 text-center">
            <a href="/" class="flex flex-col items-center group">
                <img src="{{ asset('images/client/Logo.png') }}" alt="idontwantmycaranymore logo"
                    class="h-14 sm:h-16 w-auto object-contain transition-transform group-hover:scale-105 mb-2">
                <div class="text-sm font-medium text-slate-500 tracking-widest uppercase">Admin Portal</div>
            </a>
        </div>

        <!-- Form Container -->
        <div
            class="w-full sm:max-w-md px-8 py-10 bg-white shadow-2xl overflow-hidden sm:rounded-2xl border-t-8 border-[#16A34A] relative">
            <!-- Decorative element -->
            <div class="absolute -top-24 -right-24 w-48 h-48 bg-[#16A34A]/10 rounded-full blur-3xl pointer-events-none">
            </div>
            <div class="relative z-10">
                {{ $slot }}
            </div>
        </div>

        <!-- Footer text -->
        <div class="mt-8 text-sm text-slate-500">
            &copy; {{ date('Y') }} All Rights Reserved. Secure Access.
        </div>
    </div>
</body>

</html>