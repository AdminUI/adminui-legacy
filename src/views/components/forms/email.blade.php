@php
if ($errors->has($name)) {
    $hint  = $errors->first($name);
    $error = true;
}
@endphp

<v-text-field
    label="{{ $label ?? ucwords($name) }}"
    name="{{ $name ?? '' }}"
    value="{!! $value ?? old('value') !!}"
    class="{!! $class ?? '' !!}"
    id="{{ $id ?? '' }}"
    placeholder="{!! $placeholder ?? '' !!}"
    {!! !empty($required) ? 'required="required" aria-required="true"' : '' !!}
    {!! !empty($custom) ? $custom :
        (Admin() ? 'outlined' : config('setting.form-style', 'outlined')) !!}
    clearable
    {!! !empty($length) ? 'counter'. (intval($length) > 2 ? '='.$length : '') : '' !!}
    {!! !empty($normal) ? '' : 'dense' !!}
    {!! !empty($hint) ? "hint='$hint'" : '' !!}
    {!! !empty($error) ? 'error persistent-hint' : '' !!}
    {!! !empty($vmodel) ? "v-model='$vmodel'": '' !!}
    type="email"
></v-text-field>
