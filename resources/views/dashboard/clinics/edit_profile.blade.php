@extends('components.dashboard.layouts.master')
@section('title')
    {{__('dashboard.edit_profile_clinic')}}
@endsection
@section('styles')
    <style>
        .nav-pills .nav-link.active, .nav-pills .show > .nav-link{
            background-color: #eece00 !important;
        }
    </style>
@endsection
<!-- BEGIN: Content-->
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <x-dashboard.layouts.breadcrumb now="{{__('dashboard.edit_profile_clinic')}}">
            </x-dashboard.layouts.breadcrumb>
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('dashboard.edit_profile_clinic')}}</h4>
                    </div>
                    @if(\Session::get('success'))
                        <x-dashboard.layouts.message title="success" />
                    @elseif(\Session::get('danger'))
                        <x-dashboard.layouts.message title="danger" />
                    @endif
                    <div class="card-content">
                        <div class="card-body">
                            <section id="page-account-settings">
                                <div class="row">
                                    <!-- left menu section -->
                                    <div class="col-md-3 mb-2 mb-md-0">
                                        <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                            <li class="nav-item">
                                                <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                                    <i class="feather icon-globe mr-50 font-medium-3"></i>
                                                    {{__('dashboard.general')}}
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                                    <i class="feather icon-lock mr-50 font-medium-3"></i>
                                                    {{__('dashboard.change_password')}}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- right content section -->
                                    <div class="col-md-9">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="tab-content">
                                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                                            <form class="form form-vertical" method="POST" action="{{route('admin.clinic.update-profile')}}" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{$clinic->id}}">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="name_ar">{{__('dashboard.name_ar')}}</label>
                                                                                <input type="text" class="form-control" name="name_ar" placeholder="{{__('dashboard.name_ar')}}" value="{{$clinic->name_ar}}" />
                                                                                @error('name_ar')
                                                                                <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                                @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="name_en">{{__('dashboard.name_en')}}</label>
                                                                                <input type="text" class="form-control" name="name_en" placeholder="{{__('dashboard.name_en')}}" value="{{$clinic->name_en}}" />
                                                                                @error('name_en')
                                                                                <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                                @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="phone">{{__('dashboard.table phone')}}</label>
                                                                                <input type="number" class="form-control" name="phone" placeholder="{{__('dashboard.table phone')}}" value="{{$clinic->phone}}" />
                                                                                @error('phone')
                                                                                <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                                @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="email">{{__('dashboard.table email')}}</label>
                                                                                <input type="email" class="form-control" name="email" placeholder="{{__('dashboard.table email')}}" value="{{$clinic->email}}" />
                                                                                @error('email')
                                                                                <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                                @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-4">
                                                                        <div class="form-group">
                                                                            <label for="disclosure_price">{{__('dashboard.disclosure_price')}}</label>
                                                                                <input type="number" class="form-control" name="disclosure_price" placeholder="{{__('dashboard.disclosure_price')}}" value="{{$clinic->disclosure_price}}" />
                                                                                @error('disclosure_price')
                                                                                <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                                @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-4">
                                                                        <div class="form-group">
                                                                            <label for="rediscovery_price">{{__('dashboard.rediscovery_price')}}</label>
                                                                                <input type="number" class="form-control" name="rediscovery_price" placeholder="{{__('dashboard.rediscovery_price')}}" value="{{$clinic->rediscovery_price}}" />
                                                                                @error('rediscovery_price')
                                                                                <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                                @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-4">
                                                                        <div class="form-group">
                                                                            <label for="today_capacity">{{__('dashboard.today_capacity')}}</label>
                                                                                <input type="number" class="form-control" name="today_capacity" placeholder="{{__('dashboard.today_capacity')}}" value="{{$clinic->today_capacity}}" />
                                                                                @error('today_capacity')
                                                                                <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                                @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="time_form">{{__('dashboard.time_form')}}</label>
                                                                                <input type="time" class="form-control" name="time_form" placeholder="{{__('dashboard.time_form')}}" value="{{$clinic->time_form}}" />
                                                                                @error('time_form')
                                                                                <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                                @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="time_to">{{__('dashboard.time_to')}}</label>
                                                                                <input type="time" class="form-control" name="time_to" placeholder="{{__('dashboard.time_to')}}" value="{{$clinic->time_to}}" />
                                                                                @error('time_to')
                                                                                <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                                @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="address">{{__('dashboard.table address')}}</label>
                                                                                <textarea style="resize: none;" class="form-control" name="address" placeholder="{{__('dashboard.table address')}}">{{$clinic->address}}</textarea>
                                                                                @error('address')
                                                                                <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                                @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label style="width: 100%" for="holidays">{{__('dashboard.clinic_holidays')}}</label>
                                                                                <select multiple class="form-control select2 holidays" name="day[]">
                                                                                    @foreach(clinic_holidays() as $key=>$value)
                                                                                        <option @if(in_array($key,$clinic->holidays->pluck('day')->toArray())) selected @endif value="{{$key}}">{{$value}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('day')
                                                                                <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                                @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">{{__('dashboard.submit')}}
                                                                            </button>
                                                                        <button type="reset" class="btn btn-outline-warning">{{__('dashboard.close')}}</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                                            <form class="form form-vertical" method="POST" action="{{route('admin.clinic.update-profile-password')}}" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{$clinic->id}}">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="password">{{__('dashboard.old_password')}}</label>
                                                                                <input type="password" class="form-control" name="old_password" placeholder="{{__('dashboard.old_password')}}" value="{{old('old_password')}}" />
                                                                                @error('old_password')
                                                                                <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                                @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="new_password">{{__('dashboard.new_password')}}</label>
                                                                            <input type="password" class="form-control" name="new_password" placeholder="{{__('dashboard.new_password')}}" value="{{old('new_password')}}" />
                                                                            @error('new_password')
                                                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="confirm_new_password">{{__('dashboard.confirm_new_password')}}</label>
                                                                            <input type="password" class="form-control" name="confirm_new_password" placeholder="{{__('dashboard.confirm_new_password')}}" value="{{old('confirm_new_password')}}" />
                                                                            @error('confirm_new_password')
                                                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">{{__('dashboard.submit')}}
                                                                            </button>
                                                                        <button type="reset" class="btn btn-outline-warning">{{__('dashboard.close')}}</button>
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
            $('.doctor').select2({placeholder: "{{__('dashboard.choose_doctor')}}",})
            $('.role_id').select2({placeholder: "{{__('dashboard.choose_role')}}",})
            $('.holidays').select2({placeholder: "{{__('dashboard.choose_days')}}",})
        })
    </script>
@endsection
