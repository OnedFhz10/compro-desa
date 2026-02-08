@props([
    'title',
    'subtitle' => null,
    'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=60&w=1200&auto=format&fit=crop',
    'height' => 'h-[400px]'
])

<section {{ $attributes->merge(['class' => "relative bg-slate-900 $height flex items-center overflow-hidden"]) }}>
    {{-- Background Image --}}
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-blue-900/30 z-10"></div>
        <img src="{{ $image }}"
            alt="{{ $title }} Background" class="w-full h-full object-cover opacity-60" width="1200" height="400" loading="eager">
    </div>

    <div class="container mx-auto px-4 lg:px-8 relative z-20 text-center pt-10">
        <span class="text-blue-400 font-bold tracking-widest text-sm uppercase mb-2 block animate-fade-in-up">
            {{ $subtitle ?? 'Desa Digital' }}
        </span>
        <h1 class="text-4xl lg:text-5xl font-extrabold text-white mb-4 drop-shadow-lg animate-fade-in-up">
            {!! $title !!}
        </h1>
        
        {{-- Slot for extra content like descriptions or breadcrumbs --}}
        @if($slot->isNotEmpty())
        <div class="text-slate-300 text-lg max-w-2xl mx-auto animate-fade-in-up">
            {{ $slot }}
        </div>
        @endif
    </div>
</section>
