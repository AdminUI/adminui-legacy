<v-tooltip top>
    <template #activator="{ on }">
        <v-btn small icon :href="item.edit" v-on="on">
            <v-icon color="info" small>mdi-pencil</v-icon>
        </v-btn>
    </template>
    <small>Edit details for @{{ item . name }}</small>
</v-tooltip>
