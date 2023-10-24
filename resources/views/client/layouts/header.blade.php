<header class="bota_header">
    <div class="bota_header_top">
        <div class="container">
            @php
                $mediaView = \App\Models\Media::query()->first();
                $contactView = \App\Models\Contacts::query()->first();
                $logo = \App\Models\Logo::query()->where('status', STATUS_VALUE_ACTIVE)->first();
                $media = \App\Models\Media::query()->first();
                $contact = \App\Models\Contacts::query()->first();
                $locale = session()->get('locale');
                if($locale == null){
                    $locale = app()->getLocale();
                }
            @endphp
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-sm-6 col-12">
                    <div class="bota_header_left  d-none d-xl-block d-sm-none">
                        <ul>
                            <li>
                                <iconify-icon icon="basil:phone-in-outline" style="color: #fec83f;" width="20"
                                              height="20"></iconify-icon>
                                <a href="tel:{{ $contact->phone ?? ''}} ">
                                    {{ $contact->phone ?? '' }}
                                </a>
                            </li>
                            <li>
                                <iconify-icon icon="icon-park-twotone:mail-unpacking" style="color: #fec83f;" width="20"
                                              height="20"></iconify-icon>
                                <a href="mailto:{{ $contact->email ?? ''}}">
                                    {{ $contact->email ?? ''}}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="bota_header_language_mb d-xl-none d-lg-block d-sm-block">
                        <ul>
                            <li class="{{ $locale == 'vi' ? 'active' : ''}}">
                                <a href="{{ route('changeLang','vi') }}" data-lang="vi" class="flag_language"><img
                                            src="{{ asset('statics/imgs/vi.webp') }}" alt="Viet Nam"
                                            style="height: 20px; width: 30px;" class="img-fluid"></a>
                            </li>
                            <li class="{{ $locale == 'jp' ? 'active' : ''}}">
                                <a href="{{ route('changeLang','jp') }}" data-lang="jp" class="flag_language"><img
                                            src="{{ asset('statics/imgs/jp.webp') }}" alt="Japan"
                                            style="height: 20px; width: 30px;" class="img-fluid"></a>
                            </li>
                            <li class="{{ $locale == 'en' ? 'active' : ''}}">
                                <a href="{{ route('changeLang','en') }}" data-lang="en" class="flag_language"><img
                                            src="{{ asset('statics/imgs/en.webp') }}" alt="English"
                                            style="height: 20px; width: 30px;" class="img-fluid"></a>
                            </li>
                            <li class="{{ $locale == 'kr' ? 'active' : ''}}">
                                <a href="{{ route('changeLang','kr') }}" data-lang="kr" class="flag_language"><img
                                            src="{{ asset('statics/imgs/kr.webp') }}" alt="Korean"
                                            style="height: 20px; width: 30px;" class="img-fluid"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6 col-12">
                    <div class="bota_header_right">
                        <!-- Search -->
                        <div class="bota_search" id="bota_search">
                            <div id="search-box" class="bota_search_main">
                                <div class="search search-area">
                                    <div class="bota_search_border">
                                        <input type="search" class="search-field"
                                               placeholder="{!! __('message.search') !!}..." name="keyword"
                                               id="BNC_txt_search" value="">
                                    </div>
                                    <button class="BNC_btn_search_icon" id="BNC_btn_search">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                <div class="searchAutoComplete" id="searchAutoComplete">
                                    
                                </div>
                            </div>
                        </div>
                        <!-- End Search -->
                        <div class="bota_header_social_icons d-xl-block d-lg-block d-sm-block d-none">
                            <ul>
                                <li>
                                    <a href="{{ $mediaView->link_ggmap ?? '' }}" title="{!! __('message.direct') !!}"
                                       rel="nofollow" target="_blank">
                                        <img src="{{ asset('statics/imgs/map-fixed.webp')}}"
                                             alt="{!! __('message.direct') !!}" style="height: 25px; width: 25px;">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://zalo.me/{{ $contactView->phone ?? '' }}"
                                       title="{!! __('message.chat_zalo') !!}" rel="nofollow" target="_blank">
                                        <img src="{{ asset('statics/imgs/zalo.webp')}}"
                                             alt="{!! __('message.chat_zalo') !!}" style="height: 25px; width: 25px;">
                                    </a>
                                </li>
                                <li>
                                    <a href="tel:{{ $contactView->phone ?? '' }}"
                                       title="{!! __('message.media_call') !!}" rel="nofollow" target="_blank">
                                        <img src="{{ asset('statics/imgs/telephone.webp')}}"
                                             alt="{!! __('message.media_call') !!}" style="height: 25px; width: 25px;">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $mediaView->link_messenger ?? '' }}"
                                       title="{!! __('message.messenger') !!}" rel="nofollow" target="_blank">
                                        <img src="{{ asset('statics/imgs/messenger.webp')}}"
                                             alt="{!! __('message.messenger') !!}" style="height: 25px; width: 25px;">
                                    </a>
                                </li>
                                <li>
                                    <a href="sms:{{ $contactView->phone ?? '' }}"
                                       title="{!! __('message.sms_messages') !!}" rel="nofollow" target="_blank">
                                        <img src="{{ asset('statics/imgs/sms.webp')}}"
                                             alt="{!! __('message.sms_messages') !!}"
                                             style="height: 25px; width: 25px;">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $mediaView->link_facebook ?? '' }}"
                                       title="{!! __('message.view_fanpage') !!}" rel="nofollow" target="_blank">
                                        <img src="{{ asset('statics/imgs/fb.webp')}}"
                                             alt="{!! __('message.view_fanpage') !!}"
                                             style="height: 25px; width: 25px;">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bota_header_center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-3 col-sm-12">
                    <div class="bota_header_logo">
                        <div class="bota_menu_mobile d-xl-none d-lg-none">
                            <div class="menu_hamburger">
                                <a href="#menu" title="menu">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </div>
                        </div>
                        <a href="/" rel="nofollow" class="bota_logo" title="logo">
                            @if(isset($logo) && !empty($logo))
                                <img src="{{asset('storage/'. $logo->image)}}" alt="logo" width="252" height="54"
                                     lass="img-fluid">
                            @endif
                        </a>
                        <button type="button" class="bota_header_search_mb d-xl-none d-lg-none">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-sm-12 d-none d-lg-block d-xl-block">
                    <div class="bota_header_center_right">
                        <div class="bota_header_menu">
                            @php
                                $menus = \App\Models\Menu::orderBy('parent_id', 'asc')->orderBy('position','asc')->get();
                                $menuTree = buildMenuTree($menus);
                                function buildMenuTree($menus, $parentId = 0)
                                {
                                    $menuTree = [];

                                    foreach ($menus as $menu) {
                                        if ($menu->parent_id === $parentId) {
                                            $menu->children = buildMenuTree($menus, $menu->id);
                                            $menuTree[] = $menu;
                                        }
                                    }
                                    return $menuTree;
                                }
                            @endphp
                            <div class="v2_menu_top">
                                <ul class="v2_menu_top_ul nxtActiveMenu">
                                    @php
                                        $cnt = 0;
                                    @endphp
                                    @foreach($menuTree as $item)
                                        @include('client.layouts.item_header', ['item' => $item, 'cnt' => $cnt])
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- Language -->
                        <div class="bota_header_language">
                            <ul>
                                <li class="{{ $locale == 'vi' ? 'active' : ''}}">
                                    <a href="{{ route('changeLang','vi') }}" data-lang="vi" class="flag_language"><img
                                                src="{{ asset('statics/imgs/vi.webp') }}" alt="Viet Nam"
                                                style="height: 20px; width: 30px;" class="img-fluid"></a>
                                </li>
                                <li class="{{ $locale == 'jp' ? 'active' : ''}}">
                                    <a href="{{ route('changeLang','jp') }}" data-lang="jp" class="flag_language"><img
                                                src="{{ asset('statics/imgs/jp.webp') }}" alt="Japan"
                                                style="height: 20px; width: 30px;" class="img-fluid"></a>
                                </li>
                                <li class="{{ $locale == 'en' ? 'active' : ''}}">
                                    <a href="{{ route('changeLang','en') }}" data-lang="en" class="flag_language"><img
                                                src="{{ asset('statics/imgs/en.webp') }}" alt="English"
                                                style="height: 20px; width: 30px;" class="img-fluid"></a>
                                </li>
                                <li class="{{ $locale == 'kr' ? 'active' : ''}}">
                                    <a href="{{ route('changeLang','kr') }}" data-lang="kr" class="flag_language"><img
                                                src="{{ asset('statics/imgs/kr.webp') }}" alt="Korean"
                                                style="height: 20px; width: 30px;" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Language -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    $(document).ready(function () {
        $("#BNC_txt_search").on('keyup', function (e) {
            handle()
        });

        $("#BNC_btn_search").click(function (e) {
            handle()
        });

        function handle() {
            var keyword = $("#BNC_txt_search").val();
            var lang = `{{ app()->getLocale() }}`;

            $.ajax({
                url: '{{ route('search') }}',
                method: "get",
                data: {
                    lang: lang,
                    keyword: keyword,
                },
                success: function (response) {
                    $('#searchAutoComplete').empty();
                    $('#searchAutoComplete').html(response);
                }
            });
        }

        $("#BNC_txt_search").change(function () {
            if ($(this).val() === "") {
                $('#bota_search_products').empty()
                $('#bota_search_news').empty()
            }
        });
    });
</script>