@extends('auilayout::admin')

@section('content')
    <v-container fluid>
        <v-row>
            <v-col cols="12">
                <h1>View - Stock Adjustment</h1>
            </v-col>
        </v-row>

        <v-row>
            <v-col cols="4">
                <v-card>
                    <v-card-title>
                        {{ __('Details') }}:
                    </v-card-title>
                    <v-card-text>
                        <v-row dense>
                            <v-col cols="4" class="text-right">
                                <strong>{{ __('Adjustment Date') }}:</strong>
                            </v-col>
                            <v-col cols="8">
                                {{ $data->created_at->format('d/m/Y H:i') }}
                            </v-col>

                            <v-col cols="4" class="text-right">
                                <strong>{{ __('Adjustment Reference') }}:</strong>
                            </v-col>
                            <v-col cols="8">
                                {{ $data->reference }}
                            </v-col>

                            <v-col cols="4" class="text-right">
                                <strong>{{ __('Adjustment By') }}:</strong>
                            </v-col>
                            <v-col cols="8">
                                {{ $data->admin->full_name }}
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col cols="4">
                <v-card>
                    <v-card-title>
                        {{ __('Adjustments') }}:
                    </v-card-title>
                    <v-card-text>
                        <v-row dense>
                            <v-col cols="4" class="text-right">
                                <strong>{{ __('Total Adjustment Quantity') }}:</strong>
                            </v-col>
                            <v-col cols="8">
                                {{ $data->quantity_up + $data->quantity_down }}
                            </v-col>

                            <v-col cols="4" class="text-right">
                                <strong>{{ __('Total Adjustment Value') }}:</strong>
                            </v-col>
                            <v-col cols="8">
                                &pound;{{ Money::makePounds($data->cost_up + $data->cost_down) }}
                            </v-col>

                            <v-col cols="4" class="text-right">
                                &nbsp;
                            </v-col>
                            <v-col cols="8">
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>


        <x-aui::layout.card class="mt-4">
            <v-simple-table>
                <template v-slot:default>
                    <thead>
                        <tr>
                            <th class="text-left">
                                Sku Code
                            </th>
                            <th class="text-left">
                                Product Name
                            </th>
                            <th class="text-center">
                                Qty
                            </th>
                            <th class="text-right">
                                Cost
                            </th>
                            <th class="text-right">
                                Totals
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->history as $item)
                            <tr>
                                <td>{{ $item->product->sku_code }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td class="text-center">{{ $item->quantity }}</td>
                                <td class="text-right">{{ Money::makePounds($item->cost) }}</td>
                                <td class="text-right">{{ Money::makePounds($item->price) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td class="text-right"><strong>Totals</strong></td>
                            <td class="text-center"><strong>{{ $data->quantity_up + $data->quantity_down }}</strong></td>
                            <td></td>
                            <td class="text-right">
                                <strong>&pound;{{ Money::makePounds($data->cost_up + $data->cost_down) }}</strong></td>
                        </tr>
                    </tfoot>
                </template>
            </v-simple-table>
            {{-- </v-col> --}}
        </x-aui::layout.card>
        </v-row>
    </v-container>
@endsection
