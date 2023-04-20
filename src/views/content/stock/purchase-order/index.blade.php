@extends('auilayout::admin')

@section('content')

    <v-container fluid>
        <v-row>
            <v-col cols="12" sm="9">
                <h1>{{ $title }}</h1>
            </v-col>

            <v-col cols="12" sm="3" class="text-right">
                @if (admin()->can('admin manage'))

                <a href="{{ route('admin.'. $route .'.create') }}"
                    class="v-btn v-btn--outlined v-btn--rounded theme--light v-size--default secondary--text"><span
                        class="v-btn__content">
                        {{ __('Create') }}
                    </span>
                </a>
                @endif
            </v-col>
        </v-row>
        {{-- Remove the comment when sending the model --}}
        <v-row>
            <v-col cols="12">
                <aui-data-table :initial='@json($rows)' no-data-text="No {{ $title }}" :columns='@json($columns)'>
                    <template #filters="{ filters }">
                        <v-row>
                            <v-col cols="5" class="py-0">
                                <x-aui::forms.text vmodel="filters.search" name="search" label="Search {{ $title }}" />
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
