<aui-card-with-tabs>
    <v-tab>{{ __('adminui.details') }}</v-tab>
    <v-tab-item eager>
        {{-- Generic way to add the forms inside the tabs  --}}
        @include('auistock::content.'. $route .'.forms.details', $data)
    </v-tab-item>
</aui-card-with-tabs>
