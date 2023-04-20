<v-text-field label="{{ $label ?? ucwords($name) }}" name="{{ $name ?? '' }}" value="{{ $value ?? old('value') }}"
    class="{{ $class ?? '' }}" placeholder="{{ $placeholder ?? '' }}"
    {{ !empty($required) ? 'required="required" aria-required="true"' : '' }} {!! !empty($custom) ? $custom : (Admin() ? 'outlined' : config('setting.form-style', 'outlined')) !!} clearable
    {!! !empty($length) ? 'counter' . (intval($length) > 2 ? '=' . $length : '') : '' !!} {!! !empty($normal) ? '' : 'dense' !!} {!! !empty($hint) ? "hint='$hint'" : '' !!}
    :append-icon="show['{{ $name }}-eye'] ? 'mdi-eye-off' : 'mdi-eye'"
    @click:append="$set(show, '{{ $name }}-eye', !show['{{ $name }}-eye'])"
    :type="show['{{ $name }}-eye'] ? 'text' : 'password'"></v-text-field>
