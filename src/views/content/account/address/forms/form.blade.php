{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
            name="address"
            label="{{ __('Address') }}"
            required
            value="{{ old('address', $data->address) }}"
            />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
            name="address_2"
            label="{{ __('Address 2') }}"
            value="{{ old('address_2', $data->address_2) }}"
            />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
            name="town"
            label="{{ __('Town') }}"
            required
            value="{{ old('town', $data->town) }}"
            />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
            name="county"
            label="{{ __('County') }}"
            value="{{ old('county', $data->county) }}"
            />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
            name="postcode"
            label="{{ __('Postcode') }}"
            required
            value="{{ old('postcode', $data->postcode) }}"
            />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.select
            :options="$countries"
            name="country_id"
            :label="__('Country')"
            value="{{ old('country_id', $data->country_id) }}"
            />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.number
            name="phone"
            label="{{ __('Phone') }}"
            value="{{ old('phone') }}"
            value="{{ old('phone', $data->phone) }}"
            />
    </v-col>
</v-row>
<v-row>
    <v-col class="py-1">
        <x-aui::forms.text
            name="lng"
            label="{{ __('Longitude') }}"
            :value="old('lng', $data->lng)"
        />
    </v-col>
    <v-col class="py-1">
        <x-aui::forms.text
            name="lat"
            label="{{ __('Latitude') }}"
            :value="old('lat', $data->lat)"
        />
    </v-col>
    <v-col class="py-1">
        <x-aui::forms.text
            name="distance"
            label="{{ __('Distance') }}"
            :value="old('distance', $data->distance)"
        />
    </v-col>
</v-row>

{{-- block end --}}
