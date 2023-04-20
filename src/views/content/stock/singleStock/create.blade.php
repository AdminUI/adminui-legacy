<x-auistock::layout.layout :breadcrumb="$breadcrumb ?? ''" >

    <v-container fluid>
        <v-row>
            <v-col cols="12">
                <h1>Update - {{ $title }}</h1>
            </v-col>
        </v-row>

        <x-aui::layout.status :data="$data" />
        {{-- Cote that $route, $tile comes from the controller contruct --}}
        <x-aui::forms.form action="{{ route('admin.'. $route .'.store', $data->id) }}">
            <v-row>
                <v-col cols="9">
                    @include('auistock::content.'. $route .'.forms.tab', $data)
                </v-col>
                <v-col cols="3">
                    <v-row>
                        <v-col cols="12" align="center" justify="center">
                            <v-img max-height="150" max-width="250" src="https://picsum.photos/id/11/500/300">
                            </v-img>
                        </v-col>
                        <v-col cols="12" align="center" justify="center">
                            <h2>Stock Controll product name</h2>
                        </v-col>
                        <v-col cols="12" align="center" justify="center">
                            <h2>Current Stock: <v-chip draggable>
                                    45
                                </v-chip>
                            </h2>
                        </v-col>
                    </v-row>
                </v-col>
        </x-aui::forms.form>
        </v-row>
    </v-container>
</x-auistock::layout.layout>
