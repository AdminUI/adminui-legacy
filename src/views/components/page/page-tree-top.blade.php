{{-- Top Pages Menu --}}
@if ($title)
    <h4 class="font-weight-bold text-uppercase mb-2">{{ $title }}</h4>
@endif

<ul class="{{ $class ?? ''}} page-top-tree">
    @foreach ($pages as $item)
        <li>
            <a href="{{ $item->home_page ? route('home') : route('page.index', $item->slug) }}"
                class="underline {{ optional(Route::current())->getName() == $item->slug ? 'active' : '' }}">
                {{ $item->menu_title ?? $item->title }}
            </a>
        </li>
    @endforeach
</ul>
