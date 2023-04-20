<aui-card-with-tabs>
    <v-tab>{{ __('adminui.details') }}</v-tab>
    <v-tab>{{ __('adminui.history') }}</v-tab>
    <v-tab-item eager>
        {{-- Generic way to add the forms inside the tabs  --}}
        @include('auistock::content.'. $route .'.forms.details', $data)
    </v-tab-item>
    <v-tab-item>
        {{-- Generic way to add the forms inside the tabs  --}}
        @include('auistock::content.'. $route .'.forms.history', $data)
    </v-tab-item>
</aui-card-with-tabs>
