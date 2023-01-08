@extends('components.dashboard.layouts.master')
@section('title')
    {{__('dashboard.edit_main_section')}}
@endsection
@section('styles')
    <style>
        .nav.nav-tabs{
            background: #f8f8f8;
        }
        .nav.nav-tabs .nav-item .nav-link.active{
            color: #eece00 !important;
        }
        .nav.nav-tabs .nav-item .nav-link.active:after{
            background: -webkit-linear-gradient(120deg, #eece00, rgba(115, 103, 240, 0.5)) !important;
        }
    </style>
@endsection
<!-- BEGIN: Content-->
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <x-dashboard.layouts.breadcrumb now="{{__('dashboard.edit_main_section')}}"></x-dashboard.layouts.breadcrumb>
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('dashboard.edit_main_section')}}</h4>
                    </div>
                    @if(\Session::get('success'))
                        <x-dashboard.layouts.message />
                    @endif
                    <div class="card-content">
                        <div class="card-body">

                            <section id="nav-filled">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card overflow-hidden">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <!-- Nav tabs -->
                                                    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="home-tab-fill" data-toggle="tab" href="#home-fill" role="tab" aria-controls="home-fill" aria-selected="true">@lang('dashboard.main_content')</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="profile-tab-fill" data-toggle="tab" href="#profile-fill" role="tab" aria-controls="profile-fill" aria-selected="false">@lang('dashboard.services')</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="messages-tab-fill" data-toggle="tab" href="#messages-fill" role="tab" aria-controls="messages-fill" aria-selected="false">@lang('dashboard.about_us')</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="settings-tab-fill" data-toggle="tab" href="#footer-fill" role="tab" aria-controls="footer-fill" aria-selected="false">@lang('dashboard.footer')</a>
                                                        </li>
                                                    </ul>

                                                    <!-- Tab panes -->
                                                    <div class="tab-content pt-1">
                                                        <div class="tab-pane active" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill">
                                                            <form class="form form-vertical" method="POST" action="{{route('admin.settings.main-section.update')}}" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="row">
                                                                    <input type="hidden" name="id" value="{{isset($settings->id) ? $settings->id : null}}" />
                                                                    <div class="form-group col-sm-4">
                                                                        <label for="header">{{__('dashboard.header')}}
                                                                            <input type="text" class="form-control" name="header" placeholder="{{__('dashboard.header')}}" value="{{isset($settings->header) ? $settings->header : ''}}" />
                                                                            @error('header')
                                                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                            @enderror
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-group col-sm-4 styledImageDiv">
                                                                        <label for="image">{{__('dashboard.banner_image')}}
                                                                            <input style="border: none" type="file" class="form-control" name="image" />
                                                                            @error('image')
                                                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                            @enderror
                                                                        </label>
                                                                        <img alt="banner image" title="{{__('dashboard.banner_image')}}" width="50" height="50" src="{{isset($settings->image) ? asset('storage/settings/uploads/'.$settings->image) : ''}}">
                                                                    </div>

                                                                    <div class="form-group col-sm-4 styledImageDiv">
                                                                        <label for="logo">{{__('dashboard.logo')}}
                                                                            <input style="border: none" type="file" class="form-control" name="logo" />
                                                                            @error('logo')
                                                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                            @enderror
                                                                        </label>
                                                                        <img alt="logo image" title="{{__('dashboard.logo')}}" width="50" height="50" src="{{isset($settings->logo) ? asset('storage/settings/uploads/'.$settings->logo) : ''}}">
                                                                    </div>

                                                                    <div class="form-group col-sm-4">
                                                                        <label for="about">{{__('dashboard.about')}}
                                                                            <textarea style="resize: none" class="form-control" name="about">{{isset($settings->about) ? $settings->about : ''}}</textarea>
                                                                            @error('about')
                                                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                            @enderror
                                                                        </label>
                                                                    </div>



                                                                    <div class="col-12">
                                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">{{__('dashboard.edit')}}</button>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                        <div class="tab-pane" id="profile-fill" role="tabpanel" aria-labelledby="profile-tab-fill">

                                                        </div>
                                                        <div class="tab-pane" id="messages-fill" role="tabpanel" aria-labelledby="messages-tab-fill">
                                                            <form class="form form-vertical" method="POST" action="{{route('admin.settings.about.update')}}" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="row">
                                                                    <input type="hidden" name="id" value="{{isset($settings->id) ? $settings->id : null}}" />
                                                                    <div class="form-group col-sm-4">
                                                                        <label for="header">{{__('dashboard.about_text_ar')}}
                                                                            <textarea class="form-control" name="about_text_ar">{{isset($settings->about_text_ar) ? $settings->about_text_ar : ''}}</textarea>
                                                                            @error('about_text_ar')
                                                                                <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                            @enderror
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-group col-sm-4">
                                                                        <label for="header">{{__('dashboard.about_text_en')}}
                                                                            <textarea class="form-control" name="about_text_en">{{isset($settings->about_text_en) ? $settings->about_text_en : ''}}</textarea>
                                                                            @error('about_text_en')
                                                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                            @enderror
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">{{__('dashboard.edit')}}</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="tab-pane" id="footer-fill" role="tabpanel" aria-labelledby="footer-tab-fill">
                                                            <form class="form form-vertical" method="POST" action="{{route('admin.settings.footer.update')}}" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="row">
                                                                    <input type="hidden" name="id" value="{{isset($settings->id) ? $settings->id : null}}" />
                                                                    <div class="form-group col-sm-4">
                                                                        <label for="header">{{__('dashboard.facebook_link')}} <i class="fab fa-facebook text-primary"></i>
                                                                            <input type="text" class="form-control" name="facebook_link" placeholder="{{__('dashboard.facebook_link')}}" value="{{isset($settings->facebook_link) ? $settings->facebook_link : ''}}" />
                                                                            @error('facebook_link')
                                                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                            @enderror
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-group col-sm-4">
                                                                        <label for="header">{{__('dashboard.twitter_link')}} <i class="fab fa-twitter text-info"></i>
                                                                            <input type="text" class="form-control" name="twitter_link" placeholder="{{__('dashboard.twitter_link')}}" value="{{isset($settings->twitter_link) ? $settings->twitter_link : ''}}" />
                                                                            @error('twitter_link')
                                                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                            @enderror
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-group col-sm-4">
                                                                        <label for="header">{{__('dashboard.instagram_link')}} <i class="fab fa-instagram text-danger"></i>
                                                                            <input type="text" class="form-control" name="instagram_link" placeholder="{{__('dashboard.instagram_link')}}" value="{{isset($settings->instagram_link) ? $settings->instagram_link : ''}}" />
                                                                            @error('instagram_link')
                                                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                            @enderror
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">{{__('dashboard.edit')}}</button>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.specilizations').select2(
                {
                    placeholder: "{{__('dashboard.choose_specialization')}}",
                }
            )
        })
    </script>
@endsection
