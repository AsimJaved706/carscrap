@extends('layouts.public')

@section('title', 'Thank You | idontwantmycaranymore.co.uk')

@section('content')
    <!-- Content -->
    <div class="flex-grow flex items-center justify-center p-4 py-20">
        <div class="bg-white max-w-lg w-full rounded-2xl shadow-xl p-8 text-center border-t-8 border-[#16A34A]">
            <div class="w-20 h-20 bg-green-100 text-[#16A34A] rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h1 class="text-3xl font-extrabold text-slate-800 mb-4">Thank You!</h1>
            <p class="text-lg text-slate-600 mb-8">We have received your vehicle details. We'll be in touch shortly with
                your price.</p>

            <a href="{{ route('home') }}"
                class="inline-block bg-[#0F172A] hover:bg-slate-800 text-white font-semibold py-3 px-8 rounded-full transition shadow-md">
                Return to Home
            </a>
        </div>
    </div>
@endsection