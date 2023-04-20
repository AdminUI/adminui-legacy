<v-row class="mt-4">
    <v-col cols="12" class="py-1">
        <v-simple-table>
            <template v-slot:default>
                <thead>
                    <tr>
                        <th class="text-left">
                            {{ __('Supplier') }}
                        </th>
                        <th class="text-left">
                            {{ __('Action') }}
                        </th>
                        <th class="text-left">
                            {{ __('Quantity') }}
                        </th>
                        <th class="text-left">
                            {{ __('Notes') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ __('Supplier Name') }}</td>
                        <td>
                            <v-chip class="ma-2" small color="error">
                                {{ __('Removed') }}
                            </v-chip>
                        </td>
                        <td>{{ __('10') }}</td>
                        <td>
                            <v-alert dense type="info" outlined color="cyan">
                                {{ __('This Record info') }}
                            </v-alert>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('Supplier Name') }}</td>
                        <td>
                            <v-chip class="ma-2" small color="success">
                                {{ __('Added') }}
                            </v-chip>
                        </td>
                        <td>{{ __('10') }}</td>
                        <td>
                            <v-alert dense type="info" outlined color="cyan">
                                {{ __('This Record info') }}
                            </v-alert>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('Supplier Name') }}</td>
                        <td>
                            <v-chip class="ma-2" small color="info">
                                {{ __('updated') }}
                            </v-chip>
                        </td>
                        <td>{{ __('10') }}</td>
                        <td>
                            <v-alert dense type="info" outlined color="cyan">
                                {{ __('This Record info') }}
                            </v-alert>
                        </td>
                    </tr>
                </tbody>
            </template>
        </v-simple-table>
    </v-col>
</v-row>
