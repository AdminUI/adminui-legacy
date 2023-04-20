@extends('auilayout::admin')

@section('content')
    <v-container fluid>
        <v-row>
            <v-col cols="12" sm="9">
                <h1>{{ $title }}</h1>
            </v-col>

            <v-col cols="12" sm="3" class="text-right">
                @if (admin()->can('admin manage'))
                    <x-aui::layout.createModal action="{{ route('admin.' . $route . '.store') }}">
                        {{-- zone --}}
                        <x-aui::forms.select name="postage_zone_id" label="{{ __('Postage zone') }}" :options="$zones"
                            value="{{ old('postage_zone_id') }}" required />
                        {{-- type --}}
                        <x-aui::forms.select name="postage_type_id" label="{{ __('Postage type') }}" :options="$types"
                            value="{{ old('postage_type_id') }}" required />

                        {{-- cutoff --}}
                        <x-aui::forms.text name="value" label="{{ __('From Value') }}" value="{{ old('value') }}"
                            required />

                        <x-aui::forms.text name="top_value" label="{{ __('To Value') }}" value="{{ old('value') }}"
                            required />

                        {{-- Size --}}
                        <x-aui::forms.select name="postage_size_id" label="{{ __('Postage size') }}" :options="$sizes"
                            value="{{ old('postage_size_id') }}" required />

                        {{-- cost --}}
                        <x-aui::forms.text name="cost" label="{{ __('Cost price') }}" value="{{ old('cost') }}"
                            required />
                        {{-- price --}}
                        <x-aui::forms.text name="price" label="{{ __('Price') }}" value="{{ old('price') }}"
                            required />
                        {{-- days --}}
                        <x-aui::forms.text name="days" label="{{ __('Days') }}" value="{{ old('days') }}" required />
                        {{-- add --}}
                    </x-aui::layout.createModal>
                @endif
            </v-col>
        </v-row>
        <v-row>
            @if (isset($submenu))
                <v-col cols="auto" class="pr-0 pt-0">
                    <aui-page-submenu></aui-page-submenu>
                </v-col>
            @endif
            <v-col>
                <v-expansion-panels focusable inset>
                    @forelse ($rows as $row)
                        <v-expansion-panel>
                            <v-expansion-panel-header>
                                (Zone {{ $row->postageZone->name }})
                                {{ $row->postageZone->internal_label }} - {{ $row->postageType->name }} with a value
                                between {{ $row->value }} and {{ $row->top_value }}
                            </v-expansion-panel-header>
                            <v-expansion-panel-content class="pa-4">
                                <x-aui::forms.form method="patch" :action="route('admin.postage-rate.update', $row)">
                                    <v-row class="py-2">
                                        <v-col cols="8">
                                            <div class="py-2">
                                                <x-aui::forms.select name="postage_zone_id" label="{{ __('Postage zone') }}"
                                                    :options="$zones"
                                                    value="{{ old('postage_zone_id', $row->postage_zone_id) }}" required
                                                    hidedetails />
                                            </div>
                                            <div class="py-2">
                                                <x-aui::forms.select name="postage_type_id" label="{{ __('Postage type') }}"
                                                    :options="$types"
                                                    value="{{ old('postage_type_id', $row->postage_type_id) }}" required
                                                    hidedetails />
                                            </div>
                                            <div class="py-2">
                                                <x-aui::forms.text name="value" label="{{ __('From Value') }}"
                                                    value="{{ old('value', $row->value) }}" required hidedetails />
                                            </div>
                                            <div class="py-2">
                                                <x-aui::forms.text name="top_value" label="{{ __('To Value') }}"
                                                    value="{{ old('top_value', $row->top_value) }}" required hidedetails />
                                            </div>
                                            {{-- Size --}}
                                            <div class="py-2">
                                                <x-aui::forms.select name="postage_size_id"
                                                    label="{{ __('Postage size') }}" :options="$sizes"
                                                    value="{{ old('postage_size_id', $row->postage_size_id) }}" required
                                                    hidedetails />
                                            </div>
                                            <div class="py-2">
                                                <x-aui::forms.text name="cost" label="{{ __('Cost price') }}"
                                                    value="{{ old('cost', Money::makePounds($row->cost)) }}" required
                                                    hidedetails />
                                            </div>
                                            <div class="py-2">
                                                <x-aui::forms.text name="price" label="{{ __('Price') }}"
                                                    value="{{ old('price', Money::makePounds($row->price)) }}" required
                                                    hidedetails />
                                            </div>
                                            <div class="py-2">
                                                <x-aui::forms.text name="days" label="{{ __('Days') }}"
                                                    value="{{ old('days', $row->days) }}" required hidedetails />
                                            </div>

                                            <div class="py-0">
                                                <x-aui::forms.switch name="is_active" value="{{ $row->is_active ?? '' }}"
                                                    label="{{ __('adminui.status') }}" />
                                            </div>
                                            <div class="text-right py-0">
                                                {{-- <x-aui::layout.button class="error" id="delete{{ $row->id }}" name="Delete" /> --}}
                                            </div>
                                        </v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col class="text-left">
                                            <x-aui::forms.submit>Update</x-aui::forms.submit>
                                        </v-col>
                                    </v-row>
                                </x-aui::forms.form>
                            </v-expansion-panel-content>
                        </v-expansion-panel>
                    @empty
                        No results found.
                    @endforelse
                </v-expansion-panels>
            </v-col>
        </v-row>
    </v-container>
@endsection
