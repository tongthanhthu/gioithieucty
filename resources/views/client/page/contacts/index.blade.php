@extends('client.layouts.app')
@section('title')
    {!! __('message.contact') !!}
@endsection

@section('meta')
    @php
        $seoContent = \App\Models\Seocontent::where('position', 5)->first();
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
                    <h1>{!! __('message.contact') !!}</h1>
                </div>
                <div class="bota_breadcrumbs">
                    <div class="bota_color_breadcumb"></div>
                    <div id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('index') }}" title="Trang chủ">{!! __('message.homepage') !!}</a>
                            </li>
                            <li class="breadcrumb-item">{!! __('message.contact') !!}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bota_contact_page">
        <div class="bota_contact_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-sm-6 col-12">
                        <div class="bota_contact_info_item">
                            <div class="bota_contact_info_box">
                                <div class="icon">
                                    <img src="{{ asset('statics/imgs/planning.webp') }}" alt="icon" width="64" height="64"/>
                                </div>
                                <div class="bota_contact_content">
                                    <div class="bota_contact_label">
                                        {!! __('message.introduce') !!}
                                    </div>
                                    <div class="bota_contact_info">
                                        {{$data ? $data->getAbout() : ''}}
                                    </div>
                                </div>
                                <div class="bota_contact_btn">
                                    <div class="bota_contact_mask"></div>
                                    <a class="btn-contact" href="{{ (app()->getLocale() == 'vi') ? route('gioithieu.index') : route('introduce.index') }}" target="_blank">
                                        <span class="text">
                                            {!! __('message.contact') !!}
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-sm-6 col-12">
                        <div class="bota_contact_info_item">
                            <div class="bota_contact_info_box">
                                <div class="icon">
                                    <img src="{{ asset('statics/imgs/contact.webp') }}" alt="icon" width="64" height="64"/>
                                </div>
                                <div class="bota_contact_content">
                                    <div class="bota_contact_label">
                                        {!! __('message.contact') !!}
                                    </div>
                                    <ul class="bota_contact_info">
                                        <li class="item"> {{$data ? $data->getTimework() : ''}}</li>
                                        <li class="item"><a href="mailto:{{$data ? $data->email : ''}}">
                                                {{$data ? $data->email : ''}}</a></li>
                                        <li class="item"><a
                                                    href="tel:{{$data ? $data->phone : ''}}"> {{$data ? $data->phone : ''}}</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="bota_contact_btn">
                                    <div class="bota_contact_mask"></div>
                                    <a class="btn-contact" href="{{ (app()->getLocale() == 'vi') ? route('lienhe.index') : route('contacts.index') }}" target="_blank">
                                        <span class="text">
                                            {!! __('message.contact') !!}
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-sm-6 col-12">
                        <div class="bota_contact_info_item">
                            <div class="bota_contact_info_box">
                                <div class="icon">
                                    <img src="{{ asset('statics/imgs/map.webp') }}" alt="icon" width="64" height="64"/>
                                </div>
                                <div class="bota_contact_content">
                                    <div class="bota_contact_label">
                                        {!! __('message.address') !!}
                                    </div>
                                    <div class="bota_contact_info">
                                        {!! $data ? $data->getAddress() : '' !!}
                                    </div>
                                </div>
                                <div class="bota_contact_btn">
                                    <div class="bota_contact_mask"></div>
                                    <a class="btn-contact" href="https://maps.app.goo.gl/Gzy5s16hQWiq7hbr8"
                                       target="_blank">
                                        <span class="text">
                                            {!! __('message.contact') !!}
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bota_contact_with">
            <div class="container">
                <div class="bota_contact_title">
                    <h3>{!! __('message.contact_us') !!}</h3>
                    <h2>{!! __('message.contact_content') !!}</h2>
                </div>
                <div class="bota_contact_with_form">
                    @if(Session::has('msgSendMail'))
                        <div class="alert alert-success" role="alert">{{Session::get('msgSendMail')}}</div>
                    @endif
                    <form class="contact_form" action="{{ (app()->getLocale() == 'vi') ? route('lienhe.sendMail') : route('contacts.sendMail') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="username" placeholder="{!! __('message.fullname') !!}"/>
                                @error('username')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                                       class="form-control" name="email"
                                       placeholder="{!! __('message.email') !!}"/>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" cols="40" id="comment" rows="10"
                                      placeholder="{!! __('message.content') !!}" name="content"></textarea>
                            @error('content')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="button_contact">
                            <span>{!! __('message.send_info') !!}</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="bota_contact_map">
            <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4459.293388975575!2d105.76218169274846!3d21.079582171986793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134553ebcad76bd%3A0x3821829037f2f742!2sBINHMINH%20TMC%20CO.%2CLTD!5e0!3m2!1svi!2s!4v1695453737175!5m2!1svi!2s"
                    width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
@endsection
