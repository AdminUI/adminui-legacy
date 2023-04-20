@extends('auilayout::admin')

@section('content')

    <v-container fluid>
        <v-row>
            <v-col cols="12" sm="9">
                <h1>{{ $title }}</h1>
            </v-col>

            <v-col cols="12" sm="3" class="text-right">
                @if (admin()->can('admin manage'))
                {{-- <x-aui::layout.createModal action="{{ route('admin.'. $route .'.store') }}">
                <x-aui::forms.text name="name" label="{{ __('admin/auiecom.name') }}" value="{{ old('name') }}"
                    required />
                <x-aui::forms.number name="price" label="{{ __('admin/auiecom.price') }}" value="{{ old('price') }}"
                    step="0.01" required />
                <x-aui::layout.featuredMedia :data="$data ?? ''" title="Featured Image" />
                </x-aui::layout.createModal> --}}
                @endif
            </v-col>

            <v-col cols="12" sm="12" class="text-right">
                <x-aui::forms.form action="" method="get" >
                    <v-row>
                        <v-col>
                            @php
                            $filter = collect(
                                [
                                    'pending'  => 'pending',
                                    'approved' => 'approved',
                                    'declined' => 'declined',
                                ]
                            );
                            @endphp
                            <x-aui::forms.select :options='$filter' name="filter" label="Filter"
                                value="pending" />
                        </v-col>
                        <v-col>
                            <v-btn block type="submit" color="success">Filter</v-btn>
                        </v-col>
                    </v-row>
                </x-aui::forms.form>
            </v-col>

        </v-row>
        <v-row>

            <v-col cols="12">
                <v-simple-table dense>
                    <template v-slot:default>
                        <thead>
                            <tr>
                                <th class="text-left">
                                    Business Name
                                </th>
                                <th class="text-left">
                                    Business Number
                                </th>
                                <th class="text-left">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            @php
                            $dataRead = json_decode($item->content);
                            @endphp
                            <tr>
                                <td>{{ $dataRead->business_name }}</td>
                                <td>{{ $dataRead->business_number }}</td>
                                <td>
                                    @switch($item->status)
                                        @case(1)
                                            {{ 'Approved' }}
                                            @break
                                        @case(2)
                                            {{ 'Declined' }}
                                            @break
                                        @default
                                            {{ 'Pending' }}
                                    @endswitch
                                </td>
                                <td>
                                    <x-aui::buttons.tableEditBlade
                                        :route="route('admin.tradeApproval.edit', short_encrypt($item->id))"
                                    />
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </template>
                </v-simple-table>
            </v-col>
        </v-row>
    </v-container>

@endsection
