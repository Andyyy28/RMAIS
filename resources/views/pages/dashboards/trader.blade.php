@extends('layouts.app')

@section('content')
    <section class="space-y-4">
        <div>
            <p class="text-sm font-semibold text-secondary">Rice Trader Dashboard</p>
            <h1 class="mt-1 text-2xl font-bold">Buyer view for M'lang palay signals</h1>
            <p class="mt-2 text-sm leading-6 text-on-surface-variant dark:text-[#c7cdc3]">Phase 2 access placeholder for rice trader accounts. Price publishing workflows start in Phase 3.</p>
        </div>

        @include('partials.price-card', ['price' => $prices[0]])

        <section class="section-card">
            <h2 class="text-lg font-semibold">Buying note</h2>
            <p class="mt-2 text-sm leading-6 text-on-surface-variant dark:text-[#c7cdc3]">Use the public price board and Smart Recommendation before confirming dry palay buying decisions.</p>
        </section>
    </section>
@endsection
