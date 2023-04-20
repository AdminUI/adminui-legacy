<x-auiecom::layout.ecom_layout :breadcrumb="$breadcrumb" >

    <v-container fluid>
        <x-aui::forms.form action="{{ route('admin.import.category.import') }}" file="true" method="POST">
            <v-row>
                <v-col cols="12">
                    <h1>Edit - {{ $title }}</h1>
                </v-col>

                <v-card>
                    <v-card-text>
                        <v-row>

                            <v-col cols="12">
                                <v-card dark >
                                    <v-card-title class="text-h5">
                                        Category importer
                                    </v-card-title>

                                    <v-card-text>
                                        <p>
                                            <strong>
                                                Below is listed the column names for storage in the data table.
                                            </strong>
                                        </p>
                                        <p>
                                            <strong>
                                                Enter the corresponding column from the import CSV to map into the data
                                                table.
                                            </strong>
                                        </p>
                                        <p>
                                            <strong>
                                                Please note column A in Excel equates to 1, B = 2 etc..
                                            </strong>
                                        </p>
                                    </v-card-text>
                                </v-card>
                            </v-col>
                            <v-col cols="12">
                                <x-aui::forms.number name="name_number" label="{{ __('Name Number') }}"
                                    value="{{ old('name_number') }}" />
                            </v-col>

                            <v-col cols="12">
                                <x-aui::forms.number name="slug_number"
                                    label="{{ __('Slug Number') }}"
                                    value="{{ old('slug_number') }}" />
                            </v-col>

                            <v-col cols="12">
                                <x-aui::forms.number name="icon_number" label="{{ __('Icon Number') }}"
                                    value="{{ old('icon_number') }}" />
                            </v-col>

                            <v-col cols="12">
                                <x-aui::forms.number name="description_number"
                                    label="{{ __('Description Number') }}"
                                    value="{{ old('description_number') }}" />
                            </v-col>

                            <v-col cols="12">
                                <x-aui::forms.number name="imageMedia_number"
                                    label="{{ __('ImageMedia Number') }}"
                                    value="{{ old('imageMedia_number') }}" />
                            </v-col>

                            <v-col cols="12">
                                <v-file-input
                                    name="file"
                                    label="Product Csv"
                                    truncate-length="15"
                                ></v-file-input>

                            </v-col>
                            <v-col cols="12" class="12">
                                <v-btn block type="submit" color="success">{{ __('adminui.update') }}</v-btn>
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-row>
        </x-aui::forms.form>

    </v-container>
</x-auiecom::layout.ecom_layout>
