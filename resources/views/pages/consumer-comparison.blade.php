@extends('layouts.app')

@section('content')
    <section class="space-y-4">
        <div>
            <p class="text-sm font-semibold text-secondary">Consumer Comparison</p>
            <h1 class="mt-1 text-2xl font-bold">Compare retail rice prices</h1>
            <p class="mt-2 text-sm text-on-surface-variant dark:text-[#c7cdc3]">For household buyers checking ordinary, well-milled, and special rice prices in M'lang.</p>
        </div>

        <div class="grid gap-3">
            @foreach (array_slice($prices, 2) as $price)
                @include('partials.price-card', ['price' => $price])
            @endforeach
        </div>

        <section class="section-card">
            <h2 class="text-lg font-semibold">Best time to buy advice</h2>
            <p class="mt-2 text-sm leading-6 text-on-surface-variant dark:text-[#c7cdc3]">Buy only what is needed this week. Watch the next published update before buying larger sacks.</p>
            <p class="mt-4 rounded-xl bg-error-container p-3 text-xs font-medium text-on-error-container">{{ $disclaimer }}</p>
        </section>
    </section>
@endsection
