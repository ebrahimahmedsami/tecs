@extends('components.dashboard.layouts.master')
@section('title')
    {{__('dashboard.edit_main_section')}}
@endsection
@section('styles')
    <style>

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
