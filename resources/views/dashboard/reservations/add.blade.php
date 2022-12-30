@extends('components.dashboard.layouts.master')
@section('title')
    {{__('dashboard.add_reserve')}}
@endsection
<!-- BEGIN: Content-->
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <x-dashboard.layouts.breadcrumb now="{{__('dashboard.add_reserve')}}">
                <li class="breadcrumb-item"><a href="{{route('admin.reservations.index')}}">{{__('dashboard.reserve_list')}}</a></li>
            </x-dashboard.layouts.breadcrumb>
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('dashboard.add_reserve')}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="{{route('admin.reservations.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-sm-3">
                                        <label class="w-100" for="date">{{__('dashboard.date')}}
                                            <input type="date" class="form-control" name="date" min="{{\Carbon\Carbon::today()->format('Y-m-d')}}" placeholder="{{__('dashboard.date')}}" value="{{old('date')}}" />
                                            @error('date')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label style="width: 100%" for="type">{{__('dashboard.reserve_type')}}
                                            <select class="form-control select2 type" name="type">
                                                <option disabled selected>{{__('dashboard.choose_reserve')}}</option>
                                            @foreach(reservation_types() as $key => $value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                            @error('type')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label style="width: 100%" for="clinic_id">{{__('dashboard.clinics')}}
                                            <select class="form-control clinic" name="clinic_id">
                                                @if(auth()->user()->hasRole('clinic'))
                                                    <option selected value="{{$clinics->id}}">{{$clinics->name}}</option>
                                                @else
                                                    <option disabled selected>{{__('dashboard.choose_clinic')}}</option>
                                                    @foreach($clinics as $value)
                                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('clinic_id')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label style="width: 100%" for="patient_id">{{__('dashboard.patient')}}
                                            <select class="form-control select2 patient" name="patient_id">
                                                <option disabled selected>{{__('dashboard.choose_patient')}}</option>
                                            </select>
                                            @error('patient_id')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label style="width: 100%" for="specialization_id">{{__('dashboard.specializations')}}
                                            <select class="form-control select2 specialization_id" name="specialization_id">
                                                <option disabled selected>{{__('dashboard.choose_specialization')}}</option>
                                            </select>
                                            @error('clinic_id')
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
            if($('.clinic').val())
                getSpecializations($('.clinic').val())

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
            $('.specialization_id').select2(
                {
                    placeholder: "{{__('dashboard.choose_specialization')}}",
                }
            )
            $('.clinic').on('change',function (){
                getSpecializations()
            });
            function getSpecializations(selectedID = null){
                $('.specialization_id').empty().append('<option disabled selected>{{__('dashboard.choose_specialization')}}</option>')
                $('.patient').empty().append('<option disabled selected>{{__('dashboard.choose_patient')}}</option>')
                let clinicId = $('.clinic').val()
                let url = '/admin/get_clinic_specializations'
                $.ajax({
                    url: url,
                    method: 'get',
                    data: {
                        id: clinicId,
                    },
                    success: function(result){
                        let patients = result.data.patients;
                        let specializations = result.data.specializations;
                        if(specializations.length > 0){
                            specializations.map((item) => {
                                $('.specialization_id').append(`
                                    <option ${selectedID && selectedID == item.id ? 'selected' : ''} value="${item.id}">${item.name}</option>
                                `)
                            })
                        }
                        if(patients.length > 0){
                            patients.map((item) => {
                                $('.patient').append(`
                                    <option ${selectedID && selectedID == item.id ? 'selected' : ''} value="${item.id}">${item.name}</option>
                                `)
                            })
                        }
                    }});
            }
        })
    </script>
@endsection
