<v-tooltip top>
    <template #activator="{ on }">
        <v-btn small icon href="{{ $route }}" v-on="on">
            <v-icon color="info" small>mdi-pencil</v-icon>
        </v-btn>
    </template>
    <small>Edit details</small>
</v-tooltip>
