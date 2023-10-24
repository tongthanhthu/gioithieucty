<!DOCTYPE html>
@php
    $icon = \App\Models\Logo::query()->where('status', true)->first();
    $logoSeo = \App\Models\Logo::query()->where('status', STATUS_VALUE_ACTIVE)->first();
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            @yield('title')
        </title>
        
        <meta name="robots" content="index,follow" />

        <link rel="shortcut icon" href="{{ $icon ? asset('storage/'. $icon->icon) : '#' }}" />
        <link rel="icon" href="{{ $icon ? asset('storage/'. $icon->icon) : '#' }}" type="image/x-icon" />
        <meta name="theme-color" content="#f00401" />
        <link rel="canonical" href="{{ request()->url() }}" />
        <link rel="apple-touch-icon" href="{{ $icon ? asset('storage/'. $icon->icon) : '#' }}" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="@binhminhtmc" />
        <meta name="twitter:creator" content="@binhminhtmc" />
        <meta property="og:type" content="website">
        @yield('meta')

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="{{ asset('statics/plugins/fancybox/jquery.fancybox.min.css') }}" />
        <link href="{{ asset('statics/css/style.css')}}" type="text/css" rel="stylesheet" media="screen" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <script type="text/javascript" src="{{ asset('statics/scripts/jquery.min.js') }}"></script>
        <script src="{{ asset('statics/scripts/iconify-icon.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                $("#menu").mmenu({
                   "extensions": [
                      "pagedim-black",
                      "theme-dark"
                   ]
                });
            });
            
            $('box-arlert').not('.alert-important').delay(5000).fadeOut(350);
        </script>
    </head>
    <body data-aos-easing="ease" data-aos-duration="1000" data-aos-delay="0">
        <div class="main_page">
            @include('client.layouts.header')
            
            @yield('content')
            
            @include('client.layouts.footer')
            <a href="#" class="back-to-top"><i class="fas fa-angle-up"></i></a>
            @include('client.layouts.media')
        </div>
        @include('client.layouts.nav')
        <script type="text/javascript" src="{{ asset('statics/plugins/bootstrap-4.4.1-dist/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('statics/plugins/swiper-4.5.0/dist/js/swiper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('statics/plugins/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('statics/plugins/isotope/isotope.pkgd.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('statics/plugins/mmenu/jquery.mmenu.all.js') }}"></script>
        <script type="text/javascript" src="{{ asset('statics/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('statics/plugins/slick/slick.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('statics/scripts/waypoints.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('statics/scripts/jquery.counterup.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('statics/scripts/aos.js') }}"></script>
        <script type="text/javascript" src="{{ asset('statics/scripts/js_custom.js') }}"></script>
    </body>
</html>