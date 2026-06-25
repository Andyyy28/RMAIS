@extends('layouts.app')

@section('content')
    <section class="space-y-4">
        <div>
            <p class="text-sm font-semibold text-secondary">Public Price Board</p>
            <h1 class="mt-1 text-2xl font-bold">Published rice prices</h1>
            <p class="mt-2 text-sm text-on-surface-variant dark:text-[#c7cdc3]">Sample Phase 1 prices for M'lang, North Cotabato. Database-backed publishing starts in Phase 3.</p>
        </div>

        <div class="grid gap-3">
            @foreach ($prices as $price)
                @include('partials.price-card', ['price' => $price])
            @endforeach
        </div>

        <section class="section-card">
            <h2 class="text-lg font-semibold">Basic trend summary</h2>
            <div class="mt-4 space-y-3">
                <div class="h-3 rounded-full bg-surface-container-high dark:bg-white/10">
                    <div class="h-3 w-4/5 rounded-full bg-secondary-container"></div>
                </div>
                <p class="text-sm leading-6 text-on-surface-variant dark:text-[#c7cdc3]">Trend label: Increasing. Confidence: High. Sources checked: 3.</p>
            </div>
        </section>
    </section>
@endsection
