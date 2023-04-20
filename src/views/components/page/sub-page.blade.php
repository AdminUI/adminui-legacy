@foreach ($pages as $subPage)
        <li id="{{ $subPage->id }}" ondrop="drop(event)" ondragover="allowDrop(event)" draggable="true" ondragstart="drag(event)" >
            <a href="{{ route('admin.category.edit', ['id' => short_encrypt($subPage->id)]) }}" >
                {{ $subPage->title }}
            </a>
            @if (!empty($subPage->parent->count()))
            <ul data-parent-id="{{ $subPage->id }}">
                <x-auipage::sub-page :pages="$subPage->parent"/>
            </ul>
            @endif
        </li>
@endforeach
