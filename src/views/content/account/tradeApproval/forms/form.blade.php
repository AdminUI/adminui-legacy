<v-card class="mx-auto" max-width="400" tile>

    {{-- Block --}}
    @php
    $dataTable = json_decode($data->content);
    @endphp
    @foreach ($dataTable as $key => $item)
    <v-list-item>
        <v-list-item-content>
            <v-list-item-title>{{ $key }}</v-list-item-title>
            <v-list-item-subtitle>
                {{ $item }}
            </v-list-item-subtitle>
        </v-list-item-content>
    </v-list-item>
    @endforeach
    {{-- block end --}}
</v-card>

<v-row align="center" justify="space-around">

    {{-- Aprove Modal --}}
    <x-aui::layout.simpleModal action="{{ route('admin.tradeApproval.approve', $data->id) }}"
        color="success"
        name="Approve"
        title="Approve Trade Account"
        id="modal_approve"
    >

        <x-aui::forms.number
            name="credit_limit"
            label="Credit Limit"
            value="{{ old('credit_limit') }}"
            step="0.01"
            required
            />

            @php
                $tradeType = [
                    'trade'  => 'Trade',
                    'retail' => 'Retail',
                ];
            @endphp
        <x-aui::forms.select :options='$tradeType' name="trade_type" :label="__('Trade Type')" />
    </x-aui::layout.simpleModal>

    {{-- Decline Modal --}}
    <x-aui::layout.simpleModal action="{{ route('admin.tradeApproval.decline', $data->id) }}"
        color="error"
        name="Decline"
        title="Decline Trade Account"
        id="modal_decline"
    >

    @php
        $info = json_decode($data->content);
    @endphp

    <strong>A Email will be send to {{ $info->director_email }} with the reason you can also call the customer <a href="tel:{{ $info->business_number }}"> {{ $info->business_number }} </a></strong>
        <x-aui::forms.text
            name="reason"
            label="{{ 'Reason' }}"
            value="{{ old('reason') }}"
            required />
        {{-- <x-aui::forms.select :options='$bikeBrand' name="bike_brand_id" :label="__('Bike Brands')" /> --}}
    </x-aui::layout.simpleModal>
</v-row>
