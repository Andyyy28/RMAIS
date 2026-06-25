@extends('layouts.app')

@section('content')
    <section class="flex min-h-[70vh] flex-col justify-between gap-6">
        <div class="space-y-5">
            <span class="chip">Mobile-first thesis demo</span>
            <div>
                <h1 class="text-3xl font-bold leading-tight">Welcome to RMAIS for M'lang rice prices.</h1>
                <p class="mt-3 text-sm leading-6 text-on-surface-variant dark:text-[#c7cdc3]">A simple local system for checking rice and palay prices, reading Smart Recommendation summaries, and planning planting decisions.</p>
            </div>
            <div class="grid gap-3">
                <div class="soft-card">
                    <h2 class="font-semibold">Rice and palay only</h2>
                    <p class="mt-1 text-sm text-on-surface-variant dark:text-[#c7cdc3]">Focused on Fresh Palay, Dry Palay, Ordinary Rice, Well-Milled Rice, and Special Rice.</p>
                </div>
                <div class="soft-card">
                    <h2 class="font-semibold">Local to M'lang</h2>
                    <p class="mt-1 text-sm text-on-surface-variant dark:text-[#c7cdc3]">Designed around local source checks and barangay-level price reporting in North Cotabato.</p>
                </div>
                <div class="soft-card">
                    <h2 class="font-semibold">Low-end phone friendly</h2>
                    <p class="mt-1 text-sm text-on-surface-variant dark:text-[#c7cdc3]">Readable cards, large controls, minimal motion, and backend-ready computation.</p>
                </div>
            </div>
        </div>
        <a class="primary-button w-full" href="/">Continue</a>
    </section>
@endsection
