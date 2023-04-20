@extends('auilayout::admin')

@section('content')
    <v-container fluid>
        <v-row>
            <v-col cols="12">
                <h1>Edit - {{ $title }}</h1>
            </v-col>
        </v-row>

        <v-row>
            <v-col cols="6">
                <v-card>
                    <div class="d-flex flex-no-wrap justify-space-between">
                        <div>
                            <v-card-actions>
                                <v-row dense>
                                    <v-col cols="12">
                                        <strong>Order Number:</strong> {{ $data->id }}
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>Order Status:</strong> {{ $data->status()->name }}
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>Payment Type:</strong> {{ $data->payment_type }}
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>Transaction ID:</strong>
                                        {{ $data->payments->first()->transaction_id ?? '' }}
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>Order Created:</strong> {{ $data->created_at->format('d-m-Y') }}
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>Order Updated:</strong> {{ $data->updated_at->format('d-m-Y') }}
                                    </v-col>
                                    <v-col cols="12">
                                        @if (!empty($item->paid_at))
                                            <strong>Order paid:</strong>
                                            {{ $data->paid_at->format('d-m-Y') }}
                                        @else
                                            <strong>Not Paid</strong>
                                        @endif
                                    </v-col>
                                </v-row>
                            </v-card-actions>
                        </div>
                    </div>
                </v-card>
            </v-col>
            <v-col cols="6">
                <v-card>
                    <div class="d-flex flex-no-wrap justify-space-between">
                        <div>
                            <v-card-actions>
                                <v-row dense>
                                    <v-col cols="12">
                                        <strong>Customer Id:</strong> {{ $data->user->id }}
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>Customer Name:</strong> {{ $data->user->full_name }}
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>
                                            Customer Email :</strong> {{ $data->user->email }}
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>Phone:</strong> {{ $data->billing->phone }}
                                    </v-col>
                                </v-row>

                            </v-card-actions>
                        </div>
                    </div>
                </v-card>
            </v-col>

            {{-- Adresses --}}
            <v-col cols="6">
                <v-card>
                    <div class="d-flex flex-no-wrap justify-space-between">
                        <div>
                            <v-card-title class="text-h5">
                                Address delivery
                            </v-card-title>
                            <v-card-actions>
                                <v-row dense>
                                    <v-col cols="12">
                                        <strong>Address:</strong> {{ $data->delivery->address }}
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>Address 2:</strong> {{ $data->delivery->address_2 }}
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>
                                            Town :</strong> {{ $data->delivery->town }}
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>County:</strong> {{ $data->delivery->county }}
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>Postcode:</strong> {{ $data->delivery->postcode }}
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>Country:</strong> {{ $data->delivery->country->name }}
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>phone:</strong> {{ $data->delivery->phone }}
                                    </v-col>
                                </v-row>
                            </v-card-actions>
                        </div>
                    </div>
                </v-card>
            </v-col>
            <v-col cols="6">
                <v-card>
                    <div class="d-flex flex-no-wrap justify-space-between">
                        <div>
                            <v-card-title class="text-h5">
                                Address billing
                            </v-card-title>
                            <v-card-actions>
                                <v-row dense>
                                    <v-col cols="12">
                                        <strong>Address:</strong> {{ $data->billing->address }}
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>Address 2:</strong> {{ $data->billing->address_2 }}
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>
                                            Town :</strong> {{ $data->billing->town }}
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>County:</strong> {{ $data->billing->county }}
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>Postcode:</strong> {{ $data->billing->postcode }}
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>Country:</strong> {{ $data->billing->country->name }}
                                    </v-col>
                                    <v-col cols="12">
                                        <strong>phone:</strong> {{ $data->billing->phone }}
                                    </v-col>
                                </v-row>
                            </v-card-actions>
                        </div>
                    </div>
                </v-card>
            </v-col>

            <v-col cols="12">
                <v-card>
                    <v-card-title class="text-h5">
                        Products
                    </v-card-title>
                    <v-card-actions>
                        <v-row>
                            <v-col cols="12">
                                <v-simple-table>
                                    <template v-slot:default>
                                        <thead>
                                            <tr>
                                                <th class="text-left">
                                                    Product Image
                                                </th>
                                                <th class="text-left">
                                                    Product Id
                                                </th>
                                                <th class="text-left">
                                                    SKU Code
                                                </th>
                                                <th class="text-left">
                                                    Product Name
                                                </th>
                                                <th class="text-left">
                                                    Weight
                                                </th>
                                                <th class="text-left">
                                                    Cost
                                                </th>
                                                <th class="text-left">
                                                    Price
                                                </th>
                                                <th class="text-left">
                                                    Quantity
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $totalCost = 0;
                                                $totalProfit = 0;
                                            @endphp
                                            @foreach ($data->lines as $item)
                                                <tr>
                                                    <td>

                                                        @php

                                                            $tempProduct = $item->modelItem;
                                                            switch (class_basename($item->modelItem)) {
                                                                case 'Product':
                                                                    $parentName = null;
                                                                    if (!empty($tempProduct->parent())) {
                                                                        $parentName = $tempProduct->parent()->name;
                                                                    }

                                                                    // Get the item name
                                                                    $name = $parentName . ' ' . $tempProduct->name;
                                                                    // Get the product image
                                                                    if (empty($tempProduct->image_url)) {
                                                                        $image = $tempProduct->mediaLink();
                                                                    } else {
                                                                        $image = $tempProduct->image_url;
                                                                    }
                                                                    break;
                                                                default:
                                                                    $image = $tempProduct->media->mediaLink()['medium'];
                                                                    break;
                                                            }
                                                        @endphp

                                                        <v-img max-height="100" max-width="150" src="{{ $image }}">
                                                        </v-img>
                                                    </td>
                                                    <td><strong>{{ $item->product_id }}</strong></td>
                                                    <td><strong>{{ $item->sku_code }}</strong></td>
                                                    <td><strong>{{ $item->product_name }}</strong></td>
                                                    <td>{{ $item->line_weight / 1000 . ' ' . config('settings')['weight_uom'] }}
                                                    </td>
                                                    <td>£{{ Money::makePounds($item->line_cost) }}</td>
                                                    <td>£{{ Money::makePounds($item->item_inc_vat) }}</td>
                                                    <td>{{ $item->qty }}</td>
                                                </tr>
                                                @php
                                                    $totalCost = $totalCost + $item->line_cost * $item->qty;
                                                    $totalProfit = $totalProfit + $item->item_inc_vat * $item->qty;
                                                @endphp
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><strong>Sub Total</strong></td>
                                                <td>£{{ Money::makePounds($data->subtotal_inc_vat) }}</td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><strong>Postage</strong></td>
                                                <td>£{{ Money::makePounds($data->postage_inc_vat) }}</td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><strong>Weight</strong></td>
                                                <td>{{ $data->subtotal_weight / 1000 }}
                                                    {{ config('settings')['weight_uom'] }}</td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><strong>PROMO () Discount</strong></td>
                                                <td>£{{ Money::makePounds($data->discount_inc_vat) }}</td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><strong>VAT (if applicable)</strong></td>
                                                <td>£{{ Money::makePounds($data->subtotal_vat) }}</td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><strong>Total</strong></td>
                                                <td>£{{ Money::makePounds($data->cart_inc_vat) }}</td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><strong>Fees</strong></td>
                                                <td>£{{ Money::makePounds($data->cart_fees) }}</td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><strong>Cost</strong></td>
                                                <td>£{{ Money::makePounds($totalCost) }}</td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><strong>Profit</strong></td>
                                                <td>£{{ Money::makePounds($totalProfit - $totalCost) }}</td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    @if ($data->is_printed)
                                                        <a href="{{ route('order.invoice.pdf', $data->uuid) }}"
                                                            target="_blank">
                                                            <v-tooltip bottom>
                                                                <template v-slot:activator="{ on, attrs }">
                                                                    <v-icon color="green" v-bind="attrs" v-on="on"
                                                                        large>
                                                                        mdi-printer</v-icon>
                                                                </template>
                                                                <span>Already Printed</span>
                                                            </v-tooltip>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('order.invoice.pdf', $data->uuid) }}"
                                                            target="_blank">

                                                            <v-tooltip bottom>
                                                                <template v-slot:activator="{ on, attrs }">
                                                                    <v-icon color="red" v-bind="attrs" v-on="on"
                                                                        large>
                                                                        mdi-printer</v-icon>
                                                                </template>
                                                                <span>Not Printed</span>
                                                            </v-tooltip>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>

                                        </tbody>
                                    </template>
                                </v-simple-table>

                            </v-col>
                        </v-row>
                    </v-card-actions>
                </v-card>
            </v-col>
        </v-row>

        {{-- The override section --}}
        {{ Hooks::action('orderSaleEdit', compact('data')) }}

        {{-- <x-aui::layout.status :data="$data" /> --}}
        {{-- Cote that $route, $tile comes from the controller contruct --}}
        <v-row>
            <v-col cols="12">
                <v-card>
                    <v-card-title class="text-h5">
                        Notes and Tracking
                    </v-card-title>
                    <v-card-text>
                        @include('aui::content.ecommerce.' . $route . '.forms.order-history', $data)
                    </v-card-text>
                </v-card>
            </v-col>
            {{-- <v-col cols="3">
                <x-aui::layout.publish :data="$data" />
                <x-aui::layout.dangerZone method="delete"
                    action="{{ route('admin.'. $route .'.destroy', short_encrypt($data->id)) }}" />
            </v-col> --}}
        </v-row>
    </v-container>
@endsection
