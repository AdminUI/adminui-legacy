@foreach ($pages as $page)
    @if (empty($page->parent()->count()))
        <div data-id="{{ $page->id }}" data-parent-id="{{ $page->parent_id }}" data-level="{{ $level }}"
            class="page-container" style="--level: {{ $level }}" draggable="true">
            <div class="page-link">
                <a href="{{ route('admin.pages.show', ['page' => $page->id]) }}">
                    {{ $page->title }}
                </a>
            </div>
        </div>
    @else
        <div data-id="{{ $page->id }}" data-parent-id="{{ $page->parent_id }}" data-level="{{ $level }}"
            style="--level: {{ $level }}" class="page-container page-has-children" draggable="true">
            <div class="page-link">
                <div class="page-children-trigger">
                    <div class="page-children-trigger-inner"></div>
                </div>
                <a href="{{ route('admin.pages.show', ['page' => $page->id]) }}">
                    {{ $page->title }}
                </a>
            </div>
            <div class="page-children">
                <x-auipage::page :pages="$page
                    ->parent()
                    ->orderBy('sort_order', 'asc')
                    ->get()" :level="$level + 1" />
            </div>
        </div>
    @endif
@endforeach
