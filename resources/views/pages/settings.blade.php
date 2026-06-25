@extends('layouts.app')

@section('content')
    <section class="space-y-4">
        <div>
            <p class="text-sm font-semibold text-secondary">Settings</p>
            <h1 class="mt-1 text-2xl font-bold">Profile preferences</h1>
            <p class="mt-2 text-sm text-on-surface-variant dark:text-[#c7cdc3]">Account preferences for the current RMAIS demo user.</p>
        </div>

        <section class="section-card space-y-4">
            <label class="block">
                <span class="text-sm font-semibold">Preferred rice type</span>
                <select class="form-control mt-2">
                    <option>Dry Palay</option>
                    <option>Fresh Palay</option>
                    <option>Ordinary Rice</option>
                    <option>Well-Milled Rice</option>
                    <option>Special Rice</option>
                </select>
            </label>
            <label class="block">
                <span class="text-sm font-semibold">Location</span>
                <input class="form-control mt-2" type="text" value="{{ $location }}" readonly>
            </label>
        </section>

        <section class="section-card">
            <h2 class="text-lg font-semibold">Display</h2>
            <p class="mt-2 text-sm text-on-surface-variant dark:text-[#c7cdc3]">Use the Theme button in the header to switch between light and dark mode.</p>
        </section>
    </section>
@endsection
