@extends('layouts.app')

@section('content')
    <section class="space-y-4">
        <div>
            <p class="text-sm font-semibold text-secondary">Farmer Dashboard</p>
            <h1 class="mt-1 text-2xl font-bold">Today's rice signals</h1>
            <p class="mt-2 text-sm text-on-surface-variant dark:text-[#c7cdc3]">Phase 2 farmer access placeholder with static rice and palay signals for M'lang.</p>
        </div>

        <div class="grid grid-cols-2 gap-3">
            <div class="section-card">
                <p class="text-xs text-on-surface-variant dark:text-[#c7cdc3]">Favorite type</p>
                <p class="mt-2 text-lg font-bold">Dry Palay</p>
            </div>
            <div class="section-card">
                <p class="text-xs text-on-surface-variant dark:text-[#c7cdc3]">Confidence</p>
                <p class="mt-2 text-lg font-bold">High</p>
            </div>
        </div>

        @include('partials.price-card', ['price' => $prices[0]])

        <section class="section-card">
            <h2 class="text-lg font-semibold">Advice history preview</h2>
            <div class="mt-3 space-y-2 text-sm text-on-surface-variant dark:text-[#c7cdc3]">
                <p>Today: {{ $recommendation }}</p>
                <p>Yesterday: Wait for updated source checks</p>
            </div>
        </section>
    </section>
@endsection
