<div class="bota_search_title">
    <svg height="20" viewBox="0 0 512 512" width="20"
         xmlns="http://www.w3.org/2000/svg">
        <g data-name="Layer 2">
            <g id="trend_up">
                <path id="background"
                      d="m256 31a225.07 225.07 0 0 1 87.57 432.33 225.07 225.07 0 0 1 -175.14-414.66 223.45 223.45 0 0 1 87.57-17.67m0-31c-141.38 0-256 114.62-256 256s114.62 256 256 256 256-114.62 256-256-114.62-256-256-256z"></path>
                <path d="m133.35 334.73a18.11 18.11 0 0 1 -8-1.9c-6.59-3.23-10.36-10.21-9.17-17a22.45 22.45 0 0 1 5.4-11.46c27.31-27.74 54.67-55 75.46-75.63a18 18 0 0 1 12.75-5.63c4.83 0 9.49 2.1 13.47 6.08l47 47 64-64h-6.46c-8.21 0-19.46-.1-25.91-.16-10.16-.08-17.28-7.16-17.33-17.22a17.52 17.52 0 0 1 4.84-12.53 17.19 17.19 0 0 1 12.31-4.88c13-.05 26-.07 38.52-.07 13.05 0 26.06 0 38.67.07 9.73 0 16.84 7 16.9 16.56.18 26.67.17 53 0 78.22-.06 9.58-7.33 16.54-17.28 16.54h-.2c-9.88-.09-16.89-7.06-17.05-16.94-.12-7.75-.1-15.63-.07-23.24q0-5 0-10v-2c-.25.22-.48.44-.7.66q-32.46 32.6-64.89 65.22l-9 9c-5.4 5.43-10.45 8.07-15.44 8.07s-9.9-2.58-15.16-7.88l-46.26-46.25-3.75 3.81c-4 4-7.82 7.76-11.52 11.48l-17.38 17.49c-10 10.08-20.34 20.51-30.55 30.73a18.58 18.58 0 0 1 -13.2 5.86z"></path>
            </g>
        </g>
    </svg>
    {!! __('message.products') !!}
</div>
<div class="bota_search_list" id="bota_search_products">
    @if(count($products) > 0)
        @php
            $productDetail = (app()->getLocale() == 'vi') ? 'sanpham.detail' : 'products.detail';
        @endphp
        @foreach ($products as $item)
            <a class="bota_search_product_smart" href="{{ route($productDetail, ['slug' => $item->getSlug()]) }}" title="{{ $item->getName() }}">
                <div class="image_thumb">
                    <img width="58" height="58" class="img-fluid" src="{{ is_null($item->image) ? asset('image/default.webp') : asset('storage/'. $item->image->path ) }}" alt="{{ $item->getName() }}" />
                </div>
                <div class="product-info">
                    <h3 class="product-name"><span>{{ $item->getName() }}</span></h3>
                </div>
            </a>
        @endforeach
    @else
        <h4 class="product-name text-center" style="font-size:13px;"><span>{!! __('message.there_are_no_results_for_the_keyword') !!}</span></h3>
    @endif
</div>

<div class="bota_search_title">
    <svg height="20" viewBox="0 0 512 512" width="20"
         xmlns="http://www.w3.org/2000/svg">
        <g data-name="Layer 2">
            <g id="trend_up">
                <path id="background"
                      d="m256 31a225.07 225.07 0 0 1 87.57 432.33 225.07 225.07 0 0 1 -175.14-414.66 223.45 223.45 0 0 1 87.57-17.67m0-31c-141.38 0-256 114.62-256 256s114.62 256 256 256 256-114.62 256-256-114.62-256-256-256z"></path>
                <path d="m133.35 334.73a18.11 18.11 0 0 1 -8-1.9c-6.59-3.23-10.36-10.21-9.17-17a22.45 22.45 0 0 1 5.4-11.46c27.31-27.74 54.67-55 75.46-75.63a18 18 0 0 1 12.75-5.63c4.83 0 9.49 2.1 13.47 6.08l47 47 64-64h-6.46c-8.21 0-19.46-.1-25.91-.16-10.16-.08-17.28-7.16-17.33-17.22a17.52 17.52 0 0 1 4.84-12.53 17.19 17.19 0 0 1 12.31-4.88c13-.05 26-.07 38.52-.07 13.05 0 26.06 0 38.67.07 9.73 0 16.84 7 16.9 16.56.18 26.67.17 53 0 78.22-.06 9.58-7.33 16.54-17.28 16.54h-.2c-9.88-.09-16.89-7.06-17.05-16.94-.12-7.75-.1-15.63-.07-23.24q0-5 0-10v-2c-.25.22-.48.44-.7.66q-32.46 32.6-64.89 65.22l-9 9c-5.4 5.43-10.45 8.07-15.44 8.07s-9.9-2.58-15.16-7.88l-46.26-46.25-3.75 3.81c-4 4-7.82 7.76-11.52 11.48l-17.38 17.49c-10 10.08-20.34 20.51-30.55 30.73a18.58 18.58 0 0 1 -13.2 5.86z"></path>
            </g>
        </g>
    </svg>
    {!! __('message.news') !!}
</div>
<div class="bota_search_list" id="bota_search_news">
    @if(count($news) > 0)
        @php
            $newSearch = (app()->getLocale() == 'vi') ? 'tintuc.detail' : 'news.detail'
        @endphp
        @foreach ($news as $item)
            <a class="bota_search_product_smart" href="{{ route($newSearch, $item->getSlug()) }}" title="{{ $item->getTitle() }}">
                <div class="image_thumb">
                    <img width="58" height="58" class="img-fluid" src="{{ is_null($item->image) ? asset('image/default.webp') : asset('storage/'. $item->image) }}" />
                </div>
                <div class="product-info">
                    <h3 class="product-name"><span>{{ $item->getTitle() }}</span></h3>
                </div>
            </a>
        @endforeach
    @else
        <h4 class="product-name text-center" style="font-size:13px;"><span>{!! __('message.there_are_no_results_for_the_keyword') !!}</span></h3>
    @endif
</div>