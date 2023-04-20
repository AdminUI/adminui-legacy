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
        <x-aui::forms.email
            name="email"
            label="{{ __('adminui.email') }}"
            value="{{ old('email', $data->email) }}"
                />
    </v-col>
</v-row>
{{-- block end --}}
{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="6" class="py-1">
        <x-aui::forms.number
            name="phone"
            label="{{ __('adminui.phone') }}"
            value="{{ old('phone', $data->phone) }}"
            required />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
            name="address"
            label="{{ __('adminui.address') }}"
            value="{{ old('address', $data->address) }}"
                />
    </v-col>
</v-row>
{{-- block end --}}
{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
            name="address_2"
            label="{{ __('adminui.address_2') }}"
            value="{{ old('address_2', $data->address_2) }}"
            required />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
            name="town"
            label="{{ __('adminui.town') }}"
            value="{{ old('town', $data->town) }}"
                />
    </v-col>
</v-row>
{{-- block end --}}
{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
            name="county"
            label="{{ __('adminui.county') }}"
            value="{{ old('county', $data->county) }}"
            required />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
            name="postcode"
            label="{{ __('adminui.postcode') }}"
            value="{{ old('postcode', $data->postcode) }}"
                />
    </v-col>
</v-row>
{{-- block end --}}
{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="6" class="py-1">
        <x-aui::forms.number
            name="sort_code"
            label="{{ __('adminui.sort_code') }}"
            value="{{ old('sort_code', $data->sort_code) }}"
            required />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.number
            name="account_number"
            label="{{ __('adminui.account_number') }}"
            value="{{ old('account_number', $data->account_number) }}"
                />
    </v-col>
</v-row>
{{-- block end --}}
