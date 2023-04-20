<div>
    <x-aui::forms.form action="{{ route('admin.generic_export.export', [
                'model'          => $model,
                'modelNamespace' => $modelNameSpace
    ]) }}" method="get" >
        <button class="btn btn-sm btn-outline-secondary" type="submit">
            {{ __('adminui.export') }}
        </button>
    </x-aui::forms.form>
</div>
