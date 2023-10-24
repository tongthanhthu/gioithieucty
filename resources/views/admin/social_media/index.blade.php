@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Social media</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Social media</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        @include('flash::message')
        <form action="{{ ($contact) ? route('admin.social_media.update', $contact->id) : route('admin.social_media.add') }}" method="POST">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputName">Đường dẫn twitter</label>
                        <input type="text" id="inputName" class="form-control" name="link_twitter" value="{{ ($contact) ? $contact->link_twitter : '' }}">
                    </div>
                    @error('link_twitter')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputName">Đường dẫn facebook</label>
                        <input type="text" id="inputName" class="form-control" name="link_facebook" value="{{ ($contact) ? $contact->link_facebook : '' }}">
                    </div>
                    @error('link_facebook')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputName">Đường dẫn instagram</label>
                        <input type="text" id="inputName" class="form-control" name="link_instagram" value="{{ ($contact) ? $contact->link_instagram : '' }}">
                    </div>
                    @error('link_instagram')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputName">Đường dẫn youtube</label>
                        <input type="text" id="inputName" class="form-control" name="link_youtube" value="{{ ($contact) ? $contact->link_youtube : '' }}">
                    </div>
                    @error('link_youtube')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputName">Đường dẫn google</label>
                        <input type="text" id="inputName" class="form-control" name="link_google" value="{{ ($contact) ? $contact->link_google : '' }}">
                    </div>
                    @error('link_google')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputName">Đường dẫn google map</label>
                        <input type="text" id="inputName" class="form-control" name="link_ggmap" value="{{ ($contact) ? $contact->link_ggmap : '' }}">
                    </div>
                    @error('link_ggmap')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputName">Đường dẫn messenger</label>
                        <input type="text" id="inputName" class="form-control" name="link_messenger" value="{{ ($contact) ? $contact->link_messenger : '' }}">
                    </div>
                    @error('link_messenger')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Quay lại</a>
                    <input type="submit" value="Lưu" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </div>
   
@endsection
