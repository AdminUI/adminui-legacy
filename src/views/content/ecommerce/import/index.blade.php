<x-auiecom::layout.ecom_layout :breadcrumb="$breadcrumb" >


    <v-container fluid>
        <v-row>
            <v-col cols="12" sm="9">
                <h1>{{ $title }}</h1>
            </v-col>

            <v-col cols="12" sm="3" class="text-right">
                @if (admin()->can('admin manage'))
                {{-- <x-aui::layout.createModal action="{{ route('admin.'. $route .'.store') }}">
                <x-aui::forms.text name="name" label="{{ __('adminui.name') }}" value="{{ old('name') }}"
                    required />
                </x-aui::layout.createModal> --}}
                @endif
            </v-col>
        </v-row>
        <v-row>
            <v-col cols="12">
                {{-- <aui-data-table :initial='@json($rows)' no-data-text="No {{ $title }}"
                :columns='@json($columns)'>
                <template #filters="{ filters }">
                    <v-row>
                        <v-col cols="5" class="py-0">
                            <x-aui::forms.text vmodel="filters.search" name="search" label="Search {{ $title }}" />
                        </v-col>
                    </v-row>
                </template>
                <template #item.edit="{ item }">
                    <x-aui::buttons.tableEdit />
                </template>
                </aui-data-table> --}}

                <v-simple-table dark>
                    <template v-slot:default>
                        <thead>
                            <tr>
                                <th class="text-left">
                                    Import Name
                                </th>
                                <th class="text-left">
                                    Import Description
                                </th>
                                <th class="text-center">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Product</td>
                                <td>Import a csv file into products.</td>
                                <td>
                                    <a href="{{ route('admin.import.product') }}" class="v-btn v-btn--has-bg theme--dark v-size--default primary"> Open</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>Import a csv file into Categories.</td>
                                <td>
                                    <a href="{{ route('admin.import.category') }}" class="v-btn v-btn--has-bg theme--dark v-size--default primary"> Open</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Brand</td>
                                <td>Import a csv file into Brand.</td>
                                <td>
                                    <a href="{{ route('admin.import.brand') }}" class="v-btn v-btn--has-bg theme--dark v-size--default primary"> Open</a>
                                </td>
                            </tr>
                        </tbody>
                    </template>
                </v-simple-table>

            </v-col>
        </v-row>
    </v-container>

</x-auiecom::layout.ecom_layout>
