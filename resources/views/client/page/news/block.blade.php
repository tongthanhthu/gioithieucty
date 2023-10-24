@php
    $blockNews = \App\Models\Posts::where('status', STATUS_VALUE_ACTIVE)->orderBy('updated_at', 'desc')->paginate(3);
    $categories = \App\Models\Categories::where('status', STATUS_VALUE_ACTIVE)->withCount('products')->get();

    $key = 'tag_'.app()->getLocale();
    $tags = \App\Models\Posts::where('status', STATUS_VALUE_ACTIVE)->whereNotNull($key)->distinct()->pluck($key);
    $tagArray = [];
    foreach ($tags as $key => $tag) {
        if (strpos($tag, ',') !== false) {
            foreach (explode(",", $tag) as $item) {
                if(!in_array($item, $tagArray)) $tagArray[]= $item;
            }
        } else {
            if(!in_array($tag, $tagArray)) $tagArray[]= $tag;
        }
    }
@endphp
@if(((app()->getLocale() == 'vi') ? route('tuyendung.index') : route('recruitments.index')) == Route::currentRouteName() )
    <div class="bota_news_search">
        <form action="{{ (app()->getLocale() == 'vi') ? route('tintuc.searchNew') : route('news.searchNew') }}" method="post" name="search_form" id="news_search_form">
            @csrf
            <input type="search" class="search-field" name="keyword" placeholder="{!! __('message.search') !!}..." value="">
            <button type="submit" class="search-submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
@endif
<div class="bota_block_news">
    <h2 class="bota_block_title">{!! __('message.news') !!}</h2>
    @php
        $newDetail = (app()->getLocale() == 'vi') ? 'tintuc.detail' : 'news.detail';
    @endphp
    <ul class="bota_block_news_list">
        @foreach ($blockNews as $item)
            <li class="bota_block_news_item">
                <div class="bota_block_news_media">
                <a href="{{ route($newDetail, $item->getSlug()) }}" rel="bookmark" title="{{ $item->getTitle() }}">
                        <img src="{{ is_null($item->image) ? asset('image/default.webp') : asset('storage/'. $item->image) }}" alt="{{ $item->getTitle() }}">
                </a>
                </div>
                <div class="bota_block_news_info">
                <div class="bota_block_news_author">
                    <span class="left author">
                        <i class="fas fa-user-circle"></i>
                    </span>
                    <span class="right bota_post_author">
                    <span class="by">{!! __('message.by') !!}</span>
                        <a href="{{ route($newDetail, $item->getSlug()) }}" title="Tác giả {{ $item->author }}">
                            {{ $item->author }}
                        </a>
                    </span>
                </div>
                <h4 class="{{ route($newDetail, $item->getSlug()) }}">
                        <a href="{{ route($newDetail, $item->getSlug()) }}" rel="bookmark" title="{{ $item->getTitle() }}">
                            {{ $item->getTitle() }}
                        </a>
                </h4>
                </div>
            </li>
        @endforeach
    </ul>
</div>
<div class="bota_block_categories">
    <h2 class="bota_block_title">{!! __('message.products') !!}</h2>
    <div class="bota_block_categories_list">
        <ul>
            @foreach ($categories as $category)
                <li class="bota_block_cat_item">
                    <a href="/{{(app()->getLocale() == 'vi') ? 'san-pham' : 'products' }}?slug={{ $category->getSlug() }}" title="{{ $category->getName() }}">{{ $category->getName() }}</a> ({{ $category->products_count}})
                </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="bota_block_tags">
    <h2 class="bota_block_title">{!! __('message.tags') !!}</h2>
    @if(count($tagArray) > 0)
        <div class="bota_tag_cloud">
            @foreach ($tagArray as $tag)
                <a href="{{ (app()->getLocale() == 'vi') ? route('tintuc.index', ['tag' => $tag]) : route('news.index', ['slug' => $tag]) }}" class="tag-cloud-link">{{ $tag }}</a>
            @endforeach
        </div>
    @endif
</div>