@if (admin()->can('delete'))
    <v-tooltip top>
        <template #activator="{ on }">
            <v-btn small icon v-on="on" v-on:click="(ev) => {
                    $set(temp, 'id', {{ $id ?? 'value' }});
                    $set(show, 'deleteModal', true);
                    $set(temp, 'done', () => deleteRow(ev));
                }">
                <v-icon color="error" small>mdi-trash-can-outline</v-icon>
            </v-btn>
        </template>
        <small>
            Delete this item
        </small>
    </v-tooltip>
@endif
