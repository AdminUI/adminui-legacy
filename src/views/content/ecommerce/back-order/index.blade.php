<x-auiecom::layout.ecom_layout :breadcrumb="$breadcrumb" >


<v-container fluid>
    <v-row>
        <v-col cols="12" sm="9">
            <h1>Back Orders</h1>
        </v-col>
    </v-row>
    <v-row>
        <v-col cols="12">
            <aui-data-table :initial='@json($rows)' no-data-text="No Back Orders"
                :columns='@json($columns)'>
                <template #filters="{ filters }">
                    <v-row>
                        <v-col cols="5" class="py-0">
                            <x-aui::forms.text
                                vmodel="filters.search"
                                name="search"
                                label="Search Back Orders" />
                        </v-col>
                    </v-row>
                </template>
                <template #item.edit="{ item }">
                    <x-aui::buttons.tableEdit />
                </template>
            </aui-data-table>
        </v-col>
    </v-row>
</v-container>

</x-auiecom::layout.ecom_layout>
