@php
if ($errors->has($name)) {
    $hint  = $errors->first($name);
    $error = true;
}
@endphp

<v-textarea
    label="{{ $label ?? ucwords($name) }}"
    name="{{ $name ?? '' }}"
    value="{!! $value ?? old('value') !!}"
    class="{{ $class ?? '' }}"
    placeholder="{{ $placeholder ?? '' }}"
    {{ !empty($required) ? 'required="required" aria-required="true"' : '' }}
    {!! !empty($custom) ? $custom :
        (Admin() ? 'outlined' : config('setting.form-style', 'outlined')) !!}
    clearable
    auto-grow
    {{ !empty($length) ? 'counter'. (intval($length) > 2 ? '='.$length : '') : '' }}
    {{ !empty($normal) ? '' : 'dense' }}
    {{ !empty($hint) ? 'hint="'.$hint.'"' : '' }}
    {{ !empty($rows) ? 'rows="'.$rows.'"' : '' }}
    {!! !empty($error) ? 'error persistent-hint' : '' !!}
    {!! !empty($vmodel) ? "v-model='$vmodel'": '' !!}
>
</v-textarea>
