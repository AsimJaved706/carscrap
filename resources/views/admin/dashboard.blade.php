<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-[#0F172A] leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                <!-- Total Submissions Card -->
                <div
                    class="bg-white overflow-hidden shadow-sm rounded-2xl border border-slate-200 hover:shadow-md transition-shadow">
                    <div class="p-6 flex items-center">
                        <div class="bg-blue-50 text-blue-600 p-4 rounded-xl mr-5">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-1">Total
                                Submissions</div>
                            <div class="text-3xl font-black text-[#0F172A]">{{ $totalSubmissions }}</div>
                            <a href="{{ route('admin.submissions.index') }}"
                                class="mt-2 inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 transition">
                                View all requests <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- New Submissions Card -->
                <div
                    class="bg-white overflow-hidden shadow-sm rounded-2xl border border-slate-200 hover:shadow-md transition-shadow relative overflow-hidden group">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-green-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                    </div>
                    <div class="p-6 flex items-center relative z-10">
                        <div class="bg-green-100 text-[#16A34A] p-4 rounded-xl mr-5 position-relative">
                            @if($newSubmissions > 0)
                                <span class="absolute -top-1 -right-1 flex h-4 w-4">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                    <span
                                        class="relative inline-flex rounded-full h-4 w-4 bg-red-500 border-2 border-white"></span>
                                </span>
                            @endif
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-green-600 uppercase tracking-wider mb-1">New Action
                                Required</div>
                            <div class="text-3xl font-black text-[#0F172A]">{{ $newSubmissions }}</div>
                            <a href="{{ route('admin.submissions.index', ['status' => 'new']) }}"
                                class="mt-2 inline-flex items-center text-sm font-medium text-[#16A34A] hover:text-green-800 transition">
                                Review new quotes <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Quick Actions area (optional placeholder) -->
            <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-slate-200 mt-8">
                <div class="p-6">
                    <h3 class="font-bold text-lg text-[#0F172A] mb-4">Quick Links</h3>
                    <div class="flex gap-4">
                        <a href="{{ route('home') }}" target="_blank"
                            class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-sm font-medium transition inline-flex items-center">
                            <svg class="w-4 h-4 mr-2 text-slate-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                </path>
                            </svg> View Live Site
                        </a>
                        <a href="{{ route('profile.edit') }}"
                            class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-sm font-medium transition inline-flex items-center">
                            <svg class="w-4 h-4 mr-2 text-slate-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg> Account Settings
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>