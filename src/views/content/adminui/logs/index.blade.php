@extends('auilayout::admin')

@section('content')
<v-container fluid>
    <v-row>
        <v-col cols="12" sm="9">
            <h1>{{ __('Activity Log') }}</h1>
        </v-col>
    </v-row>
    <v-row>
        <v-col cols="12">
            <aui-data-table :initial='@json($rows)' no-data-text="No matching countries found"
                :columns='@json($columns)' sort-by="name">
                <template #filters="{ filters }">
                    <v-row>
                        <v-col cols="5" class="py-0">
                            <x-aui::forms.text vmodel="filters.search" name="search" label="Search Logs" />
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
@endsection

