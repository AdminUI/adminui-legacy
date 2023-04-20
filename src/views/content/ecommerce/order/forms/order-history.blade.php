
<v-container fluid>
    {{-- Order Summary --}}
    <v-row>

        <v-col cols="12" sm="9">
            <h1>Order Notes
                {{-- <a href="{{ route('order.invoice.pdf', $data->uuid) }}" target="_blank">
                    Print
                </a> --}}
            </h1>
        </v-col>
    </v-row>

    <x-aui::forms.form action="{{ route('admin.order.notes.update', $data->id) }}" method="POST">
        <v-row>
            <v-col cols="12" sm="12">
                <x-aui::forms.textarea name="admin_notes" label="Admin Notes" value="{!! $data->admin_notes !!}" />
            </v-col>
            <v-col cols="12" sm="12">
                <x-aui::forms.textarea name="instruction" label="Instruction" value="{!! $data->instruction !!}" />
            </v-col>
            <v-col cols="12" sm="12">
                <x-aui::forms.textarea name="message" label="Message" value="{!! $data->message !!}" />
            </v-col>
            <v-col cols="12" sm="12">
                <x-aui::forms.text name="tracking_code" label="Tracking Code" value="{!! $data->tracking_code !!}" />
            </v-col>
            <v-col cols="12" sm="12">
                <x-aui::forms.text name="delivery_method" label="Delivery Method" value="{!! $data->delivery_method !!}" />
            </v-col>
            <v-col cols="12" sm="12">
                <x-aui::forms.text name="delivery_company" label="Delivery Company" value="{!! $data->delivery_company !!}" />
            </v-col>
            <v-col cols="12" class="12">
                <v-btn block type="submit" color="success">{{ __('adminui.update') }}</v-btn>
            </v-col>
        </v-row>
    </x-aui::forms.form>
    {{-- History table --}}
    <v-row>

        <v-col cols="12" sm="9">
            <h1>{{ $title }} History</h1>
        </v-col>

        <v-col cols="12" sm="3" class="text-right">
            @if (admin()->can('admin manage'))
            <x-aui::layout.createModal action="{{ route('admin.order.history.store', $data->id) }}">
                {{-- Block --}}
                <x-aui::forms.select :options='$orderStatus' name="order_status_id" label="Status"
                    value="{{ old('order_status_id', $data->order_status_id ?? '') }}" />
                <x-aui::forms.text name="comment" label="Comment" value="{{ old('comment', $data->comment ?? '') }}" />

                <x-aui::forms.switch
                    name="notify_customer"
                    value="0"
                    label="Notify Customer"
                />

                {{-- block end --}}
            </x-aui::layout.createModal>
            @endif
        </v-col>

    </v-row>
    <v-row>
        <div class="col col-12">
            <div class="v-data-table elevation-2 v-data-table--dense v-data-table--has-bottom theme--light" flat="">
                <div class="v-data-table__wrapper">
                    <table>
                        <thead class="v-data-table-header">
                            <tr>
                                <th role="columnheader" scope="col"
                                    aria-label="ID: Not sorted. Activate to sort ascending." aria-sort="none"
                                    class="text-start sortable">
                                    <span>ID</span>
                                </th>
                                <th role="columnheader" scope="col"
                                    aria-label="Name: Not sorted. Activate to sort ascending." aria-sort="none"
                                    class="text-start sortable">
                                    <span>Status</span>
                                </th>
                                <th role="columnheader" scope="col"
                                    aria-label="Name: Not sorted. Activate to sort ascending." aria-sort="none"
                                    class="text-start sortable">
                                    <span>Comment</span>
                                </th>
                                <th role="columnheader" scope="col"
                                    aria-label="Created At: Not sorted. Activate to sort ascending." aria-sort="none"
                                    class="text-center sortable">
                                    <span>Created At</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->history as $item)
                            <tr class="is-active">
                                <td class="text-start">{{ $item->id }}</td>
                                <td class="text-start">{{ $item->status->name ?? '' }}</td>
                                <td class="text-start">{{ $item->comment }}</td>
                                <td class="text-center">{{ $item->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </v-row>
</v-container>
