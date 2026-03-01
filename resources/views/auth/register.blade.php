<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-[#0F172A]">Create Admin Account</h2>
        <p class="text-slate-500 text-sm mt-1">Register a new administrator to manage submissions</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-semibold text-slate-700 mb-1">Full Name</label>
            <input id="name"
                class="block w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-2.5 outline-none focus:ring-2 focus:ring-[#16A34A] focus:border-transparent transition text-slate-800"
                type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                placeholder="John Doe" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-xs" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-slate-700 mb-1">Email Address</label>
            <input id="email"
                class="block w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-2.5 outline-none focus:ring-2 focus:ring-[#16A34A] focus:border-transparent transition text-slate-800"
                type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                placeholder="admin@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-xs" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-semibold text-slate-700 mb-1">Password</label>
            <input id="password"
                class="block w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-2.5 outline-none focus:ring-2 focus:ring-[#16A34A] focus:border-transparent transition text-slate-800"
                type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-xs" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 mb-1">Confirm
                Password</label>
            <input id="password_confirmation"
                class="block w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-2.5 outline-none focus:ring-2 focus:ring-[#16A34A] focus:border-transparent transition text-slate-800"
                type="password" name="password_confirmation" required autocomplete="new-password"
                placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-xs" />
        </div>

        <div class="pt-4">
            <button type="submit"
                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-[#16A34A] hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#16A34A] transition">
                Register Administrator
            </button>
        </div>

        <div class="text-center mt-6 text-sm text-slate-500">
            Already registered?
            <a href="{{ route('login') }}" class="font-semibold text-[#16A34A] hover:text-green-700 transition">Sign in
                instead</a>
        </div>
    </form>
</x-guest-layout>