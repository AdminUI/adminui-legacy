<x-auistaff::layout.staff_layout>
    <v-container fluid>
        <v-row>
            <v-col cols="12" sm="9">
                <h1>{{ __('staff.timeoff') }}</h1>
            </v-col>

            <v-col cols="12" sm="3" class="text-right">
                <x-aui::layout.createModal action="{{ route('admin.country.store') }}">
                    <x-aui::forms.text name="name" label="{{ __('adminui.name') }}" value="{{ old('name') }}"
                        required />

                    <x-aui::forms.text name="iso_code2" label="ISO Code" value="{{ old('iso_code2') }}" />

                    <x-aui::forms.text name="iso_code3" label="ISO Code 3" value="{{ old('iso_code3') }}" />

                    <x-aui::forms.text name="iso_code3_2" label="ISO Code 3 2" value="{{ old('iso_code3_2') }}" />

                    <x-aui::forms.text name="dialing_code" label="Dial Code" value="{{ old('dialing_code') }}" />

                    <v-switch name="postcode" label="{{ __('adminui.postcode') }}" :input-value="true"
                        :value="true">
                    </v-switch>

                    <v-switch name="tax_exempt" label="{{ __('adminui.tax_exempt') }}" :input-value="false"
                        :value="true">
                    </v-switch>
                </x-aui::layout.createModal>
            </v-col>
        </v-row>
        <form method="post" action="{{ route('admin.timeoff.filter') }}">
            <v-row>
                <v-col cols="4">
                    <x-aui::forms.select name="admin_id" label="Staff Member" :options="$admins" :value="Session('to_admin_id', AdminID())" />

                </v-col>
                <v-col cols="4">
                </v-col>
                <v-col cols="4">
                    <x-aui::forms.select name="year" label="Year" :options="collect($years)" :value="Session('to_year', date('Y'))" />
                </v-col>
            </v-row>
        </form>
        <v-row>
            <v-col>
                <v-card>
                    <v-card-text>
                        <v-simple-table dense>
                            <template #default>
                                <thead>
                                    <tr>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Days</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Requested</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($holiday as $row)
                                        <tr>
                                            <td>{{ $row->from_date->format('d/m/Y') }}</td>
                                            <td>{{ $row->to_date->format('d/m/Y') }}</td>
                                            <td>{{ $row->days }}</td>
                                            <td>{{ config('adminui.staff.types.' . $row->type) }}</td>
                                            <td>{{ config('adminui.staff.statuses.' . $row->status . '.title') }}</td>
                                            <td>{{ $row->created_at->format('d/m/Y') }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('admin.timeoff.edit', ['id' => short_encrypt($row->id)]) }}"
                                                    class="btn btn-sm btn-outline-success">
                                                    <i class="fas fa-info-circle mr-1"></i>
                                                    {{ __('adminui.details') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No Results Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7">
                                            <small>
                                                @foreach (config('adminui.staff.statuses') as $id => $status)
                                                    @if ($status['count'])
                                                        @php
                                                            $totalDays += $holiday->where('status', $id)->sum('days');
                                                        @endphp
                                                    @endif
                                                    {{ $status['title'] }}
                                                    ({{ $holiday->where('status', $id)->sum('days') }})
                                                    |
                                                @endforeach
                                            </small>
                                        </td>
                                    </tr>
                                </tfoot>
                            </template>
                        </v-simple-table>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</x-auistaff::layout.staff_layout>
