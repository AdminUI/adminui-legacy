
<ul class="side-menu-nav">
    @foreach ($navigation as $menuItem)
        @if ($menuItem->permissions == '' || Auth::guard('admin')->user()->can($menuItem->permissions))
            @if ($menuItem->parent_id == $parent)
                @php
                $children = $navigation->where('parent_id', $menuItem->id);
                @endphp
                <li>
                    <a href="{{ $menuItem->route ? route($menuItem->route) : '' }}"
                        class="{{ $children->count() >= 1 ? 'sm-toggle nav-level-'.$parent : '' }}">
                        @if (empty($menuItem->parent_id))
                            <i class="{{ $menuItem->icon }} nav-icon"></i>
                        @endif
                        <span>{{ __(''.$menuItem->title)}}</span>

                        @if (count($children) > 0)
                            <i class="more-nav mt-1 float-right fa-fw fas fa-angle-down"></i>
                            </a>
                            <x-aui::layout.build-menu :parent="$menuItem->id" :navigation="$navigation" />
                        @else
                            </a>
                        @endif
                </li>
            @endif
        @endif
    @endforeach
</ul>
