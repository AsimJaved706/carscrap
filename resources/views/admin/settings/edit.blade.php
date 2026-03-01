<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-[#0F172A] leading-tight">
            {{ __('Site Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('status'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg shadow-sm flex items-center"
                    role="alert">
                    <svg class="w-5 h-5 mr-3 text-green-500 block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="block sm:inline font-medium text-sm">{{ session('status') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-slate-200 max-w-3xl">
                <div class="p-6 sm:p-8">
                    <div class="flex items-center mb-6 text-[#0F172A]">
                        <svg class="w-6 h-6 mr-3 text-[#16A34A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <h3 class="text-xl font-bold">Manage Public Contact Info</h3>
                    </div>

                    <form method="post" action="{{ route('admin.settings.update') }}" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Phone -->
                            <div>
                                <x-input-label for="contact_phone" :value="__('Public Contact Phone')" />
                                <x-text-input id="contact_phone" name="contact_phone" type="text"
                                    class="mt-1 block w-full bg-slate-50 border-slate-300"
                                    :value="$settings['contact_phone'] ?? '0121 000 0000'" />
                                <x-input-error class="mt-2" :messages="$errors->get('contact_phone')" />
                            </div>

                            <!-- Email -->
                            <div>
                                <x-input-label for="contact_email" :value="__('Public Contact Email')" />
                                <x-text-input id="contact_email" name="contact_email" type="email"
                                    class="mt-1 block w-full bg-slate-50 border-slate-300"
                                    :value="$settings['contact_email'] ?? 'info@idontwantmycaranymore.co.uk'" />
                                <x-input-error class="mt-2" :messages="$errors->get('contact_email')" />
                            </div>

                            <!-- Business Hours -->
                            <div class="md:col-span-2">
                                <x-input-label for="business_hours" :value="__('Business Hours')" />
                                <x-text-input id="business_hours" name="business_hours" type="text"
                                    class="mt-1 block w-full bg-slate-50 border-slate-300"
                                    :value="$settings['business_hours'] ?? 'Mon - Sat: 8:00 AM - 6:00 PM'"
                                    placeholder="e.g. Mon - Sat: 8:00 AM - 6:00 PM" />
                                <p class="text-xs text-slate-500 mt-1.5 mb-0">Shown in the footer.</p>
                                <x-input-error class="mt-2" :messages="$errors->get('business_hours')" />
                            </div>

                            <div class="md:col-span-2 pt-4 border-t border-slate-100">
                                <h4 class="text-sm font-bold text-slate-700 mb-4 tracking-wide uppercase">Social Links
                                </h4>
                            </div>

                            <!-- Facebook -->
                            <div>
                                <x-input-label for="facebook_url" :value="__('Facebook URL')" />
                                <x-text-input id="facebook_url" name="facebook_url" type="url"
                                    class="mt-1 block w-full bg-slate-50 border-slate-300"
                                    :value="$settings['facebook_url'] ?? ''" placeholder="https://facebook.com/..." />
                                <x-input-error class="mt-2" :messages="$errors->get('facebook_url')" />
                            </div>

                            <!-- Instagram -->
                            <div>
                                <x-input-label for="instagram_url" :value="__('Instagram URL')" />
                                <x-text-input id="instagram_url" name="instagram_url" type="url"
                                    class="mt-1 block w-full bg-slate-50 border-slate-300"
                                    :value="$settings['instagram_url'] ?? ''" placeholder="https://instagram.com/..." />
                                <x-input-error class="mt-2" :messages="$errors->get('instagram_url')" />
                            </div>
                        </div>

                        <div class="flex items-center gap-4 pt-6 mt-6 border-t border-slate-100">
                            <button type="submit"
                                class="inline-flex justify-center items-center px-6 py-3 bg-[#0F172A] border border-transparent rounded-xl font-semibold text-sm text-white uppercase tracking-widest hover:bg-slate-800 transition">
                                {{ __('Save Settings') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>