@extends('layouts.app')

@section('content')
    <section class="space-y-5">
        <div>
            <p class="text-sm font-semibold text-secondary">Account access</p>
            <h1 class="mt-1 text-2xl font-bold">Login to RMAIS</h1>
            <p class="mt-2 text-sm leading-6 text-on-surface-variant dark:text-[#c7cdc3]">Use your M'lang rice market account to open the correct dashboard.</p>
        </div>

        <form class="section-card space-y-4" method="POST" action="{{ route('login.store') }}">
            @csrf
            <label class="block">
                <span class="text-sm font-semibold">Email</span>
                <input class="form-control mt-2" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus>
                @error('email')
                    <span class="mt-2 block text-xs font-semibold text-error">{{ $message }}</span>
                @enderror
            </label>
            <label class="block">
                <span class="text-sm font-semibold">Password</span>
                <input class="form-control mt-2" type="password" name="password" autocomplete="current-password" required>
                @error('password')
                    <span class="mt-2 block text-xs font-semibold text-error">{{ $message }}</span>
                @enderror
            </label>
            <label class="flex items-center gap-2 text-sm text-on-surface-variant dark:text-[#c7cdc3]">
                <input class="h-4 w-4 rounded border-outline-variant text-primary focus:ring-primary" type="checkbox" name="remember" value="1">
                Remember this device
            </label>
            <button class="primary-button w-full" type="submit">Login</button>
        </form>

        <p class="text-center text-sm text-on-surface-variant dark:text-[#c7cdc3]">
            New farmer, rice trader, or consumer?
            <a class="font-semibold text-primary dark:text-[#91d78a]" href="{{ route('register') }}">Create an account</a>
        </p>
    </section>
@endsection
