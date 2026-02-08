@props(['type' => 'info', 'message' => null])

@php
    $colors = [
        'success' => 'bg-emerald-50 text-emerald-700 border-emerald-200 icon-emerald-500',
        'error' => 'bg-red-50 text-red-700 border-red-200 icon-red-500',
        'warning' => 'bg-orange-50 text-orange-700 border-orange-200 icon-orange-500',
        'info' => 'bg-blue-50 text-blue-700 border-blue-200 icon-blue-500',
    ];

    $icons = [
        'success' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />',
        'error' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
        'warning' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />',
        'info' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
    ];

    $style = $colors[$type] ?? $colors['info'];
    $icon = $icons[$type] ?? $icons['info'];
@endphp

@if ($message)
    <div {{ $attributes->merge(['class' => "flex items-center gap-3 px-4 py-3 rounded-xl border $style mb-6 shadow-sm"]) }} role="alert">
        <svg class="w-5 h-5 flex-shrink-0 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            {!! $icon !!}
        </svg>
        <span class="text-sm font-medium">{{ $message }}</span>
    </div>
@endif
