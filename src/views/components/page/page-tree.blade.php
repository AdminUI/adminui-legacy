<vue-treeview :items="{{ $pagetree }}" children-field="child" label-field="menu"
    highlight-colour="{{ $highlightColor }}" v-on:item-click="(item) => loadPage(`${item.slug}`)"
    :active="[{{ $page->id }}]">
</vue-treeview>
