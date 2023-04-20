<v-row class="mt-4">
    <v-col class="py-0">
        <x-aui::forms.text
            name="seo[meta_title]"
            :label="__('adminui.meta_title')"
            :value="$data->meta_title ?? ''"
        />
    </v-col>
</v-row>

<v-row>
    <v-col class="py-0">
        <x-aui::forms.text
            name="seo[meta_keywords]"
            :label="__('adminui.meta_keywords')"
            :value="$data->meta_keywords ?? ''"
            hint="Google no longer uses keywords"
        />
    </v-col>
</v-row>

<v-row>
    <v-col class="py-0">
        <x-aui::forms.textarea
            name="seo[meta_description]"
            :label="__('adminui.meta_description')"
            :value="$data->meta_description ?? ''"
        />
    </v-col>
</v-row>

<v-row>
    <v-col class="py-0">
            <x-aui::forms.text
                name="seo[canonical]"
                :label="__('Canonical Link')"
                :value="$data->canonical ?? ''"
            />
    </v-col>
</v-row>

<v-row>
    <v-col cols="9" class="py-0">
        <x-aui::forms.text
            name="seo[author]"
            :label="__('Author Name')"
            :value="$data->author ?? ''"
        />
    </v-col>
</v-row>

<!-- Twitter -->
<v-row>
	<v-col cols="12" class="py-4">
		<h3>Twitter (Will default to standard fields if not provided)</h3>
	</v-col>
</v-row>

<v-row>
	<v-col cols="9" class="py-0">
		<x-aui::forms.text
				name="seo['twitter_title']"
				:label="__('Twitter Title')"
				:value="$data->twitter_title ?? ''"
			/>
	</v-col>
</v-row>

<v-row>
    <v-col class="py-0">
        <x-aui::forms.textarea
            name="seo[twitter_description]"
            :label="__('Twitter Meta Description')"
            :value="$data->twitter_description ?? ''"
        />
    </v-col>
</v-row>



<!-- Facebook -->
<v-row>
	<v-col cols="12" class="py-4">
		<h3>Facebook / Open Graph (Will default to standard fields if not provided)</h3>
	</v-col>
</v-row>


<v-row>
	<v-col cols="9" class="py-0">
		<x-aui::forms.text
				name="seo['og_title']"
				:label="__('Open Graph Title')"
				:value="$data->og_title ?? ''"
			/>
	</v-col>
</v-row>

<v-row>
    <v-col class="py-0">
        <x-aui::forms.textarea
            name="seo[og_description]"
            :label="__('Open Graph Meta Description')"
            :value="$data->og_description ?? ''"
        />
    </v-col>
</v-row>

<v-row>
    <v-col cols="6" class="py-0 pl-6">
        <x-aui::forms.switch
            name="seo[is_index]"
            :label="__('Can be crawled by search engines')"
            :value="$data->is_index ?? ''"
        />
    </v-col>
</v-row>
