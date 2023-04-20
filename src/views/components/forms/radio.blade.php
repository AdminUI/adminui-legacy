<div class="form-group">
    <label for="{{ $name }}">{{ $label ?? $name }}</label>
    @foreach ($options as $option)
        {!! Form::radio($name, $option->id, $row->!!}
    <input type="checkbox" id="{{ $name }}" value="1" name="{{ $name }}" {{  $checked ? 'checked' : '' }}>
</div>