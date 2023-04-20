@extends('auilayout::admin')

@section('content')
    <v-container fluid>
        <v-row>
            <v-col cols="12" sm="9">
                <h1>{{ $title }}</h1>
            </v-col>

            <v-col cols="12" sm="3" class="text-right">
                @if (admin()->can('admin manage'))
                    <x-aui::layout.createModal action="{{ route('admin.tag.section.store') }}" button-text="{{ __('aui::ecommerce.filters.create_filter_group') }}">
                        <x-aui::forms.text name="name" label="Section {{ __('adminui.name') }}" value="{{ old('name') }}"
                            required />
                        <x-aui::forms.number name="sort_order" label="{{ __('adminui.sort_order') }}"
                            value="{{ $data->count() + 1 }}" required />
                    </x-aui::layout.createModal>
                @endif
            </v-col>
        </v-row>
        <v-row>
            @if (isset($submenu))
                <v-col cols="auto" class="pr-0">
                    <aui-page-submenu></aui-page-submenu>
                </v-col>
            @endif
            <v-col>
                <v-expansion-panels focusable inset>
                    @foreach ($data as $item)
                        <v-expansion-panel>
                            <v-expansion-panel-header>
                                #{{ $item->sort_order }} - {{ $item->name }} ({{ trans_choice('aui::ecommerce.filters.count_filters', $item->tags->count()) }})
                                <div class="ml-4">
                                    <v-tooltip top>
                                        <template #activator="{ on }">
                                            <v-btn v-on="on" icon text x-small tag="a" href="{{ route('admin.tag.section.edit', short_encrypt($item->id)) }}" @click.stop>
                                                <v-icon>mdi-pencil</v-icon>
                                            </v-btn>
                                        </template>
                                        <small>{{ __('aui::ecommerce.filters.edit_filter') }}</small>
                                    </v-tooltip>
                                </div>
                            </v-expansion-panel-header>
                            <v-expansion-panel-content>
                                <v-simple-table>
                                    <template v-slot:default>
                                        <thead>
                                            <tr>
                                                <th class="text-left">
                                                    ID
                                                </th>
                                                <th class="text-left">
                                                    Code
                                                </th>
                                                <th class="text-left">
                                                    Name
                                                </th>
                                                <th class="text-left">
                                                    Slug
                                                </th>
                                                <th class="text-left">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($item->tags as $tag)
                                                <tr>
                                                    <td>{{ $tag->id }}</td>
                                                    <td>{{ $tag->code }}</td>
                                                    <td>{{ $tag->name }}</td>
                                                    <td>{{ $tag->slug }}</td>
                                                    <td class="text-right">
                                                        <x-aui::buttons.tableEditBlade
                                                            route="{{ route('admin.tag.edit', [$tag->id]) }}" />
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if (empty($item->tags) || count($item->tags) === 0)
                                                <tr>
                                                    <td colspan="4" class="text-center font-italic">No filters available</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </template>
                                </v-simple-table>
                                <div class="d-flex justify-end mt-8">
                                    @if (admin()->can('admin manage'))
                                        <x-aui::layout.blankModal title="New Tag">
                                            <x-aui::forms.form action="{{ route('admin.tag.store') }}">
                                                <input type="hidden" name="section_id" value="{{ $item->id }}">
                                                <x-aui::forms.text name="name" label="{{ __('adminui.name') }}"
                                                    value="{{ old('name') }}" required />
                                                <x-aui::forms.text name="code" label="{{ __('code') }}"
                                                    value="{{ old('name') }}" />
                                                <x-aui::forms.modalSave />
                                            </x-aui::forms.form>
                                            <x-slot name="button">
                                                <v-btn color="success" small v-on="on">
                                                    {{ __('aui::ecommerce.filters.new_filter') }}
                                                </v-btn>
                                            </x-slot>
                                        </x-aui::layout.blankModal>
                                    @endif
                                </div>
                            </v-expansion-panel-content>
                        </v-expansion-panel>
                    @endforeach
                </v-expansion-panels>
            </v-col>

        </v-row>
    </v-container>
@endsection
