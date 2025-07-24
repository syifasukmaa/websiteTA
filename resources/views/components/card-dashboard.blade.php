@props(['judul' => '', 'text' => '', 'type' => '', 'background' => ''])


<div class="flex flex-col items-center justify-center p-5 bg-white shadow-md rounded-2xl">

    <div class="p-3 mb-2 rounded-full w-fit {{ $background }}">

        {{ $slot }}
    </div>
    <h4 class="mb-1 text-sm">{{ $judul }}</h4>
    <span class="flex items-center justify-center space-x-2">
        <p class="text-2xl font-semibold text-green-600">{{ $text }} </p>
        <p class="{{ $type === 'number' ? 'hidden' : '' }}">
            Data
            @if ($type === 'kambing')
                Kambing
            @elseif ($type === 'sapi')
                Sapi
            @else
                {{ $type }}
            @endif
        </p>

    </span>

</div>
