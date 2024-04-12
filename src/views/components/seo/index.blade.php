{{-- To include seo components at once --}}
{{-- Robots to index or not --}}
@use ('AdminUI\AdminUI\Facades\Seo')
@php
if (!empty($data)) {
    $seo = Seo::generate($data);
}
@endphp

<x-aui::seo.robots :data="$seo" />
{{-- Page Title --}}
<x-aui::seo.title :data="$seo" />
{{-- Page Description --}}
<x-aui::seo.description :data="$seo" />
{{-- Page Keywords --}}
<x-aui::seo.keywords :data="$seo" />
{{-- Canonical Link --}}
<x-aui::seo.canonical :data="$seo" />
{{-- Graph contents --}}
<x-aui::seo.graph :data="$seo" />
