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
    <div class="bota_breadcrumb_bg" style="background-image: url({{ asset('statics/imgs/bg-product.webp')}});">
        <div class="bota_breadcrumb_banner">
            <div class="bota_breadcrumb_banner_el">
                <div class="bota_breadcrumb_title">
                    <h1>{!! __('message.recruitment') !!}</h1>
                </div>
                <div class="bota_breadcrumbs">
                    <div class="bota_color_breadcumb"></div>
                    <div id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}" title="Trang chủ">{!! __('message.homepage') !!}</a></li>
                            <li class="breadcrumb-item">{!! __('message.recruitment') !!}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bota_job_page">
        <div class="bota_job_page_top">
            <div class="container">
                <div class="bota_job_page_top_is">
                    <div class="bota_job_page_top_left">
                        @if(isset($logo))
                            <img src="{{asset('storage/'. $logo['image'])}}" width="135" height="116" alt="" class="img-fluid" />
                        @endif
                    </div>
                    <div class="bota_job_page_top_center">
                        <h2>{{ $recruitment->getName() }}</h2>
                        <div class="bota_job_page_top_company">{{ $company->getCompanyName() }}</div>
                        <div class="bota_job_page_top_address">{{ $recruitment->getLocation() }}</div>
                    </div>
                    <div class="bota_job_page_top_right">
                        <div class="bota_job_page_top_btn" data-toggle="modal" data-target="#poup_ung_tuyen">
                            <span>{!! __('message.apply_now') !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(Session::has('msg'))
            <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
        @endif
        <div class="bota_job_page_center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 co-sm-8">
                        <div class="bota_job_info_recruit">
                            <div class="bota_job_info_recruit_top">
                                <div class="bota_job_info_recruit_name">{!! __('message.recruit_info') !!}</div>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                        <div class="bota_job_info_recruit_it">
                                                    <span>
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        {!! __('message.address') !!} :
                                                    </span> {{ $recruitment->getLocation() }}
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                        <div class="bota_job_info_recruit_it">
                                                    <span>
                                                        <i class="fa fa-briefcase"></i>
                                                        {!! __('message.exp') !!}
                                                    </span> {{ $recruitment->getExp() }}
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                        <div class="bota_job_info_recruit_it">
                                                    <span>
                                                        <i class="fas fa-dollar-sign"></i>
                                                        {!! __('message.wage') !!}
                                                    </span> {{ $recruitment->getWage() }}
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                        <div class="bota_job_info_recruit_it">
                                                    <span>
                                                        <i class="fa fa-briefcase"></i>
                                                        {!! __('message.recruitment_form') !!}
                                                    </span> {{ $recruitment->getForm() }}
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                        <div class="bota_job_info_recruit_it">
                                                    <span>
                                                        <i class="far fa-calendar-check"></i>
                                                        {!! __('message.dealine') !!}
                                                    </span> {{ $recruitment->getDeadline() }}
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                        <div class="bota_job_info_recruit_it">
                                                    <span>
                                                        <i class="fas fa-user"></i>
                                                        {!! __('message.rank') !!}
                                                    </span> {{ $recruitment->getRank() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bota_job_info_recruit_top">
                                @if(count($recruitment['benefits']) > 0)
                                <div class="bota_job_info_recruit_name">{!! __('message.welfare') !!}</div>
                                <div class="row">
                                    @foreach($recruitment['benefits'] as $benefit)
                                        <div class="col-xl-4 col-lg-6 col-sm-6">
                                            <div class="bota_job_info_recruit_it">
                                                {!! $benefit['path'] !!}{{ $benefit->getDesc() }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            <div class="bota_job_info_recruit_center">
                                <h2>{!! __('message.job_description') !!}</h2>
                                {!! $recruitment->getDescription() !!}
                            </div>
                            <div class="bota_job_info_recruit_center">
                                <h2>{!! __('message.job_requirements') !!}</h2>
                                {!! $recruitment->getRequest() !!}
                                <p><strong>{!! __('message.right') !!}</strong></p>
                                {!! $recruitment->getRight() !!}
                            </div>
                            <div class="bota_job_info_recruit_center">
                                <h2>{!! __('message.other_information') !!}</h2>
                                {!! $recruitment->getOther() !!}
                            </div>
                            <div class="bota_details_career_share">
                                <span>{!! __('message.share_this_job') !!}</span>
                                @php
                                    $share = url()->current();
                                @endphp
                                <a target="_blank" href="http://www.facebook.com/sharer.php?u={{$share}}"> 
                                    <i class="fab fa-facebook-f"></i> 
                                </a>
                                <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{$share}}"> 
                                    <i class="fab fa-linkedin"></i> 
                                </a>
                                <a target="_blank" href="https://twitter.com/share?url={{$share}}&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons"> 
                                    <i class="fab fa-twitter"></i> 
                                </a>
                                <div class="zalo-share-button" data-href="{{$share}}" data-oaid="579745863508352884" data-layout="2" data-color="white" data-customize=false></div>
                            </div>
                            <div class="bota_job_page_recruit_btn" data-toggle="modal" data-target="#poup_ung_tuyen">
                                <span>{!! __('message.apply_now') !!}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 co-sm-4">
                        <div class="bota_job_info_employer">
                            <div class="bota_job_info_employer_title">{!! __('message.company_information') !!}</div>
                            <div class="bota_job_empoyer_img">
                                @if ($logo)
                                    <img src="{{asset('storage/'. $logo['image'])}}" width="177" height="75" class="img-fluid" alt="binhminhpc" />
                                @endif
                            </div>
                            <div class="bota_job_empoyer_company">{{ $company ? $company->getCompanyName() : 'Binh Minh TPC' }}</div>
                           <div class="bota_job_empoyer_reviews">
                               <i class="fa fa-star" aria-hidden="true"></i>
                               <i class="fa fa-star" aria-hidden="true"></i>
                               <i class="fa fa-star" aria-hidden="true"></i>
                               <i class="fa fa-star" aria-hidden="true"></i>
                               <i class="fa fa-star" aria-hidden="true"></i>
                           </div>
                            <ul>
                                <li>
                                    <svg width="13" height="19" viewBox="0 0 13 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.2764 0.930496C5.30336 -0.212052 7.79483 -0.192078 9.80277 0.982803C11.791 2.18162 12.9994 4.32117 12.9881 6.6227C12.9418 8.90915 11.6461 11.0584 10.0264 12.7199C9.09162 13.6832 8.04586 14.5349 6.91053 15.2578C6.7936 15.3234 6.66552 15.3673 6.53261 15.3874C6.40469 15.3821 6.28011 15.3454 6.17012 15.2807C4.43681 14.1945 2.91617 12.808 1.68136 11.188C0.648103 9.83563 0.0610779 8.20181 1.07778e-06 6.50838C-0.00134027 4.20242 1.24944 2.07304 3.2764 0.930496ZM4.45155 7.46287C4.79251 8.27832 5.59732 8.81023 6.49019 8.81023C7.07512 8.8143 7.6374 8.58701 8.05175 8.179C8.4661 7.77098 8.69808 7.21614 8.696 6.63811C8.69912 5.7558 8.16368 4.95865 7.33967 4.61887C6.51567 4.27908 5.56565 4.46368 4.93319 5.08649C4.30073 5.70927 4.11059 6.64741 4.45155 7.46287Z" fill="#B5BFC3"></path>
                                        <ellipse opacity="0.4" cx="6.49096" cy="17.1876" rx="4.63866" ry="0.9" fill="#B5BFC3"></ellipse>
                                    </svg>
                                    <span>{{ $contact ? $contact->getAddress() : '' }}</span>
                                </li>
                                <li>
                                    <svg width="22" height="19" viewBox="0 0 22 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M21.5129 13.028C21.5129 15.818 19.1116 18.078 16.1206 18.088H16.1098H5.48585C2.50557 18.088 0.0720215 15.838 0.0720215 13.048V13.038C0.0720215 13.038 0.0784538 8.61201 0.0870301 6.38601C0.0881022 5.96801 0.602684 5.73401 0.953243 5.99401C3.50042 7.87901 8.05555 11.316 8.11237 11.361C8.87352 11.93 9.83836 12.251 10.8246 12.251C11.8109 12.251 12.7758 11.93 13.5369 11.35C13.5937 11.315 18.047 7.98101 20.6328 6.06501C20.9844 5.80401 21.5012 6.03801 21.5022 6.45501C21.5129 8.66401 21.5129 13.028 21.5129 13.028Z" fill="#B5BFC3"></path>
                                        <path d="M20.9479 2.7614C20.0195 1.1294 18.1928 0.0874023 16.1816 0.0874023H5.48258C3.47142 0.0874023 1.64465 1.1294 0.716259 2.7614C0.508283 3.1264 0.606911 3.5814 0.953182 3.8394L8.91312 9.7784C9.47059 10.1984 10.146 10.4074 10.8214 10.4074C10.8257 10.4074 10.8289 10.4074 10.8321 10.4074C10.8353 10.4074 10.8396 10.4074 10.8428 10.4074C11.5182 10.4074 12.1936 10.1984 12.751 9.7784L20.711 3.8394C21.0573 3.5814 21.1559 3.1264 20.9479 2.7614Z" fill="#B5BFC3"></path>
                                    </svg>
                                    <span>{!! __('message.email') !!}:: {{ $contact ? $contact->email : '' }}</span>
                                </li>
                                <li>
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M11.9817 3.22823C11.5223 3.14909 11.1005 3.4225 11.0131 3.84071C10.9256 4.25893 11.2197 4.66725 11.6665 4.74909C13.0117 4.99372 14.0504 5.96506 14.3137 7.22419V7.22509C14.3887 7.58754 14.7307 7.85106 15.1247 7.85106C15.1776 7.85106 15.2304 7.84656 15.2842 7.83757C15.731 7.75393 16.0251 7.34651 15.9376 6.92739C15.5446 5.04679 13.9928 3.59428 11.9817 3.22823Z" fill="#B5BFC3"></path>
                                        <path opacity="0.4" d="M11.9252 0.0945391C11.71 0.0657589 11.4938 0.125118 11.3218 0.25283C11.145 0.382341 11.0345 0.569413 11.0105 0.778969C10.9595 1.20258 11.2872 1.58572 11.7407 1.63338C14.8684 1.95896 17.2995 4.2317 17.6512 7.15829C17.6982 7.55042 18.0509 7.84632 18.4718 7.84632C18.5035 7.84632 18.5342 7.84452 18.5659 7.84092C18.786 7.81843 18.982 7.7168 19.1204 7.55492C19.2578 7.39303 19.3202 7.19157 19.2952 6.98561C18.8571 3.33411 15.8274 0.500161 11.9252 0.0945391Z" fill="#B5BFC3"></path>
                                        <path d="M15.056 11.4937C14.4305 11.3696 13.9356 11.6394 13.4975 11.875C13.0487 12.1178 12.1945 12.7609 11.7064 12.5954C9.20231 11.6385 6.84718 9.60137 5.82768 7.26657C5.64799 6.80159 6.33695 6.00384 6.59543 5.58293C6.84814 5.17461 7.13256 4.70963 7.00284 4.12503C6.88562 3.59889 5.36934 1.80642 4.83316 1.31626C4.47859 0.992479 4.1173 0.814401 3.74544 0.784721C2.34735 0.729859 0.785904 2.46297 0.512051 2.87758C-0.174983 3.76168 -0.170179 4.93807 0.523582 6.36449C2.19553 10.1959 8.51912 15.978 12.6586 17.5897C13.4216 17.9216 14.1211 18.0879 14.7486 18.0879C15.3626 18.0879 15.9093 17.9287 16.3792 17.6131C16.7328 17.4233 18.6757 15.9006 18.6238 14.5669C18.594 14.2269 18.4028 13.8869 18.0588 13.5577C17.5342 13.055 15.6182 11.6043 15.056 11.4937Z" fill="#B5BFC3"></path>
                                    </svg>
                                    <span>
                                        <p>
                                            {!! __('message.support') !!}: {{ $contact ? $contact->phone : '' }}
                                        </p>
                                    </span>
                                </li>
                            </ul>
                            <div class="bota_job_empoyer_des">
                                <div class="bota_job_empoyer_text">
                                    {!! $company->getDescription() !!}
                                </div>
                                <div class="bota_job_empoyer_remore">
                                    <a title="Xem thêm về chúng tôi" role="button" class="read-more">{!! __('message.view_us') !!}<i class="fas fa-chevron-down"></i></a>
                                    <a role="button" class="read-less">{!! __('message.collapse') !!}<i class="fas fa-chevron-up"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal ứng tuyển ngay-->
        <div class="modal fade" id="poup_ung_tuyen" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('attributes.attributes.register_to_apply') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @php
                        $recruitmentsMail = (app()->getLocale() == 'vi') ? 'tuyendung.sendmail' : 'recruitments.sendmail';
                    @endphp
                    <form action="{{ route($recruitmentsMail) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label" for="textinput">{{ __('attributes.attributes.sender_name') }}</label>
                                <input id="name" name="name" type="text" placeholder="" class="form-control input-md" />
                            </div>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label class="control-label" for="textinput">{{ __('attributes.attributes.sender_phone') }}</label>
                                <input id="phone" name="phone" type="text" placeholder="" class="form-control input-md" />
                            </div>
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label class="control-label" for="textinput">{{ __('attributes.attributes.sender_title') }}</label>
                                <input id="title" name="title" type="text" placeholder="" class="form-control input-md">
                            </div>
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label class="control-label" for="textinput">{{ __('attributes.attributes.sender_email') }}</label>
                                <input id="email" name="email" type="text" placeholder="" class="form-control input-md" />
                            </div>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label class="control-label" for="textinput">{{ __('attributes.attributes.sender_content') }}</label>
                                <textarea class="form-control" id="contents_description" name="contents_description"></textarea>
                            </div>
                            @error('contents_description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label class="control-label" for="textinput">{{ __('attributes.attributes.sender_file') }}</label>
                                <input id="file" name="file" class="input-file" type="file">
                            </div>
                            @error('file')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{ __('attributes.attributes.send_cv') }}</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('attributes.attributes.cancel') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
