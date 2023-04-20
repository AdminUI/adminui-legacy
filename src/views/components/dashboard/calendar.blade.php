@php
$closed       = AdminUI\AdminUIStaff\Models\ClosedDate::orderBy('closed_date')->get();
$timeoff      = AdminUI\AdminUIStaff\Models\TimeOff::orderBy('from_date')->where('status', 2)->get();
$appointments = AdminUI\AdminUIStaff\Models\Appointment::orderBy('from_date')->get();
@endphp

<div class="card">
    <div class="card-body">
        <div id="calendar"></div>
    </div>
</div>

@push('css')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
@endpush

@push('scripts')

<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            defaultView: 'month',
            eventTextColor: '#ffffff',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },
            eventRender: function(eventObj, $el) {
                $el.popover({
                    title: eventObj.title,
                    content: eventObj.description,
                    trigger: 'hover',
                    placement: 'top',
                    container: 'body'
                });
            },
            events : [
                @foreach($closed as $event)
                {
                    title : '{{ $event->type }}',
                    start : '{{ $event->closed_date }}',
                    allDay : true,
                    backgroundColor: '#BE3A31',
                    description: '',
                },
                @endforeach
                @foreach($timeoff as $event)
                {
                    title : '{{ $event->admin->name.' '.$event->admin->surname.' - '.config('adminui.staff.types.'.$event->type) }}',
                    start : '{{ $event->from_date }}',
                    @if ($event->days != 0.5)
                        allDay : true,
                        end: '{{ $event->to_date->addDays(1)->format('Y-m-d') }}',
                    @else
                        end: '{{ $event->to_date->format('Y-m-d 13:00:00') }}',
                    @endif
                    eventBackgroundColor: '#000072',
                    description : '{{ config('adminui.staff.types.'.$event->type) }} from {{ $event->from_date->format('d/m/Y') }} until {{ $event->to_date->format('d/m/Y') }} for {{ $event->days }} days',
                },
                @endforeach
            ],
        });
    });
</script>
@endpush
