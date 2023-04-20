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
        <x-aui::layout.card>
            @forelse ($rows as $row)
                <x-aui::layout.card class="mb-4 {{ $row->is_active ?: 'warning' }}">
                    <x-aui::forms.form method="patch" :action="route('admin.topseller.update', $row)">
                        <v-row>
                            <v-col cols="2">
                                <x-aui::layout.mediaPicker title="Image" :data="$row" />
                                <div class="d-flex justify-center">
                                    <x-aui::forms.switch name="is_active" value="{{ $row->is_active ?? '' }}"
                                        label="{{ __('Active') }}" />
                                </div>
                            </v-col>
                            <v-col cols="5">
                                <v-row>
                                    <v-col cols="12" class="pb-0">
                                        <x-aui::forms.text name="title" label="Title" :value="old('title', $row->title)" />
                                    </v-col>
                                    <v-col cols="12" class="py-0">
                                        <x-aui::forms.text name="link" label="Link URL" :value="old('link', $row->link)"
                                            prefix="{{ config('app.url') }}/" hint="URL to visit when clicked" />
                                    </v-col>
                                    <v-col cols="12" class="py-0">
                                        <x-aui::forms.text name="link_text" label="Link Text"
                                            :value="old('link', $row->link_text)" hint="Text to show as the link text" />
                                    </v-col>
                                    <v-col cols="12" class="py-0">
                                        <x-aui::forms.number name="sort_order" label="Order Priority"
                                            :value="old('sort_order', $row->sort_order)"
                                            hint="Items with a lower number will display first" />
                                    </v-col>
                                    <v-col cols="12" class="py-0">
                                        <x-aui::forms.text name="class_name" label="Add Class"
                                            :value="old('class_name', $row->class_name)"
                                            hint="Add a custom HTML class to the top seller" />
                                    </v-col>
                                </v-row>
                            </v-col>
                            <v-col cols="5">
                                <aui-wysiwyg name="description" label="Content"
                                    value="{{ old('description', $row->description) }}" :height="305" />
                            </v-col>
                        </v-row>
                        <v-row justify="space-between">
                            <v-col cols="2">
                                <x-aui::layout.dangerZoneSimple action="{{ route('admin.topseller.delete', $row) }}" />
                            </v-col>
                            <v-col cols="2">
                                <v-btn type="submit" color="primary" block>Update</v-btn>
                            </v-col>
                        </v-row>
                    </x-aui::forms.form>
                </x-aui::layout.card>
            @empty
                No Top Sellers have been created
            @endforelse
        </x-aui::layout.card>
    </v-container>

@endsection
