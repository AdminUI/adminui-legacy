@extends('auilayout::admin')

@section('content')
<v-container fluid>
    <v-row>
        <v-col cols="12" sm="9">
            <h1>{{ $title }}</h1>
        </v-col>

        <v-col cols="12" sm="3" class="text-right">
            @if (admin()->can('admin manage'))
                <x-aui::layout.createModal action="{{ route('admin.postage-type.store') }}">
                    <x-aui::forms.text
                        name="name"
                        label="{{ __('adminui.name') }}"
                        value="{{ old('name') }}"
                        required />
                </x-aui::layout.createModal>
            @endif
        </v-col>
    </v-row>
    <v-row>
        @if (isset($submenu))
            <v-col cols="auto" class="pr-0 pt-0">
                <aui-page-submenu></aui-page-submenu>
            </v-col>
        @endif
        <v-col>
            <v-expansion-panels focusable inset>
                @forelse ($rows as $row)
                    <v-expansion-panel>
                        <v-expansion-panel-header>{{ $row->name }}</v-expansion-panel-header>
                        <v-expansion-panel-content class="pa-4">
                            <x-aui::forms.form method="patch" action="{{ route('admin.postage-type.update', $row->id) }}" id="form{{ $row->id }}">
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
                                    <x-aui::forms.taxes label="Tax Rate" name="tax_rate_id" :value="$row->tax_rate_id" hidedetails />
                                </div>

                                <div class="py-2">
                                    <x-aui::forms.text
                                    name="url"
                                    label="{{ __('Url link to tracking (Add %code% to url to include tracking code)') }}"
                                    value="{{ $row->url }}"
                                    hidedetails />
                                </div>

                                <div class=" py-0">
                                    <x-aui::forms.switch
                                        name="is_active"
                                        value="{{ $row->is_active ?? '' }}"
                                        label="{{ __('adminui.status') }}" />
                                </div>
                                <div class="d-flex justify-space-between py-0">
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
