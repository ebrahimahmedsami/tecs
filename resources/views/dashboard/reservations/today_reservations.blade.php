@extends('components.dashboard.layouts.master')
@section('title')
    {{__('dashboard.today_reservations')}}
@endsection
<!-- BEGIN: Content-->
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users list start -->
            <section class="users-list-wrapper">
                <x-dashboard.layouts.breadcrumb now="{{__('dashboard.today_reservations')}}">
                </x-dashboard.layouts.breadcrumb>
                <!-- Column selectors with Export Options and print table -->
                <section id="column-selectors">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{__('dashboard.today_reservations')}}</h4>
                                </div>
                                <div class="container-fluid mt-2">
                                    <div class="row">
                                        <div class="form-group col-sm-3">
                                            <label class="w-100" for="date">{{__('dashboard.date')}}
                                                <input type="date" class="form-control date" name="date" placeholder="{{__('dashboard.date')}}" value="{{\Carbon\Carbon::today()->format('Y-m-d')}}" />
                                                @error('date')
                                                <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                                @enderror
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @if(\Session::get('success'))
                                    <x-dashboard.layouts.message />
                                @endif
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive overflow-auto">
                                            <table class="table table-striped " id="today-reserve-table">
                                                <thead>
                                                    <tr class="text text-center">
                                                        <th>{{__('dashboard.clinic')}}</th>
                                                        <th>{{__('dashboard.patient')}}</th>
                                                        <th>{{__('dashboard.reserve_type')}}</th>
                                                        <th>{{__('dashboard.date')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text text-center "></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Column selectors with Export Options and print table -->
            </section>
            <!-- users list ends -->

        </div>
    </div>
</div>
@endsection
<!-- END: Content-->
@section('script')
    <script>
        $(document).ready(function () {
            let today_reserve = $('#today-reserve-table').DataTable({
                processing: true,
                serverSide: true,
                lengthMenu: [10, 20, 40, 60, 80, 100],
                pageLength: 10,
                ajax: {
                    url :"today_reservations",
                    headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    data: function (d) {
                        d.page = 1;
                        d.date = $('.date').val();
                    }
                },
                "paging": true,
                columns: [
                    {data: 'clinic', render:function (data,two,three){
                            return data.name ?? '--';
                        }
                    },
                    {data: 'patient', render:function (data,two,three){
                            return data.name ?? '--';
                        }
                    },
                    {data: 'type_text', name:'type_text'},
                    {data: 'date', name:'date'},
                ]
            });

            $('.date').on('change',function (){
                let date = $(this).val()
                today_reserve.ajax.reload()
            })
        });


    </script>

@endsection
