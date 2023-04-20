@extends('auilayout::admin')
@section('content')
    <v-container fluid>

        {{-- <x-aui::layout.status :data="$data" /> --}}
        {{-- Cote that $route, $tile comes from the controller contruct --}}
        @if ($data->completed_admin_id)
            <v-row>
                <v-col cols="12">
                    <h1>View - {{ $title }}</h1>
                </v-col>
            </v-row>

            <v-row>
                <v-col cols="4">
                    <v-card>
                        <v-card-title>
                            {{ __('Supplier') }}:
                        </v-card-title>
                        <v-card-text>
                            <v-row dense>
                                <v-col cols="4" class="text-right">
                                    <strong>{{ __('Name') }}:</strong>
                                </v-col>
                                <v-col cols="8">
                                    {{ $data->supplier->name ?? 'N/A' }}
                                </v-col>

                                <v-col cols="4" class="text-right">
                                    <strong>{{ __('Account Code') }}:</strong>
                                </v-col>
                                <v-col cols="8">
                                    {{ $data->supplier->account_code ?? '' }}
                                </v-col>

                                <v-col cols="4" class="text-right">
                                    <strong>{{ __('Email') }}:</strong>
                                </v-col>
                                <v-col cols="8">
                                    {{ $data->supplier->email ?? '' }}
                                </v-col>

                                <v-col cols="4" class="text-right">
                                    <strong>{{ __('Phone') }}:</strong>
                                </v-col>
                                <v-col cols="8">
                                    {{ $data->supplier->phone ?? '' }}
                                </v-col>
                            </v-row>
                        </v-card-text>
                    </v-card>
                </v-col>

                <v-col cols="4">
                    <v-card>
                        <v-card-title>
                            {{ __('Placed') }}:
                        </v-card-title>
                        <v-card-text>
                            <v-row dense>

                                <v-col cols="4" class="text-right">
                                    <strong>{{ __('Created by') }}:</strong>
                                </v-col>
                                <v-col cols="8">
                                    {{ $data->admin->full_name }}
                                </v-col>

                                <v-col cols="4" class="text-right">
                                    <strong>{{ __('Created') }}:</strong>
                                </v-col>
                                <v-col cols="8">
                                    {{ $data->created_at->format('d/m/Y H:i') }}
                                </v-col>

                                <v-col cols="4" class="text-right">
                                    <strong>{{ __('Updated') }}:</strong>
                                </v-col>

                                <v-col cols="8">
                                    {{ $data->updated_at->format('d/m/Y H:i') }}
                                </v-col>

                                <v-col cols="4" class="text-right">
                                    <strong>{{ __('Expected') }}:</strong>
                                </v-col>

                                <v-col cols="8">
                                    {{ $data->expected_at->format('d/m/Y H:i') }}
                                </v-col>
                            </v-row>
                        </v-card-text>
                    </v-card>
                </v-col>
                <v-col cols="4">
                    <v-card>
                        <v-card-title>
                            {{ __('Completed') }}:
                        </v-card-title>
                        <v-card-text>
                            <v-row dense>
                                <v-col cols="4" class="text-right">
                                    <strong>{{ __('Completed by') }}:</strong>
                                </v-col>
                                <v-col cols="8">
                                    {{ $data->completed->full_name }}
                                </v-col>
                                <v-col cols="4" class="text-right">
                                    <strong>{{ __('Email') }}:</strong>
                                </v-col>
                                <v-col cols="8">
                                    {{ $data->completed->email }}
                                </v-col>
                                <v-col cols="4" class="text-right">
                                    <strong>{{ __('Completed At') }}:</strong>
                                </v-col>
                                <v-col cols="8">
                                    {{ $data->completed_at->format('d/m/Y H:i') }}
                                </v-col>
                                <v-col cols="4" class="text-right">
                                    <strong>{{ __('Reference') }}:</strong>
                                </v-col>
                                <v-col cols="8">
                                    {{ $data->reference }}
                                </v-col>
                            </v-row>
                        </v-card-text>
                    </v-card>
                </v-col>

                <v-col cols="12">
                    <x-aui::layout.card>
                        <v-simple-table>
                            <template v-slot:default>
                                <thead>
                                    <tr>
                                        <th class="text-left">
                                            {{ __('Sku Code') }}
                                        </th>

                                        <th class="text-left">
                                            {{ __('Product Name') }}
                                        </th>
                                        <th class="text-center">
                                            {{ __('Quantity') }}
                                        </th>
                                        <th class="text-right">
                                            {{ __('Cost') }}
                                        </th>
                                        <th class="text-right">
                                            {{ __('Price') }}
                                        </th>
                                        <th class="text-right">
                                            {{ __('Sub Total') }}
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
                                            <td class="text-right">{{ Money::makePounds($item->cost * $item->quantity) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" class="text-right">
                                            {{ __('Total Products adjusted') }}
                                        </td>
                                        <td class="text-right">
                                            {{ $data->quantity }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">{{ __('Total') }}</td>
                                        <td class="text-right">
                                            £{{ Money::makePounds($data->cost) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </template>
                        </v-simple-table>
                    </x-aui::layout.card>
                </v-col>
            </v-row>
        @else
            <v-row>
                <v-col cols="12">
                    <h1>Edit - {{ $title }}</h1>
                </v-col>
            </v-row>
            <purchase-order purchaseorderid="{{ $data->id }}"></purchase-order>
        @endif
    </v-container>
@endsection
