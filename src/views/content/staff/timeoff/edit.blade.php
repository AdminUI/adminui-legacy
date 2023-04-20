@extends('auilayout::admin')

@php
$viewtype = 'Showing';
$extraAttr = false;
if (admin()->hasAnyPermission(['timeoff edit', 'timeoff manage']) || $timeoff->status == 1) {
    $viewtype = 'Edit';
    $extraAttr = ['readonly' => 'readonly'];
}
@endphp

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <h1>{{ $viewtype }} Time Off for {{ $timeoff->admin->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'admin.timeoff.update', 'method' => 'put']) !!}
                    <div class="row">
                        <div class="col">
                            {!! Form::auiDate('from_date', $timeoff->from_date, ['class' => 'start-date', 'autocomplete' => 'off', 'data-startDate' => $timeoff->from_date], 'From Date') !!}
                        </div>
                        <div class="col">
                            {!! Form::auiDate('to_date', $timeoff->to_date, ['class' => 'end-date', 'autocomplete' => 'off'], 'To Date') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            {!! Form::auiSwitch('half_day', $timeoff->days == 0.5 ? 1 : 0, ['class' => 'disable-finish-date', 'autocomplete' => 'off'], 'Half day') !!}
                        </div>
                        <div class="col">
                            {!! Form::auiSelect('type', config('adminui.staff.types'), $timeoff->type, [], 'Time Off Type') !!}
                        </div>
                        @if (admin()->can('timeoff manage'))
                            <div class="col">
                                {!! Form::auiSelect('status', $statuses, $timeoff->status, [], 'Status') !!}
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="hidden" name="timeoff_id" value="{{ $timeoff->id }}" />
                            <input type="hidden" name="admin_id" value="{{ $timeoff->admin_id ?? 0 }}" />
                            <button type="submit" class="btn btn-success btn-block">Update</button>
                        </div>
                    </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
