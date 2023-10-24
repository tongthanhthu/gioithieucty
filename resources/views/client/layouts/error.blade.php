@extends('client.layouts.app')
@section('title')
    {!! __('message.homepage') !!}
@endsection
@section('meta')

    <meta name="description" content="{{ $seoContent->description ?? 'Bình Minh TPC' }}">
    <meta name="keywords" content="{{ $seoContent->keywords ?? 'Bình Minh TPC' }}">
    <meta property="name" content="{{ $seoContent->property_name ?? 'Bình Minh TPC' }}">
    <meta property="description" content="{{ $seoContent->property_description ?? 'Bình Minh TPC' }}">
    <meta property="og:title" content="{{ $seoContent->property_og_title ?? 'Bình Minh TPC' }}">
    <meta property="og:description" content="{{ $seoContent->property_og_description ?? 'Bình Minh TPC' }}">
@stop

@section('content')
    <section class="bota_page_404">
        @php
            $error = \App\Models\About404::first();
        @endphp
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-404 text-center">
                        {!! ($error) ? $error->getDescription() : '' !!}
                        <a href="{{ route('index') }}" class="btn btn-main">{!! __('message.homepage') !!}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
