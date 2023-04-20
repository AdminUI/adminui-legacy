@extends('auilayout::admin')

@section('content')
    <v-container fluid>
        <v-row>
            <v-col cols="12" sm="9">
                <h1>{{ $title }}</h1>
            </v-col>

            <v-col cols="12" sm="3" class="text-right">
                {{-- @if (admin()->can('admin manage'))
                <x-aui::layout.createModal action="{{ route('admin.'. $route .'.store') }}">
                <x-aui::forms.text name="name" label="{{ __('admin/auiepos.name') }}" value="{{ old('name') }}"
                    required />
                </x-aui::layout.createModal>
                @endif --}}
            </v-col>

        </v-row>

        @if (empty(env('HARVEST_ACCOUNT_ID')) && empty(env('ACCESS_TOKEN')))
            <v-row>
                <v-col cols="12" sm="3">
                    <code>HARVEST Api not set, please add HARVEST_ACCOUNT_ID and ACCESS_TOKEN in the .env</code>
                </v-col>
            </v-row>
        @else
            <v-row>
                <v-col cols="6" sm="3">
                    <x-aui::crm.layout.syncHarvestAccounts title="{{ __('Harvest accounts sync') }}" />
                </v-col>
                <v-col cols="6" sm="3">
                    <x-aui::crm.layout.syncHarvestUsers title="{{ __('Harvest users sync') }}" />
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="6" sm="3">
                    {{-- Pending Accounts --}}
                    <x-aui::layout.total title="Accounts" value="{{ $counts['allActiveAccounts'] }}" color="purple"
                        link="{{ route('admin.account.index') }}" />
                </v-col>
                <v-col cols="6" sm="3">
                    {{-- Pending Accounts --}}
                    <x-aui::layout.total title="Users" value="{{ $counts['allActiveUsers'] }}" color="red"
                        link="{{ route('admin.users.index') }}" />
                </v-col>
            </v-row>

            <x-aui::crm.layout.harvestTimeGraph title="Harvest users sync" />
        @endif

    </v-container>
@endsection
