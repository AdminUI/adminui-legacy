@extends('auilayout::admin')

@section('content')

    {{ $slot }}

@endsection

@push('vue_stack')
    <script src="{{ asset('vendor/adminui/js/adminui-crm.js') }}" defer></script>
@endpush