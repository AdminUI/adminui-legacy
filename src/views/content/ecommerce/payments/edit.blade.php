@extends('auilayout::admin')

@section('content')

    <v-container fluid>
        <v-row>
            <v-col cols="12">
                <h1>Edit - {{ $title }}</h1>
            </v-col>
        </v-row>

        <x-aui::layout.status :data="$data" />

        <v-row>
            <v-col cols="12">
                <v-banner single-line elevation="3">
                    <v-icon slot="icon" color="warning" size="36">
                        mdi-card-bulleted
                    </v-icon>
                    Payment Info
                </v-banner>

                <v-simple-table>
                    <template v-slot:default>
                        <thead>
                            <tr>
                                <th class="text-left">
                                    Item
                                </th>
                                <th class="text-left">
                                    Info
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Transaction Id</td>
                                <td>{{ $data->transaction_id }}</td>
                            </tr>
                            <tr>
                                <td>Amount</td>
                                <td>{{ $data->amount }}</td>
                            </tr>
                            <tr>
                                <td>Currency</td>
                                <td>{{ $data->currency }}</td>
                            </tr>
                            <tr>
                                <td>Payment Type</td>
                                <td>{{ $data->payment_type }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{ $data->status }}</td>
                            </tr>
                        </tbody>
                    </template>
                </v-simple-table>

            </v-col>


        </v-row>
    </v-container>
@endsection
