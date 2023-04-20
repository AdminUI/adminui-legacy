{{-- page layout first --}}

<div class="{{ $page->pageLayout->layout_class ?? '' }}">
    <div class="{{ $page->pageLayout->container_size ?? '' }}">

        <div class="row {{ $page->pageLayout->has_gutters == 0 ? 'no-gutters' : '' }}">

            @if (!isset($page->pageLayout) || $page->pageLayout->sidebar_size == 0)
                {{-- Full page layout --}}
                <div class="col {{ $page->pageLayout->content_class ?? '' }}">
                    <div class=" pb-page-content-full">
                        {!! $mainContent ?? $page->content!!}
                    </div>
                </div>
            @elseif ($page->pageLayout->sidebar_position == 'left')
                {{-- Left sidebar --}}
                <div class="col-12 col-md-{{ $page->pageLayout->sidebar_size }} {{ $page->pageLayout->sidebar_class ?? ''}}">
                    <div class="pb-page-sidebar-left">
                        {!!$sidebarContent ?? $page->pageLayout->sidebar_content !!}
                    </div>
                </div>
                <div class="col-12 col-md-{{ 12 - intval($page->pageLayout->sidebar_size) }} {{ $page->pageLayout->content_class ?? '' }}">
                    <div class="pb-page-content-right">
                        {!! $mainContent ?? $page->content !!}
                    </div>
                </div>
            @else
                {{-- Right sidebar --}}
                <div class="col-12 col-md-{{ 12 - intval($page->pageLayout->sidebar_size) }} {{ $page->pageLayout->content_class ?? '' }}">
                    <div class="pb-page-content-left">
                        {!! $mainContent ?? $page->content !!}
                    </div>
                </div>
                <div class="col-12 col-md-{{ $page->pageLayout->sidebar_size }} {{ $page->pageLayout->sidebar_class ?? ''}}">
                    <div class="pb-page-sidebar-right">
                        {!! $sidebarContent ?? $page->pageLayout->sidebar_content !!}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
