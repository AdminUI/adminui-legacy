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
                        <x-aui::forms.text name="name" label="{{ __('adminui.name') }}" value="{{ old('name') }}"
                            required />
                    </x-aui::layout.createModal>
                @endif
            </v-col>
        </v-row>
        {{-- <v-row>
        <v-col cols="12">
            <aui-data-table :initial='@json($rows)' no-data-text="No {{ $title }}"
                :columns='@json($columns)'>
                <template #filters="{ filters }">
                    <v-row>
                        <v-col cols="5" class="py-0">
                            <x-aui::forms.text
                                vmodel="filters.search"
                                name="search"
                                label="Search {{ $title }}" />
                        </v-col>
                    </v-row>
                </template>
                <template #item.edit="{ item }">
                    <x-aui::buttons.tableEdit />
                </template>
            </aui-data-table>
        </v-col>
    </v-row> --}}
        <v-row>
            @if (isset($submenu))
                <v-col cols="auto" class="pr-0 pt-0">
                    <aui-page-submenu></aui-page-submenu>
                </v-col>
            @endif
            <v-col>
                <x-aui::layout.card title="Categories">
                    <x-aui::menu.genericDragAndDrop displayfield="{{ 'name' }}"
                        editroute="{{ 'admin.category.edit' }}" :drops="$category" :sendAjaxNewParent="route('admin.category.parent')" :sendAjaxNewOrder="route('admin.category.parent')" />
                </x-aui::layout.card>
            </v-col>
        </v-row>
    </v-container>
@endsection
