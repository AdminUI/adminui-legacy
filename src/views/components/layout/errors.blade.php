@php
$messages = [];
if ($errors->any()) {
    $type = 'error';
    foreach ($errors->all() as $error) {
        $messages[] = $error;
    }
}

if (session('message')) {
    if (is_array(session('message.message'))) {
        foreach (session('message.message') as $line) {
            $messages[] = $line;
        }
    } else {
        $messages[] = session('message.message');
    }
    $type = session('message.type');
    Session::forget('message');
}

if (session('status')) {
    $messages[] = Session::pull('status');
}
@endphp

@if (!empty($messages))
    <script>
        const type = '{{ $type }}';
        const messages = @json($messages);
        const position = '{!! config('settings.toast', 'top') !!}';

        setTimeout(() => {
            window.$app.vue.$store.commit('activateSnackbar', {
                message: messages,
                type,
                position,
                timeout: 4000,
            })
        }, 100);
    </script>
@endif
