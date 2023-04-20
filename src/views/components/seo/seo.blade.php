<div class="card">
    <div class="card-header">
        SEO
    </div>
    <div class="card-body">
        {!! Form::auiText('slug', old('slug', $seo->slug), [
                'required' => 'required',
                'aria-required' => true
            ], __('adminui.slug')) !!}
        {!! Form::auiText('meta_title', old('meta_title', $seo->meta_title), [
                'class' => 'limitLength'
            ], __('adminui.meta_title')) !!}
        {!! Form::auiText('meta_description', old('meta_description', $seo->meta_description), [
                'class' => 'limitLength'
            ], __('adminui.meta_description')) !!}
        {!! Form::auiText('canonical', old('canonical', $seo->canonical), [
            ], __('adminui.canonical')) !!}
    </div>
</div>
