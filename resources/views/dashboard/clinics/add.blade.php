@extends('components.dashboard.layouts.master')
@section('title')
    {{__('dashboard.add_clinic')}}
@endsection
<!-- BEGIN: Content-->
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <x-dashboard.layouts.breadcrumb now="{{__('dashboard.add_clinic')}}">
                <li class="breadcrumb-item"><a href="{{route('admin.clinics.index')}}">{{__('dashboard.clinics_list')}}</a></li>
            </x-dashboard.layouts.breadcrumb>
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('dashboard.add_clinic')}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="{{route('admin.clinics.store')}}" enctype="multipart/form-data">
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
                                    <div class="form-group col-sm-3">
                                        <label for="phone">{{__('dashboard.table phone')}}
                                            <input type="number" class="form-control" name="phone" placeholder="{{__('dashboard.table phone')}}" value="{{old('phone')}}" />
                                            @error('phone')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="email">{{__('dashboard.table email')}}
                                            <input type="email" class="form-control" name="email" placeholder="{{__('dashboard.table email')}}" value="{{old('email')}}" />
                                            @error('email')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label style="width: 100%" for="doctor">{{__('dashboard.doctor')}}
                                            <select class="form-control select2 doctor" name="doctor">
                                                <option disabled selected>{{__('dashboard.choose_doctor')}}</option>
                                                @foreach($doctors as $value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('doctor')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="disclosure_price">{{__('dashboard.disclosure_price')}}
                                            <input type="number" class="form-control" name="disclosure_price" placeholder="{{__('dashboard.disclosure_price')}}" value="{{old('disclosure_price')}}" />
                                            @error('disclosure_price')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="rediscovery_price">{{__('dashboard.rediscovery_price')}}
                                            <input type="number" class="form-control" name="rediscovery_price" placeholder="{{__('dashboard.rediscovery_price')}}" value="{{old('rediscovery_price')}}" />
                                            @error('rediscovery_price')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="today_capacity">{{__('dashboard.today_capacity')}}
                                            <input type="number" class="form-control" name="today_capacity" placeholder="{{__('dashboard.today_capacity')}}" value="{{old('today_capacity')}}" />
                                            @error('today_capacity')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <div class="custom-control custom-switch custom-switch-danger mr-2 mb-1">
                                            <p class="mb-0">{{__('dashboard.blocked')}}</p>
                                            <input type="checkbox" class="custom-control-input" id="blocked_switch" name="is_blocked">
                                            <label class="custom-control-label" for="blocked_switch">
                                                <span class="switch-icon-left"><i class="feather icon-x"></i></span>
                                                <span class="switch-icon-right"><i class="feather icon-x"></i></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="time_form">{{__('dashboard.time_form')}}
                                            <input type="time" class="form-control" name="time_form" placeholder="{{__('dashboard.time_form')}}" value="{{old('time_form')}}" />
                                            @error('time_form')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="time_to">{{__('dashboard.time_to')}}
                                            <input type="time" class="form-control" name="time_to" placeholder="{{__('dashboard.time_to')}}" value="{{old('time_to')}}" />
                                            @error('time_to')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="password">{{__('dashboard.table password')}}
                                            <input type="password" class="form-control" name="password" placeholder="{{__('dashboard.table password')}}" value="{{old('password')}}" />
                                            @error('password')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="password_confirmation">{{__('dashboard.table confirm password')}}
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="{{__('dashboard.table confirm password')}}" value="{{old('password_confirmation')}}" />
                                            @error('password_confirmation')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="address">{{__('dashboard.table address')}}
                                            <textarea style="resize: none;" class="form-control" name="address" placeholder="{{__('dashboard.table address')}}"></textarea>
                                            @error('address')
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
@section('script')
    <script>
        $(document).ready(function () {
            $('.doctor').select2(
                {
                    placeholder: "{{__('dashboard.choose_doctor')}}",
                }
            )
        })
    </script>
@endsection
