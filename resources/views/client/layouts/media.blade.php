<div class="bota_side_nav d-xl-none d-lg-none d-sm-none">
    @php
        $mediaView = \App\Models\Media::query()->first();
        $contactView = \App\Models\Contacts::query()->first();
    @endphp
    <ul>
       <li>
            <a href="{{ $mediaView->link_ggmap ?? '' }}" title="{!! __('message.direct') !!}" rel="nofollow" target="_blank">
                <img src="{{ asset('statics/imgs/map-fixed.webp')}}" alt="{!! __('message.direct') !!}" width="25" height="25">{!! __('message.direct') !!}
            </a>
        </li>
       <li>
            <a href="https://zalo.me/{{ $contactView->phone ?? '' }}" title="{!! __('message.chat_zalo') !!}" rel="nofollow" target="_blank">
                <img src="{{ asset('statics/imgs/zalo.webp')}}" alt="{!! __('message.chat_zalo') !!}" width="25" height="25">{!! __('message.chat_zalo') !!}
            </a>
        </li>
       <li>
            <a href="tel:{{ $contactView->phone ?? '' }}" title="{!! __('message.media_call') !!}" rel="nofollow" target="_blank">
                <img src="{{ asset('statics/imgs/telephone.webp')}}" alt="{!! __('message.media_call') !!}" width="25" height="25">{!! __('message.media_call') !!}
            </a>
        </li>
        <li>
            <a href="{{ $mediaView->link_messenger ?? '' }}" title="{!! __('message.messenger') !!}" rel="nofollow" target="_blank">
                <img src="{{ asset('statics/imgs/messenger.webp')}}" alt="{!! __('message.messenger') !!}" width="25" height="25">{!! __('message.messenger') !!}
            </a>
        </li>
        <li>
            <a href="sms:{{ $contactView->phone ?? '' }}" title="{!! __('message.sms_messages') !!}" rel="nofollow" target="_blank">
                <img src="{{ asset('statics/imgs/sms.webp')}}" alt="{!! __('message.sms_messages') !!}" width="25" height="25">{!! __('message.sms_messages') !!}
            </a>
        </li>
        <li>
            <a href="{{ $mediaView->link_facebook ?? '' }}" title="{!! __('message.view_fanpage') !!}" rel="nofollow" target="_blank">
                <img src="{{ asset('statics/imgs/fb.webp')}}" alt="{!! __('message.view_fanpage') !!}" width="25" height="25">{!! __('message.view_fanpage') !!}
            </a>
        </li>
    </ul>
</div>