@extends('components.dashboard.layouts.master')
@section('title')
    {{__('dashboard.reserve_list')}}
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
                <x-dashboard.layouts.breadcrumb now="{{__('dashboard.reserve_list')}}">
                </x-dashboard.layouts.breadcrumb>
                <!-- Column selectors with Export Options and print table -->
                <section id="column-selectors">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{__('dashboard.reserve_list')}}</h4>
                                </div>
                                @if(\Session::get('success'))
                                    <x-dashboard.layouts.message title="success" />
                                @elseif(\Session::get('danger'))
                                    <x-dashboard.layouts.message title="danger" />
                                @endif
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <a href="{{route('admin.reservations.create')}}"><button  class="mb-2 btn btn-primary"><i class="mr-1 feather icon-plus"></i>{{__('dashboard.add_reserve')}}</button></a>
                                        <div class="filters">
                                            <div class="row">
                                                <div class="form-group col-sm-3">
                                                    <label class="w-100" for="date">{{__('dashboard.patient_name')}}
                                                        <input type="text" class="form-control filter_patient_name" name="filter_patient_name" />
                                                    </label>
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label style="width: 100%" for="type">{{__('dashboard.reserve_type')}}
                                                        <select class="form-control select2 filter_type" name="type">
                                                            <option disabled selected>{{__('dashboard.choose_reserve')}}</option>
                                                            @foreach(reservation_types() as $key => $value)
                                                                <option value="{{$key}}">{{$value}}</option>
                                                            @endforeach
                                                        </select>
                                                    </label>
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <button  class="mt-1 btn btn-primary filter">
                                                        <i class="mr-1 feather icon-search"></i>{{__('dashboard.search')}}
                                                    </button>
                                                    <button  class="mt-1 btn btn-danger reset_filters">
                                                        <i class="mr-1 feather icon-delete"></i>{{__('dashboard.reset')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive overflow-auto">
                                            <table class="table table-striped " id="reserve-table">
                                                <thead>
                                                    <tr class="text text-center">
                                                        <th>{{__('dashboard.clinic')}}</th>
                                                        <th>{{__('dashboard.specialization')}}</th>
                                                        <th>{{__('dashboard.patient')}}</th>
                                                        <th>{{__('dashboard.reserve_type')}}</th>
                                                        <th>{{__('dashboard.date')}}</th>
                                                        <th>{{__('dashboard.table status')}}</th>
                                                        <th>{{__('dashboard.note')}}</th>
                                                        <th>{{__('dashboard.actions')}}</th>
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


            <!-- Change Status Modal -->
            <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">{{__('dashboard.change_status')}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" id="reserve_id">
                                    <label style="width: 100%" for="status">{{__('dashboard.reserve_status')}}
                                        <select class="form-control select2 status" name="status">
                                            <option disabled selected>{{__('dashboard.choose_status')}}</option>
                                            @foreach(reservation_status() as $key=>$value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                            <span style="font-size: 12px;display: none" class="text-danger status_error"></span>
                                    </label>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary changeStatusConfirm">{{__('dashboard.confirm')}}</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- Note Modal -->
            <div class="modal fade text-left" id="note_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">{{__('dashboard.note')}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" id="reserve_id_note">
                                <label style="width: 100%" for="status">{{__('dashboard.note')}}
                                    <textarea name="note" class="form-control note"></textarea>
                                    <span style="font-size: 12px;display: none" class="text-danger status_error"></span>
                                </label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary updateNoteConfirm">{{__('dashboard.confirm')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
<!-- END: Content-->
@section('script')
    <script>
        $(document).ready(function () {
            let reserve_table = $('#reserve-table').DataTable({
                processing: true,
                serverSide: true,
                lengthMenu: [10, 20, 40, 60, 80, 100],
                pageLength: 10,
                ajax: {
                    url :"reservations",
                    headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    data: function (d) {
                        d.page = 1;
                        d.patient_name = $('.filter_patient_name').val() ?? '';
                        d.type = $('.filter_type').val();
                    }
                },
                "paging": true,
                columns: [
                    {data: 'clinic', render:function (data,two,three){
                            return data.name ?? '--';
                        }
                    },
                    {data: 'specialization', render:function (data,two,three){
                            return data ?? '--';
                        }
                    },
                    {data: 'patient', render:function (data,two,three){
                            return data.name ?? '--';
                        }
                    },
                    {data: 'type_text', name:'type_text'},
                    {data: 'date', name:'date'},
                    {data: 'status_text', render:function (data,two,three){
                            return data ?? '--';
                        }
                    },
                    {data: 'note', name:'note'},
                    {data: 'id',
                        render:function (data,two,three){
                            let edit ='reservations/'+data+'/edit';
                            let deleting ='reservations/'+data;
                            return `<div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-flat-dark dropdown-toggle mr-1 mb-1" type="button" id="dropdownMenuButton700" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{__('dashboard.actions')}}
                                </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton700">
                                <a class="dropdown-item" href="${edit}"><i class="fa fa-edit mr-1"></i>{{__('dashboard.edit')}}</a>
                                <a data-id="${data}" data-toggle="modal" data-target="#inlineForm" class="dropdown-item getReservationId" href="javascript::void()"><i class="fa fa-bolt mr-1"></i>{{__('dashboard.change_status')}}</a>
                                <a data-id="${data}" data-toggle="modal" data-target="#note_modal" class="dropdown-item getReservationId" href="javascript::void()"><i class="fa fa-bolt mr-1"></i>{{__('dashboard.add_note')}}</a>
                                <form action='${deleting}' method='POST' class="reservations-${data}">
                                @csrf
                                @method('DELETE')
                                </form>
                                <button class="dropdown-item" onClick="remove(${data},'reservations')"><i class="fa fa-trash mr-1"></i>{{__('dashboard.delete')}}</button>
                            </div>
                            </div>
                        </div>`;
                        }
                    },
                ]
            });

            // Get Reservation Id
            $(document).on('click','.getReservationId',function (){
                let id = $(this).data('id')
                $('#reserve_id').val(id)
                $('#reserve_id_note').val(id)
            })

            // Filters
            $(document).on('click','.filter',function (){
                reserve_table.ajax.reload()
            })

            // Reset Filters
            $(document).on('click','.reset_filters',function (){
                $('.filter_patient_name').val('')
                $('.filter_type').val('')
                reserve_table.ajax.reload()
            })




            // Update Note
            $(document).on('click','.updateNoteConfirm',function (){
                let id = $('#reserve_id').val()
                let note = $('.note').val()
                $('.note_error').empty().hide()
                let url = '/admin/reservations/update_note'
                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        id: id,
                        note: note,
                    },
                    success: function(result){
                        Swal.fire({
                            title: 'تعديل الملاحظة',
                            text: "تم تعديل الملاحظة بنجاح",
                            icon: 'success'});
                        $('.note').val('')
                        $('#note_modal').modal('hide')
                        reserve_table.ajax.reload()
                    }});

            })

            // Change Status
            $(document).on('click','.changeStatusConfirm',function (){
                let id = $('#reserve_id').val()
                let status = $('.status').val()
                $('.status_error').empty().hide()
                if(!status){
                    $('.status_error').show().text("{{__('dashboard.choose_status')}}");
                    return false;
                }
                let url = '/admin/reservations/change_status'
                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        id: id,
                        status: status,
                    },
                    success: function(result){
                        Swal.fire({
                            title: 'تغيير الحالة',
                            text: "تم تغيير الحالة بنجاح",
                            icon: 'success'});
                        $('.status').val('')
                        $('#inlineForm').modal('hide')
                        reserve_table.ajax.reload()
                    }});

            })
        });


    </script>

@endsection
