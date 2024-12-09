@php
    $class ??= 'null';
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp

<div @class(['form-group', $class]) class="form-control">
    <label for="{{ $name }}">{{ $label }}</label>

    <select name="{{ $name }}[]" id="{{ $name }}" multiple>
        @foreach ($options as $k => $v)
            <option @selected($value->contains($k)) value="{{ $k }}">{{ $v }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
