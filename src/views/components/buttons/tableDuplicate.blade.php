<v-tooltip top>
    <template #activator="{ on }">
        <v-btn small icon :href="item.duplicate" v-on="on">
            <v-icon color="warning" small>mdi-content-copy</v-icon>
        </v-btn>
    </template>
    <small>Duplicate @{{ item . name || item . title }}</small>
    <v-tooltip>
