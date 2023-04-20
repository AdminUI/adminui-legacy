@extends('auilayout::admin')

@section('content')
    <page-ecommerce-postage-zone title="{{ $title }}">
        @if (isset($submenu))
            <template #submenu>
                <v-col cols="auto" class="pr-0 pt-0">
                    <aui-page-submenu></aui-page-submenu>
                </v-col>
            </template>
        @endif
    </page-ecommerce-postage-zone>
@endsection
