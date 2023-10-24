@extends('client.layouts.app')
@section('title')
    {!! __('message.introduce') !!}
@endsection

@section('meta')
    @php
        $seoContent = \App\Models\Seocontent::where('position', 1)->first();
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
                <h1>{{$data->getTitle() ?? ''}}</h1>
            </div>
            <div class="bota_breadcrumbs">
                <div class="bota_color_breadcumb"></div>
                <div id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}" title="{!! __('message.homepage') !!}">{!! __('message.homepage') !!}</a></li>
                        <li class="breadcrumb-item">{{$data->getTitle() ?? ''}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bota_info_detals_page">
    <div class="container">
        <div class="bota_info_detals_descn">
            {!! $data->getDescription() ?? '' !!}
        </div>
    </div>
</div>
@endsection
