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
                        <x-aui::forms.text name="code" label="{{ __('adminui.code') }}" value="{{ old('code') }}"
                            required />
                        <x-aui::forms.text name="description" label="{{ __('adminui.description') }}"
                            value="{{ old('description') }}" required />
                        <x-aui::forms.text name="amount" label="{{ __('adminui.amount') }}" value="{{ old('amount') }}"
                            required />
                        @php
                            $type = [1 => 'total', 2 => 'percentage'];
                        @endphp
                        <x-aui::forms.select :options="collect($type)" name="amount_type" label="{{ __('adminui.amount_type') }}"
                            :value="''" />
                        <x-aui::forms.number name="use_limit" label="{{ __('adminui.use_limit') }}"
                            value="{{ old('use_limit') }}" required />

                        <x-aui::forms.date name="valid_from" :label="__('adminui.valid_from')" :value="''" />

                        <x-aui::forms.date name="valid_to" :label="__('adminui.valid_to')" :value="''" />

                    </x-aui::layout.createModal>
                @endif
            </v-col>
        </v-row>
        <v-row>
            @if (!empty($submenu))
                <v-col cols="auto" class="pt-0">
                    <aui-page-submenu />
                </v-col>
            @endif
            <v-col>

                <aui-data-table :initial='@json($rows)' no-data-text="No {{ $title }}"
                    :columns='@json($columns)'>
                    <template #filters="{ filters }">
                        <v-row>
                            <v-col cols="5" class="py-0">
                                <x-aui::forms.text vmodel="filters.search" name="search"
                                    label="Search {{ $title }}" />
                            </v-col>
                        </v-row>
                    </template>
                    <template #item.edit="{ item }">
                        <x-aui::buttons.tableEdit />
                    </template>
                </aui-data-table>
            </v-col>
        </v-row>
    </v-container>
@endsection
