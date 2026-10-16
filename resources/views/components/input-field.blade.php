@props(['id', 'label' => '', 'type' => 'text', 'name', 'value' => '', 'placeholder' => '', 'required' => false])

<div>
    <label for="{{ $id ?? $name }}" class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-200">
        {{ $label }}
        @if ($required)
            <span class="text-rose-500 font-semibold">*</span>
        @endif
    </label>
    <div class="relative">
        <input type="{{ $type }}" id="{{ $id ?? $name }}" name="{{ $name }}" value="{{ old($name, $value) }}"
            @if ($type === 'number') step="any" @endif placeholder="{{ $placeholder }}"
            {{ $attributes->merge(['class' => 'w-full px-3.5 py-2.5 text-sm bg-white border border-slate-300 rounded-xl text-slate-800 placeholder-slate-400 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-600 hover:border-slate-400 shadow-sm disabled:bg-slate-50 disabled:text-slate-500 dark:bg-slate-800 dark:border-slate-700 dark:text-white dark:placeholder-slate-500 dark:focus:ring-green-400/30']) }} />
    </div>

    @error($name)
        <p class="mt-1.5 text-xs font-medium text-rose-500 flex items-center gap-1">
            <svg class="w-3.5 h-3.5 inline shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
            {{ $message }}
        </p>
    @enderror
</div>
