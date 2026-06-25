const CACHE_VERSION = 'rmais-phase-1';

self.addEventListener('install', (event) => {
    self.skipWaiting();
});

self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys().then((keys) => Promise.all(
            keys.filter((key) => key !== CACHE_VERSION).map((key) => caches.delete(key))
        ))
    );
});

self.addEventListener('fetch', () => {
    // Phase 1 only registers the PWA shell. Price data caching is planned for Phase 6.
});
