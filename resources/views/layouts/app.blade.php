<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js is included in Breeze's app.js -->
</head>

<body class="font-['Inter',sans-serif] antialiased bg-[#F8FAFC] text-slate-800">

    <div class="flex h-screen overflow-hidden bg-slate-100" x-data="{ sidebarOpen: false }">

        <!-- Sidebar Navigation -->
        @include('layouts.navigation')

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-y-auto overflow-x-hidden">

            <!-- Top Header -->
            <header class="bg-white shadow-sm border-b border-slate-200 sticky top-0 z-30">
                <div class="flex items-center justify-between px-4 sm:px-6 lg:px-8 h-16">

                    <!-- Mobile menu button -->
                    <button @click="sidebarOpen = !sidebarOpen"
                        class="text-slate-500 hover:text-slate-700 focus:outline-none lg:hidden">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <!-- Page Title -->
                    <div class="flex-1 text-center lg:text-left ml-4 lg:ml-0">
                        @isset($header)
                            {{ $header }}
                        @endisset
                    </div>

                    <!-- User Menu Dropdown -->
                    <div class="flex items-center gap-4">
                        <!-- View Site button -->
                        <a href="{{ route('home') }}" target="_blank"
                            class="hidden sm:inline-flex items-center text-sm font-medium text-slate-500 hover:text-[#16A34A] transition">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                            View Site
                        </a>

                        <!-- Profile dropdown -->
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center space-x-2 focus:outline-none">
                                    <div
                                        class="w-8 h-8 rounded-full bg-[#16A34A]/10 text-[#16A34A] flex items-center justify-center font-bold border border-[#16A34A]/20">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                    <div
                                        class="hidden md:block text-sm font-medium text-slate-700 hover:text-slate-900">
                                        {{ Auth::user()->name }}
                                    </div>
                                    <svg class="fill-current h-4 w-4 text-slate-500 hidden md:block"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')"
                                    class="!text-slate-700 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                    {{ __('Profile Elements') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="!text-red-600 flex items-center hover:!bg-red-50">
                                        <svg class="w-4 h-4 mr-2 text-red-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                            </path>
                                        </svg>
                                        {{ __('Sign Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>

                </div>
            </header>

            <!-- Page Content Inner -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50/50 p-4 sm:p-6 lg:p-8">
                {{ $slot }}
            </main>

        </div>
    </div>

</body>

</html>