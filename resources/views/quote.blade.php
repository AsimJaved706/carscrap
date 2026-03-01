@extends('layouts.public')

@section('title', 'Get A Free Scrap Car Quote | idontwantmycaranymore.co.uk')

@section('content')
    <!-- Main Content -->
    <main class="flex-grow py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <!-- Decoration -->
        <div class="absolute top-0 right-0 -mr-32 -mt-32 w-96 h-96 rounded-full bg-[#16A34A]/5 blur-3xl point-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 -ml-32 -mb-32 w-96 h-96 rounded-full bg-[#F97316]/5 blur-3xl point-events-none">
        </div>

        <div class="max-w-3xl mx-auto relative z-10">
            <div class="text-center mb-10">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-tight mb-4">Complete Your Vehicle
                    Details</h1>
                <p class="text-lg text-slate-500">Provide accurate details below and our team will prepare the highest
                    possible cash offer for your scrap or non-working vehicle.</p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-10 border-t-8 border-[#16A34A]">
                @if ($errors->any())
                    <div class="bg-red-50 text-red-600 p-4 rounded-lg mb-8 text-sm border border-red-200 shadow-sm">
                        <div class="flex items-center mb-2 font-bold">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Please fix the following errors:
                        </div>
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('submit') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf

                    <!-- Section 1: Contact -->
                    <div class="space-y-5">
                        <div class="flex items-center border-b pb-2">
                            <div
                                class="w-8 h-8 rounded-full bg-[#0F172A] text-white flex items-center justify-center font-bold mr-3 text-sm">
                                1</div>
                            <h3 class="text-xl font-bold text-slate-800">Contact Details</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label
                                    class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1.5">Full
                                    Name *</label>
                                <input type="text" name="full_name" value="{{ old('full_name') }}" required
                                    class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-[#16A34A]/50 focus:border-[#16A34A] transition text-slate-800 placeholder-slate-400"
                                    placeholder="e.g. John Doe">
                            </div>
                            <div>
                                <label
                                    class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1.5">Phone
                                    Number *</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" required
                                    class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-[#16A34A]/50 focus:border-[#16A34A] transition text-slate-800 placeholder-slate-400"
                                    placeholder="e.g. 07123 456789">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label
                                    class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1.5">Email
                                    (Optional)</label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-[#16A34A]/50 focus:border-[#16A34A] transition text-slate-800 placeholder-slate-400"
                                    placeholder="e.g. john@example.com">
                            </div>
                            <div>
                                <label
                                    class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1.5">Postcode
                                    *</label>
                                <input type="text" name="postcode" value="{{ old('postcode') }}" required
                                    class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-[#16A34A]/50 focus:border-[#16A34A] transition uppercase text-slate-800 placeholder-slate-400 font-medium"
                                    placeholder="e.g. B1 1AA">
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Vehicle -->
                    <div class="space-y-5">
                        <div class="flex items-center border-b pb-2">
                            <div
                                class="w-8 h-8 rounded-full bg-[#0F172A] text-white flex items-center justify-center font-bold mr-3 text-sm">
                                2</div>
                            <h3 class="text-xl font-bold text-slate-800">Vehicle Details</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label
                                    class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1.5">Registration
                                    Plate *</label>
                                <input type="text" name="registration_number" value="{{ old('registration_number') }}"
                                    required
                                    class="w-full bg-yellow-400 border border-yellow-500 rounded-lg px-4 py-3 outline-none focus:ring-4 focus:ring-yellow-400/50 transition uppercase font-black text-2xl text-center text-slate-900 tracking-wider shadow-sm"
                                    placeholder="AA11 AAA">
                            </div>

                            <!-- VEHICLE TYPE SELECTOR -->
                            <div
                                class="md:col-span-2 bg-slate-50 border border-slate-200 rounded-xl p-4 sm:p-5 mt-2 mb-2 relative overflow-hidden">
                                <div
                                    class="absolute top-0 right-0 -mr-6 -mt-6 w-24 h-24 rounded-full bg-[#16A34A]/10 blur-xl">
                                </div>
                                <label class="block text-sm font-bold text-slate-800 tracking-wide mb-3">What type of
                                    vehicle is it? *</label>
                                <div class="grid grid-cols-2 gap-3 sm:gap-4">
                                    <label class="cursor-pointer relative group">
                                        <input type="radio" name="vehicle_type" value="Scrap" class="peer sr-only" required
                                            {{ old('vehicle_type') == 'Scrap' ? 'checked' : '' }}>
                                        <div
                                            class="flex flex-col items-center justify-center border-2 border-slate-200 rounded-xl p-3 sm:p-4 bg-white hover:border-orange-400 peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-focus:ring-2 peer-focus:ring-offset-2 peer-focus:ring-orange-500 transition shadow-sm h-full">
                                            <svg class="w-6 h-6 sm:w-8 sm:h-8 text-orange-400 mb-2 peer-checked:text-orange-600 transition"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                            <span
                                                class="font-bold text-slate-700 peer-checked:text-orange-700 text-sm sm:text-base text-center">Scrap
                                                Car</span>
                                            <span
                                                class="text-[10px] sm:text-xs text-slate-500 text-center mt-1 hidden sm:block">Broken,
                                                damaged, or end-of-life</span>
                                        </div>
                                        <div
                                            class="absolute top-2 right-2 w-4 h-4 rounded-full border-2 border-slate-300 peer-checked:border-orange-500 flex items-center justify-center bg-white transition hidden sm:flex">
                                            <div
                                                class="w-2 h-2 rounded-full bg-orange-500 opacity-0 peer-checked:opacity-100 transition">
                                            </div>
                                        </div>
                                    </label>

                                    <label class="cursor-pointer relative group">
                                        <input type="radio" name="vehicle_type" value="Used" class="peer sr-only" required
                                            {{ old('vehicle_type') == 'Used' ? 'checked' : '' }}>
                                        <div
                                            class="flex flex-col items-center justify-center border-2 border-slate-200 rounded-xl p-3 sm:p-4 bg-white hover:border-[#16A34A] peer-checked:border-[#16A34A] peer-checked:bg-green-50 peer-focus:ring-2 peer-focus:ring-offset-2 peer-focus:ring-[#16A34A] transition shadow-sm h-full">
                                            <svg class="w-6 h-6 sm:w-8 sm:h-8 text-[#16A34A]/60 mb-2 peer-checked:text-[#16A34A] transition"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span
                                                class="font-bold text-slate-700 peer-checked:text-green-800 text-sm sm:text-base text-center">Used
                                                Car</span>
                                            <span
                                                class="text-[10px] sm:text-xs text-slate-500 text-center mt-1 hidden sm:block">Running,
                                                good condition</span>
                                        </div>
                                        <div
                                            class="absolute top-2 right-2 w-4 h-4 rounded-full border-2 border-slate-300 peer-checked:border-[#16A34A] flex items-center justify-center bg-white transition hidden sm:flex">
                                            <div
                                                class="w-2 h-2 rounded-full bg-[#16A34A] opacity-0 peer-checked:opacity-100 transition">
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label
                                    class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1.5">Vehicle
                                    Condition</label>
                                <div class="relative">
                                    <select name="condition"
                                        class="w-full appearance-none bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 pr-10 outline-none focus:ring-2 focus:ring-[#16A34A]/50 focus:border-[#16A34A] transition text-slate-700 font-medium">
                                        <option value="" disabled selected>Select condition...</option>
                                        <option value="Scrap" {{ old('condition') == 'Scrap' ? 'selected' : '' }}>Scrap /
                                            ELV</option>
                                        <option value="Non-runner" {{ old('condition') == 'Non-runner' ? 'selected' : '' }}>
                                            Non-runner (Broken down)</option>
                                        <option value="Damaged" {{ old('condition') == 'Damaged' ? 'selected' : '' }}>
                                            Damaged (Bodywork/Mechanical)</option>
                                        <option value="MOT failed" {{ old('condition') == 'MOT failed' ? 'selected' : '' }}>
                                            MOT failed</option>
                                        <option value="Accident damaged" {{ old('condition') == 'Accident damaged' ? 'selected' : '' }}>Accident damaged</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                            <div class="col-span-2 sm:col-span-1">
                                <label
                                    class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1.5">Make</label>
                                <input type="text" name="make" value="{{ old('make') }}"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-[#16A34A]/50 transition text-sm">
                            </div>
                            <div class="col-span-2 sm:col-span-2">
                                <label
                                    class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1.5">Model</label>
                                <input type="text" name="model" value="{{ old('model') }}"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-[#16A34A]/50 transition text-sm">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label
                                    class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1.5">Year</label>
                                <input type="text" name="year" value="{{ old('year') }}"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-[#16A34A]/50 transition text-sm">
                            </div>
                        </div>

                        <div
                            class="bg-slate-50 p-4 rounded-xl border border-slate-200 grid grid-cols-1 sm:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">V5 Present
                                    (Logbook)?</label>
                                <div class="flex gap-4">
                                    <label class="flex items-center cursor-pointer relative group">
                                        <input type="radio" name="v5_present" value="1" class="peer sr-only" {{ old('v5_present') == '1' ? 'checked' : '' }}>
                                        <div
                                            class="w-5 h-5 border-2 border-slate-300 rounded-full peer-checked:border-[#16A34A] peer-focus:ring-2 peer-focus:ring-offset-2 peer-focus:ring-[#16A34A] flex items-center justify-center transition">
                                            <div
                                                class="w-2.5 h-2.5 rounded-full bg-[#16A34A] opacity-0 peer-checked:opacity-100 transition">
                                            </div>
                                        </div>
                                        <span
                                            class="ml-2 text-sm font-medium text-slate-600 peer-checked:text-slate-900 transition">Yes</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer relative group">
                                        <input type="radio" name="v5_present" value="0" class="peer sr-only" {{ old('v5_present') == '0' ? 'checked' : '' }}>
                                        <div
                                            class="w-5 h-5 border-2 border-slate-300 rounded-full peer-checked:border-red-500 peer-focus:ring-2 peer-focus:ring-offset-2 peer-focus:ring-red-500 flex items-center justify-center transition">
                                            <div
                                                class="w-2.5 h-2.5 rounded-full bg-red-500 opacity-0 peer-checked:opacity-100 transition">
                                            </div>
                                        </div>
                                        <span
                                            class="ml-2 text-sm font-medium text-slate-600 peer-checked:text-slate-900 transition">No</span>
                                    </label>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Keys Present?</label>
                                <div class="flex gap-4">
                                    <label class="flex items-center cursor-pointer relative group">
                                        <input type="radio" name="keys_present" value="1" class="peer sr-only" {{ old('keys_present') == '1' ? 'checked' : '' }}>
                                        <div
                                            class="w-5 h-5 border-2 border-slate-300 rounded-full peer-checked:border-[#16A34A] peer-focus:ring-2 peer-focus:ring-offset-2 peer-focus:ring-[#16A34A] flex items-center justify-center transition">
                                            <div
                                                class="w-2.5 h-2.5 rounded-full bg-[#16A34A] opacity-0 peer-checked:opacity-100 transition">
                                            </div>
                                        </div>
                                        <span
                                            class="ml-2 text-sm font-medium text-slate-600 peer-checked:text-slate-900 transition">Yes</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer relative group">
                                        <input type="radio" name="keys_present" value="0" class="peer sr-only" {{ old('keys_present') == '0' ? 'checked' : '' }}>
                                        <div
                                            class="w-5 h-5 border-2 border-slate-300 rounded-full peer-checked:border-red-500 peer-focus:ring-2 peer-focus:ring-offset-2 peer-focus:ring-red-500 flex items-center justify-center transition">
                                            <div
                                                class="w-2.5 h-2.5 rounded-full bg-red-500 opacity-0 peer-checked:opacity-100 transition">
                                            </div>
                                        </div>
                                        <span
                                            class="ml-2 text-sm font-medium text-slate-600 peer-checked:text-slate-900 transition">No</span>
                                    </label>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Engine
                                    Starts/Drives?</label>
                                <div class="flex gap-4">
                                    <label class="flex items-center cursor-pointer relative group">
                                        <input type="radio" name="driveable" value="1" class="peer sr-only" {{ old('driveable') == '1' ? 'checked' : '' }}>
                                        <div
                                            class="w-5 h-5 border-2 border-slate-300 rounded-full peer-checked:border-[#16A34A] peer-focus:ring-2 peer-focus:ring-offset-2 peer-focus:ring-[#16A34A] flex items-center justify-center transition">
                                            <div
                                                class="w-2.5 h-2.5 rounded-full bg-[#16A34A] opacity-0 peer-checked:opacity-100 transition">
                                            </div>
                                        </div>
                                        <span
                                            class="ml-2 text-sm font-medium text-slate-600 peer-checked:text-slate-900 transition">Yes</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer relative group">
                                        <input type="radio" name="driveable" value="0" class="peer sr-only" {{ old('driveable') == '0' ? 'checked' : '' }}>
                                        <div
                                            class="w-5 h-5 border-2 border-slate-300 rounded-full peer-checked:border-red-500 peer-focus:ring-2 peer-focus:ring-offset-2 peer-focus:ring-red-500 flex items-center justify-center transition">
                                            <div
                                                class="w-2.5 h-2.5 rounded-full bg-red-500 opacity-0 peer-checked:opacity-100 transition">
                                            </div>
                                        </div>
                                        <span
                                            class="ml-2 text-sm font-medium text-slate-600 peer-checked:text-slate-900 transition">No</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Extra Info -->
                    <div class="space-y-5">
                        <div class="flex items-center border-b pb-2">
                            <div
                                class="w-8 h-8 rounded-full bg-[#0F172A] text-white flex items-center justify-center font-bold mr-3 text-sm">
                                3</div>
                            <h3 class="text-xl font-bold text-slate-800">Additional Information</h3>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1.5">Add
                                a Message (Optional)</label>
                            <textarea name="message" rows="3"
                                placeholder="Tell us if there are any flat tyres, missing parts, or any other relevant information..."
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-[#16A34A]/50 focus:border-[#16A34A] transition text-slate-800 placeholder-slate-400 resize-none">{{ old('message') }}</textarea>
                        </div>

                        <!-- File Uploader Container -->
                        <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 border-dashed" id="upload-container">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Upload Photos (Optional, max
                                5MB/photo)</label>
                            <p class="text-xs text-slate-500 mb-4">Adding photos of the exterior, interior, and any
                                damage can help us give you a more accurate quote.</p>

                            <!-- Dropzone -->
                            <div class="flex items-center justify-center w-full mb-4">
                                <label for="dropzone-file" id="dropzone-label"
                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-slate-300 border-dashed rounded-lg cursor-pointer bg-white hover:bg-slate-50 hover:border-[#16A34A] transition">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-3 text-slate-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <p class="mb-2 text-sm text-slate-500"><span
                                                class="font-semibold text-[#16A34A]">Click to upload</span> or drag and
                                            drop</p>
                                        <p class="text-xs text-slate-400">JPEG, PNG, JPG or GIF</p>
                                    </div>
                                    <input id="dropzone-file" type="file" name="photos[]" multiple accept="image/*"
                                        class="hidden" />
                                </label>
                            </div>

                            <!-- Image Previews Grid -->
                            <div id="image-preview"
                                class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 mt-4 empty:hidden">
                                <!-- Previews injected here by JS -->
                            </div>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="w-full relative inline-flex items-center justify-center bg-[#16A34A] hover:bg-green-600 text-white font-bold text-xl py-5 rounded-xl shadow-[0_10px_25px_-5px_rgba(22,163,74,0.4)] hover:shadow-[0_15px_30px_-5px_rgba(22,163,74,0.5)] outline-none transition-all duration-300 transform hover:-translate-y-1 focus:ring-4 focus:ring-green-300">
                            <span>Get My Free Quote</span>
                            <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                        <p class="text-xs text-center text-slate-400 mt-4 flex items-center justify-center">
                            <svg class="w-4 h-4 mr-1 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                            Your data is secure and will only be used to contact you regarding your quote.
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </main>
    </main>
@endsection

@push('scripts')
    <!-- Advanced File Uploader Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fileInput = document.getElementById('dropzone-file');
            const previewContainer = document.getElementById('image-preview');
            const dropzoneLabel = document.getElementById('dropzone-label');

            // We use DataTransfer to programmatically manage the FileList inside the HTML input
            let dataTransfer = new DataTransfer();

            // Handle file selection from browse button
            fileInput.addEventListener('change', handleFiles);

            // Drag and Drop Events
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropzoneLabel.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                dropzoneLabel.addEventListener(eventName, highlight, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropzoneLabel.addEventListener(eventName, unhighlight, false);
            });

            function highlight(e) {
                dropzoneLabel.classList.add('border-[#16A34A]', 'bg-green-50');
            }

            function unhighlight(e) {
                dropzoneLabel.classList.remove('border-[#16A34A]', 'bg-green-50');
            }

            dropzoneLabel.addEventListener('drop', handleDrop, false);

            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                handleFiles({ target: { files: files } });
            }

            function handleFiles(e) {
                const files = e.target.files;

                // Add new valid files to our DataTransfer object
                Array.from(files).forEach(file => {
                    // Basic validation (image type limit 5MB)
                    if (file.type.startsWith('image/') && file.size <= 5 * 1024 * 1024) {
                        dataTransfer.items.add(file);
                    } else if (file.size > 5 * 1024 * 1024) {
                        alert(`File ${file.name} is too large. Max 5MB allowed.`);
                    }
                });

                // Sync the actual input files to our DataTransfer object so form submit works seamlessly
                fileInput.files = dataTransfer.files;

                // Render the visual previews
                renderPreviews();
            }

            function renderPreviews() {
                // Clear existing previews
                previewContainer.innerHTML = '';

                Array.from(dataTransfer.files).forEach((file, index) => {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        const previewDiv = document.createElement('div');
                        previewDiv.className = 'relative group rounded-lg overflow-hidden border border-slate-200 aspect-video bg-slate-100';

                        previewDiv.innerHTML = `
                                    <img src="${e.target.result}" class="w-full h-full object-cover" alt="Preview">

                                    <!-- Delete Overlay (shows on hover) -->
                                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <button type="button" class="delete-btn bg-red-500 hover:bg-red-600 text-white rounded-full p-2 transform hover:scale-110 transition" data-index="${index}">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- File size badge -->
                                    <div class="absolute bottom-1 right-1 bg-black/60 text-white text-[10px] px-1.5 py-0.5 rounded backdrop-blur-sm">
                                        ${(file.size / 1024 / 1024).toFixed(1)} MB
                                    </div>
                                `;

                        // Attach delete event
                        const deleteBtn = previewDiv.querySelector('.delete-btn');
                        deleteBtn.addEventListener('click', function (e) {
                            e.preventDefault(); // prevent form submit just in case
                            removeFile(parseInt(this.getAttribute('data-index')));
                        });

                        previewContainer.appendChild(previewDiv);
                    }

                    reader.readAsDataURL(file);
                });
            }

            function removeFile(indexToRemove) {
                // Create a new fresh DataTransfer to hold the kept files
                const dt = new DataTransfer();
                const files = dataTransfer.files;

                for (let i = 0; i < files.length; i++) {
                    if (i !== indexToRemove) {
                        dt.items.add(files[i]);
                    }
                }

                // Update our global reference and real input wrapper
                dataTransfer = dt;
                fileInput.files = dataTransfer.files;

                // Re-render
                renderPreviews();
            }
        });
    </script>
@endpush