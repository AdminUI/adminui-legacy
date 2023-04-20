<v-simple-table dense fixed-header>
    <template v-slot:default>
        <thead>
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Reference</th>
                <th class="text-center">Qty</th>
                <th class="text-right">Price</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($history))

                @forelse ($history as $row)
                    @php
                        $table = explode("\\", (string)$row->model_type);
                        $table = end($table);
                    @endphp
                    <tr>
                        <td>{{ $row->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            @switch($table)
                                @case('PurchaseOrder')
                                    Purchase Order
                                    @break
                                @case('StockAdjustment')
                                    Stock Adjustment
                                    @break
                                @default
                                    Order
                            @endswitch
                        </td>
                        <td>{{ $row->model_id }}</td>
                        <td class="text-center">{{ $row->quantity }}</td>
                        <td class="text-right">{{ Money::makePounds($row->price == 0 ? $row->cost : $row->price) }}</td>
                        <td style="width:60px;">
                            @switch($table)
                                @case('StockAdjustment')
                                    <x-aui::buttons.tableEditBlade
                                        route="{{ route('admin.stock-adjustment.edit', short_encrypt($row->model_id)) }}" />
                                    @break
                                @case('PurchaseOrder')
                                <x-aui::buttons.tableEditBlade
                                        route="{{ route('admin.purchase-order.edit', short_encrypt($row->model_id)) }}" />
                                    @break
                                @default
                            @endswitch
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No Results found</td>
                    </tr>
                @endforelse
            @endif
        </tbody>
    </template>
</v-simple-table>
