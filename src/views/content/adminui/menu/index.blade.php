@extends('auilayout::admin')

@section('content')
<v-container fluid>
    <v-row>
        <v-col cols="12" sm="9">
            <h1>{{ __('Menu') }}</h1>
        </v-col>
    </v-row>

    <v-row>
        <v-col cols="12">
            <x-aui::layout.card title="Details">
                <v-row>
                    <x-aui::menu.genericDragAndDrop displayfield="{{ 'title' }}" editroute="admin.menu.index"
                        :drops="$navigation" :sendAjaxNewParent='route("admin.menu.parent")'
                        :sendAjaxNewOrder='route("admin.menu.parent")' />
                </v-row>
            </x-aui::layout.card>
        </v-col>
    </v-row>
</v-container>
@endsection
