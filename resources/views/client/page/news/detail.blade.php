@extends('client.layouts.app')
@section('title')
    {!! __('message.news') !!}
@endsection

@section('meta')
    @php
        $seoContent = \App\Models\Seocontent::where('position', 3)->first();
        $contactSeo = \App\Models\Contacts::query()->first();
        $data = \App\Models\CommentFb::query()->first();
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
    <meta property="og:image" content="{{ ($new->image) ? asset('storage/'. $new->image) : '#' }}" />
    <meta property="og:image:secure_url" content="{{ ($new->image) ? asset('storage/'. $new->image) : '#' }}" />
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
                            <li class="breadcrumb-item"><a href="{{ route('index') }}" title="Trang chủ">{!! __('message.homepage') !!}</a></li>
                            <li class="breadcrumb-item">{!! __('message.news') !!}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bota_news_details_page">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-sm-12">
                    <article class="bota_news_post_thumbnail">
                        @php
                            $newIndex = (app()->getLocale() == 'vi') ? 'tintuc.index' : 'news.index';
                        @endphp
                        <div class="bota_news_post_media">
                            <img width="770" height="514" src="{{ is_null($new->image) ? asset('image/default.webp') : asset('storage/'. $new->image) }}" class="img-fluid" alt="{{ $new->getTitle() }}" />			
                        </div>
                        <ul class="bota_news_post_meta">
                            <li class="date">
                                <i class="fal fa-calendar-alt"></i>{{ $new->updated_at->format('d/m/Y') }}	 		
                            </li>
                            <li class="category">
                                <i class="fal fa-folder"></i>
                                <a href="{{ route($newIndex) }}">{!! __('message.news') !!}</a>
                            </li>
                            <li class="bota_news_post_author">
                            <i class="fal fa-user"></i>
                            <a href="{{ route($newIndex) }}" title="Binh Minh">
                                {{ $new->author }} 	 			
                            </a>
                            </li>
                        </ul>
                    </article>
                    <h1 class="bota_news_details_title">
                        {{ $new->getTitle() }}
                    </h1>
                    <div class="bota_news_details_content">
                        {!! $new->getDescription() !!}
                    </div>
                    <div class="bota_tags_and_share">
                        @php
                            $keyNew = 'tag_'.app()->getLocale();
                            $tagArrayNew = [];
                            if (strpos($new->$keyNew, ',') !== false) {
                                foreach (explode(",", $new->$keyNew) as $item) {
                                    if(!in_array($item, $tagArrayNew)) $tagArrayNew[]= $item;
                                }
                            } else {
                                if(!in_array($new->$keyNew, $tagArrayNew)) $tagArrayNew[]= $new->$keyNew;
                            }
                        @endphp
                        <div class="bota_news_tags">
                        @if($new->getTag())
                            <span class="bota_news_tags_title">{!! __('message.tags') !!}</span> 
                            @foreach ($tagArrayNew as $tag)
                                <a href="{{ (app()->getLocale() == 'vi') ? route('tintuc.index', ['tag' => $tag]) : route('news.index', ['slug' => $tag]) }}" rel="tag">{{ $tag }}</a>    
                            @endforeach
                        @endif
                        <div class="clearfix"></div>
                        </div>
                        @php
                            $share = url()->current();
                        @endphp
                        <ul class="bota_share_social clearfix">
                        <li>
                            <a class="share-ico ico-twitter" target="_blank" href="https://twitter.com/share?url={{$share}}&amp;text={{ $new->getTitle() }}&amp;hashtags=simplesharebuttons" title="{{ $new->getTitle() }}">
                            <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a class="share-ico ico-facebook" target="_blank" href="https://www.facebook.com/sharer.php?u={{$share}}" title="{{ $new->getTitle() }}">
                            <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a class="share-ico ico-pinterest" target="_blank" href="https://pinterest.com/pin/create/button/?url={{$share}}" title="{{ $new->getTitle() }}">
                            <i class="fab fa-pinterest-p"></i>
                            </a>
                        </li>
                        </ul>
                    </div>
                    <div class="bota_news_comment" id="respond">
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0&appId={{ $data ? $data->id_fb : ''}}&autoLogAppEvents=1" nonce="KHjMSH0D"></script>
                        <div class="fb-comments" data-href="{{$share}}" data-width="100%" data-numposts="5"></div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-12">
                    @include('client.page.news.block')
                </div>
            </div>
        </div>
    </div>
@endsection
