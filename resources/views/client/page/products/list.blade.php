@extends('client.layouts.app')
@section('title')
    {!! __('message.search_results') !!}
@endsection

@section('meta')
    @php
        $seoContent = \App\Models\Seocontent::where('position', 2)->first();
        $contactSeo = \App\Models\Contacts::query()->first();
        $logoSeo = \App\Models\Logo::query()->where('status', STATUS_VALUE_ACTIVE)->first();
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
    <meta property="og:image" content="{{ ($logoSeo) ? asset('storage/'. $logoSeo->image_share) : '#' }}" />
    <meta property="og:image:secure_url" content="{{ ($logoSeo) ? asset('storage/'. $logoSeo->image_share) : '#' }}" />
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
    <div class="bota_breadcrumb_bg" style="background-image: url({{ asset('statics/imgs/bg-product.webp') }});">
        <div class="bota_breadcrumb_banner">
            <div class="bota_breadcrumb_banner_el">
                <div class="bota_breadcrumb_title">
                    <h1>{!! __('message.keyword_search_results') !!} : "{{$keyword}}"</h1>
                </div>
                <div class="bota_breadcrumbs">
                    <div class="bota_color_breadcumb"></div>
                    <div id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}" title="Trang chủ">{!! __('message.homepage') !!}</a></li>
                            <li class="breadcrumb-item">{!! __('message.search_results') !!}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bota_product_page">
        <div class="container">
            <div class="portfolio-wrapper">
                @php
                    $productDetail = (app()->getLocale() == 'vi') ? 'sanpham.detail' : 'products.detail';
                @endphp
                <div class="image-gallery grid-layout portfolio-grid-layout">
                    <div class="isotope" data-cols="4" data-gutter="15" data-layout="fitRows" data-infinite="false">
                       @if(isset($products) && !empty($products)) 
                        @foreach($products as $product)
                            <article class="bota_pr_portfolio_item portfolio-default portfolio-filter-{{ $product->category_id }}">
                                <div class="bota_pr_portfolio_wrap">
                                    <div class="bota_pr_portfolio_img">
                                        <a href="{{ route($productDetail, ['slug' => $product->getSlug()]) }}">
                                            @if($product->image)
                                                <img height="272" width="362" class="img-fluid cpt-img" alt="{{ $product->getName() }}" src="{{asset('storage/'. $product->image['path'])}}"/>
                                            @else
                                                <img height="272" width="362" class="img-fluid cpt-img" alt="{{ $product->getName() }}" src="/image/default.webp"/>
                                            @endif
                                            <div class="portfolio-title">
                                                <h3>{{ $product->getName() }}</h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="bota_pagination">
                <ul class="pagination">
                    {{ $products->links() }}
                </ul>
            </div>
        </div>
    </div>
@endsection
