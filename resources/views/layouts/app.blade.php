<!doctype html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#00450d">
    <meta name="description" content="RMAIS is a mobile-first rice and palay price monitoring system for M'lang, North Cotabato.">
    <link rel="manifest" href="/manifest.webmanifest">
    <link rel="icon" href="/icon.svg" type="image/svg+xml">
    <title>{{ $title ?? 'RMAIS' }} - Rice Market and Advisory</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @php
        $navItems = [
            ['label' => 'Home', 'path' => '/', 'match' => '/'],
            ['label' => 'Prices', 'path' => '/prices', 'match' => 'prices'],
            ['label' => 'Advice', 'path' => '/advisor', 'match' => 'advisor'],
            ['label' => 'Planner', 'path' => '/planting-planner', 'match' => 'planting-planner'],
            ['label' => 'Profile', 'path' => '/settings', 'match' => 'settings'],
        ];
    @endphp

    <div class="app-shell">
        <header class="sticky top-0 z-20 border-b border-outline-variant/70 bg-surface/95 px-4 py-3 backdrop-blur dark:border-white/10 dark:bg-[#111411]/95">
            <div class="flex items-center justify-between gap-3">
                <a href="/" class="flex min-w-0 items-center gap-3" aria-label="RMAIS home">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-primary text-sm font-bold text-on-primary dark:bg-[#91d78a] dark:text-[#05220a]">RM</span>
                    <span class="min-w-0">
                        <span class="block truncate text-sm font-bold leading-5">RMAIS</span>
                        <span class="block truncate text-xs text-on-surface-variant dark:text-[#c7cdc3]">M'lang, North Cotabato</span>
                    </span>
                </a>
                <button class="secondary-button !min-h-10 !px-3" type="button" data-theme-toggle aria-label="Toggle light and dark mode">
                    <span class="text-xs">Theme</span>
                </button>
            </div>
        </header>

        <main class="screen-pad py-4">
            @yield('content')
        </main>

        <nav class="fixed inset-x-0 bottom-0 z-30 mx-auto max-w-md border-t border-outline-variant/70 bg-surface/95 px-3 py-2 backdrop-blur dark:border-white/10 dark:bg-[#111411]/95" aria-label="Primary">
            <div class="flex gap-1">
                @foreach ($navItems as $item)
                    @php
                        $active = $item['match'] === '/' ? request()->is('/') : request()->is($item['match']);
                    @endphp
                    <a class="bottom-nav-link {{ $active ? 'bottom-nav-link-active' : '' }}" href="{{ $item['path'] }}">
                        <span aria-hidden="true" class="h-1.5 w-1.5 rounded-full {{ $active ? 'bg-current' : 'bg-outline-variant dark:bg-white/20' }}"></span>
                        <span class="truncate">{{ $item['label'] }}</span>
                    </a>
                @endforeach
            </div>
        </nav>
    </div>
</body>
</html>
