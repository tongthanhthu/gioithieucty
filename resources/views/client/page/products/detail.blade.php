@extends('client.layouts.app')
@section('title')
{!! __('message.product_details') !!}
@endsection

@section('meta')
    @php
        $seoContent = \App\Models\Seocontent::where('position', 2)->first();
        $contactSeo = \App\Models\Contacts::query()->first();

        $image = $product->image != [] ? $product->image->path : asset('image/default.png');
    @endphp
    <meta name="description" content="{{ $seoContent->description ?? 'Bình Minh TPC' }}">
    <meta name="keywords" content="{{ $seoContent->keywords ?? 'Bình Minh TPC' }}">
    <meta property="description" content="{{ $seoContent->property_description ?? 'Bình Minh TPC' }}">
    <meta property="og:title" content="{{ $seoContent->property_og_title ?? 'Bình Minh TPC' }}">
    <meta property="dc:description og:description schema:description" name="description" content="{{ $seoContent->property_og_description ?? 'Bình Minh TPC' }}" />
    <meta property="og:image:alt" content="{{ $seoContent->property_og_title ?? 'Bình Minh TPC' }}" />
    <meta proschperty="og:description" content="{{ $seoContent->property_og_description ?? 'Bình Minh TPC' }}" />
    <meta property="og:description" content="{{ $seoContent->property_og_description ?? 'Bình Minh TPC' }}">
    <meta property="og:site_name" content="{{ $seoContent->property_name ?? 'Bình Minh TPC' }}" />
    <meta property="og:image" content="{{ ($image) ? asset('storage/'. $image) : '#' }}" />
    <meta property="og:image:secure_url" content="{{ ($image) ? asset('storage/'. $image) : '#' }}" />
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "url": "{{ request()->url() }}",
            "name": "{{ $seoContent->property_og_title ?? 'Bình Minh TPC' }}",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "{{ $contactSeo ? $contactSeo->phone : ''}}",
                "contactType": "Customer service"
            }
        }
    </script>
@endsection
@section('content')
<script type="text/javascript" src="{{asset('statics/plugins/lightgallery/lightgallery.js')}}"></script>
    <div class="bota_breadcrumb_bg" style="background-image: url({{ asset('statics/imgs/bg-product.webp') }});">
        <div class="bota_breadcrumb_banner">
            <div class="bota_breadcrumb_banner_el">
                <div class="bota_breadcrumb_title">
                    <h1>{{ $product->getName() }}</h1>
                </div>
                <div class="bota_breadcrumbs">
                    <div class="bota_color_breadcumb"></div>
                    <div id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}" title="{!! __('message.homepage') !!}">{!! __('message.homepage') !!}</a></li>
                            <li class="breadcrumb-item">{{ $product->getName() }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bota_product_detail_page">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-sm-12">
                    <div class="bota_product_detail_info">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-sm-6">
                                <div class="bota_product_detail_images">
                                    <div class="product-thumbs-slider swiper-container">
                                        <div class="swiper-wrapper" id="lightgallery">
                                            @if(count($product->images) > 0)
                                                @foreach($product->images as $image)
                                                    <a class="swiper-slide" data-hash="0" href="{{asset('storage/'. $image['path'])}}" title="{{ $product->getName() }}">
                                                        <img src="{{asset('storage/'. $image['path'])}}" alt="{{ $product->getName() }}" class="img-fluid mx-auto d-block swiper-lazy" />
                                                    </a>
                                                @endforeach
                                            @else
                                                <a class="swiper-slide" data-hash="0" href="{{ asset('image/default.png') }}" title="{{ $product->getName() }}">
                                                    <img src="{{ asset('image/default.png') }}" alt="{{ $product->getName() }}" class="img-fluid mx-auto d-block swiper-lazy" />
                                                </a>
                                            @endif
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-6">
                                <div class="bota_product_detail_desc">
                                    <ul>
                                        @foreach(json_decode($product->getInfoProduct()) as $key => $info_product)
                                            <li><span>{{ $key }}</span>{{ $info_product }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bota_product_detail_tab">
                        <h1>{{ $product->getName() }}</h1>
                        <div class="bota_product_time">
                            <a href="{{ (app()->getLocale() == 'vi') ? route('sanpham.list') : route('products.list') }}" title="">{{ $product->category->getName() }}</a>
                            <time>{{ \Carbon\Carbon::parse($product['updated_at'])->format('d/m/Y H:i') }}</time>
                        </div>
                        <div class="bota_product_detail_tabs_desc">
                            {!! $product->getDescription() !!}
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-12">
                    @php
                        $blockNews = \App\Models\Posts::where('status', STATUS_VALUE_ACTIVE)->paginate(3);
                        $categories = \App\Models\Categories::where('status', STATUS_VALUE_ACTIVE)->withCount('products')->get();
                    @endphp
                    <div class="bota_block_news">
                        <h2 class="bota_block_title">{!! __('message.news') !!}</h2>
                        @php
                            $newDetailI = (app()->getLocale() == 'vi') ? 'tintuc.detail' : 'news.detail';
                        @endphp
                        <ul class="bota_block_news_list">
                            @foreach ($blockNews as $item)
                                <li class="bota_block_news_item">
                                    <div class="bota_block_news_media">
                                        <a href="{{ route($newDetailI, $item->getSlug()) }}" rel="bookmark" title="{{ $item->getTitle() }}">
                                            <img src="{{ is_null($item->image) ? asset('image/default.webp') : asset('storage/'. $item->image) }}" alt="{{ $item->getTitle() }}">
                                        </a>
                                    </div>
                                    <div class="bota_block_news_info">
                                        <div class="bota_block_news_author">
                                            <span class="left author">
                                                <i class="fas fa-user-circle"></i>
                                            </span>
                                            <span class="right bota_post_author">
                                            <span class="{!! __('message.by') !!}">{!! __('message.by') !!}</span>
                                                <a href="{{ route($newDetailI, $item->getSlug()) }}" title="Tác giả {{ $item->author }}">
                                                    {{ $item->author }}
                                                </a>
                                            </span>
                                        </div>
                                        <h4 class="{{ route($newDetailI, $item->getSlug()) }}">
                                            <a href="{{ route($newDetailI, $item->getSlug()) }}" rel="bookmark" title="{{ $item->getTitle() }}">
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
                                @php
                                    $productSlug = (app()->getLocale() == 'vi') ? 'san-pham' : 'products';
                                @endphp
                                @foreach ($categories as $category)
                                    <li class="bota_block_cat_item">
                                        <a href="/{{$productSlug}}?slug={{ $category->getSlug() }}" title="{{ $category->getName() }}">{{ $category->getName() }}</a> ({{ $category->products_count}})
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
