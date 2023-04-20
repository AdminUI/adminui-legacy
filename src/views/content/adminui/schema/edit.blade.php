@extends('auilayout::admin')

@section('content')



<v-container fluid>
    <v-row>
        <v-col cols="12">
            <h1>Edit {{ __('adminui.schema') }} - {{ $schema->name }}</h1>
        </v-col>
    </v-row>

    <x-aui::layout.status :data="$schema" />

    <x-aui::forms.form action="{{ route('admin.schema.update', $schema->id) }}">
        <v-row>
            <v-col cols="9">
                <x-aui::layout.card title="Details">
                    <v-row>
                        <v-col cols="6" class="py-1">
                            <x-aui::forms.text
                                name="name"
                                label="{{ __('adminui.name') }}"
                                value="{{ old('name') }}"
                                value="{{ old('name', $schema->name) }}"
                                required />
                        </v-col>
                        <v-col cols="6" class="py-1">
                            <x-aui::forms.textarea
                                name="description"
                                label="Description"
                                length="255"
                                value="{{ old('description', $schema->description) }}"
                                />
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="6" class="py-1">
                            <x-aui::forms.text
                                name="brand"
                                label="Brand"
                                value="{{ old('brand', $schema->brand) }}"
                                />
                        </v-col>
                        <v-col col="6" class="py-1">
                            <x-aui::forms.text
                                name="url"
                                label="Url"
                                value="{{ old('url', $schema->url) }}"
                                />
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="6" class="py-1">
                            <x-aui::forms.text
                                name="model"
                                label="model"
                                value="{{ old('model', $schema->model) }}"
                                />
                        </v-col>
                        <v-col col="6" class="py-1">
                            <x-aui::forms.text
                                name="phone"
                                label="Phone"
                                value="{{ old('phone', $schema->phone) }}"
                                />
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="6" class="py-1">
                            <x-aui::forms.text
                                name="type"
                                label="Type"
                                value="{{ old('type', $schema->type) }}"
                                />
                        </v-col>
                        <v-col col="6" class="py-1">
                            <x-aui::forms.text
                                name="manufacturer"
                                value="{{ old('type', $schema->type) }}"
                                label="Manufacturer"
                                />
                        </v-col>
                    </v-row>
                </x-aui::layout.card>
            </v-col>
            <v-col cols="3">
                <x-aui::layout.publish :data="$schema" />
                <x-aui::layout.dangerZone :action="route('admin.schema.destroy', ['encid' => short_encrypt($schema->id)])" />
            </v-col>
        </v-row>
    </x-aui::forms.form>
</v-container>

@endsection
