@extends('auilayout::admin')

@section('content')

    <v-container fluid>
        <v-row>
            <v-col cols="12">
                <h1>{{ __('Stock Control') }} - {{ $title }}</h1>
            </v-col>
        </v-row>
        {{-- <x-aui::layout.status :data="$data" /> --}}
        {{-- Cote that $route, $tile comes from the controller contruct --}}
        {{-- <x-aui::forms.form action="{{ route('admin.'. $route .'.store', $data->id) }}">
        </x-aui::forms.form> --}}
        <v-row>
            <v-col cols="12">
                @include('auistock::content.'. $route .'.forms.tab', $data)
            </v-col>
        </v-row>
    </v-container>
@endsection
