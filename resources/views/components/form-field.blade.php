<label for="{{ $name }}" class="ent-label">{{ $label }}</label>
@if ($type === 'textarea')
    <textarea wire:model.lazy="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}" class="ent-input"
        {{ $required }}> </textarea>
@else
    <input wire:model.lazy="{{ $name }}" id="{{ $name }}" type="{{ $type }}"
        placeholder="{{ $placeholder }}" class="ent-input" {{ $required }}>
@endif

@error($name)
    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
@enderror