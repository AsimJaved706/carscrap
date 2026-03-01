<!-- Sidebar Mobile Backdrop -->
<div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0" class="fixed inset-0 bg-slate-900/80 z-40 lg:hidden" @click="sidebarOpen = false"
    x-cloak>
</div>

<!-- Sidebar Layout -->
<aside
    class="fixed inset-y-0 left-0 z-50 w-64 bg-[#0F172A] text-white transition-transform duration-300 ease-in-out transform lg:translate-x-0 lg:static lg:inset-0 shadow-xl flex flex-col"
    :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}">

    <!-- Sidebar Header / Logo -->
    <div class="flex items-center justify-center p-4 h-24 border-b border-slate-800 shrink-0">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center group w-full px-4">
            <img src="{{ asset('images/client/Logo.png') }}" alt="idontwantmycaranymore logo"
                class="w-full max-h-12 object-contain filter brightness-0 invert opacity-90 group-hover:opacity-100 transition">
        </a>
    </div>

    <!-- Sidebar Navigation Links -->
    <nav class="flex-1 px-3 py-6 space-y-2 overflow-y-auto">
        <!-- Dashboard Link -->
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-[#16A34A] text-white font-semibold shadow-md' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-slate-500' }}"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                </path>
            </svg>
            Dashboard
        </a>

        <!-- Requests (Submissions) Link -->
        <a href="{{ route('admin.submissions.index') }}"
            class="flex items-center px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.submissions.*') ? 'bg-[#16A34A] text-white font-semibold shadow-md' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.submissions.*') ? 'text-white' : 'text-slate-500' }}"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                </path>
            </svg>
            Quote Requests

            @php
                $newCount = \App\Models\CarSubmission::where('status', 'new')->count();
            @endphp
            @if($newCount > 0)
                <span class="ml-auto bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">
                    {{ $newCount }}
                </span>
            @endif
        </a>

        <div class="pt-6 pb-2">
            <h3 class="px-4 text-xs font-bold text-slate-500 uppercase tracking-wider">System</h3>
        </div>

        <!-- Site Settings Link -->
        <a href="{{ route('admin.settings.edit') }}"
            class="flex items-center px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.settings.*') ? 'bg-slate-800 text-white font-semibold border-l-4 border-[#16A34A]' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.settings.*') ? 'text-[#16A34A]' : 'text-slate-500' }}"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                </path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            Site Settings
        </a>

        <!-- Profile Link -->
        <a href="{{ route('profile.edit') }}"
            class="flex items-center px-4 py-3 rounded-xl transition-all {{ request()->routeIs('profile.*') ? 'bg-slate-800 text-white font-semibold border-l-4 border-[#16A34A]' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('profile.*') ? 'text-[#16A34A]' : 'text-slate-500' }}"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                </path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            Settings
        </a>
    </nav>

    <!-- User summary at bottom -->
    <div class="p-4 border-t border-slate-800 shrink-0">
        <div class="flex items-center">
            <div class="ml-3">
                <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
                <p class="text-xs text-slate-400 truncate">{{ Auth::user()->email }}</p>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="ml-auto">
                @csrf
                <button type="submit" class="p-2 text-slate-500 hover:text-red-400 transition" title="Log Out">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</aside>