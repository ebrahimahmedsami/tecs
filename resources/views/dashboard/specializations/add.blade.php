@extends('components.dashboard.layouts.master')
@section('title')
    {{__('dashboard.add_specialization')}}
@endsection
<!-- BEGIN: Content-->
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <x-dashboard.layouts.breadcrumb now="{{__('dashboard.add_specialization')}}">
                <li class="breadcrumb-item"><a href="{{route('admin.specializations.index')}}">{{__('dashboard.specializations_list')}}</a></li>
            </x-dashboard.layouts.breadcrumb>
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('dashboard.add_specialization')}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="{{route('admin.specializations.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-sm-3">
                                        <label for="name_ar">{{__('dashboard.name_ar')}}
                                            <input type="text" class="form-control" name="name_ar" placeholder="{{__('dashboard.name_ar')}}" value="{{old('name_ar')}}" />
                                            @error('name_ar')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="name_en">{{__('dashboard.name_en')}}
                                            <input type="text" class="form-control" name="name_en" placeholder="{{__('dashboard.name_en')}}" value="{{old('name_en')}}" />
                                            @error('name_en')
                                                <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">{{__('dashboard.submit')}}</button>
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
