<v-alert type="info" class="mt-4" elevation="2"  border="left" transition="scale-transition">
    Product Stock is fully controllable within the <strong>Stock Control</strong> modules which is installed with <strong>AdminUI Ecommerce</strong> package.<br/>
    If you do not want this product 'stock controlled' please uncheck 'Stockable Item' option.
</v-alert>

{{-- Block --}}
<v-row class="mt-4">
    @if (!class_exists("AdminUI\AdminUI\AdminUIStockControlServiceProvider"))
        <v-col cols="12" class="py-1">
            Qty in Stock : {{ $data->quantity }}
        </v-col>

        <v-col cols="12" class="py-0">
            <x-aui::forms.switch name="is_stockable" value="{{ $data->is_stockable ?? '' }}"
                        label="Is this a Stockable Item ? Fully managed by stock control." />
        </v-col>

        <v-col cols="6" class="py-1">
            <x-aui::forms.number
                        name="min_level"
                        label="{{ __('Min Level') }}"
                        value="{{ old('min_level', $data->min_level) }}"
                        placeholder="If this is a regular stock item"
                        />
        </v-col>
    @else
        <v-col cols="6" class="py-1">
            <x-aui::forms.number
                name="quantity"
                label="{{ __('Quantity') }}"
                value="{{ old('quantity', $data->quantity) }}"
                />
        </v-col>
    @endif
    <v-col cols="6" class="py-1">
        <x-aui::forms.number
            name="restock_days"
            label="{{ __('Restock Days') }}"
            value="{{ old('restock_days', $data->restock_days) }}"
            placeholder="How many days for a usual reorder"
            />
    </v-col>
</v-row>
{{-- Block end --}}

{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="6" class="py-1">
        <x-aui::forms.number
            name="allocated_stock"
            label="{{ __('Allocated Stock') }}"
            value="{{ old('allocated_stock', $data->allocated_stock) }}"
            placeholder="If you have allocated stock to ebay/amazon/window display etc"
            />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
            name="pack_quantity"
            label="{{ __('Pack Quantity') }}"
            value="{{ old('pack_quantity', $data->pack_quantity) }}"
            placeholder="How many items are in this pack."
            />
    </v-col>
</v-row>
{{-- Block end --}}
