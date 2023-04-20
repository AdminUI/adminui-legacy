{{-- <aui-switch label="{{ $label }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}" true-value="1"
    false-value="0">
</aui-switch> --}}

<v-switch name="{!! $name ?? '' !!}" label="{!! $label ?? '' !!}" value="{{ $inputvalue ?? 1 }}" {!! !empty($vmodel) ? "v-model='$vmodel'" : 'input-value="' . $value . '"' !!}>
</v-switch>
