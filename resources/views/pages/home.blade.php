@extends('layouts.app')

@section('content')
    <section class="space-y-4">
        <div class="rounded-3xl bg-primary p-5 text-on-primary dark:bg-[#91d78a] dark:text-[#05220a]">
            <p class="text-sm font-semibold">Rice and palay price monitoring</p>
            <h1 class="mt-3 text-3xl font-bold leading-tight">Local price guidance for M'lang rice decisions.</h1>
            <p class="mt-3 text-sm leading-6 opacity-90">View published rice prices, simple trends, and Smart Recommendation summaries built for farmers, buyers, and consumers in M'lang, North Cotabato.</p>
            <div class="mt-5 flex flex-wrap gap-2">
                <a class="primary-button bg-on-primary text-primary hover:bg-surface-container-high dark:bg-[#05220a] dark:text-white" href="/prices">View prices</a>
                <a class="secondary-button border-white/40 bg-white/10 text-on-primary hover:bg-white/20 dark:text-[#05220a]" href="/onboarding">Start tour</a>
            </div>
        </div>

        <div class="grid gap-3">
            @foreach (array_slice($prices, 0, 2) as $price)
                @include('partials.price-card', ['price' => $price])
            @endforeach
        </div>

        <section class="section-card">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-secondary">Today</p>
                    <h2 class="mt-1 text-xl font-semibold">Smart Recommendation</h2>
                </div>
                <span class="chip">High confidence</span>
            </div>
            <p class="mt-3 text-2xl font-bold">{{ $recommendation }}</p>
            <p class="mt-2 text-sm leading-6 text-on-surface-variant dark:text-[#c7cdc3]">Prices are increasing, so farmers may compare rice buyers before selling. Consumers may watch well-milled rice prices before buying in bulk.</p>
            <p class="mt-4 rounded-xl bg-error-container p-3 text-xs font-medium text-on-error-container">{{ $disclaimer }}</p>
        </section>
    </section>
@endsection
