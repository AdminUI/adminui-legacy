
@extends('auilayout::admin')

@section('content')
<v-container fluid>
    <v-row>
        <v-col cols="12" sm="9">
            <h1>{{ __('Packages') }}</h1>
        </v-col>
    </v-row>

    <v-row>
        <v-col cols="12">
            <v-simple-table
                fixed-header
                height="300px"
            >
                <template v-slot:default>
                    <thead>
                        <tr>
                            <th class="text-left">
                                {{ __('Name') }}
                            </th>
                            <th class="text-left">
                                {{ __('Description') }}
                            </th>
                            <th>{{ __('Version') }}</th>
                            <th>{{ __('Licence') }}</th>
                            <th>{{ __('Expiry') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($auipackages as $package)
                            <tr>
                                <td>{{ $package['name'] }}</td>
                                <td>{{ $package['description'] }}</td>
                                <td>{{ $package['version'] }}</td>
                                <td>{{ $package['licenced'] }}</td>
                                <td>{{ $package['expiry']->format('d/m/Y') }}</td>
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                </template>
            </v-simple-table>
        </v-col>
</v-container>
@endsection
