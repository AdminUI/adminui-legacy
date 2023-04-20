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
    <x-aui::forms.form action="{{ route('admin.'. $route .'.update', $data->id) }}" method="PUT">
        <v-row>
            <v-col cols="9">
                <x-aui::layout.card :title="__('Details')">
                    @include('auicontent::ecommerce.'. $route .'.forms.form', $data)
                </x-aui::layout.card>
            </v-col>
            <v-col cols="3">
                <x-aui::layout.publish :data="$data" />
    </x-aui::forms.form>
                <x-aui::layout.dangerZone
                    method="delete"
                    action="{{ route('admin.'. $route .'.destroy', short_encrypt($data->id)) }}" />
            </v-col>
        </v-row>
</v-container>

@endsection


