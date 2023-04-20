{{-- {{ dd($data->communications->first()->messages) }} --}}
<v-container fluid>
    <v-row>
        <v-col cols="12">
            <h1>{{ $title }} {{ __('admin/auicrm.crm') }}</h1>
        </v-col>
    </v-row>

    <v-row>
        <v-col cols="12">
            <aui-card-with-tabs>
                <v-tab>{{ __('admin/auicrm.projects') }}</v-tab>
                <v-tab>{{ __('admin/auicrm.invoices') }}</v-tab>
                <v-tab>{{ __('admin/auicrm.communications') }}</v-tab>
                <v-tab-item eager>
                    {{-- Generic way to add the forms inside the tabs  --}}
                    @include('auicrm::components.accountsTab.projects')
                </v-tab-item>
                <v-tab-item eager>
                    {{-- Generic way to add the forms inside the tabs  --}}
                    asdsad
                </v-tab-item>
                <v-tab-item eager>
                    @include('auicrm::components.accountsTab.communications')
                </v-tab-item>
            </aui-card-with-tabs>
        </v-col>
    </v-row>
</v-container>
