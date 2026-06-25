@extends('layouts.app')

@section('content')
    <section class="space-y-4">
        <div>
            <p class="text-sm font-semibold text-secondary">Consumer Dashboard</p>
            <h1 class="mt-1 text-2xl font-bold">Retail rice watchlist</h1>
            <p class="mt-2 text-sm leading-6 text-on-surface-variant dark:text-[#c7cdc3]">Phase 2 access placeholder for household rice price checking in M'lang.</p>
        </div>

        <div class="grid gap-3">
            @foreach (array_slice($prices, 2) as $price)
                @include('partials.price-card', ['price' => $price])
            @endforeach
        </div>

        <a class="secondary-button w-full" href="{{ route('consumer-comparison') }}">Compare retail rice</a>
    </section>
@endsection
