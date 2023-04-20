<x-auiecom::layout.ecom_layout>

    <v-container fluid>
        <x-aui::forms.form action="{{ route('admin.import.product.import') }}" file="true" method="POST">
            <v-row>
                <v-col cols="12">
                    <h1>Edit - {{ $title }}</h1>
                </v-col>

                <v-card>
                    <v-card-text>
                        <v-row>
                            <v-col cols="12">
                                <v-card dark>
                                    <v-card-title class="text-h5">
                                        Product importer
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
                                <x-aui::forms.number name="description_number"
                                    label="{{ __('Description Number') }}"
                                    value="{{ old('description_number') }}" />
                            </v-col>

                            <v-col cols="12">
                                <x-aui::forms.number name="slug_number" label="{{ __('Slug Number') }}"
                                    value="{{ old('slug_number') }}" />
                            </v-col>

                            <v-col cols="12">
                                <x-aui::forms.number name="skucode_number"
                                    label="{{ __('Skucode Number') }}"
                                    value="{{ old('skucode_number') }}" />
                            </v-col>

                            <v-col cols="12">
                                <x-aui::forms.number name="salePrice_number"
                                    label="{{ __('SalePrice Number') }}"
                                    value="{{ old('salePrice_number') }}" />
                            </v-col>

                            <v-col cols="12">
                                <x-aui::forms.number name="costPrice_number"
                                    label="{{ __('CostPrice Number') }}"
                                    value="{{ old('costPrice_number') }}" />
                            </v-col>

                            <v-col cols="12">
                                <x-aui::forms.number name="price_number" label="{{ __('Price Number') }}"
                                    value="{{ old('price_number') }}" />
                            </v-col>

                            <v-col cols="12">
                                <x-aui::forms.number name="postagePrice_number"
                                    label="{{ __('PostagePrice Number') }}"
                                    value="{{ old('postagePrice_number') }}" />
                            </v-col>

                            <v-col cols="12">
                                <x-aui::forms.number name="retailPrice_number"
                                    label="{{ __('RetailPrice Number') }}"
                                    value="{{ old('retailPrice_number') }}" />
                            </v-col>

                            <v-col cols="12">
                                <x-aui::forms.number name="eanCode_number"
                                    label="{{ __('EanCode Number') }}"
                                    value="{{ old('eanCode_number') }}" />
                            </v-col>

                            <v-col cols="12">
                                <x-aui::forms.number name="quantity_number"
                                    label="{{ __('Quantity Number') }}"
                                    value="{{ old('quantity_number') }}" />
                            </v-col>

                            <v-col cols="12">
                                <x-aui::forms.number name="weight_number"
                                    label="{{ __('Weight Number') }}"
                                    value="{{ old('weight_number') }}" />
                            </v-col>

                            <v-col cols="12">
                                <x-aui::forms.number name="stockCondition_number"
                                    label="{{ __('StockCondition Number') }}"
                                    value="{{ old('stockCondition_number') }}" />
                            </v-col>

                            <v-col cols="12">
                                <x-aui::forms.number name="imageMedia_number"
                                    label="{{ __('ImageMedia Number') }}"
                                    value="{{ old('imageMedia_number') }}" />
                            </v-col>

                            <v-col cols="6">
                                <x-aui::forms.number name="category_number"
                                    label="{{ __('Category Number') }}"
                                    value="{{ old('category_number') }}" />
                            </v-col>

                            <v-col cols="6">
                                <x-aui::forms.text name="category_separator"
                                    label="{{ __('Category Separator') }}"
                                    value="{{ old('category_separator') }}" />
                                <small>
                                    Here you can define the delimiter case is a multiple categories, leave blank for
                                    single category import.
                                </small>
                            </v-col>

                            <v-col cols="12">
                                <x-aui::forms.number name="brand_number" label="{{ __('Brand Number') }}"
                                    value="{{ old('brand_number') }}" />
                            </v-col>
                            <v-col cols="12">
                                <v-file-input name="file" label="Product Csv" truncate-length="15"></v-file-input>

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
