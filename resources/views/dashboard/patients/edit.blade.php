@extends('components.dashboard.layouts.master')
@section('title')
    {{__('dashboard.edit_patient')}}
@endsection
<!-- BEGIN: Content-->
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <x-dashboard.layouts.breadcrumb now="{{__('dashboard.edit_patient')}}">
                <li class="breadcrumb-item"><a href="{{route('admin.patients.index')}}">{{__('dashboard.patients_list')}}</a></li>
            </x-dashboard.layouts.breadcrumb>
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('dashboard.edit_patient')}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="{{route('admin.patients.update',$patient->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{$patient->id}}">
                                <div class="row">
                                    <div class="form-group col-sm-3">
                                        <label for="name_ar">{{__('dashboard.name_ar')}}
                                            <input type="text" class="form-control" name="name_ar" placeholder="{{__('dashboard.name_ar')}}" value="{{$patient->name_ar}}" />
                                            @error('name_ar')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="name_en">{{__('dashboard.name_en')}}
                                            <input type="text" class="form-control" name="name_en" placeholder="{{__('dashboard.name_en')}}" value="{{$patient->name_en}}" />
                                            @error('name_en')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="phone">{{__('dashboard.table phone')}}
                                            <input type="number" class="form-control" name="phone" placeholder="{{__('dashboard.table phone')}}" value="{{$patient->phone}}" />
                                            @error('phone')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="national_id">{{__('dashboard.national_id')}}
                                            <input type="number" class="form-control" name="national_id" placeholder="{{__('dashboard.national_id')}}" value="{{$patient->national_id}}" />
                                            @error('national_id')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="age">{{__('dashboard.age')}}
                                            <input type="number" class="form-control" name="age" placeholder="{{__('dashboard.age')}}" value="{{$patient->age}}" />
                                            @error('age')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label style="width: 100%" for="gender">{{__('dashboard.gender')}}
                                            <select class="form-control" name="gender">
                                                <option disabled selected>{{__('dashboard.choose_gender')}}</option>
                                                @foreach(gender() as $key => $value)
                                                    <option @if($key == $patient->gender) selected @endif value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                            @error('gender')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label style="width: 100%" for="clinic_id">{{__('dashboard.clinics')}}
                                            <select class="form-control" name="clinic_id">
                                                @if(is_countable($clinics) && count($clinics) > 0)
                                                    <option disabled selected>{{__('dashboard.choose_clinic')}}</option>
                                                    @foreach($clinics as $value)
                                                        <option @if(in_array($value->id,$patient->clinics->pluck('id')->toArray())) selected @endif value="{{$value->id}}">{{$value->name}}</option>
                                                    @endforeach
                                                @else
                                                    <option selected value="{{$clinics->id}}">{{$clinics->name}}</option>
                                                @endif
                                            </select>
                                            @error('clinic_id')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="address">{{__('dashboard.table address')}}
                                            <textarea style="resize: none;" class="form-control" name="address" placeholder="{{__('dashboard.table address')}}">{{$patient->address}}</textarea>
                                            @error('address')
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
