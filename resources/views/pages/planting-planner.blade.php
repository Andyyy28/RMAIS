@extends('layouts.app')

@section('content')
    <section class="space-y-4">
        <div>
            <p class="text-sm font-semibold text-secondary">Planting Planner</p>
            <h1 class="mt-1 text-2xl font-bold">Estimate harvest timing</h1>
            <p class="mt-2 text-sm text-on-surface-variant dark:text-[#c7cdc3]">A static Phase 1 preview of the planner flow. Computed harvest advice starts in Phase 5.</p>
        </div>

        <section class="section-card space-y-4">
            <label class="block">
                <span class="text-sm font-semibold">Planting date</span>
                <input class="form-control mt-2" type="date" value="2026-07-01">
            </label>
            <label class="block">
                <span class="text-sm font-semibold">Rice duration</span>
                <select class="form-control mt-2">
                    <option>90 days</option>
                    <option selected>110 days</option>
                    <option>120 days</option>
                    <option>Custom duration</option>
                </select>
            </label>
            <button class="primary-button w-full" type="button">Preview advice</button>
        </section>

        <section class="section-card">
            <span class="chip">Neutral</span>
            <h2 class="mt-3 text-xl font-semibold">Estimated harvest window</h2>
            <p class="mt-2 text-sm leading-6 text-on-surface-variant dark:text-[#c7cdc3]">This preview estimates an October harvest window. Historical comparison will be added when price history is available.</p>
        </section>
    </section>
@endsection
