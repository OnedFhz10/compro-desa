@props([
    'headers' => [], // Array of strings (optional, or use slot:head)
])

<div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 overflow-hidden">
    {{-- Header Content (Search, Filters, etc) --}}
    @if(isset($toolbar))
        <div class="p-5 border-b border-gray-700">
            {{ $toolbar }}
        </div>
    @endif

    {{-- Responsive Table Wrapper --}}
    <div class="overflow-x-auto">
        <table {{ $attributes->merge(['class' => 'w-full text-left text-gray-300']) }}>
            <thead class="bg-gray-700/50 text-xs uppercase font-bold text-gray-400 tracking-wider">
                <tr>
                    {{ $head ?? '' }}
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                {{ $slot }}
            </tbody>
        </table>
    </div>
    
    {{-- Footer/Pagination --}}
    @if(isset($footer))
        <div class="px-5 py-4 border-t border-gray-700 bg-gray-800/50">
            {{ $footer }}
        </div>
    @endif
</div>
