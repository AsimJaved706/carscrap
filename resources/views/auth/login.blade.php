<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-[#0F172A]">Sign In</h2>
        <p class="text-slate-500 text-sm mt-1">Enter your credentials to access the admin dashboard</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status
        class="mb-4 bg-green-50 text-green-700 p-3 rounded-lg border border-green-200 text-sm font-medium"
        :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-slate-700 mb-1">Email Address</label>
            <input id="email"
                class="block w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-2.5 outline-none focus:ring-2 focus:ring-[#16A34A] focus:border-transparent transition text-slate-800"
                type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                placeholder="admin@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-xs" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex justify-between items-center mb-1">
                <label for="password" class="block text-sm font-semibold text-slate-700">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-xs font-semibold text-[#16A34A] hover:text-green-700 transition"
                        href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>

            <input id="password"
                class="block w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-2.5 outline-none focus:ring-2 focus:ring-[#16A34A] focus:border-transparent transition text-slate-800"
                type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-xs" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox"
                    class="rounded border-slate-300 text-[#16A34A] shadow-sm focus:ring-[#16A34A]" name="remember">
                <span class="ms-2 text-sm text-slate-600 font-medium">Keep me signed in</span>
            </label>
        </div>

        <div class="pt-2">
            <button type="submit"
                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-[#16A34A] hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#16A34A] transition">
                Sign In to Dashboard
            </button>
        </div>


    </form>
</x-guest-layout>