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
                        <x-aui::forms.number name="sort_order" label="{{ __('adminui.sort_order') }}"
                            value="{{ $data->count() + 1 }}" required />
                    </x-aui::layout.createModal>
                @endif
            </v-col>
        </v-row>
        <v-row>
            <v-expansion-panels>
                @foreach ($data as $item)
                    <v-expansion-panel>
                        <v-expansion-panel-header>
                            {{ $item->name }}
                        </v-expansion-panel-header>
                        <v-expansion-panel-content>
                            <v-row>
                                <v-col cols="12" sm="9">
                                    <a href="{{ route('admin.section.edit', short_encrypt($item->id)) }}"
                                        class="v-btn v-btn--outlined v-btn--rounded theme--light v-size--default secondary--text">
                                        <span class="v-btn__content">
                                            Edit
                                        </span>
                                    </a>
                                </v-col>

                                <v-col cols="12" sm="3" class="text-right">
                                    @if (admin()->can('admin manage'))
                                        <x-aui::layout.blankModal title="New Variant">
                                            <x-aui::forms.form action="{{ route('admin.variant.store', $item->id) }}">
                                                <input type="hidden" name="section_id" value="{{ $item->id }}">
                                                <x-aui::forms.text name="name" label="{{ __('adminui.name') }}"
                                                    value="{{ old('name') }}" required />
                                                <x-aui::forms.text name="field" label="{{ __('adminui.field') }}"
                                                    value="{{ old('name') }}" required />
                                                <x-aui::forms.number name="sort_order"
                                                    label="{{ __('adminui.sort_order') }}" value="{{ old('sort_order') }}"
                                                    required />
                                                <x-aui::forms.modalSave />
                                            </x-aui::forms.form>
                                        </x-aui::layout.blankModal>
                                    @endif
                                </v-col>
                            </v-row>


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
                                    </tbody>
                                </template>
                            </v-simple-table>

                        </v-expansion-panel-content>
                    </v-expansion-panel>
                @endforeach
            </v-expansion-panels>

        </v-row>
    </v-container>
@endsection
