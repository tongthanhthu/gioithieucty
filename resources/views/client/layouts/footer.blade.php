@php
    $logo = \App\Models\Logo::query()->where('status', STATUS_VALUE_ACTIVE)->first();
    $media = \App\Models\Media::query()->first();
    $contact = \App\Models\Contacts::query()->first();
    $image = \App\Models\LibaryImage::orderBy('updated_at', 'Desc')->limit(9)->get();
@endphp
<footer class="bota_footer" style="background-image: url(statics/imgs/footer-bg.webp);">
    <div class="bota_footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-lg-6 col-12">
                    <div class="bota_footer_logo">
                        <a href="{{ route('index') }}" title="Binh Minh">
                            @if(isset($logo) && !empty($logo))
                                <img src="{{asset('storage/'. $logo->image)}}" alt="Binh Minh" lass="img-fluid" width="252" height="54">
                            @endif
                        </a>
                    </div>
                    <div class="bota_footer_sologan">
                        {!! __('message.footer_company') !!}
                    </div>
                    <div class="bota_footer_text">
                        <h4>{!! __('message.open_time') !!}</h4>
                        <p>{{ $contact ? $contact->getTimework() : ''}}</p>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-6 col-12 box-arlert">
                    <h4 class="bota_footer_title">{!! __('message.contact') !!}</h4>
                    <p class="bota_subscribe_desc">{!! __('message.title_send_mail') !!}</p>
                    <form class="bota_subscribe_form" action="{{ (app()->getLocale() == 'vi') ? route('lienhe.receiveMail') : route('contacts.receiveMail') }}" method="POST">
                        @csrf
                        <input type="email" required class="form-control" placeholder="{!! __('message.email_val') !!}"
                               name="email" autocomplete="off">
                        <button  class="btn btn-default" type="submit" name="subscribe"><i
                                    class="fas fa-paper-plane"></i></button>
                    </form>
                    @if(Session::has('msgReceiveMail'))
                        <div class="alert alert-success" role="alert">{{Session::get('msgReceiveMail')}}</div>
                    @endif
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-6 col-12">
                    <h4 class="bota_footer_title">{!! __('message.address') !!}</h4>
                    <div class="bota_footer_text">
                        <ul>
                            @if($contact && $contact->getAddress() !== null)
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>{{ $contact->getAddress() ?? '' }}
                                </li>
                            @endif
                            @if($contact && isset($contact->phone))
                                <li>
                                    <i class="fas fa-phone"></i><a href="tel:{{$contact->phone ?? ''}}"
                                                                   title="Gọi ngay {{$contact->phone ?? ''}}">{{$contact->phone ?? ''}}</a>
                                </li>
                            @endif
                            @if($contact && isset($contact->email))
                                <li>
                                    <i class="fas fa-envelope"></i><a href="mailto:{{$contact->email ?? ''}}"
                                                                      title="Gửi mail tới {{$contact->email ?? ''}}">
                                        {{$contact->email ?? ''}}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-6 col-12">
                    <h4 class="bota_footer_title">{!! __('message.photo_library') !!}</h4>
                    <div class="bota_album_list">
                        <ul>
                            @if($image)
                                @foreach ($image as $item)
                                    <li>
                                        <a href="{{ asset('storage/' . $item['image']) }}"
                                           title="Hình ảnh " data-fancybox="gallery">
                                            <img src="{{ asset('storage/' . $item['image']) }}"
                                                 alt="Hình ảnh " class="img-fluid"/>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        2021 © {!! __('message.all_rights_reserved_by') !!} <a href="/" title="BINH MINH TMC CO.,LTD ">Binh Minh</a>
    </div>
    <script>
        $('alert alert-success').not('.alert-important').delay(5000).fadeOut(350);
    </script>
</footer>