@extends('components.dashboard.layouts.master')
@section('title')
    {{__('dashboard.edit_reserve')}}
@endsection
<!-- BEGIN: Content-->
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <x-dashboard.layouts.breadcrumb now="{{__('dashboard.edit_reserve')}}">
                <li class="breadcrumb-item"><a href="{{route('admin.reservations.index')}}">{{__('dashboard.reserve_list')}}</a></li>
            </x-dashboard.layouts.breadcrumb>
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('dashboard.edit_reserve')}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="{{route('admin.reservations.update',$reservation->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-sm-3">
                                        <label class="w-100" for="date">{{__('dashboard.date')}}
                                            <input type="date" class="form-control" name="date" min="{{\Carbon\Carbon::today()->format('Y-m-d')}}" placeholder="{{__('dashboard.date')}}" value="{{$reservation->date}}" />
                                            @error('date')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label style="width: 100%" for="type">{{__('dashboard.reserve_type')}}
                                            <select class="form-control select2 type" name="type">
                                                @foreach(reservation_types() as $key => $value)
                                                    <option @if($reservation->type == $key) selected @endif value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                            @error('type')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label style="width: 100%" for="patient_id">{{__('dashboard.patient')}}
                                            <select class="form-control select2 patient" name="patient_id">
                                                @foreach($patients as $value)
                                                    <option  @if($reservation->patient_id == $value->id) selected @endif value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('patient_id')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label style="width: 100%" for="clinic_id">{{__('dashboard.clinic')}}
                                            <select class="form-control select2 clinic" name="clinic_id">
                                                @foreach($clinics as $value)
                                                    <option  @if($reservation->clinic_id == $value->id) selected @endif value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('clinic_id')
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
            $('.clinic').select2(
                {
                    placeholder: "{{__('dashboard.choose_clinic')}}",
                }
            )
            $('.patient').select2(
                {
                    placeholder: "{{__('dashboard.choose_patient')}}",
                }
            )
            $('.type').select2(
                {
                    placeholder: "{{__('dashboard.choose_reserve')}}",
                }
            )
        })
    </script>
@endsection
