@extends('auilayout::admin')

@section('content')

    <v-container fluid>
        <v-row>
            <v-col cols="12">
                <h1>Edit - {{ $title }}</h1>
            </v-col>
        </v-row>

        <x-aui::layout.status :data="$data" />
        {{-- Cote that $route, $tile comes from the controller contruct --}}
        <x-aui::forms.form action="{{ route('admin.address.update', $data->id) }}" method="PUT">
            <v-row>
                <v-col cols="12" md="9">
                    <x-aui::layout.card :title="__('Details')">
                        {{-- Generic way to add the forms inside the tabs  --}}
                        @include('aui::content.account.address.forms.form', $data)
                    </x-aui::layout.card>
                </v-col>

                <v-col cols="12" md="3">
                    <x-aui::layout.publish :data="$data">
                        <v-row>
                            <v-col>
                                <x-aui::forms.switch name="is_billing"
                                    label="{{ __('Billing Address') }}"
                                    :value="old('is_billing', $data->is_billing)" />
                            </v-col>
                            <v-col>
                                <x-aui::forms.switch name="is_default"
                                    label="{{ __('Default Address') }}"
                                    :value="old('is_default', $data->is_default)" />
                            </v-col>
                        </v-row>
                    </x-aui::layout.publish>

                    <x-aui::layout.dangerZone method="delete"
                        action="{{ route('admin.address.destroy', short_encrypt($data->id)) }}" />
                </v-col>
            </v-row>
        </x-aui::forms.form>
    </v-container>
@endsection
