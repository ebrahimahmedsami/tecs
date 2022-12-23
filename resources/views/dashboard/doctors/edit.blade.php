@extends('components.dashboard.layouts.master')
@section('title')
    {{__('dashboard.edit_doctor')}}
@endsection
<!-- BEGIN: Content-->
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <x-dashboard.layouts.breadcrumb now="{{__('dashboard.edit_doctor')}}">
                <li class="breadcrumb-item"><a href="{{route('admin.doctors.index')}}">{{__('dashboard.doctors_list')}}</a></li>
            </x-dashboard.layouts.breadcrumb>
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('dashboard.edit_doctor')}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="{{route('admin.doctors.update',$doctor->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <input type="hidden" name="id" value="{{$doctor->id}}" />
                                    <div class="form-group col-sm-3">
                                        <label for="name_ar">{{__('dashboard.name_ar')}}
                                            <input type="text" class="form-control" name="name_ar" placeholder="{{__('dashboard.name_ar')}}" value="{{$doctor->name_ar}}" />
                                            @error('name_ar')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="name_en">{{__('dashboard.name_en')}}
                                            <input type="text" class="form-control" name="name_en" placeholder="{{__('dashboard.name_en')}}" value="{{$doctor->name_en}}" />
                                            @error('name_en')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="name_en">{{__('dashboard.table phone')}}
                                            <input type="number" class="form-control" name="phone" placeholder="{{__('dashboard.table phone')}}" value="{{$doctor->phone}}" />
                                            @error('phone')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="name_en">{{__('dashboard.table email')}}
                                            <input type="email" class="form-control" name="email" placeholder="{{__('dashboard.table email')}}" value="{{$doctor->email}}" />
                                            @error('email')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label style="width: 100%" for="specilizations">{{__('dashboard.specializations')}}
                                            <select multiple class="form-control select2 specilizations" name="specilizations[]">
                                                @foreach($all_specialzations as $value)
                                                    <option @if(in_array($value->id,$doctor->specilizations->pluck('id')->toArray())) selected @endif value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('specilizations')
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
