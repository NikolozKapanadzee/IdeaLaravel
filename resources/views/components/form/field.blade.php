@props(['label', 'name', 'type' => 'text'])
<div class="space-y-2">
    <label for="{{ $name }}" class="label">{{ $label }}</label>
    <input type="{{ $type }}" class="input" id="{{ $name }}" value="{{ old($name) }}"
        name="{{ $name }}" {{ $attributes }}>

    @error($name)
        <p class="error">{{ $message }}</p>
    @enderror
</div>
