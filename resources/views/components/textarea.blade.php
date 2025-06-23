@props(['id', 'label' => '', 'name', 'value' => '', 'placeholder' => '', 'required' => false])

<div>
    <label for="{{ $id ?? $name }}" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">
        {{ $label }} @if ($required)
            <span class="text-red-500">*</span>
        @endif
    </label>

    <textarea id="{{ $id ?? $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) }}>{{ old($name, $value) }}</textarea>

    @error($name)
        <span class="text-sm text-red-500">{{ $message }}</span>
    @enderror
</div>
