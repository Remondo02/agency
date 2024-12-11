@php
    $class ??= null;
    $multiple ??= false;
@endphp

<div @class(['form-group', $class]) class="form-control">
    <label for="{{ $name }}">{{ $label }}</label>
    <input @if ($multiple) multiple @endif class="form-control @error($name)
    is-invalid @enderror"
        type="file" id="{{ $name }}" name="{{ $name . ($multiple ? '[]' : '') }}">
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
