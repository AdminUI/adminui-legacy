@extends('auilayout::admin')

@section('content')
    <v-container fluid>
        <v-row>
            <v-col cols="12">
                <h1>{{ $title }}</h1>
                <pos/>
            </v-col>
        </v-row>
    </v-container>
@endsection
