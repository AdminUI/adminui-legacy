@extends('auilayout::admin')

@section('content')
    <v-row>
        <v-col cols="12">
            <h1>Create - {{ $title }}</h1>
        </v-col>
    </v-row>
    <x-aui::layout.card>
        <stock-adjustments></stock-adjustments>
    </x-aui::layout.card>
@endsection
