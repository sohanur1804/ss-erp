<label for="{{ $name }}" class="ss-label">{{ $label }}</label>
@if ($type === 'textarea')
    <textarea wire:model.lazy="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}" class="ss-input"
        {{ $required }}> </textarea>
@else
    <input wire:model.lazy="{{ $name }}" id="{{ $name }}" type="{{ $type }}"
        placeholder="{{ $placeholder }}" class="ss-input" {{ $required }}>
@endif

@error($name)
    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
@enderror