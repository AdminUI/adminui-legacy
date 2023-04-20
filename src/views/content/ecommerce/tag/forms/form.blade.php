{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
            name="code"
            label="{{ __('adminui.code') }}"
            value="{{ old('code', $data->code) }}"
            required />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.select
            name="tag_section_id"
            label="{{ __('Tag Section') }}"
            value="{{ old('tag_section_id', $data->tag_section_id) }}"
            :options="$tagSections"
            required />
    </v-col>
</v-row>
{{-- block end --}}
{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
            name="name"
            label="{{ __('adminui.name') }}"
            value="{{ old('name', $data->name) }}"
            required />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
            name="slug"
            label="{{ __('adminui.slug') }}"
            value="{{ old('slug', $data->slug) }}"
            required />
    </v-col>
</v-row>
{{-- block end --}}
