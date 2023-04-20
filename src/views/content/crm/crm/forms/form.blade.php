{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
            name="name"
            label="{{ __('admin/auiepos.name') }}"
            value="{{ old('name', $data->name) }}"
            required />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
            name="slug"
            label="{{ __('admin/adminui.slug') }}"
            value="{{ old('slug', $data->slug) }}"
                />
    </v-col>
</v-row>
{{-- block end --}}
{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="12" class="py-1">
        <v-col cols="12" class="py-1">
            <aui-wysiwyg name="description" label="{{ __('admin/auiepos.description') }}"
            value="{{ old('description', $data->description) }}" @toolbar:image="launchImagePicker" />
        </v-col>
    </v-col>
    <v-col cols="12" class="py-1">
        <v-col cols="12" class="py-1">
            <x-aui::forms.chips
                :options='$supplier'
                name="supplier"
                :label="__('admin/auiepos.supplier')"
                :value="$data->suppliers()->get()->pluck('title', 'id')"
            />
        </v-col>
    </v-col>
</v-row>
{{-- block end --}}
