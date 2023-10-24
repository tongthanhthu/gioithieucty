@extends('client.layouts.app')
@section('title')
    {!! __('message.news') !!}
@endsection

@section('meta')
    @php
        $seoContent = \App\Models\Seocontent::where('position', 3)->first();
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
                    <h1>{!! __('message.news') !!}</h1>
                </div>
                <div class="bota_breadcrumbs">
                    <div class="bota_color_breadcumb"></div>
                    <div id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}" title="{!! __('message.homepage') !!}">{!! __('message.homepage') !!}</a></li>
                            <li class="breadcrumb-item">{!! __('message.news') !!}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bota_news_page">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-sm-12">
                    <div class="bota_news_default_list">
                        @php
                            $newDetailI = (app()->getLocale() == 'vi') ? 'tintuc.detail' : 'news.detail';
                        @endphp
                        @foreach ($news as $new)
                            <article class="bota_news_post_item">
                                <div class="bota_news_post_img">
                                <img width="770" height="514" src="{{ is_null($new->image) ? asset('image/default.webp') : asset('storage/'. $new->image) }}" class="img-fluid" alt="{{ $new->getTitle() }}" />			
                                </div>
                                <a href="{{ route($newDetailI, $new->getSlug()) }}" rel="bookmark" title="{{ $new->getTitle() }}">
                                    <h2 class="bota_news_post_title">
                                        {{ $new->getTitle() }}  	
                                    </h2>
                                </a>
                                <ul class="bota_news_post_meta">
                                <li class="date">
                                    <i class="fal fa-calendar-alt"></i>{{ $new->updated_at->format('d/m/Y') }}	 		
                                </li>
                                <li class="bota_news_post_author">
                                    <i class="fal fa-user"></i>
                                    <a href="{{ route($newDetailI, $new->getSlug()) }}" title="Binh Minh">
                                        {{ $new->author }}
                                    </a>
                                </li>
                                <li class="bota_news_post_comment">
                                    {{-- <i class="fal fa-comments"></i>
                                    <a href="news-details.html#respond"> 1 Bình luận</a>--}}
                                </li>
                                </ul>
                                <div class="bota_news_post_excerpt">
                                    {!! $new->getDescriptionShort() !!}
                                </div>
                                <a href="{{ route($newDetailI, $new->getSlug()) }}" class="bota_news_post_readmore">{!! __('message.readmore') !!}</a>
                            </article>
                        @endforeach
                    </div>
                    <div class="bota_pagination">
                        {{ $news->links() }}
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-12">
                    @include('client.page.news.block')
                </div>
            </div>
        </div>
    </div>
@endsection
