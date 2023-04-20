@extends('auilayout::admin')

@section('content')
<v-container fluid>
    <v-row>
        <v-col cols="12" sm="9">
            <h1>{{ $title }}</h1>
        </v-col>

        <v-col cols="12" sm="3" class="text-right">
            <x-aui::layout.createModal action="{{ route('admin.postage-size.store') }}">
                <x-aui::forms.text
                    name="name"
                    label="{{ __('name') }}"
                    value="{{ old('name') }}"
                    required />

                <x-aui::forms.text
                    name="description"
                    label="{{ __('Description') }}"
                    value="{{ old('description') }}"
                    required />

            </x-aui::layout.createModal>
        </v-col>
    </v-row>


    <v-row>
        @if (isset($submenu))
            <v-col cols="auto" class="pr-0 pt-0">
                <aui-page-submenu></aui-page-submenu>
            </v-col>
        @endif
        <v-col>
            <v-row>
                <v-col>
                    <v-alert type="info" elevation="2">
                        Sizes should be in order as this is used to determine the postage rate calculation.
                    </v-alert>
                </v-col>
            </v-row>
            <v-expansion-panels focusable inset>
                @forelse ($rows as $row)
                    <v-expansion-panel>
                        <v-expansion-panel-header>Order: {{ $loop->index }} / Name: {{ $row->name }}</v-expansion-panel-header>
                        <v-expansion-panel-content class="pa-4">
                            <x-aui::forms.form method="patch" action="{{ route('admin.postage-size.update', $row->id) }}" id="form{{ $row->id }}">
                                <v-col cols="8">
                                    <div class="py-2">
                                        <input type="hidden" name="id" value="{{ $row->id }}" />
                                        <x-aui::forms.text
                                        name="name"
                                        label="{{ __('Name') }}"
                                        value="{{ $row->name }}"
                                        required
                                        hidedetails />
                                    </div>
                                    <div class="py-2">
                                        <x-aui::forms.number
                                        name="sort_order"
                                        label="{{ __('Sort Order') }}"
                                        value="{{ $row->sort_order }}"
                                        required
                                        hidedetails />
                                    </div>
                                    <div class="py-2">
                                        <x-aui::forms.text
                                        name="description"
                                        label="{{ __('Description') }}"
                                        value="{{ $row->description }}"
                                        required
                                        hidedetails
                                        form="form{{ $row->id }}"
                                        />
                                    </div>
                                    <div class="py-0">
                                        <x-aui::forms.switch
                                            name="is_active"
                                            value="{{ $row->is_active ?? '' }}"
                                            label="{{ __('adminui.status') }}" />
                                    </div>
                                    <div class="text-left py-0">
                                        <x-aui::forms.submit>Update</x-aui::forms.submit>
                                        {{-- <x-aui::layout.button class="error" id="delete{{ $row->id }}" name="Delete" /> --}}
                                    </div>
                                </v-col>
                            </x-aui::forms.form>
                        </v-expansion-panel-content>
                    </v-expansion-panel>
                @empty
                    No results found.
                @endforelse
            </v-expansion-panels>
        </v-col>
    </v-row>
</v-container>
@endsection
