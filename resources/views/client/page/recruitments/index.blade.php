@extends('client.layouts.app')
@section('title')
    {!! __('message.recruitment') !!}
@endsection

@section('meta')
    @php
        $seoContent = \App\Models\Seocontent::where('position', 4)->first();
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
    <div class="bota_breadcrumb_bg" style="background-image:  url({{ asset('statics/imgs/bg-product.webp') }});">
        <div class="bota_breadcrumb_banner">
            <div class="bota_breadcrumb_banner_el">
                <div class="bota_breadcrumb_title">
                    @if(request()->input('slug'))
                        @php
                        $jobCate = \App\Models\JobCategory::query()
                                                          ->where('slug_vi', request()->input('slug'))
                                                          ->orWhere('slug_en', request()->input('slug'))
                                                          ->orWhere('slug_jp', request()->input('slug'))
                                                          ->orWhere('slug_kr', request()->input('slug'))
                                                          ->first();
                        @endphp
                        <h1>{{ $jobCate->getTitle() }}</h1>
                    @else
                        <h1>{!! __('message.recruitment') !!}</h1>
                    @endif
                </div>
                <div class="bota_breadcrumbs">
                    <div class="bota_color_breadcumb"></div>
                    <div id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}" title="{!! __('message.homepage') !!}">{!! __('message.homepage') !!}</a></li>
                            @if(request()->input('slug'))
                                <li class="breadcrumb-item">{{ $jobCate->getTitle() }}</li>
                            @else
                                <li class="breadcrumb-item">{!! __('message.recruitment') !!}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bota_recruits_page">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-sm-12">
                    <div class="bota_recruits_list">
                        {{--danh sách--}}
                        @php
                            $recruitmentsDetail = (app()->getLocale() == 'vi') ? 'tuyendung.detail' : 'recruitments.detail';
                        @endphp
                        @foreach($recruitments as $recruitment)
                            <div class="bota_job_item">
                                <div class="bota_job_figure">
                                    <div class="bota_job_image">
                                        @if (isset($logo))
                                            <a href="{{ route($recruitmentsDetail, ['slug' => $recruitment->getSlug()]) }}" title="Binh Minh TMC">
                                                <img class="img-fluid" src="{{ asset('storage/'. $logo['image']) }}" alt="Binh Minh TMC">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="bota_job_figcaption">
                                        <div class="bota_job_title">
                                            <h2>
                                                <a class="bota_job_link" href="{{ route($recruitmentsDetail, ['slug' => $recruitment->getSlug()]) }}" title="{{ $recruitment->getName() }}">
                                                    {{ $recruitment->getName() }}
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="bota_job_caption">
                                            <a class="bota_job_company_name" href="{{ route($recruitmentsDetail, ['slug' => $recruitment->getSlug()]) }}" title="Binh Minh TMC">Binh Minh TMC</a>
                                            <a class="bota_job_link" href="{{ route($recruitmentsDetail, ['slug' => $recruitment->getSlug()]) }}" title="{{ $recruitment->getName() }}">
                                                <div class="salary">
                                                    <p><em class="fas fa-dollar-sign"></em>{!! __('message.wage') !!} {{ $recruitment->getWage() }}</p>
                                                </div>
                                                <div class="location">
                                                    <em class="fas fa-map-marker-alt"></em>
                                                    <ul>
                                                        <li>{{ $recruitment->getLocation() }}</li>
                                                    </ul>
                                                </div>
                                                <div class="expire-date">
                                                    <p><em class="far fa-clock"></em>{!! __('message.dealine') !!} {{ $recruitment->getDeadline() }}</p>
                                                </div>
                                                @if($recruitment['benefits'])
                                                    <ul class="welfare">
                                                        @foreach($recruitment['benefits'] as $benefit)
                                                            <li><span>{!! $benefit['path'] !!}</span> {{ $benefit->getDesc() }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="bota_pagination">
                        <ul class="pagination">
                            {{ $recruitments->links() }}
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-12">
                    <div class="bota_block_recruits_cate">
                        <h3 class="bota_block_recruits_title">
                            {!! __('message.recruitment_by_position') !!}
                        </h3>
                        <ul class="bota_block_recruits_list">
                            <li>
                                <a href="{{(app()->getLocale() == 'vi') ? route('tuyendung.index') : route('recruitments.index') }}" title="">
                                    {!! __('message.all') !!}
                                </a>
                            </li>
                            @foreach($positions as $position)
                                <li>
                                    <a href="{{ (app()->getLocale() == 'vi') ? route('tuyendung.index', ['slug' => $position->getSlug() ]) : route('recruitments.index', ['slug' => $position->getSlug() ]) }}" title="{{ $position->getTitle() }}">
                                        {{ $position->getTitle() }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @include('client.page.news.block')
                </div>
            </div>
        </div>
    </div>
@endsection
