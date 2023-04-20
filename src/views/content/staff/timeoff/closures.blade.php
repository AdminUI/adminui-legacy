@extends('auilayout::admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <h1>Closed Dates - {{ $year }}</h1>
        </div>
        <div class="col-sm-4">
            {!! Form::open(['route' => 'admin.timeoff.filter']) !!}
            <select name="year" class="form-control custom-select" onchange="this.form.submit()">
                @foreach ($years as $yer)
                    <option value="{{ $yer }}" {{ $year == $yer ? 'selected="selected"' : '' }}>
                        {{ $yer }}
                    </option>
                @endforeach
            </select>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            {{-- @component('uicomponents::tableData', [
                'method' => 'closedDates',
                'data'   => $closedDates,
                'page'   => $page ?? 1,
                'totals' => $totals ?? false
            ]);
            @endcomponent --}}
        </div>
        <div class="col-md-3 text-right">
            @if (admin()->can('timeoff.manager'))
                <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#addModal">
                    Create
                </button>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive-md">
                        <table class="table table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Reason</th>
                                    <th style="width:100px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($closedDates as $day)
                                    <tr>
                                        <td>{{ Carbon\Carbon::parse($day->closed_date)->format('d/m/Y') }}</td>
                                        <td>{{ $day->type }}</td>
                                        <td class="text-right">
                                            @if (admin()->can('delete') || admin()->can('timeoff.manager'))
                                                <a href="" class="confirm-delete" data-id="{{ $day->id }}" data-table="closed_dates">
                                                    <i class="icon icon-trash"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No Results to display</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="AddModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <legend>Add Closed Day</legend>
                {!! Form::open(['route' => 'admin.timeoff.closed.store']) !!}
                    {!! Form::auiDate('closed-date', date('d-m-'.Session('year', date('Y'))), [], 'Closed Date') !!}
                    {!! Form::auiSelect('reason', $reasons, old('reason'), ['autocomplete' => 'off'], 'Reason for Closure') !!}
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success btn-block">Create</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
