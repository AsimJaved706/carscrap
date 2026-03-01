<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <h2 class="font-bold text-2xl text-[#0F172A] leading-tight flex items-center gap-3">
                <a href="{{ route('admin.submissions.index') }}"
                    class="w-8 h-8 flex items-center justify-center rounded-full bg-slate-100 hover:bg-slate-200 text-slate-500 hover:text-slate-800 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <span>Quote Details: <span class="text-[#16A34A]">{{ $submission->registration_number }}</span></span>
            </h2>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto space-y-6">

            @if (session('status'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg shadow-sm flex items-center"
                    role="alert">
                    <svg class="w-5 h-5 mr-3 text-green-500 block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="block sm:inline font-medium text-sm">{{ session('status') }}</span>
                </div>
            @endif

            <!-- Top Row: Status & Quick Info -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- Status Updater -->
                <div class="lg:col-span-1 bg-white overflow-hidden shadow-sm rounded-2xl border border-slate-200">
                    <div class="p-6">
                        <div class="flex items-center mb-4 text-[#0F172A]">
                            <svg class="w-5 h-5 mr-2 text-[#16A34A]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="text-lg font-bold">Request Status</h3>
                        </div>

                        <form action="{{ route('admin.submissions.update_status', $submission) }}" method="POST"
                            class="space-y-4">
                            @csrf
                            @method('PATCH')

                            <!-- Current visual status -->
                            <div class="p-3 rounded-lg border flex items-center justify-center 
                                @if($submission->status == 'new') bg-green-50 border-green-200 text-green-700
                                @elseif($submission->status == 'contacted') bg-yellow-50 border-yellow-200 text-yellow-700
                                @else bg-slate-50 border-slate-200 text-slate-700 @endif mb-4">
                                @if($submission->status == 'new')
                                    <span class="relative flex h-3 w-3 mr-2"><span
                                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span><span
                                            class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span></span>
                                    <span class="font-bold text-sm">Action Required (New)</span>
                                @elseif($submission->status == 'contacted')
                                    <span class="font-bold text-sm">Follow-up Pending (Contacted)</span>
                                @else
                                    <span class="font-bold text-sm">Archived (Completed)</span>
                                @endif
                            </div>

                            <label class="block text-sm font-medium text-slate-700 mb-1">Update Pipeline Stage</label>
                            <div class="flex gap-2">
                                <select name="status"
                                    class="flex-1 border-slate-300 rounded-lg shadow-sm focus:border-[#16A34A] focus:ring focus:ring-[#16A34A]/20 transition text-sm py-2 px-3 text-slate-700 bg-white">
                                    <option value="new" {{ $submission->status == 'new' ? 'selected' : '' }}>🟢 New
                                        Request</option>
                                    <option value="contacted" {{ $submission->status == 'contacted' ? 'selected' : '' }}>
                                        🟡 Contacted</option>
                                    <option value="completed" {{ $submission->status == 'completed' ? 'selected' : '' }}>⚪
                                        Completed</option>
                                </select>
                                <button type="submit"
                                    class="inline-flex justify-center items-center px-4 py-2 bg-[#0F172A] border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-slate-800 transition">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Customer Details Card -->
                <div
                    class="lg:col-span-2 bg-white overflow-hidden shadow-sm rounded-2xl border border-slate-200 flex flex-col">
                    <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                        <div class="flex items-center text-[#0F172A]">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <h3 class="text-lg font-bold">Customer Contact</h3>
                        </div>
                        <form action="{{ route('admin.submissions.destroy', $submission) }}" method="POST"
                            onsubmit="return confirm('WARNING: Are you sure you want to permanently delete this quote request?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-3 py-1.5 border border-red-200 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg text-xs font-semibold transition">
                                <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                                Delete Record
                            </button>
                        </form>
                    </div>

                    <div class="p-6 flex-1">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8">
                            <div class="flex flex-col">
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Full
                                    Name</span>
                                <span class="text-base font-semibold text-slate-900">{{ $submission->full_name }}</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Phone
                                    Number</span>
                                <a href="tel:{{ $submission->phone }}"
                                    class="text-base font-semibold text-blue-600 hover:text-blue-800 inline-flex items-center">
                                    {{ $submission->phone }}
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Email
                                    Address</span>
                                @if($submission->email)
                                    <a href="mailto:{{ $submission->email }}"
                                        class="text-base font-medium text-slate-700 hover:text-blue-600 transition">{{ $submission->email }}</a>
                                @else
                                    <span class="text-base font-medium text-slate-400 italic">Not provided</span>
                                @endif
                            </div>
                            <div class="flex flex-col">
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Postcode /
                                    Time</span>
                                <span
                                    class="text-base font-medium text-slate-700">{{ strtoupper($submission->postcode) }}
                                    &bull; {{ $submission->created_at->format('M jS, H:i') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Row: Vehicle Info & Photos -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- Vehicle Info -->
                <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-slate-200 flex flex-col">
                    <div class="p-6 border-b border-slate-100 dark:border-slate-200">
                        <div class="flex items-center text-[#0F172A]">
                            <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                            <h3 class="text-lg font-bold">Vehicle Specifications</h3>
                        </div>
                    </div>

                    <div class="p-0 flex-1">
                        <table class="w-full text-sm text-left">
                            <tbody class="divide-y divide-slate-100">
                                <tr class="hover:bg-slate-50 transition">
                                    <th class="py-3 px-6 font-medium text-slate-500 w-1/3">Registration</th>
                                    <td class="py-3 px-6"><span
                                            class="inline-block px-2 py-1 bg-yellow-100 border border-yellow-300 rounded font-bold text-black uppercase">{{ $submission->registration_number }}</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 transition">
                                    <th class="py-3 px-6 font-medium text-slate-500">Make & Model</th>
                                    <td class="py-3 px-6 font-semibold text-slate-900">{{ $submission->make }}
                                        {{ $submission->model }}
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 transition">
                                    <th class="py-3 px-6 font-medium text-slate-500">Vehicle Type</th>
                                    <td
                                        class="py-3 px-6 font-bold {{ $submission->vehicle_type == 'Used' ? 'text-blue-600' : 'text-orange-600' }}">
                                        {{ $submission->vehicle_type ?: 'N/A' }}
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 transition">
                                    <th class="py-3 px-6 font-medium text-slate-500">Year</th>
                                    <td class="py-3 px-6 font-medium text-slate-900">{{ $submission->year ?: 'N/A' }}
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 transition">
                                    <th class="py-3 px-6 font-medium text-slate-500">Declared Condition</th>
                                    <td class="py-3 px-6">
                                        <span
                                            class="px-2.5 py-1 bg-slate-100 text-slate-700 rounded-lg text-xs font-semibold">{{ $submission->condition ?: 'N/A' }}</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 transition">
                                    <th class="py-3 px-6 font-medium text-slate-500">V5C Logbook</th>
                                    <td
                                        class="py-3 px-6 font-medium {!! $submission->v5_present ? 'text-green-600' : 'text-red-500' !!}">
                                        {!! $submission->v5_present ? '&#10003; Present' : '&#x2715; Missing' !!}
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 transition">
                                    <th class="py-3 px-6 font-medium text-slate-500">Keys</th>
                                    <td
                                        class="py-3 px-6 font-medium {!! $submission->keys_present ? 'text-green-600' : 'text-red-500' !!}">
                                        {!! $submission->keys_present ? '&#10003; Present' : '&#x2715; Missing' !!}
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 transition">
                                    <th class="py-3 px-6 font-medium text-slate-500">Starts & Drives</th>
                                    <td
                                        class="py-3 px-6 font-medium {!! $submission->driveable ? 'text-green-600' : 'text-red-500' !!}">
                                        {!! $submission->driveable ? 'Yes, Starts & Drives' : 'No, requires recovery' !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Photos & Message -->
                <div class="flex flex-col gap-6">
                    <!-- Message -->
                    <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-slate-200">
                        <div class="p-6">
                            <div class="flex items-center mb-3 text-[#0F172A]">
                                <svg class="w-5 h-5 mr-2 text-purple-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                                    </path>
                                </svg>
                                <h3 class="text-lg font-bold">Additional Message</h3>
                            </div>
                            <div class="bg-slate-50 border border-slate-100 rounded-xl p-4 min-h-[100px]">
                                @if($submission->message)
                                    <p class="text-slate-700 whitespace-pre-line text-sm leading-relaxed">
                                        {{ $submission->message }}
                                    </p>
                                @else
                                    <p class="text-slate-400 italic text-sm text-center mt-4">No additional notes provided
                                        by the customer.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Photos -->
                    <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-slate-200 flex-1">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center text-[#0F172A]">
                                    <svg class="w-5 h-5 mr-2 text-pink-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <h3 class="text-lg font-bold">Uploaded Documents/Photos</h3>
                                </div>
                                <span
                                    class="bg-slate-100 text-slate-600 text-xs font-bold px-2.5 py-1 rounded-full">{{ $submission->photos ? count($submission->photos) : 0 }}
                                    Files</span>
                            </div>

                            @if($submission->photos && count($submission->photos) > 0)
                                <div class="grid grid-cols-2 gap-3">
                                    @foreach($submission->photos as $photo)
                                        <a href="{{ Storage::url($photo) }}" target="_blank"
                                            class="block border border-slate-200 rounded-xl overflow-hidden hover:border-[#16A34A] hover:ring-2 hover:ring-[#16A34A]/50 transition shadow-sm group relative">
                                            <div
                                                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                                <svg class="w-8 h-8 text-white drop-shadow-md" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7">
                                                    </path>
                                                </svg>
                                            </div>
                                            <img src="{{ Storage::url($photo) }}" alt="Vehicle evidence"
                                                class="w-full h-auto object-cover aspect-video bg-slate-100">
                                        </a>
                                    @endforeach
                                </div>
                            @else
                                <div
                                    class="border-2 border-dashed border-slate-200 rounded-xl p-8 text-center bg-slate-50 mt-2">
                                    <svg class="mx-auto h-10 w-10 text-slate-300 mb-2" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <p class="text-slate-500 text-sm font-medium">No visual evidence was uploaded.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>