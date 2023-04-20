@php
use carbon\Carbon;

    // Get Product analitcys
    $analitcys = $data->allAnalytics()->whereBetween('date', [
        Carbon::now()->subdays(30)->format('Y-m-d'),
        Carbon::now()->format('Y-m-d')
    ])->orderBy('date', 'ASC')->get();
        // Create the labels
        $hits       = null;
        $views      = null;
        $added_cart = null;

    // Build the array data
    foreach ($analitcys as $key => $analitcy) {
        $label = Carbon::parse($analitcy['date'])->format('d/m');
        // Product Hits
        $hits['label'][] = $label;
        $hits['value'][] = $analitcy['hit'];
        // Product View
        $views['label'][] = $label;
        $views['value'][] = $analitcy['views'];
        // Product Added To Cart
        $added_cart['label'][] = $label;
        $added_cart['value'][] = $analitcy['added_cart'];
    }

@endphp

<v-row class="mt-4">
    <v-col cols="12" class="py-1">
        <v-expansion-panels>

            @if (!empty($hits))
                {{-- Product Hits Panel--}}
                <v-expansion-panel>
                    <v-expansion-panel-header>
                        Product hits
                    </v-expansion-panel-header>
                    <v-expansion-panel-content>
                        <v-card class="mt-4 mx-auto">
                            @if (count($hits['label']))
                                <v-sheet class="v-sheet--offset mx-auto" color="cyan" elevation="12"
                                    max-width="calc(100% - 32px)">
                                    <v-sparkline :labels="{{ json_encode($hits['label']) }}"
                                                :value="{{ json_encode($hits['value']) }}"
                                                color="white"
                                                line-width="2"
                                        padding="16">
                                    </v-sparkline>
                                </v-sheet>
                            @endif

                            <v-card-text class="pt-10">
                                <div class="text-h6 font-weight-light mb-2">
                                    Product Hits
                                </div>
                                <div class="subheading font-weight-light grey--text">
                                    How Many times this product has been displayed around the site.
                                </div>
                                <v-divider class="my-2"></v-divider>
                                {{-- Detatils Exapansion Panel Begin --}}
                                <v-expansion-panels>
                                    <v-expansion-panel>
                                        <v-expansion-panel-header>
                                            Details
                                        </v-expansion-panel-header>
                                        <v-expansion-panel-content>
                                            <v-simple-table dark >
                                                <template v-slot:default>
                                                    <thead>
                                                        <tr>
                                                            <th class="text-left">
                                                                Date
                                                            </th>
                                                            <th class="text-left">
                                                                Hits
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($hits['label'] as $key => $value)
                                                            <tr>
                                                                <td>{{ $value }}</td>
                                                                <td>{{ $hits['value'][$key] }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </template>
                                            </v-simple-table>
                                        </v-expansion-panel-content>
                                    </v-expansion-panel>
                                </v-expansion-panels>
                                {{-- Details Exapansion Panel End --}}
                            </v-card-text>
                        </v-card>
                    </v-expansion-panel-content>
                </v-expansion-panel>
                {{-- Product Hits Panel End--}}
            @endif

            @if (!empty($views))
                {{-- Product Views Panel--}}
                <v-expansion-panel>
                    <v-expansion-panel-header>
                        Product Views
                    </v-expansion-panel-header>
                    <v-expansion-panel-content>
                        <v-card class="mt-4 mx-auto">
                            <v-sheet class="v-sheet--offset mx-auto" color="blue" elevation="12"
                                max-width="calc(100% - 32px)">
                                @if (count($views['label']) > 1)
                                    <v-sparkline :labels="{{ json_encode($views['label']) }}"
                                                :value="{{ json_encode($views['value']) }}"
                                                color="white"
                                                line-width="2"
                                        padding="16">
                                    </v-sparkline>
                                @endif
                            </v-sheet>

                            <v-card-text class="pt-10">
                                <div class="text-h6 font-weight-light mb-2">
                                    Product Views
                                </div>
                                <div class="subheading font-weight-light grey--text">
                                    How Many times this product has been clicked.
                                </div>
                                <v-divider class="my-2"></v-divider>
                                {{-- Detatils Exapansion Panel Begin --}}
                                <v-expansion-panels>
                                    <v-expansion-panel>
                                        <v-expansion-panel-header>
                                            Details
                                        </v-expansion-panel-header>
                                        <v-expansion-panel-content>
                                            <v-simple-table dark >
                                                <template v-slot:default>
                                                    <thead>
                                                        <tr>
                                                            <th class="text-left">
                                                                Date
                                                            </th>
                                                            <th class="text-left">
                                                                Views
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($views['label'] as $key => $value)
                                                            <tr>
                                                                <td>{{ $value }}</td>
                                                                <td>{{ $views['value'][$key] }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </template>
                                            </v-simple-table>
                                        </v-expansion-panel-content>
                                    </v-expansion-panel>
                                </v-expansion-panels>
                                {{-- Details Exapansion Panel End --}}
                            </v-card-text>
                        </v-card>
                    </v-expansion-panel-content>
                </v-expansion-panel>
                {{-- Product Views Panel--}}
            @endif

            @if (!empty($views))
                {{-- Product Added To Cart--}}
                <v-expansion-panel>
                    <v-expansion-panel-header>
                        Product Added To Cart
                    </v-expansion-panel-header>
                    <v-expansion-panel-content>
                        <v-card class="mt-4 mx-auto">
                            @if (count($added_cart['label']) > 1)
                                <v-sheet class="v-sheet--offset mx-auto" color="red" elevation="12"
                                    max-width="calc(100% - 32px)">
                                    <v-sparkline :labels="{{ json_encode($added_cart['label']) }}"
                                                :value="{{ json_encode($added_cart['value']) }}"
                                                color="white"
                                                line-width="2"
                                        padding="16">
                                    </v-sparkline>
                                </v-sheet>
                            @endif
                            <v-card-text class="pt-10">
                                <div class="text-h6 font-weight-light mb-2">
                                    Product Added To Cart
                                </div>
                                <div class="subheading font-weight-light grey--text">
                                    How Many times this product has been added To Cart.
                                </div>
                                <v-divider class="my-2"></v-divider>
                                {{-- Detatils Exapansion Panel Begin --}}
                                <v-expansion-panels>
                                    <v-expansion-panel>
                                        <v-expansion-panel-header>
                                            Details
                                        </v-expansion-panel-header>
                                        <v-expansion-panel-content>
                                            <v-simple-table dark >
                                                <template v-slot:default>
                                                    <thead>
                                                        <tr>
                                                            <th class="text-left">
                                                                Date
                                                            </th>
                                                            <th class="text-left">
                                                                Added
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($added_cart['label'] as $key => $value)
                                                            <tr>
                                                                <td>{{ $value }}</td>
                                                                <td>{{ $added_cart['value'][$key] }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </template>
                                            </v-simple-table>
                                        </v-expansion-panel-content>
                                    </v-expansion-panel>
                                </v-expansion-panels>
                                {{-- Details Exapansion Panel End --}}
                            </v-card-text>
                        </v-card>
                    </v-expansion-panel-content>
                </v-expansion-panel>
                {{-- Product Added To Cart End--}}
            @endif

        </v-expansion-panels>
    </v-col>
</v-row>
