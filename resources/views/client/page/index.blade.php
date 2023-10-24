@extends('client.layouts.app')
@section('title')
    {!! __('message.homepage') !!}
@endsection
@section('meta')

    @php
        $seoContent = \App\Models\Seocontent::where('position', 0)->first();
        $partners = \App\Models\Partner::where('status', 1)->get();
        $chooseUs = \App\Models\ChooseUs::first();
        $company = \App\Models\CompanyIntroduce::first();
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
    <h1 style="display: none">{{ $company->getCompanyName() }}</h1>
    <div class="slideshow_main">
        <div class="home-slider swiper-container">
            <div class="swiper-wrapper">
                @foreach ($banners as $banner)
                    <div class="swiper-slide">
                        <div class="slidehow_main">
                            <a href="{{ asset('storage/'. $banner->image) }}" title="banner" class="image-link">
                                <img src="{{ asset('storage/'. $banner->image) }}" alt="{{ $banner->getTitle() }}" class="img-fluid img_cover"/>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <div class="bota_block_info">
        <div class="bota_bg_overlay"></div>
        <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 col-sm-12" data-aos="fade-right">
                <div class="bota_block_info_img">
                    <img src="{{ asset('statics/imgs/info-v2.webp')}}" class="img-fluid" alt="{!! __('message.introduce') !!}" />
                    <div class="ova-counter">
                        <div class="odometer-wrapper">
                            <span class="odometer">{{ $companyIntroduce->experience ?? ''}}</span>
                            <span class="suffix"></span>
                            <h4 class="title">{!! __('message.years_experience') !!}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-sm-12" data-aos="fade-up">
                <div class="bota_block_info_top">
                    <div class="bota_block_info_title">
                        <h2><span>{!! __('message.introduce') !!}</span></h2>
                    </div>
                    @if($companyIntroduce)
                    <div class="bota_block_info_short">
                        {{ $companyIntroduce->getDescriptionShort() ?? ''}}
                    </div>
                    @endif
                    <div class="bota_reamore_btn">
                        <a href="{{ (app()->getLocale() == 'vi') ? route('gioithieu.index') : route('introduce.index') }}" title="{!! __('message.readmore') !!}">
                            <span>{!! __('message.readmore') !!}</span>
                        </a>
                    </div>
                </div>
                @foreach ($introduces as $introduce)
                    <div class="bota_block_info_center">
                        <a href="{{ route((app()->getLocale() == 'vi') ? 'gioithieu.detail' : 'introduce.detail', $introduce->getSlug() )}}" title="{{ $introduce->getTitle() ?? ''}}"><h3>{{ $introduce->getTitle() ?? ''}}</h3></a>
                        <div class="bota_block_info_item">
                            <div class="bota_block_info_icon">
                                <img src="{{ asset('statics/imgs/planet-earth.webp')}}" alt="icon" style="height: 70px; width: 70px;" />
                            </div>
                            <div class="bota_block_info_text">
                                {!! $introduce->getDescriptionShort() ?? '' !!}
                            </div>
                        </div>
                        <div class="bota_reamore_btn">
                            <a href="{{ route((app()->getLocale() == 'vi') ? 'gioithieu.detail' : 'introduce.detail', $introduce->getSlug() )}}" title="{!! __('message.readmore') !!}">
                                <span>{!! __('message.readmore') !!}</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>
    <div class="bota_factory">
        <div class="bota_factory_bg_overlay" style="background-image: url({{ asset('statics/imgs/mechanical.webp')}});"></div>
        <div class="container">
            <div class="bota_title_all">
                <h2><span>{!! __('message.factory') !!}</span></h2>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-sm-12 col-12" data-aos="fade-up">
                    <div class="bota_factory_item">
                        <div class="ova-counter">
                            <div class="icon">
                                <img src="{{ asset('statics/imgs/factory-v2.webp')}}" alt="Phân xưởng" width="152" height="152">
                            </div>
                            <div class="odometer-wrapper">
                                <span class="odometer">{{ $factoryData->factory ?? ''}}</span><span class="suffix">+</span>
                                <h4 class="title">
                                    {!! __('message.factory_index') !!}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-12 col-12" data-aos="fade-up">
                    <div class="bota_factory_item">
                        <div class="ova-counter">
                            <div class="icon">
                                <img src="statics/imgs/office-v2.webp" alt="Máy móc" width="152" height="152">
                            </div>
                            <div class="odometer-wrapper">
                                <span class="odometer">{{ $factoryData->machines ?? ''}}</span><span class="suffix">+</span>
                                <h4 class="title">
                                    {!! __('message.machines') !!}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-12 col-12" data-aos="fade-up">
                    <div class="bota_factory_item">
                        <div class="ova-counter">
                            <div class="icon">
                                <img src="{{ asset('statics/imgs/workers-v2.webp')}}" alt="Nhân lực" width="152" height="152">
                            </div>
                            <div class="odometer-wrapper">
                                <span class="odometer">{{ $factoryData->human ?? ''}}</span><span class="suffix">+</span>
                                <h4 class="title">
                                    {!! __('message.human') !!}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(!empty($chooseUs) && isset($chooseUs))
    <div class="bota_why">
        <div class="container">
            <div class="bota_title_main animated-fast animated ova-move-up">
                <h2>{!! __('message.choose_us') !!}</h2>
            </div>
            <div class="bota_why_list">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-7 coll-sm-7 animated-fast animated ova-move-up">
                        <div class="bota_why_desc">
                     {!! $chooseUs->getContent() ?? '' !!}
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 coll-sm-5 animated-fast animated ova-move-up">
                        <div class="bota_why_video">
                            <iframe width="560" height="245" src="{{ $chooseUs->link_video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="bota_product_cate">
        <div class="container">
            <div class="bota_title_all" data-aos="fade-up">
                <h2><span>{!! __('message.company_product') !!}</span></h2>
            </div>
            <div class="product-tab" data-aos="fade-up">
                <ul class="tabs clearfix">
                    <li class="tab-link has-content active" data-tab="#tab-">
                        <span title="{!! __('message.all') !!}">
                            {!! __('message.all') !!}
                        </span>
                    </li>
                    @foreach($categories as $category)
                    <li class="tab-link" data-tab="#tab-{{ $category->id }}">
                        <span title="Đồ gá">
                            {{ $category->getName() }}
                        </span>
                    </li>
                    @endforeach
                </ul>
                @php
                    $productsByCategory = \App\Models\Product::orderByDesc('category_id')
                                                   ->with('image')
                                                   ->get()
                                                   ->groupBy('category_id');
                @endphp
                <div class="tab-float">
                    <div id="tab-" class="tab-content tab-pane active">
                        <div class="slick-tab-product slick-none">
                            @if($products)
                                @foreach($products as $product)
                                    <div class="col-12 margin-bottom-30">
                                        <article class="bota_pr_portfolio_item portfolio-default">
                                            <div class="bota_pr_portfolio_wrap">
                                                <div class="bota_pr_portfolio_img">
                                                    <a href="{{ route((app()->getLocale() == 'vi') ? 'sanpham.detail' : 'products.detail', ['slug' => $product->getSlug()]) }}" target="_blank">
                                                        <img style="height: 272px; width: 362px" class="img-fluid cpt-img" alt="DGGC1" src="{{ isset($product->image) ? asset('storage/'. $product->image['path']) : '/image/default.png'}}"/>
                                                        <div class="portfolio-title">
                                                            <h3>{{ $product->getName() }}</h3>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    @foreach($productsByCategory as $key => $productByCategory)
                        @if($productByCategory)
                            <div id="tab-{{ $key }}" class="tab-content tab-pane">
                                <div class="slick-tab-product slick-none">
                                    @foreach($productByCategory as $product)
                                        <div class="col-12 margin-bottom-30">
                                            <article class="bota_pr_portfolio_item portfolio-default">
                                                <div class="bota_pr_portfolio_wrap">
                                                    <div class="bota_pr_portfolio_img">
                                                        <a href="{{ route((app()->getLocale() == 'vi') ? 'sanpham.detail' : 'products.detail', ['slug' => $product->getSlug()]) }}" target="_blank">
                                                            <img style="height: 272px; width: 362px;" class="img-fluid cpt-img" alt="DGGC1" src="{{ isset($product->image) ? asset('storage/'. $product->image['path']) : '/image/default.webp'}}"/>
                                                            <div class="portfolio-title">
                                                                <h3>{{ $product->getName() }}</h3>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="bota_news_home">
        <div class="container">
            <div class="bota_title_all">
                <h2><span>{!! __('message.news_and_events') !!}</span></h2>
            </div>
            <div class="bota_news_home_list row">
                @foreach ($news as $new)
                    <div class="col-xl-4 col-lg-4 col-sm-6 margin-bottom-30">
                        <div class="bota_news_item">
                            <div class="bota_news_media">
                            <div class="box-img">
                                <a href="{{ route((app()->getLocale() == 'vi') ? 'tintuc.detail' : 'news.detail', $new->getSlug()) }}" rel="bookmark" title="{{ $new->getTitle() }}">
                                    <img src="{{ asset('storage/'. $new->image) }}" alt="{{ $new->getTitle() }}">
                                </a>
                            </div>
                            <div class="post-date">
                                <span class="date-j">{{ $new->updated_at->format('d/m') }}</span>
                            </div>
                            </div>
                            <div class="bota_news_content">
                            <ul class="post-meta">
                                <li class="item-meta bota_author">
                                    <span class="left author">
                                        <i class="fas fa-user-circle"></i>
                                        </span>
                                        <span class="right post-author">
                                        <span class="by">
                                        {!! __('message.by') !!}
                                        </span>
                                        <a href="{{ route((app()->getLocale() == 'vi') ? 'tintuc.detail' : 'news.detail', $new->getSlug()) }}" title="Đăng bởi {{ $new->author }}">
                                            {{ $new->author }}
                                        </a>
                                    </span>
                                </li>
                                <li class="item-space">
                                </li>
                                <li class="item-meta post-comment">
                                </li>
                            </ul>
                            <h2 class="post-title">
                                <a href="{{ route((app()->getLocale() == 'vi') ? 'tintuc.detail' : 'news.detail', $new->getSlug()) }}" rel="bookmark" title="{{ $new->getTitle() }}">
                                    {{ $new->getTitle() }}
                                </a>
                            </h2>
                            <a class="read-more" href="{{ route((app()->getLocale() == 'vi') ? 'tintuc.detail' : 'news.detail', $new->getSlug()) }}">{!! __('message.readmore') !!}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @if(!empty($partners) && isset($partners))
    <div class="bota_slide_logo">
        <div class="container">
            <div class="bota_title_all">
                <h2><span>{!! __('message.customer_of_company') !!}</span></h2>
            </div>
            <div class="bota_slide_logo_list">
                <div class="logo-slider swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($partners as $partner)
                            <div class="swiper-slide">
                                <div class="slidehow_main">
                                    <a href="{{ $partner->url }}" title="{{ $partner->title }}">
                                        <img src="{{asset('storage/'. $partner->image)}}" alt="{{ $partner->name }}" class="img-fluid"/>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
