<li>
    <span class="{{ (count($menu->children) > 0) ? 'box' : ''}}">{{ $menu->name_vi }}</span>
    @if(count($menu->children) > 0)
        @foreach($menu->children as $childMenu)
            <ul class="nested">
                @include('admin.menu.tree', ['menu' => $childMenu])
            </ul>
        @endforeach
    @endif
</li>
