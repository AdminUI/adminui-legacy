@extends('auilayout::admin')

@section('content')
<v-container fluid>
    <v-row>
        <v-col cols="12" sm="9">
            <h1>{{ __('Schema') }}</h1>
        </v-col>

        <v-col cols="12" sm="3" class="text-right">
            @if (admin()->can('admin manage'))
                <x-aui::layout.createModal action="{{ route('admin.schema.store') }}">
                    <x-aui::forms.text
                        name="name"
                        label="{{ __('Name') }}"
                        value="{{ old('name') }}"
                        required />

                    <x-aui::forms.text
                        name="type"
                        label="Type"
                        value="{{ old('type') }}" />

                    <x-aui::forms.text
                        name="manufacturer"
                        label="Manufacturer"
                        value="{{ old('manufacturer') }}" />

                    <x-aui::forms.text
                        name="brand"
                        label="Brand"
                        value="{{ old('brand') }}" />

                    <x-aui::forms.text
                        name="url"
                        label="Url"
                        value="{{ old('url') }}" />

                    <x-aui::forms.text
                        name="model"
                        label="Model"
                        value="{{ old('model') }}" />

                    <x-aui::forms.textarea
                        name="description"
                        label="Description"
                        value="{{ old('description') }}" />

                    <x-aui::forms.text
                        name="phone"
                        label="Phone"
                        value="{{ old('phone') }}" />

                </x-aui::layout.createModal>
            @endif
        </v-col>
    </v-row>
    <v-row>
        <v-col cols="12">
            <aui-data-table :initial='@json($rows)' no-data-text="No Schemas found"
                :columns='@json($columns)'>
                <template #filters="{ filters }">
                    <v-row>
                        <v-col cols="5" class="py-0">
                            <x-aui::forms.text
                                vmodel="filters.search"
                                name="search"
                                label="Search Schema" />
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
