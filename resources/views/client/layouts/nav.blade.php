<nav id="menu" aria-hidden="true">
    @php
        $menuss = \App\Models\Menu::where('layout', 0)
            ->orderBy('parent_id', 'asc')
            ->orderBy('position', 'asc')
            ->get();
        $menuTrees = buildMenuTrees($menuss);
        function buildMenuTrees($menuss, $parentId = 0)
        {
            $menuTree = [];
        
            foreach ($menuss as $menu) {
                if ($menu->parent_id === $parentId) {
                    $menu->children = buildMenuTree($menuss, $menu->id);
                    $menuTree[] = $menu;
                }
            }
            return $menuTree;
        }
    @endphp
    <ul>
        @php
            $cnts = 0;
        @endphp
        @foreach ($menuTrees as $item)
            @include('client.layouts.item_header_nav', ['item' => $item, 'cnt' => $cnts])
        @endforeach
    </ul>
</nav>
