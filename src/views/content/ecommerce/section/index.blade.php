@extends('auilayout::admin')

@section('content')
    <v-container fluid>
        <v-row>
            <v-col cols="12" sm="9">
                <h1>{{ $title }}</h1>
            </v-col>

            <v-col cols="12" sm="3" class="text-right">
                @if (admin()->can('admin manage'))
                    <x-aui::layout.createModal action="{{ route('admin.' . $route . '.store') }}" button-text="{{ __('aui::ecommerce.variants.new_variant_section') }}">
                        <x-aui::forms.text name="name" label="{{ __('adminui.name') }}" value="{{ old('name') }}"
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
                                {{ $item->name }} ({{ $item->sort_order }})
                                <div class="ml-4">
                                    <v-tooltip top>
                                        <template #activator="{ on }">
                                            <v-btn v-on="on" icon text x-small tag="a" href="{{ route('admin.section.edit', short_encrypt($item->id)) }}" @click.stop>
                                                <v-icon>mdi-pencil</v-icon>
                                            </v-btn>
                                        </template>
                                        <small>{{ __('aui::ecommerce.variants.edit_variant_section') }}</small>
                                    </v-tooltip>
                                </div>
                            </v-expansion-panel-header>
                            <v-expansion-panel-content>
                                <v-simple-table>
                                    <template v-slot:default>
                                        <thead>
                                            <tr>
                                                <th class="text-left">
                                                    Name
                                                </th>
                                                <th class="text-left">
                                                    Field
                                                </th>
                                                <th class="text-left">
                                                    Sort Order
                                                </th>
                                                <th class="text-left">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($item->variants as $variant)
                                                <tr>
                                                    <td>{{ $variant->name }}</td>
                                                    <td>{{ $variant->field }}</td>
                                                    <td>{{ $variant->sort_order }}</td>
                                                    <td class="text-right">
                                                        <x-aui::buttons.tableEditBlade
                                                            route="{{ route('admin.variant.edit', [$variant->id]) }}" />
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if (empty($item->variants) || count($item->variants) === 0)
                                                <tr>
                                                    <td colspan="4" class="text-center font-italic">No variants available</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </template>
                                </v-simple-table>
                                <div class="d-flex justify-end mt-8">
                                    @if (admin()->can('admin manage'))
                                        <x-aui::layout.blankModal title="New Variant">
                                            <x-aui::forms.form action="{{ route('admin.variant.store', $item->id) }}">
                                                <input type="hidden" name="section_id" value="{{ $item->id }}">
                                                <x-aui::forms.text name="name" label="{{ __('adminui.name') }}"
                                                    value="{{ old('name') }}" required />
                                                <x-aui::forms.text name="field" label="{{ __('adminui.field') }}"
                                                    value="{{ old('name') }}" required />
                                                <x-aui::forms.number name="sort_order"
                                                    label="{{ __('adminui.sort_order') }}"
                                                    value="{{ old('sort_order') }}" required />
                                                <x-aui::forms.modalSave />
                                            </x-aui::forms.form>
                                            <x-slot name="button">
                                                <v-btn color="success" small v-on="on">
                                                    {{ __('aui::ecommerce.variants.new_variant') }}
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
