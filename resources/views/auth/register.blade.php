@extends('layouts.app')

@section('content')
    <section class="space-y-5">
        <div>
            <p class="text-sm font-semibold text-secondary">Create account</p>
            <h1 class="mt-1 text-2xl font-bold">Join the M'lang rice advisory system</h1>
            <p class="mt-2 text-sm leading-6 text-on-surface-variant dark:text-[#c7cdc3]">Registration is open for farmers, rice traders, and consumers only.</p>
        </div>

        <form class="section-card space-y-4" method="POST" action="{{ route('register.store') }}">
            @csrf
            <label class="block">
                <span class="text-sm font-semibold">Name</span>
                <input class="form-control mt-2" type="text" name="name" value="{{ old('name') }}" autocomplete="name" required autofocus>
                @error('name')
                    <span class="mt-2 block text-xs font-semibold text-error">{{ $message }}</span>
                @enderror
            </label>
            <label class="block">
                <span class="text-sm font-semibold">Email</span>
                <input class="form-control mt-2" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required>
                @error('email')
                    <span class="mt-2 block text-xs font-semibold text-error">{{ $message }}</span>
                @enderror
            </label>
            <label class="block">
                <span class="text-sm font-semibold">Role</span>
                <select class="form-control mt-2" name="role" required>
                    @foreach ($roles as $slug => $label)
                        <option value="{{ $slug }}" @selected(old('role') === $slug)>{{ $label }}</option>
                    @endforeach
                </select>
                @error('role')
                    <span class="mt-2 block text-xs font-semibold text-error">{{ $message }}</span>
                @enderror
            </label>
            <label class="block">
                <span class="text-sm font-semibold">Password</span>
                <input class="form-control mt-2" type="password" name="password" autocomplete="new-password" required>
                @error('password')
                    <span class="mt-2 block text-xs font-semibold text-error">{{ $message }}</span>
                @enderror
            </label>
            <label class="block">
                <span class="text-sm font-semibold">Confirm password</span>
                <input class="form-control mt-2" type="password" name="password_confirmation" autocomplete="new-password" required>
            </label>
            <button class="primary-button w-full" type="submit">Create account</button>
        </form>

        <p class="text-center text-sm text-on-surface-variant dark:text-[#c7cdc3]">
            Already registered?
            <a class="font-semibold text-primary dark:text-[#91d78a]" href="{{ route('login') }}">Login</a>
        </p>
    </section>
@endsection
