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
                    <aui-card-with-tabs>
                        <v-tab>{{ __('Details') }}</v-tab>
                        <v-tab>{{ __('Seo') }}</v-tab>
                        <v-tab-item eager>
                            {{-- Generic way to add the forms inside the tabs  --}}
                            @include('auicrm::content.'. $route .'.forms.form', $data)
                        </v-tab-item>
                        <v-tab-item eager>
                            {{-- Static fields --}}
                            <x-aui::seo.seo-fields :data="$data->seo" />
                        </v-tab-item>
                    </aui-card-with-tabs>
                </v-col>
                <v-col cols="3">
                    <x-aui::layout.publish :data="$data" />
                    <x-aui::layout.featuredMedia :data="$data" title="Featured Image" />
                    <x-aui::layout.dangerZone
                    method="delete"
                    action="{{ route('admin.'. $route .'.destroy', short_encrypt($data->id)) }}" />
                </v-col>
        </x-aui::forms.form>
        </v-row>
</v-container>
@endsection
