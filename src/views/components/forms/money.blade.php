<div class="form-group">
    {{ Form::label($label ?? $name, null, ['class' => 'control-label']) }}
    {{ Form::text($name, $value, array_merge_recursive(['class' => 'form-control'], $attributes)) }}
</div>
