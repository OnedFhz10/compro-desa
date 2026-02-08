@props([
    'type' => 'button', // button, submit, or 'a' for link
    'href' => null,
    'variant' => 'primary', // primary, secondary, danger, outline, ghost
    'size' => 'md', // sm, md, lg
    'icon' => null, // heroicon name (optional) - for now just slot or raw svg
])

@php
    $baseClass = 'inline-flex items-center justify-center gap-2 font-bold transition-all duration-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-1 disabled:opacity-50 disabled:cursor-not-allowed';
    
    $variants = [
        'primary' => 'bg-blue-600 hover:bg-blue-700 text-white shadow-lg shadow-blue-600/20 hover:shadow-blue-600/40 border border-transparent',
        'secondary' => 'bg-white hover:bg-gray-50 text-slate-700 border border-slate-200 hover:border-slate-300 shadow-sm',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white shadow-lg shadow-red-600/20 border border-transparent',
        'warning' => 'bg-orange-500 hover:bg-orange-600 text-white shadow-lg shadow-orange-500/20 border border-transparent',
        'success' => 'bg-emerald-600 hover:bg-emerald-700 text-white shadow-lg shadow-emerald-600/20 border border-transparent',
        'outline' => 'bg-transparent border border-slate-300 text-slate-600 hover:border-blue-500 hover:text-blue-600',
        'ghost' => 'bg-transparent text-slate-500 hover:bg-slate-100 hover:text-slate-700',
    ];

    $sizes = [
        'xs' => 'px-2.5 py-1.5 text-xs',
        'sm' => 'px-3 py-2 text-sm',
        'md' => 'px-5 py-2.5 text-sm',
        'lg' => 'px-6 py-3 text-base',
    ];

    $classes = $baseClass . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . ($sizes[$size] ?? $sizes['md']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
