@props([
    'color' => 'gray', // gray, blue, red, green, yellow, purple
    'dot' => false,
])

@php
    $colors = [
        'gray' => 'bg-gray-100 text-gray-600 border-gray-200',
        'blue' => 'bg-blue-50 text-blue-600 border-blue-200',
        'red' => 'bg-red-50 text-red-600 border-red-200',
        'green' => 'bg-emerald-50 text-emerald-600 border-emerald-200',
        'yellow' => 'bg-amber-50 text-amber-600 border-amber-200',
        'purple' => 'bg-purple-50 text-purple-600 border-purple-200',
        'indigo' => 'bg-indigo-50 text-indigo-600 border-indigo-200',
    ];
    
    $dots = [
        'gray' => 'bg-gray-400',
        'blue' => 'bg-blue-400',
        'red' => 'bg-red-400',
        'green' => 'bg-emerald-400',
        'yellow' => 'bg-amber-400',
        'purple' => 'bg-purple-400',
        'indigo' => 'bg-indigo-400',
    ];

    $style = $colors[$color] ?? $colors['gray'];
    $dotStyle = $dots[$color] ?? $dots['gray'];
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold border $style"]) }}>
    @if($dot)
        <span class="w-1.5 h-1.5 rounded-full {{ $dotStyle }}"></span>
    @endif
    {{ $slot }}
</span>
