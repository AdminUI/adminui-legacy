@extends('auilayout::admin')

@section('content')
<v-container fluid>
    <v-row>
        <v-col cols="12" sm="9">
            <h1>{{ $title }}</h1>
        </v-col>
    </v-row>
    <v-row>
        @if (isset($submenu))
            <v-col cols="auto" class="pr-0 pt-0">
                <aui-page-submenu></aui-page-submenu>
            </v-col>
        @endif
        <v-col>
            <v-row>
                <v-col>
                    <v-alert type="info" dismissible elevation="2">
                        <p>Please download the current pricelist <strong>CSV file</strong> from <a href="{{ route('admin.pricing.export') }}">here</a>.</p>
                        <p>
                        Then upload the new pricelist <strong>CSV File</strong> using the form below.<br/>
                        Do not rename any of the column headers on top row.<br/>
                        You can remove complete columns if you do not wish them to update.<br/>
                        Or any prices left blank (not 0) will be ignored.<br/>
                        Any Sale price that are not 0 will cause the product to go on sale.</p>
                        <p>
                        These are the only fields that will be updated with this import:<br/>
                        'cost_price', 'price', 'trade_price', 'sale_price', 'retail_price', 'postage_price'
                        </p>
                    </v-alert>
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    <x-aui::layout.card title="Upload">
                        Import your price list from a CSV file.
                        <x-aui::forms.form method="post" action="{{ route('admin.pricing.import') }}" file="true">
                            <v-col cols="4">
                                <x-aui::forms.file name="file" label="File" />
                                <x-aui::forms.submit>Upload</x-aui::forms.submit>
                            </v-col>
                        </x-aui::forms.form>
                    </x-aui::layout.card>

                </v-col>
            </v-row>
        </v-col>
    </v-row>
</v-container>
@endsection
