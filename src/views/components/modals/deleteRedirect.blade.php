<v-dialog v-model="show.deleteModal" max-width="500">
    <v-card>
        <v-card-title class="headline error white--text">
            Confirm Delete
        </v-card-title>

        <v-card-text class="pt-6">
            <v-row>
                <v-col cols="2" class="text-center">
                    <v-icon color="error" x-large class="mr-2">mdi-alert</v-icon>
                </v-col>
                <v-col cols="10">
                    <p>You will not be able to undo this action.<br />
                        Are you sure you wish to proceed?</p>
                </v-col>
            </v-row>
        </v-card-text>

        <v-divider></v-divider>
        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="secondary" @click="show.deleteModal = false">
                {{ __('adminui.cancel') }}
            </v-btn>

            <v-btn color="error" outlined class="ml-2 px-10" href="{{ $action }}">
                {{ __('adminui.delete') }}
            </v-btn>

        </v-card-actions>
    </v-card>
</v-dialog>
