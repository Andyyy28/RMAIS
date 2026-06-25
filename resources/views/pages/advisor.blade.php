@extends('layouts.app')

@section('content')
    <section class="space-y-4">
        <div>
            <p class="text-sm font-semibold text-secondary">Smart Recommendation</p>
            <h1 class="mt-1 text-2xl font-bold">Sell, wait, buy, or hold</h1>
            <p class="mt-2 text-sm text-on-surface-variant dark:text-[#c7cdc3]">Phase 1 shows the planned advice experience using explainable sample signals only.</p>
        </div>

        <section class="rounded-3xl bg-primary p-5 text-on-primary dark:bg-[#91d78a] dark:text-[#05220a]">
            <p class="text-sm font-semibold">Current advice</p>
            <h2 class="mt-3 text-3xl font-bold">{{ $recommendation }}</h2>
            <p class="mt-3 text-sm leading-6 opacity-90">Dry Palay is at PHP 23.50/kg with an increasing trend and high source confidence.</p>
        </section>

        <div class="grid gap-3">
            <div class="section-card">
                <h2 class="text-lg font-semibold">For farmers</h2>
                <p class="mt-2 text-sm leading-6 text-on-surface-variant dark:text-[#c7cdc3]">Compare buyers first. If urgent, sell a portion now and monitor the next published price update.</p>
            </div>
            <div class="section-card">
                <h2 class="text-lg font-semibold">For buyers</h2>
                <p class="mt-2 text-sm leading-6 text-on-surface-variant dark:text-[#c7cdc3]">Hold large buying decisions if the source spread widens; buy only when confidence remains high.</p>
            </div>
        </div>

        <p class="rounded-xl bg-error-container p-3 text-xs font-medium text-on-error-container">{{ $disclaimer }}</p>
    </section>
@endsection
