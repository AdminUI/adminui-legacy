{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="6" class="py-1">
        <x-aui::forms.text name="name" label="{{ __('adminui.name') }}" value="{{ old('name') ?? $data->name }}" required />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.text name="field" label="{{ __('adminui.field') }}" value="{{ old('field') ?? $data->field }}" required />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.number name="sort_order" label="{{ __('adminui.sort_order') }}"
            value="{{ old('sort_order') ?? $data->sort_order }}" required />
    </v-col>
</v-row>
