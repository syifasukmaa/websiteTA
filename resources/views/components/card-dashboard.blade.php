@props(['judul' => '', 'text' => '', 'type' => '', 'background' => ''])


<div class="relative overflow-hidden bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all duration-300 group hover:-translate-y-1">
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p class="text-xs font-semibold tracking-wider uppercase text-slate-400 mb-1.5 truncate">{{ $judul }}</p>
            <h3 class="text-xl sm:text-2xl font-bold text-slate-800 tracking-tight flex items-baseline gap-1.5 flex-wrap">
                <span class="truncate">{{ $text }}</span>
                @if ($type !== 'number' && $type !== '')
                    <span class="text-xs font-medium text-slate-400 shrink-0">
                        @if ($type === 'kambing') Ekor @elseif ($type === 'sapi') Kelompok @else {{ $type }} @endif
                    </span>
                @endif
            </h3>
        </div>
        <div class="p-3 rounded-xl {{ $background }} bg-opacity-20 shrink-0 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
            {{ $slot }}
        </div>
    </div>
    <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
        <span class="flex items-center gap-1.5 font-medium text-emerald-600 shrink-0">
            <span class="inline-block w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
            Data Aktif
        </span>
        <span class="text-slate-400 text-[11px] truncate">Sistem Masjid</span>
    </div>
</div>
