@extends('components.dashboard.layouts.master')
@section('title')
    {{__('dashboard.clinics_list')}}
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
                <x-dashboard.layouts.breadcrumb now="{{__('dashboard.clinics_list')}}">
                </x-dashboard.layouts.breadcrumb>
                <!-- Column selectors with Export Options and print table -->
                <section id="column-selectors">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{__('dashboard.clinics_list')}}</h4>
                                </div>
                                @if(\Session::get('success'))
                                    <x-dashboard.layouts.message title="success" />
                                @elseif(\Session::get('danger'))
                                    <x-dashboard.layouts.message title="danger" />
                                @endif
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive overflow-auto">
                                            <a href="{{route('admin.clinics.create')}}"><button  class="mb-2 btn btn-primary"><i class="mr-1 feather icon-plus"></i>{{__('dashboard.add_clinic')}}</button></a>
                                            <table class="table table-striped " id="specializations-table">
                                                <thead>
                                                    <tr class="text text-center">
                                                        <th>{{__('dashboard.table name')}}</th>
                                                        <th>{{__('dashboard.table phone')}}</th>
                                                        <th>{{__('dashboard.table email')}}</th>
                                                        <th>{{__('dashboard.table address')}}</th>
                                                        <th>{{__('dashboard.disclosure_price')}}</th>
                                                        <th>{{__('dashboard.rediscovery_price')}}</th>
                                                        <th>{{__('dashboard.today_capacity')}}</th>
                                                        <th>{{__('dashboard.time_form')}}</th>
                                                        <th>{{__('dashboard.time_to')}}</th>
                                                        <th>{{__('dashboard.blocked')}}</th>
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

        </div>
    </div>
</div>
@endsection
<!-- END: Content-->
@section('script')
    <script>
        $(document).ready(function () {
            $('#specializations-table').DataTable({
                processing: true,
                serverSide: true,
                lengthMenu: [10, 20, 40, 60, 80, 100],
                pageLength: 10,
                ajax: {
                    url :"clinics",
                    headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    data: function (d) {
                        d.page = 1;
                    }
                },
                "paging": true,
                columns: [
                    {data: 'name', name:'name'},
                    {data: 'phone', name:'phone'},
                    {data: 'address', name:'address'},
                    {data: 'email', name:'email'},
                    {data: 'disclosure_price', render:function (data,two,three){
                            return data + ' ' + "{{__('dashboard.pound')}}"
                        }
                    },
                    {data: 'rediscovery_price', render:function (data,two,three){
                            return data + ' ' + "{{__('dashboard.pound')}}"
                        }
                    },
                    {data: 'today_capacity', name:'today_capacity'},
                    {data: 'time_form', name:'time_form'},
                    {data: 'time_to', name:'time_to'},
                    {data: 'blocked_text', render:function (data,two,three){
                            return `<span class="badge text-white badge-${(three.is_blocked == 0) ? 'success' : 'danger'}">${data}</span>`;
                        }
                    },
                    {data: 'id',
                        render:function (data,two,three){
                            let edit ='specializations/'+data+'/edit';
                            let deleting ='specializations/'+data;
                            return `<div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-flat-dark dropdown-toggle mr-1 mb-1" type="button" id="dropdownMenuButton700" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{__('dashboard.actions')}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton700">
                                <a class="dropdown-item" href="${edit}"><i class="fa fa-edit mr-1"></i>{{__('dashboard.edit')}}</a>
                                <form action='${deleting}' method='POST' class="specializations-${data}">
                                @csrf
                                @method('DELETE')
                                </form>
                                <button class="dropdown-item" onClick="remove(${data},'specializations')"><i class="fa fa-trash mr-1"></i>{{__('dashboard.delete')}}</button>
                            </div>
                            </div>
                        </div>`;
                        }
                    },
                ]
            });
        });


    </script>

@endsection
