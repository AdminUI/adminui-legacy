@php
use Carbon\Carbon;
@endphp

<x-auiecom::layout.ecom_layout :breadcrumb="$breadcrumb">

    <v-container fluid>
        <v-row>
            <v-col cols="12">
                <h1>Edit - {{ $title }}</h1>
            </v-col>
        </v-row>


        <v-row>
            <v-col cols="6">
                <v-card dark>
                    <div class="d-flex flex-no-wrap justify-space-between">
                        <div>
                            <v-card-title class="text-h5"> Customer Information </v-card-title>

                            <v-card-actions>
                                {!! append_br($data->user->first_name) !!}
                                {!! append_br($data->user->last_name) !!}
                                {!! append_br($data->user->email) !!}
                            </v-card-actions>
                        </div>

                        <v-avatar class="ma-3" size="125" tile>
                            {{-- <v-img :src="item.src"></v-img> --}}
                        </v-avatar>
                    </div>
                </v-card>
            </v-col>
            <v-col cols="6">
                <v-card dark>
                    <div class="d-flex flex-no-wrap justify-space-between">
                        <div>
                            <v-card-title class="text-h5">
                                <a href="{{ route('order.invoice', $data->uuid) }}" target="_blank">
                                    Order Information
                                </a>
                            </v-card-title>
                            <v-card-actions>

                                <v-row>
                                    <v-col cols="6">
                                        {!! append_br('Delivery Address') !!}
                                        {!! append_br($data->delivery->phone) !!}
                                        {!! append_br($data->delivery->address) !!}
                                        {!! append_br($data->delivery->address_2) !!}
                                        {!! append_br($data->delivery->town) !!}
                                        {!! append_br($data->delivery->county) !!}
                                        {!! append_br($data->delivery->postcode) !!}
                                        {!! append_br($data->delivery->country->name) !!}
                                    </v-col>
                                    <v-col cols="6">
                                        <v-row>
                                            <v-col>
                                                <v-btn class="mx-1" color="blue">
                                                    Order Status: {{  $data->status()->name }}
                                                </v-btn>
                                            </v-col>
                                            <v-col>
                                                <v-btn class="mx-1" color="indigo">
                                                    Placed: {{ $data->created_at->format('d/m/Y') }}
                                                </v-btn>
                                            </v-col>
                                            @if (!empty($data->paid_at))

                                            <v-col>
                                                <v-btn class="mx-1" color="teal">
                                                    Paid at: {{ Carbon::parse($data->paid_at)->format('d/m/Y') }}
                                                </v-btn>
                                            </v-col>
                                            @endif
                                        </v-row>
                                    </v-col>

                                </v-row>
                            </v-card-actions>
                        </div>

                        <v-avatar class="ma-3" size="125" tile>
                            {{-- <v-img :src="item.src"></v-img> --}}
                        </v-avatar>
                    </div>
                </v-card>
            </v-col>
        </v-row>

        <x-aui::layout.status :data="$data" />
        {{-- Cote that $route, $tile comes from the controller contruct --}}
        <v-row>
            <v-col cols="12">
                <aui-card-with-tabs>
                    <v-tab>{{ __('adminui.details') }}</v-tab>
                    <v-tab-item eager>
                        @include('auiecom::content.'. $route .'.forms.order-history', $data)
                    </v-tab-item>
                </aui-card-with-tabs>
            </v-col>
            {{-- <v-col cols="3">
                <x-aui::layout.publish :data="$data" />
                <x-aui::layout.dangerZone
                method="delete"
                action="{{ route('admin.'. $route .'.destroy', short_encrypt($data->id)) }}" />
            </v-col> --}}
        </v-row>
    </v-container>
</x-auiecom::layout.ecom_layout>
