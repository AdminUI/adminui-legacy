{{-- To include seo components at once --}}
{{-- Robots to index or not --}}
<x-aui::seo.robots :data="$data" />
{{-- Page Title --}}
<x-aui::seo.title :data="$data" />
{{-- Page Description --}}
<x-aui::seo.description :data="$data" />
{{-- Page Keywords --}}
<x-aui::seo.keywords :data="$data" />
{{-- Canonical Link --}}
<x-aui::seo.canonical :data="$data" />
{{-- Graph contents --}}
<x-aui::seo.graph :data="$data" />
