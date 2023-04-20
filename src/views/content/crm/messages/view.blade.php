@php
use AdminUI\AdminUIFramework\Helpers\Gravatar;
@endphp

@extends('auilayout::admin')

@section('content')
    <v-container fluid>

        <v-row>
            <v-col cols="12" sm="9">
                <h1>{{ __('admin/auicrm.messages') }} - {{ $communication->title }}</h1>
            </v-col>

            <v-col cols="12" sm="3" class="text-right">
                @if (admin()->can('admin manage'))
                    <v-dialog transition="dialog-bottom-transition" max-width="600">
                        <template v-slot:activator="{ on, attrs }">
                            <v-btn color="primary" v-bind="attrs" v-on="on">
                                {{ __('admin/auicrm.new_message') }}
                            </v-btn>
                        </template>
                        <template v-slot:default="dialog">
                            <v-card>
                                <div class="v-card__title justify-space-between">
                                    <div>
                                        {{ __('admin/auicrm.new_message') }}
                                    </div>
                                </div>
                                <br>
                                <x-aui::forms.form action="{{ route('admin.crm.messages.store', $communication->id) }}"
                                    method="POST">
                                    <v-card-text>
                                        <x-aui::forms.textarea name="message" label="{{ __('admin/auicrm.message') }}"
                                            value="{{ old('message') }}" required />

                                        <x-aui::forms.date name="follow_up" label="{{ __('admin/auicrm.follow_up') }}"
                                            value="{{ old('follow_up') }}" required />

                                        <x-aui::forms.switch name="is_admin" value="{{ old('is_admin') }}"
                                            label="{{ __('admin/auicrm.is_admin') }}" />
                                    </v-card-text>

                                    <div class="v-card__actions">
                                        <button type="submit"
                                            class="v-btn v-btn--block v-btn--is-elevated v-btn--has-bg theme--light v-size--default success"><span
                                                class="v-btn__content">Create</span></button>
                                    </div>
                                </x-aui::forms.form>
                            </v-card>
                        </template>
                    </v-dialog>
                @endif
            </v-col>

        </v-row>

        <v-row>
            <v-col cols="12">
                @if (empty($data[0]))
                    <v-card class="mx-auto">
                        <v-card-text>
                            <p class="display-1 text--primary">
                                {{ __('admin/auicrm.no_notification_message') }}
                            </p>
                        </v-card-text>
                    </v-card>
                @else
                    <v-timeline>
                        @forelse ($data as $item)
                            <v-timeline-item large>
                                <template v-slot:icon>
                                    <v-avatar>
                                        <img src="{{ gravatar::gravatar($item->userModel->email) }}">
                                    </v-avatar>
                                </template>
                                <template v-slot:opposite>
                                    <span>{{ $item->userModel->full_name }}</span>
                                </template>
                                <v-card class="elevation-2" color="{{ $item->is_admin_only == 1 ? 'cyan' : '' }}">
                                    <v-card-title class="headline">
                                        {!! $item->body ?? 'No Title' !!}
                                    </v-card-title>
                                    <v-card-text>
                                        {{ $item->created_at->diffForHumans() }}
                                        {{ $item->is_admin_only == 1 ? 'Admin Only' : '' }}
                                        <v-tooltip top>
                                            <template #activator="{ on }">
                                                <v-btn small icon>
                                                    <a
                                                        href="{{ route('admin.crm.messages.delete', short_encrypt($item->id)) }}">
                                                        <v-icon color="error" small>mdi-trash-can-outline
                                                        </v-icon>
                                                    </a>
                                                </v-btn>
                                            </template>
                                            <small>
                                                Delete this notification
                                            </small>
                                        </v-tooltip>
                                    </v-card-text>

                                </v-card>
                            </v-timeline-item>
                        @endforeach
                    </v-timeline>
                @endif

            </v-col>
        </v-row>

    </v-container>
@endsection
