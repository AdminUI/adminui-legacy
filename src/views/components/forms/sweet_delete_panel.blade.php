@if (Admin()->can('delete'))
{{-- <x-aui-card>
    <div class="alert alert-danger mt-2 text-center">
        <strong>Danger Zone</strong><br/>
        If you delete this, it is not recoverable.<br/> Please proceed with caution.
        <x-aui::forms.sweet_delete url="{{ $url }}" />
    </div>
</x-aui-card> --}}
@endif

