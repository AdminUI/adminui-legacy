<div class="d-inline-block">
    <v-menu v-model="showNotificationsMenu" :close-on-content-click="false" bottom offset-y left :min-width="500">
        <template v-slot:activator="{ on, attrs }">
            <v-badge color="error" :content="notifications?.length" overlap :value="notifications?.length > 0"
                offset-x="20px" offset-y="20px">
                <v-btn icon v-on="on" v-bind="attrs" :icon="!isMobile" :fab="isMobile"
                    :small="isMobile" :elevation="isMobile ? 4 : 0">
                    <v-icon>mdi-bell</v-icon>
                </v-btn>
            </v-badge>
        </template>

        <v-card>
            <v-card-text>
                <transition name="fade" mode="out-in">
                    <v-list v-if="notifications?.length > 0" key="with-data">
                        <v-list-item two-line v-for="note in notifications" :key="note.id" dense>
                            <v-list-item-avatar :size="30">
                                <v-icon>mdi-bell</v-icon>
                            </v-list-item-avatar>

                            <v-list-item-content>
                                <v-list-item-title v-html="note.body.title"></v-list-item-title>
                                <v-list-item-subtitle>
                                    @{{ new Date(note.created_at).toLocaleDateString() }}
                                </v-list-item-subtitle>
                            </v-list-item-content>

                            <v-list-item-action>
                                <v-tooltip top>
                                    <template #activator="{ on }">
                                        <v-btn v-on="on" icon @click="markAsRead(note.id)">
                                            <v-icon>mdi-email-check</v-icon>
                                        </v-btn>
                                    </template>
                                    <small>Mark as Read</small>
                                </v-tooltip>
                            </v-list-item-action>
                        </v-list-item>
                    </v-list>
                    <v-list v-else key="no-data">
                        <v-list-item>
                            <v-list-item-title class="text-center text--disabled"><em>No Unread
                                    Notifications</em></v-list-item-title>
                        </v-list-item>
                    </v-list>
                </transition>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn small text href="{{ route('admin.notification.index') }}" color="primary">
                    {{ __('adminui.readall') }}
                    <v-icon>mdi-chevron-double-right</v-icon>
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-menu>
</div>
