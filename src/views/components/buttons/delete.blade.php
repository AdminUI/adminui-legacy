@if (admin()->can('delete'))
    <v-btn x-small outlined color="error"
        v-on:click="$set(temp, 'id', {{ $id }}) && $set(show, 'deleteModal', true)">
        {{ __('adminui.delete') }}
    </v-btn>
@endif
