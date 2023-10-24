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
                <h1>{!! __('message.introduce') !!}</h1>
            </div>
            <div class="bota_breadcrumbs">
                <div class="bota_color_breadcumb"></div>
                <div id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}" title="{!! __('message.homepage') !!}">{!! __('message.homepage') !!}</a></li>
                        <li class="breadcrumb-item">{!! __('message.introduce') !!}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bota_info_page">
    <div class="bota_info_top">
        <div class="container">
            <h2 class="bota_info_detail_title" data-aos="fade-up">{!! __('message.general_introduction') !!}</h2>
            <div class="row flex-row-reverse">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" data-aos="fade-left">
                    <div class="bota_info_detail_img">
                        <img src="{{ asset('storage/'. $introduce->image) }}" alt="{!! __('message.general_introduction') !!}" class="img-fluid" />
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" data-aos="fade-up">
                    <div class="bota_info_detail_content">
                        <div class="bota_info_detail_desc">
                            @if($introduce)
                                {!! $introduce->getDescription() !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <div class="bota_info_top">
        <div class="container">
            <h2 class="bota_info_detail_title" data-aos="fade-up">{!! __('message.organizational_chart') !!}</h2>
            <div class="bota_info_detail_img" data-aos="fade-up">
                @if($introduce)
                    {!! $introduce->getCompanyDiagram() !!}
                @endif
            </div>
        </div>
    </div>
    <div class="bota_info_top bota_info_operator">
        <div class="container">
            <h2 class="bota_info_detail_title" data-aos="fade-up">{!! __('message.founder_and_executive') !!}</h2>
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12" data-aos="fade-right">
                    <div class="bota_info_detail_img">
                        <img src="{{!is_null($ceo) ? asset('storage/'. $ceo->image) : ''}}" alt="{{ !is_null($ceo) ? $ceo->getName() : ''}}" class="img-fluid"/>
                        <div class="bota_info_detail_name">
                            {{ !is_null($ceo) ? $ceo->getName() : ''}} 
                        </div>
                        <div class="bota_info_detail_position">
                            {{ !is_null($ceo) ? $ceo->getPosition() : ''}} 
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12" data-aos="fade-up">
                    <div class="bota_info_detail_content">
                        <div class="bota_info_detail_desc">
                            {!! !is_null($ceo) ? $ceo->getDescription() : '' !!} 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bota_info_core">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-6 margin-bottom-30">
                    <div class="bota_info_core_item" data-aos="fade-up">
                        <div class="bota_info_core_item_img">
                            <img src="statics/imgs/mission.webp" alt="{!! __('message.mission') !!}" class="img-fluid" width="50" height="50" />
                        </div>
                        <div class="bota_info_core_item_content">
                            <h3 class="bota_info_core_item_title">{!! __('message.mission') !!}</h3>
                            <div class="bota_info_core_item_desc">
                                {{ !is_null($introduce) ? $introduce->getMission() : ''}} 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6 margin-bottom-30">
                    <div class="bota_info_core_item" data-aos="fade-up">
                        <div class="bota_info_core_item_img">
                            <img src="statics/imgs/vision.webp" alt="{!! __('message.vision') !!}" class="img-fluid" width="50" height="50" />
                        </div>
                        <div class="bota_info_core_item_content">
                            <h3 class="bota_info_core_item_title">{!! __('message.vision') !!}</h3>
                            <div class="bota_info_core_item_desc">
                                  {{ !is_null($introduce) ? $introduce->getVision() : ''}} 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6 margin-bottom-30">
                    <div class="bota_info_core_item" data-aos="fade-up">
                        <div class="bota_info_core_item_img">
                            <img src="statics/imgs/value.webp" alt="{!! __('message.core_value') !!}" class="img-fluid" width="50" height="50" />
                        </div>
                        <div class="bota_info_core_item_content">
                            <h3 class="bota_info_core_item_title">{!! __('message.core_value') !!}</h3>
                            <div class="bota_info_core_item_desc">
                                 {{ !is_null($introduce) ? $introduce->getCoreValue() : ''}} 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6 margin-bottom-30">
                    <div class="bota_info_core_item" data-aos="fade-up">
                        <div class="bota_info_core_item_img">
                            <img src="statics/imgs/philosophy.webp" alt="{!! __('message.business_philosophy') !!}" class="img-fluid" width="50" height="50" />
                        </div>
                        <div class="bota_info_core_item_content">
                            <h3 class="bota_info_core_item_title">{!! __('message.business_philosophy') !!}</h3>
                            <div class="bota_info_core_item_desc">
                                {{ !is_null($introduce) ? $introduce->getBusinessPhilosophy() : ''}} 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bota_info_history" style="background-image: url(statics/imgs/bg-history.webp);">
        <div class="container">
            <h2 class="bota_history_title" data-aos="fade-up">{!! __('message.history_of_formation_and_development') !!}</h2>
            <div class="bota_history_body" data-aos="fade-up">
                <div class="history_slider_date">
                    @foreach ($histories as $history)
                        <div class="history_slider_date_item">
                            <p>{{date("m-Y", strtotime($history->formation_time)) }}</p>
                        </div>
                    @endforeach
                 </div>
                 <div class="history_slider">
                    @foreach ($histories as $history)
                        <div class="history_slider_item">
                            <div class="content">
                                <div class="history_slider_image">
                                    <img src="{{ asset('storage/'. $history->image) }}" alt="{{ $history->getTitle() }}">
                                </div>
                                <div class="history_slider_content">
                                    <span class="date"> {{date("m-Y", strtotime($history->formation_time)) }} </span>
                                    <h3 class="history_slider_title">{{ $history->getTitle() }}</h3>
                                    <div class="description">
                                        <p>{!! $history->getDescription() !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
