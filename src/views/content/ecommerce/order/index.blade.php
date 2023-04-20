@extends('auilayout::admin')

@section('content')

    <v-container fluid>
        {{-- Title nad per page start --}}
        <x-aui::forms.form>
            <v-row>
                <v-col cols="12" sm="9">
                    <h1>{{ $title }}</h1>
                </v-col>
                <v-col cols="12" sm="3" class="text-right">
                    <a href="/cart/checkout" target="_blank"
                        class="v-btn v-btn--outlined v-btn--rounded theme--light v-size--default secondary--text"><span
                            class="v-btn__content">
                            Create
                        </span></a>
                </v-col>

                <v-col cols="12" sm="4" class="text-right">
                    <v-row>
                        <v-col>
                            <x-aui::forms.text name="search" label="{{ __('adminui.search') }}"
                                value="{{ old('search') }}" />
                        </v-col>
                        <v-col>
                            @php
                                $searchBy = collect([
                                    'id' => 'id',
                                    'customer' => 'customer',
                                    'tracking_code' => 'Tracking Code',
                                ]);
                            @endphp
                            <x-aui::forms.select :options='$searchBy' name="search_by"
                                :label="__('auiecom.searchBy')" value="{{ old('search_by') ?? 'id' }}" />
                        </v-col>
                    </v-row>
                </v-col>

                <v-col cols="12" sm="4" class="text-right">
                    <v-row>
                        <v-col>
                            @php

                                $orderBy = collect([
                                    'id_lowest' => 'ID (Lowest first)',
                                    'id_highest' => 'ID (Highest first)',
                                    'created_highest' => 'Created (Highest first)',
                                    'created_lowest' => 'Created (Lowest first)',
                                    'updated_highest' => 'Updated (Highest first)',
                                    'updated_lowest' => 'Updated (Lowest first)',
                                ]);
                            @endphp
                            <x-aui::forms.select :options='$orderBy' name="order_by"
                                :label="__('auiecom.orderBy')" value="{{ old('order_by') ?? 'id' }}" />
                        </v-col>
                        <v-col>
                            @php
                                $filter = collect($orderStatus->toArray() + ['all' => 'all']);
                            @endphp
                            <x-aui::forms.select :options='$filter' name="filter" :label="__('auiecom.filter')"
                                value="{{ old('filter') ?? 'all' }}" />
                        </v-col>
                    </v-row>
                </v-col>

                {{-- search buton and page range --}}
                <v-col cols="12" sm="4" class="text-right">
                    <v-row>
                        <v-col>
                            <aui-date-picker name="start_date" initial="{{ $dataFrom }}" v-model="inputs.startDate"
                                :max="inputs.finishDate" label="{{ __('adminui.start_date') }}">
                            </aui-date-picker>

                        </v-col>
                        <v-col>
                            <aui-date-picker name="finish_date" initial="{{ $dataTo }}"
                                v-model="inputs.finishDate" :min="inputs.startDate"
                                label="{{ __('adminui.finish_date') }}">
                            </aui-date-picker>
                        </v-col>
                        <v-col>
                            <v-btn block type="submit" color="success">Search</v-btn>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
        </x-aui::forms.form>
        {{-- Title nad per page end --}}


        {{-- Form Start --}}
        <x-aui::forms.form action="{{ route('admin.update.order.status') }}">
            <v-row>
                {{-- table loop start --}}
                <v-col cols="12">
                    <v-simple-table dense fixed-header>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th class="text-left">
                                        <input type="checkbox" id="master_checkbox"
                                            onclick="toogleSelectAll('master_checkbox')">
                                    </th>
                                    <th class="text-left">
                                        Id
                                    </th>
                                    <th class="text-left">
                                        Dates
                                    </th>
                                    <th class="text-left">
                                        Customer
                                    </th>
                                    <th class="text-left">
                                        Order Details
                                    </th>
                                    <th class="text-left">
                                        Postage
                                    </th>
                                    <th class="text-left">
                                        Total
                                    </th>
                                    <th class="text-left">
                                        Status
                                    </th>
                                    <th class="text-left">
                                        Printed
                                    </th>
                                    <th class="text-left">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="checkbox_target" name="order[]"
                                                value="{{ $item->id }}">
                                        </td>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            Placed: <small> {{ $item->created_at->format('d/m/Y') }} </small>
                                            <br>
                                            Update: <small> {{ $item->updated_at->format('d/m/Y') }} </small>
                                            <br>
                                            @if (!empty($item->paid_at))
                                            Paid: <small> {{ $item->paid_at->format('d/m/Y') }} </small>
                                            @else
                                            Not Paid
                                            @endif
                                        </td>
                                        <td>
                                            {{-- User Name --}}
                                            <template>
                                                <v-icon color="info" small>mdi-account</v-icon>
                                            </template>
                                            <strong>
                                                {{ $item->user->first_name . ' ' . $item->user->last_name }}
                                            </strong>
                                            <br>
                                            {{-- User Email --}}
                                            <template>
                                                <v-icon color="info" small>mdi-email</v-icon>
                                            </template>
                                            <strong>
                                                {{ $item->user->email }}
                                            </strong>
                                            <br>
                                            {{-- Phone --}}
                                            <template>
                                                <v-icon color="info" small>mdi-phone-in-talk-outline</v-icon>
                                            </template>
                                            <strong>
                                                {{ $item->billing->phone }}
                                            </strong>
                                            <br>
                                        </td>
                                        <td>
                                            @php
                                                $productsCount = 0;
                                                $productWeightCount = 0;
                                            @endphp
                                            @foreach ($item->lines as $orderLines)
                                                @php
                                                    // Count the products
                                                    $productsCount += $orderLines->qty;
                                                    //Count the product weight
                                                    $productWeightCount += $orderLines->product->weight ?? 1 * $productsCount;
                                                @endphp
                                            @endforeach

                                            <span class="
                                                ma-2
                                                v-chip v-chip--outlined v-chip--removable
                                                theme--light
                                                v-size--default
                                                indigo
                                                darken-3
                                                indigo--text
                                                text--darken-3
                                            ">
                                                <span class="v-chip__content">
                                                    {{ $item->lines->count() }} Products - {{ $productsCount }}
                                                    Items -
                                                    {{ $productWeightCount / 1000 }}
                                                    {{ config('settings')['weight_uom'] }}
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            Delivery Company: <small> {{ $item->delivery_company }} </small>
                                            <br>
                                            Delivery Method: <small> {{ $item->delivery_method }} </small>
                                            <br>
                                            Tracking: <small> {{ $item->tracking_code }} </small>
                                            <br>
                                        </td>
                                        <td>
                                            £ {{ Money::makePounds($item->cart_inc_vat) }}
                                        </td>
                                        <td>
                                            {{ $item->orderStatus->name ?? 'undefine' }}
                                        </td>
                                        <td>

                                            <v-row>
                                                {{-- table loop start --}}
                                                <v-col>
                                                    @if ($item->is_printed)
                                                        <a href="{{ route('order.invoice.pdf', $item->uuid) }}"
                                                            target="_blank">
                                                            <v-tooltip bottom>
                                                                <template v-slot:activator="{ on, attrs }">
                                                                    <v-icon color="green" v-bind="attrs" v-on="on"
                                                                        medium>mdi-printer</v-icon>
                                                                </template>
                                                                <span>Already Printed</span>
                                                            </v-tooltip>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('order.invoice.pdf', $item->uuid) }}"
                                                            target="_blank">

                                                            <v-tooltip bottom>
                                                                <template v-slot:activator="{ on, attrs }">
                                                                    <v-icon color="red" v-bind="attrs" v-on="on" medium>
                                                                        mdi-printer</v-icon>
                                                                </template>
                                                                <span>Not Printed</span>
                                                            </v-tooltip>
                                                        </a>
                                                    @endif
                                                </v-col>
                                                <v-col>
                                                    <a href="{{ route('order.invoice', $item->uuid) }}"
                                                        target="_blank">
                                                        <v-tooltip bottom>
                                                            <template v-slot:activator="{ on, attrs }">
                                                                <v-icon color="deep-purple" v-bind="attrs" v-on="on"
                                                                    medium>mdi-information-outline</v-icon>
                                                            </template>
                                                            <span>Order History</span>
                                                        </v-tooltip>
                                                    </a>
                                                </v-col>

                                                <v-col>

                                                    {{-- Order Message --}}
                                                    @if (!empty($item->message))
                                                        <v-menu open-on-hover top offset-y>
                                                            <template v-slot:activator="{ on, attrs }">
                                                                <v-icon color="deep-purple" v-bind="attrs" v-on="on"
                                                                    medium>mdi-message-processing</v-icon>
                                                            </template>

                                                            <v-card>
                                                                <v-card-title class="text-h5">
                                                                    Message
                                                                </v-card-title>

                                                                <v-card-actions>
                                                                    {{ $item->message }}
                                                                </v-card-actions>
                                                            </v-card>
                                                        </v-menu>
                                                    @else
                                                        <v-icon color="black">mdi-message-processing</v-icon>
                                                    @endif
                                                </v-col>
                                                <v-col>
                                                    {{-- Customer Instructions --}}
                                                    @if (!empty($item->instruction))
                                                        <v-menu open-on-hover top offset-y>
                                                            <template v-slot:activator="{ on, attrs }">
                                                                <v-icon color="orange" v-bind="attrs" v-on="on" medium>
                                                                    mdi-message-settings</v-icon>
                                                            </template>

                                                            <v-card>
                                                                <v-card-title class="text-h5">
                                                                    Instruction
                                                                </v-card-title>

                                                                <v-card-actions>
                                                                    {{ $item->instruction }}
                                                                </v-card-actions>
                                                            </v-card>
                                                        </v-menu>
                                                    @else
                                                        <v-icon color="black">mdi-message-settings</v-icon>
                                                    @endif
                                                </v-col>
                                            </v-row>

                                        </td>
                                        <td>
                                            <x-aui::buttons.tableEditBlade
                                                route="{{ route('admin.order.edit', [short_encrypt($item->id)]) }}" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-left">
                                        <input type="checkbox" id="master_checkbox_2"
                                            onclick="toogleSelectAll('master_checkbox_2')">
                                    </th>
                                    <th class="text-left">

                                    </th>
                                    <th class="text-left">

                                    </th>
                                    <th class="text-left">

                                    </th>
                                    <th class="text-left">

                                    </th>
                                    <th class="text-left">

                                    </th>
                                    <th class="text-left">

                                    </th>
                                    <th class="text-left">

                                    </th>
                                    <th class="text-left">

                                    </th>
                                </tr>
                            </tfoot>
                        </template>
                    </v-simple-table>
                </v-col>
                {{-- Table loop end --}}

                {{-- Card begin --}}
                <v-col cols="12">
                    <v-card>
                        <v-card-title class="text-h5">
                            Update Order Status Selected
                        </v-card-title>
                        <v-card-text>
                            <v-row>
                                <v-col cols="12" sm="12">
                                    <x-aui::forms.select :options='$orderStatus' name="order_status_id"
                                        :label="__('auiecom.order_status_id')"
                                        value="{{ old('order_status_id') }}" />
                                </v-col>
                                <v-col cols="12" sm="12">
                                    <x-aui::forms.textarea name="notes" label="{{ __('adminui.notes') }}"
                                        value="{{ old('notes') }}" />
                                </v-col>
                                <v-col cols="12" sm="12">
                                    <x-aui::forms.switch name="notify_customer" value="0" label="Notify Customer" />
                                </v-col>
                                <v-col cols="12" sm="12">
                                    <v-btn block type="submit" color="success">{{ __('adminui.update') }}</v-btn>
                                </v-col>
                            </v-row>
                        </v-card-text>
                    </v-card>
                </v-col>
                {{-- cart end --}}

                {{-- pagination --}}
                <v-col cols="12" sm="12">
                    <x-aui::layout.pagination :paginator="$data" :page="$page" />
                </v-col>
            </v-row>
        </x-aui::forms.form>
        {{-- Form End --}}
    </v-container>

    @push('scripts')
        <script>
            function toogleSelectAll(id) {
                let masteCheckbox = document.querySelector('#' + id);
                let targetCheckbox = document.querySelectorAll('#checkbox_target');
                // Loop all the elements and check the boxes
                for (const [key, value] of Object.entries(targetCheckbox)) {
                    // If the check box i selected mark all the items as selected
                    if (masteCheckbox.checked) {
                        value.checked = true;
                    } else {
                        value.checked = false;
                    }
                }
            }

        </script>
    @endpush

@endsection
