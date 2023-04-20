@php
if ($errors->has($name)) {
    $hint = $errors->first($name);
    $error = true;
}
@endphp

<v-text-field label="{{ $label ?? ucwords($name) }}" name="{{ $name ?? '' }}" value="{!! $value ?? old('value') !!}"
    class="{!! $class ?? '' !!}" id="{{ $id ?? 'undefined' }}" placeholder="{!! $placeholder ?? '' !!}"
    {!! !empty($required) ? 'required="required" aria-required="true"' : '' !!} {!! !empty($custom) ? $custom : (Admin() ? 'outlined' : config('setting.form-style', 'outlined')) !!} clearable {!! !empty($length) ? 'counter' . (intval($length) > 2 ? '=' . $length : '') : '' !!} {!! !empty($normal) ? '' : 'dense' !!}
    {!! !empty($hint) ? "hint='$hint'" : '' !!} {!! !empty($hidedetails) ? 'hide-details' : '' !!} {!! !empty($error) ? 'error persistent-hint' : '' !!} {!! !empty($vmodel) ? "v-model='$vmodel'" : '' !!}
    {!! !empty($prefix) ? "prefix='$prefix'" : '' !!} {!! !empty($form) ? 'form="'.$form.'"' : '' !!}>
</v-text-field>
