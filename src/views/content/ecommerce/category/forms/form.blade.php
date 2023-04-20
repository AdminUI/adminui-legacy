<v-row class="mt-4">
    <v-col cols="12" class="py-1">
        <x-aui::forms.text name="name" label="{{ __('adminui.name') }}" value="{!! old('name', $data->name) !!}"
            required />
    </v-col>
</v-row>

{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="6" class="py-1">
        <v-text-field value="{{ $data->id }}" label="{{ __('Category ID') }}" disabled></v-text-field>
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.text name="import_id" label="{{ __('Import Ref') }}"
            value="{{ old('import_id', $data->import_id) }}" hint="Import reference if imported via csv" />
    </v-col>
</v-row>

{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="6" class="py-1">
        <x-aui::forms.text name="menu_label" label="{{ __('Menu Label') }}"
            value="{!! old('menu_label', $data->menu_label) !!}"
            hint="Used for menu, if blank name will be displayed" />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.text name="slug" label="{{ __('adminui.slug') }}" value="{{ old('slug', $data->slug) }}" />
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
        <x-aui::forms.text name="icon" label="{{ __('Icon') }}" value="{{ old('icon', $data->icon) }}"
            hint="If you have uploaded an icon instead of category image, enter name of icon" />
    </v-col>
</v-row>
{{-- Block end --}}

