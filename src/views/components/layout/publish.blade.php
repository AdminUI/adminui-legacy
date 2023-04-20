<v-card class="{{ $class ?? '' }} mb-4">
    <v-toolbar color="toolbar" class="text--white" dense :flat="$themeOptions.toolbarFlat">
        <div :class="{
				'white--text': $themeOptions.darkToolbarText
			}">{{ __('Publish') }}
        </div>
    </v-toolbar>
    <v-card-text class="pt-10 px-6">
        @if (!empty($data))
            <v-row>
                <v-col class="text-center">
                    <strong>Created:</strong><br />
                    {{ optional($data->created_at)->format('d/m/Y H:i:s') }}
                </v-col>
                <v-col class="text-center">
                    <strong>Updated:</strong><br />
                    {{ optional($data->updated_at)->format('d/m/Y H:i:s') }}
                </v-col>
            </v-row>
        @endif

        <v-row>
            <v-col class="d-flex justify-center py-0">
                <x-aui::forms.switch
                    name="is_active"
                    value="{{ $data->is_active ?? '' }}"
                    label="{{ __('adminui.status') }}" />
            </v-col>
        </v-row>

        {{ $slot }}

        <v-row>
            <v-col cols="12" class="">
                <v-btn block type="submit" color="success">{{ __('adminui.update') }}</v-btn>
            </v-col>
        </v-row>
    </v-card-text>
</v-card>
