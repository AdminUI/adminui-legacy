@extends('auilayout::admin')

@section('content')
    <v-container fluid>
        <v-row>
            <v-col cols="12" sm="9">
                <h1>{{ __('Subscribers') }}</h1>
            </v-col>

            <v-col cols="12" sm="3" class="text-right">
                {{-- @if (admin()->can('admin manage'))
                    <x-aui::layout.createModal action="">
                        <x-aui::forms.text name="name" value="{{ old('name') }}" label="{{ __('adminui.name') }}" />

                        <x-aui::forms.email name="email" value="{{ old('email') }}" label="{{ __('adminui.email') }}" />
                    </x-aui::layout.createModal>
                @endif --}}
            </v-col>
        </v-row>
        <v-row>
            <v-col cols="12">
                <aui-data-table :initial='@json($rows)' no-data-text="No matching subscribers found"
                    :columns='@json($columns)'>
                    <template #filters="{ filters }">
                        <v-row>
                            <v-col cols="5" class="py-0">
                                <x-aui::forms.text name="search" label="Search Subscribers" vmodel="filters.search" />

                            </v-col>
                        </v-row>
                    </template>

                    <template #item.name="{ item }">
                        @{{ item . first_name + ' ' + item . last_name }}
                    </template>
                    <template #item.is_active="{ value }">
                        <v-icon v-if="value == 1">mdi-check</v-icon>
                        <v-icon v-else>mdi-close</v-icon>
                    </template>
                    <template #item.edit="{ item }">
                        <x-aui::buttons.tableEdit />
                    </template>
                </aui-data-table>
            </v-col>
        </v-row>
    </v-container>
@endsection
