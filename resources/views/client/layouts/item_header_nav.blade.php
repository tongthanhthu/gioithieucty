@php
    ++$cnt;
    $class = $cnt == 1 ? 'bota_sub_menu' : ($cnt == 2 ? 'bota_sub_sub_menu' : '');
    $currentDomain = url('');
@endphp
<li>
        <a href="{{ $currentDomain.'/'.$item->getUrl() }}" title="{{ $item->getName() }}">
            {{ $item->getName() }}
        </a>
        @if (count($item->children) > 0)
            <ul class="{{ $class }}">
                @foreach ($item->children as $child)
                    @include('client.layouts.item_header_nav', ['item' => $child, 'cnt' => $cnt])
                @endforeach
            </ul>
        @endif
</li>
