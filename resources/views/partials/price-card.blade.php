<article class="section-card">
    <div class="flex items-start justify-between gap-3">
        <div>
            <h3 class="text-base font-semibold">{{ $price['category'] }}</h3>
            <p class="mt-1 text-xs text-on-surface-variant dark:text-[#c7cdc3]">Published sample price</p>
        </div>
        <span class="chip">{{ $price['confidence'] }}</span>
    </div>
    <div class="mt-4 flex items-end justify-between gap-3">
        <p class="text-2xl font-bold tracking-tight">{{ $price['price'] }}</p>
        <p class="text-sm font-semibold text-primary dark:text-[#91d78a]">{{ $price['change'] }}</p>
    </div>
    <div class="mt-3 grid grid-cols-2 gap-2 text-xs text-on-surface-variant dark:text-[#c7cdc3]">
        <span>Trend: {{ $price['trend'] }}</span>
        <span class="text-right">Sources: {{ $price['sources'] }}</span>
    </div>
</article>
