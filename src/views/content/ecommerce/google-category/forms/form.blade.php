{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="6" class="py-1">
        <x-aui::forms.text name="name" label="{{ __('adminui.name') }}" value="{!! old('name', $data->name) !!}"
            required />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.text name="slug" label="{{ __('adminui.slug') }}" value="{!! old('slug', $data->slug) !!}" />
    </v-col>
</v-row>
{{-- block end --}}
{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="12" class="py-1">
        <aui-wysiwyg name="description" label="{{ __('adminui.description') }}"
            value="{{ old('description', $data->description) }}" @toolbar:image="launchImagePicker" />
    </v-col>
    <v-col cols="12" class="py-1">
        <x-aui::forms.text name="icon" label="{{ __('adminui.icon') }}" value="{!! old('icon', $data->icon) !!}" />
    </v-col>
</v-row>
{{-- block end --}}
