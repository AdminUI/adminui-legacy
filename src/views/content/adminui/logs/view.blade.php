@extends('auilayout::admin')

@section('content')
    <v-container fluid>
        <v-row>
            <v-col cols="12" sm="9">
                <h1>Viewing Log #{{ $log->id }}</h1>
            </v-col>
        </v-row>
        <v-row>
            <v-col cols="4">
                <x-aui::layout.card title="Details">
                    <v-row>
                        <v-col>
                            <strong>Date</strong>
                        </v-col>
                        <v-col>
                            {{ $log->updated_at->format('d/m/Y H:i:s') }}
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col>
                            <strong>User</strong>
                        </v-col>
                        <v-col>
                            ({{ $log->user_id }}) {{ optional($log->admin)->full_name }}
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col>
                            <strong>IP Address</strong>
                        </v-col>
                        <v-col>
                            {{ $user_data->REMOTE_ADDR ?? '' }}
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col>
                            <strong>URI</strong>
                        </v-col>
                        <v-col>
                            {{ $user_data->REQUEST_URI ?? '' }}
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col>
                            <strong>Method</strong>
                        </v-col>
                        <v-col>
                            {{ $user_data->REQUEST_METHOD ?? 'GET' }}
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col>
                            <strong>Host</strong>
                        </v-col>
                        <v-col>
                            {{ $user_data->HTTP_HOST ?? '' }}
                        </v-col>
                    </v-row>
                </x-aui::layout.card>
            </v-col>

            <v-col cols="4">
                <x-aui::layout.card title="Model {{ ucwords($log->action) }}">
                    <v-row>
                        <v-col>
                            <strong>Model</strong>
                        </v-col>
                        <v-col>
                            {{ $log->model_name }}
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col>
                            <strong>Model ID</strong>
                        </v-col>
                        <v-col>
                            {{ $log->model_id }}
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col>
                            <strong>Item</strong>
                        </v-col>
                        <v-col>
                            {{ $model->name ?? ($model->title ?? 'n/a') }}
                        </v-col>
                    </v-row>
                </x-aui::layout.card>
            </v-col>

            <v-col cols="4">
                <x-aui::layout.card title="Fields Changed">
                    @foreach ($data as $label => $row)
                        <v-row>
                            <v-col>
                                <strong>{{ $label }}</strong>
                            </v-col>
                            <v-col>
                                {{ $row }}
                            </v-col>
                        </v-row>
                    @endforeach
                </x-aui::layout.card>
            </v-col>
        </v-row>
    </v-container>

    {{-- <x-aui-layout-maincontainer :title="__('adminui.logs')">
    <div class="row">
        <div class="col-lg-12">
            <x-aui-card :title="__('adminui.admins')">
                <x-slot name="card_header">
                    <nav>
                        <ul class="nav nav-tabs card-header-tabs" id="nav-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#nav-info" role="tab"
                                    aria-controls="nav-info" aria-selected="true"> {{ __('adminui.info') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#nav-details" role="tab"
                                    aria-controls="nav-details" aria-selected="true">{{ __('adminui.user_info') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#nav-contact" role="tab"
                                    aria-controls="nav-contact" aria-selected="false">{{ __('adminui.data_info') }}</a>
                            </li>
                        </ul>
                    </nav>
                </x-slot>
                <div class="col">
                    <div class="tab-content mt-2">
                        <div class="tab-pane fade show active" id="nav-info" role="tabpanel">

                            <!-- Description -->
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>{{ __('adminui.model') }}</th>
                                        <td>{{ $log->model_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('adminui.model_id') }}</th>
                                        <td>{{ $log->model_id }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('adminui.action') }}</th>
                                        <td>{{ $log->action }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('adminui.user') }}</th>
                                        <td>{{ $log->user->first_name ?? 'undefine' }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('adminui.date') }}</th>
                                        <td>{{ $log->created_at ?? '' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-details" role="tabpanel">
                            <div class="[ info-card-detail ]">
                                <h2>{{ __('adminui.user_info') }}</h2>
                                <table class="table">
                                    <tbody>
                                        @foreach (json_decode($log->user_data) as $key => $item)
                                            <tr>
                                                <th>{{ $key }}</th>
                                                <td>{{ $item }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel">
                            <div class="[ info-card-detail ]">
                                <h2>{{ __('adminui.added_or_changed_data_from') }} {{ $log->model_name }} :</h2>
                                <h3>Model {{ __('adminui.action') }}:
                                    {{ $log->action }}
                                </h3>
                                <!-- Description -->
                                <table class="table">
                                    <tbody>
                                        @foreach (json_decode($log->data) as $key => $item)
                                            <tr>
                                                <th>{{ $key }}</th>
                                                <td>{{ $item }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </x-aui-card>
        </div>
    </div>
</x-aui-layout.maincontainer> --}}
@endsection
