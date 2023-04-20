@php
$sorted = [];

if ($errors->has($name)) {
    $hint = $errors->first($name);
    $error = true;
}

//  decode json
$options = json_decode($options, true);
foreach ($options as $key => $option) {
    $sorted[] = [
        'value' => (string) $key,
        'text' => (string) $option,
    ];
}
@endphp

<v-select
    label="{{ $label ?? ucwords($name) }}"
    name="{{ $name ?? '' }}"
    class="{!! $class ?? 'mb-0' !!}"
    chips
    multiple
    placeholder="{!! $placeholder ?? '' !!}"
    {!! !empty($required) ? 'required="required" aria-required="true"' : '' !!}
    {!! !empty($custom) ? $custom :
         (Admin() ? 'outlined' : config('setting.form-style', 'outlined' )) !!}
    clearable

    @if (empty($value))
        value="{{ '' }}"
    @else
        :value='Object.entries({{ $value }}).map(([key,value]) => {
            return {
                value: key,
                text: value
            }
        })'
    @endif

    {!! !empty($length) ? 'counter' . (intval($length)> 2 ? '='.$length : '') : '' !!}
    {!! !empty($normal) ? '' : 'dense small-chips' !!}
    {!! !empty($hint) ? "hint='$hint'" : '' !!}
    {!! !empty($error) ? 'error persistent-hint' : '' !!}
    {!! !empty($vmodel) ? "v-model='$vmodel'": '' !!}
    :items='@json($sorted)'
    >
</v-select>
