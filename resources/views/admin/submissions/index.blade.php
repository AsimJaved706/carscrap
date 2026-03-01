<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="font-bold text-2xl text-[#0F172A] leading-tight">
                    {{ __('Quote Requests') }}
                </h2>
                <p class="text-slate-500 text-sm mt-1">Manage and respond to customer vehicle submissions</p>
            </div>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto">

            @if (session('status'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg shadow-sm flex items-center" role="alert">
                    <svg class="w-5 h-5 mr-3 text-green-500 block" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                    <span class="block sm:inline font-medium text-sm">{{ session('status') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-slate-200">
                <div class="p-6">

                    <!-- Filters & Search -->
                    <form method="GET" action="{{ route('admin.submissions.index') }}"
                        class="mb-6 flex flex-col sm:flex-row gap-3">
                        
                        <div class="flex-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Search phone, reg, or name..."
                                class="w-full pl-10 pr-3 py-2.5 border border-slate-300 rounded-lg shadow-sm focus:border-[#16A34A] focus:ring focus:ring-[#16A34A]/20 transition text-sm">
                        </div>
                        
                        <div class="w-full sm:w-48">
                            <select name="status"
                                class="w-full py-2.5 px-3 border border-slate-300 rounded-lg shadow-sm focus:border-[#16A34A] focus:ring focus:ring-[#16A34A]/20 transition text-sm text-slate-700 bg-white">
                                <option value="">All Statuses</option>
                                <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>🟢 New</option>
                                <option value="contacted" {{ request('status') == 'contacted' ? 'selected' : '' }}>🟡 Contacted</option>
                                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>⚪ Completed</option>
                            </select>
                        </div>
                        
                        <div class="flex gap-2 w-full sm:w-auto">
                            <button type="submit"
                                class="flex-1 sm:flex-none inline-flex justify-center items-center px-6 py-2.5 bg-[#0F172A] border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-900 transition shadow-sm">
                                Filter
                            </button>
                            
                            @if(request()->hasAny(['search', 'status']))
                                <a href="{{ route('admin.submissions.index') }}"
                                    class="inline-flex justify-center items-center px-4 py-2.5 bg-white border border-slate-300 rounded-lg font-semibold text-sm text-slate-700 hover:bg-slate-50 hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition shadow-sm">
                                    Clear
                                </a>
                            @endif
                        </div>
                    </form>

                    <!-- Table -->
                    <div class="overflow-x-auto border border-slate-200 rounded-xl">
                        <table class="min-w-full divide-y divide-slate-200">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Date received</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Customer Details</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Vehicle</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100">
                                @forelse ($submissions as $sub)
                                    <tr class="hover:bg-slate-50/50 transition">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-slate-900">{{ $sub->created_at->format('d M Y') }}</div>
                                            <div class="text-xs text-slate-500">{{ $sub->created_at->format('H:i') }}</div>
                                        </td>
                                        
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="h-8 w-8 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center font-bold text-xs mr-3 shrink-0">
                                                    {{ substr($sub->full_name, 0, 1) }}
                                                </div>
                                                <div>
                                                    <div class="text-sm font-bold text-slate-900">{{ $sub->full_name }}</div>
                                                    <div class="text-sm text-slate-600 flex items-center mt-0.5">
                                                        <svg class="w-3.5 h-3.5 mr-1 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg> 
                                                        {{ $sub->phone }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        <td class="px-6 py-4">
                                            <div class="inline-flex items-center px-2.5 py-0.5 rounded border border-yellow-400 bg-yellow-100 text-yellow-800 text-xs font-bold uppercase tracking-wider mb-1">
                                                {{ $sub->registration_number }}
                                            </div>
                                            <div class="text-sm font-medium text-slate-700">{{ $sub->make }} {{ $sub->model }}</div>
                                        </td>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($sub->status == 'new')
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800 border border-green-200">
                                                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5"></span> New Request
                                                </span>
                                            @elseif($sub->status == 'contacted')
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-800 border border-yellow-200">
                                                    <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full mr-1.5"></span> Contacted
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-700 border border-slate-200">
                                                    <span class="w-1.5 h-1.5 bg-slate-400 rounded-full mr-1.5"></span> Completed
                                                </span>
                                            @endif
                                        </td>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('admin.submissions.show', $sub) }}"
                                                class="inline-flex items-center px-3 py-1.5 bg-white border border-slate-300 rounded-lg shadow-sm text-xs font-semibold text-[#16A34A] hover:bg-green-50 hover:border-green-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition">
                                                View Details
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                                            <svg class="mx-auto h-12 w-12 text-slate-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h2a2 2 0 012 2v2a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <p class="text-sm font-medium">No quote requests found.</p>
                                            <p class="text-xs text-slate-400 mt-1">Try adjusting your search or filters.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($submissions->hasPages())
                        <div class="mt-6 border-t border-slate-100 pt-4">
                            {{ $submissions->links() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>