<x-auistaff::layout.staff_layout :breadcrumb="$breadcrumb">
    <aui-staff :staff-options='@json($admins)' :staff-initial="{{ Session('to_admin_id', AdminID()) }}"
        :year-options-raw='@json(collect($years))' :year-initial="{{ Session('to_year', date('Y')) }}"
        :routes="{
            get: '{{ route('admin.api.staff.timeoff') }}',
            store: '{{ route('admin.api.staff.timeoff.store') }}',
            update: '{{ route('admin.api.staff.timeoff.update') }}',
            confirm: '{{ route('admin.api.staff.timeoff.confirm') }}'
        }"
        :is-admin="{!! admin()->can('timeoff manage') === true ? 'true' : 'false' !!}" :status-options='@json(config('adminui.staff.statuses'))'
        :type-options='@json(config('adminui.staff.types'))'>
        <template #title>
            <h1>{{ __('staff.timeoff') }}</h1>
        </template>
        <template #new="{ showCreate, updateCreateModal, submit, update, form, icons, typeOptions }">
            <v-dialog :value="showCreate" v-on:input="updateCreateModal" persistent max-width="600px">
                <template v-slot:activator="{ on, attrs }">
                    <v-btn color="primary" dark v-bind="attrs" v-on="on">Create</v-btn>
                </template>
                <v-card>
                    <v-card-title>
                        <span class="headline">Book New Holiday</span>
                    </v-card-title>
                    <v-card-text>
                        <v-date-picker :value="form.dates" v-on:input="update('dates', $event)" landscape range
                            full-width color="secondary"></v-date-picker>
                        <div style="min-height: 48px;" class="my-2">
                            <transition name="fade">
                                <div v-if="form.dates[0] === form.dates[1] || !form.dates[1]"
                                    class="d-flex align-center">
                                    <v-btn-toggle :value="form.half_day" v-on:change="update('half_day', $event)"
                                        mandatory>
                                        <v-btn :value="null">
                                            <v-icon>mdi-theme-light-dark</v-icon>
                                        </v-btn>
                                        <v-btn value="am">
                                            <v-icon>mdi-weather-sunny</v-icon>
                                        </v-btn>
                                        <v-btn value="pm">
                                            <v-icon>mdi-weather-night</v-icon>
                                        </v-btn>
                                    </v-btn-toggle>
                                    <div v-if="form.half_day" class="ml-2">
                                        <span v-text="form.half_day" class="text-uppercase"></span>
                                    </div>
                                    <div class="ml-2" v-else>
                                        Full Day
                                    </div>
                                </div>
                            </transition>
                        </div>
                        <v-textarea label="Notes" floating outlined :value="form.notes"
                            v-on:input="update('notes', $event)">

                        </v-textarea>

                        <v-select outlined :menu-props="{ 'offset-y': true, top: true }" :items="typeOptions"
                            label="Holiday Type" :value="form.type" v-on:input="update('type', $event)"></v-select>

                    </v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="secondary" text v-on:click="updateCreateModal(false)">Cancel</v-btn>
                        <v-btn color="primary" v-on:click="submit">Add Holiday</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </template>
        <template #staff-select="{ items, selected, update }">
            <v-select outlined :items="items" label="Staff Member" :menu-props="{ 'offset-y': true }"
                :item-text="staff => `${staff.first_name} ${staff.last_name}`" item-value="id" :value="selected"
                v-on:change="update">
            </v-select>
        </template>
        <template #year-select="{ items, selected, update }">
            <v-select outlined :menu-props="{ 'offset-y': true }" label="Year" :items="items"
                :value="selected" v-on:change="update"></v-select>
        </template>

        <template #data="{ items, loading, confirm, cancel }">
            <v-card>
                <v-card-text>
                    <v-data-table
                        :headers="[
                            { text: 'Dates', value: 'dates' },
                            { text: 'Days', value: 'days' },
                            { text: 'Type', value: 'type_name' },
                            { text: 'Status', value: 'status_name' }
                        ]"
                        :items="items" :loading="loading" :items-per-page="25"
                        no-data-text="No holidays booked"
                        :footer-props="{
                            'items-per-page-options': [10, 25, 50, -1]
                        }">
                        <template v-slot:item.dates="props">
                            <v-edit-dialog :return-value.sync="props.item.dates" v-on:save="confirm(props)"
                                v-on:cancel="cancel(props)" large>
                                <span v-if="props.item.dates[0] === props.item.dates[1]"
                                    v-text="new Date(props.item.dates[0]).toLocaleDateString()">
                                </span>
                                <span v-else
                                    v-text="props.item.dates.map(d => new Date(d).toLocaleDateString()).join(' - ')"></span>
                                <template v-slot:input>
                                    <v-date-picker v-model="props.item.dates" range>Here</v-date-picker>
                                </template>
                            </v-edit-dialog>
                        </template>
                    </v-data-table>
                </v-card-text>
            </v-card>
        </template>

        <template #confirm-holiday="{ show, message, cancel, confirm }">
            <v-dialog :value="show" persistent max-width="500">
                <v-card>
                    <v-card-title class="headline">
                        Confirm Holiday Booking
                    </v-card-title>
                    <v-card-text v-text="message"></v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="secondary" text v-on:click="cancel">
                            Cancel
                        </v-btn>
                        <v-btn color="success" v-on:click="confirm">
                            Confirm
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </template>
    </aui-staff>
</x-auistaff::layout.staff_layout>
