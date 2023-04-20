@extends('auilayout::admin')

@section('content')
    <v-container fluid>
        <v-row>
            <v-col cols="12" sm="9">
                <h1>{{ __('Product Logos') }}</h1>
            </v-col>

            <v-col cols="12" sm="3" class="text-right">
                @if (admin()->can('admin manage'))
                    <x-aui::layout.createModal action="{{ route('admin.' . $route . '.store') }}">
                        <x-aui::layout.featuredMedia title="Logo Media" />
                        <br>
                        <x-aui::forms.text name="link" label="{{ __('adminui.link') }}" value="{{ old('link') }}"
                            required />
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
                <x-aui::layout.card class="mt-2">
                    <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th class="text-left">
                                        &nbsp;
                                    </th>
                                    <th class="text-left">
                                        Link
                                    </th>
                                    <th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td style="width:1px">
                                            <v-img max-height="100" max-width="150"
                                                src="{{ $item->media->links['small'] ?? '' }}">
                                            </v-img>
                                        </td>
                                        <td class="text-left">
                                            <a href="{{ $item->link }}" target="_blank">
                                                {{ $item->link }}
                                            </a>
                                        </td>
                                        <td class="text-right">
                                            <x-aui::buttons.tableEditBlade
                                                route="{{ route('admin.productLogo.edit', $item->id) }}" />
                                        </td>
                                    </tr>
                                @endforeach
                                @if (count($data) === 0)
                                    <tr>
                                        <td colspan="3" class="text-center font-italic">
                                            No product logos found
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </template>
                    </v-simple-table>
            </v-col>
            {{-- Pagination --}}
            <v-col cols="12" sm="12">
                <x-aui::layout.pagination :paginator="$data" :page="$page" />
            </v-col>
            </x-aui::layout.card>
            </v-col>
        </v-row>
    </v-container>
@endsection
