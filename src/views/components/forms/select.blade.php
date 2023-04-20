@php
$sorted = [];

if ($errors->has($name)) {
    $hint = $errors->first($name);
    $error = true;
}
foreach ($options as $key => $option) {
    $sorted[] = [
        'value' => (string) $key,
        'text' => (string) $option,
    ];
}
@endphp

<v-select label="{{ $label ?? ucwords($name) }}" name="{{ $name ?? '' }}" value="{{ $value ?? old('value') }}"
    class="{!! $class ?? '' !!}" id="{{ $id ?? '' }}" placeholder="{!! $placeholder ?? '' !!}"
    {!! !empty($required) ? 'required="required" aria-required="true"' : '' !!} {!! !empty($custom) ? $custom : (Admin() ? 'outlined' : config('setting.form-style', 'outlined')) !!} clearable {!! !empty($length) ? 'counter' . (intval($length) > 2 ? '=' . $length : '') : '' !!} {!! !empty($normal) ? '' : 'dense' !!} {!! !empty($hidedetails) ? 'hide-details' : '' !!}
    {!! !empty($hint) ? "hint='$hint'" : '' !!} {!! !empty($error) ? 'error persistent-hint' : '' !!} {!! !empty($vmodel) ? "v-model='$vmodel'" : '' !!} :items='@json($sorted)'>
</v-select>
