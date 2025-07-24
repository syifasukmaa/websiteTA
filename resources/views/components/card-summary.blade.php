@props([
    'title' => 'Judul',
    'value' => '0',
    'subtitle' => 'Deskripsi',
    'percentage' => null,
    'percentageColor' => 'green',
    'icon' => null,
])

<div class="w-full max-w-sm p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800 md:p-6">
    <div class="flex flex-col items-center justify-center pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex flex-col items-center justify-center">
            <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-lg dark:bg-gray-700 me-3">
                {{-- Icon slot --}}
                {{ $icon }}
            </div>
            <div>
                <h5 class="pb-1 text-2xl font-bold leading-none text-gray-900 dark:text-white">
                    {{ $value }}
                </h5>
                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    {{ $subtitle }}
                </p>
            </div>
        </div>
        @if ($percentage !== null)
            <div>
                <span
                    class="bg-{{ $percentageColor }}-100 text-{{ $percentageColor }}-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-{{ $percentageColor }}-900 dark:text-{{ $percentageColor }}-300">
                    <svg class="w-2.5 h-2.5 me-1.5" fill="none" viewBox="0 0 10 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13V1m0 0L1 5m4-4 4 4" />
                    </svg>
                    {{ $percentage }}
                </span>
            </div>
        @endif
    </div>

    {{-- Optional Footer or Extra Info --}}
    {{ $slot }}
</div>
