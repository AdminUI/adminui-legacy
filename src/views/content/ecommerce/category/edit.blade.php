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
        <x-aui::forms.form action="{{ route('admin.' . $route . '.update', $data->id) }}" method="PUT">
            <v-row>
                @if (isset($submenu))
                    <v-col cols="auto" class="pr-0 pt-0">
                        <aui-page-submenu></aui-page-submenu>
                    </v-col>
                @endif

                <v-col>
                    <aui-card-with-tabs>
                        <v-tab>{{ __('Details') }}</v-tab>
                        <v-tab>{{ __('SEO') }}</v-tab>
                        <v-tab-item eager>
                            {{-- Generic way to add the forms inside the tabs --}}
                            @include('aui::content.ecommerce.' . $route . '.forms.form', $data)

                            {{-- The override section --}}
                            {{ Hooks::action('categoryUpdate', compact('data')) }}

                        </v-tab-item>
                        <v-tab-item eager>
                            {{-- Static fields --}}
                            <x-aui::seo.seo-fields :data="$data->seo" />
                        </v-tab-item>
                    </aui-card-with-tabs>
                </v-col>
                <v-col cols="3">
                    <x-aui::layout.publish :data="$data">
                        <v-row>
                            <v-col class="d-flex justify-center py-0">
                                <x-aui::forms.switch name="is_featured" :label="__('Featured Category')" :value="$data->is_featured" />
                            </v-col>
                            <v-col class="d-flex justify-center py-0">
                                <x-aui::forms.switch name="description_top" :label="__('Display Description on Top of page')" :value="$data->description_top" />
                            </v-col>
                        </v-row>
                    </x-aui::layout.publish>

                    <x-aui::layout.featuredMedia :data="$data" title="{{ __('Category Image') }}">
                        <x-aui::forms.select name="background_position" value="{{ $data->background_position ?? '' }}"
                            label="Background Position" :options="[
                                'top left' => 'Top Left',
                                'top center' => 'Top Center',
                                'top right' => 'Top Right',
                                'center left' => 'Center Left',
                                'center center' => 'Center Center',
                                'center right' => 'Center Right',
                                'bottom left' => 'Bottom Left',
                                'bottom center' => 'Bottom Center',
                                'bottom right' => 'Bottom Right',
                            ]" />
                    </x-aui::layout.featuredMedia>

                    <x-aui::layout.featuredMediaHeader :data="$data" title="Header Image">
                    </x-aui::layout.featuredMediaHeader>

                    <x-aui::layout.dangerZone method="delete"
                        action="{{ route('admin.' . $route . '.destroy', short_encrypt($data->id)) }}" />
                </v-col>
        </x-aui::forms.form>
        </v-row>
    </v-container>
@endsection
