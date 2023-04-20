@php
//use AdminUI\AdminUICrm\Models\Communication;
@endphp

<v-container fluid>
    <v-row>
        <v-col cols="12" sm="9">
            <h1>Communications</h1>
        </v-col>

        <v-col cols="12" sm="3" class="text-right">
            @if (admin()->can('admin manage'))
                <v-dialog transition="dialog-bottom-transition" max-width="600">
                    <template v-slot:activator="{ on, attrs }">
                        <v-btn color="primary" v-bind="attrs" v-on="on">
                            {{ __('admin/auicrm.communications') }}
                        </v-btn>
                    </template>
                    <template v-slot:default="dialog">
                        <v-card>
                            <div class="v-card__title justify-space-between">
                                <div>
                                    {{ __('admin/auicrm.add_new_communications') }}
                                </div>
                            </div>
                            <br>
                            <x-aui::forms.form action="{{ route('admin.communication.store') }}" method="POST">
                                <v-card-text>
                                    <input type="hidden" name="account_id" value="{{ $data->id }}">
                                    <x-aui::forms.text name="title" label="{{ __('admin/auicrm.title') }}"
                                        value="{{ old('title') }}" required />
                                </v-card-text>

                                <div class="v-card__actions">
                                    <button type="submit"
                                        class="v-btn v-btn--block v-btn--is-elevated v-btn--has-bg theme--light v-size--default success"><span
                                            class="v-btn__content">Create</span></button>
                                </div>
                            </x-aui::forms.form>
                        </v-card>
                    </template>
                </v-dialog>
            @endif
        </v-col>
    </v-row>
    <v-row>

        <v-col cols="12" sm="12">
            <v-simple-table>
                <template v-slot:default>
                    <thead>
                        <tr>
                            <th class="text-left">
                                Title
                            </th>
                            <th class="text-left">
                                Messages
                            </th>
                            <th class="text-left">
                                Created At
                            </th>
                            <th class="text-left">

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->communications as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->messages()->count() }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.crm.messages.view', $item->id) }}"
                                        class="v-btn v-btn--block v-btn--outlined theme--light v-size--default "><span
                                            class="v-btn__content">
                                            View
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </template>
            </v-simple-table>
        </v-col>
    </v-row>
</v-container>
