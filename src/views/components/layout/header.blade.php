{{-- Header file to import into front or backend AUI applications --}}
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="copyright" content="{{ config('app.name', 'Admin-UI') }}" />
<meta name="author" content="DSM Design Ltd">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- Security Headers --}}
@php
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: no-referrer-when-downgrade');
header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
// header('Clear-Site-Data: "*"');
@endphp
