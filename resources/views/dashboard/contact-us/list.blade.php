@extends('components.dashboard.layouts.master')
@section('title')
    {{__('dashboard.contact_us')}}
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
                <x-dashboard.layouts.breadcrumb now="{{__('dashboard.contact_us')}}">
                </x-dashboard.layouts.breadcrumb>
                <!-- Column selectors with Export Options and print table -->
                <section id="column-selectors">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{__('dashboard.contact_us')}}</h4>
                                </div>
                                @if(\Session::get('success'))
                                    <x-dashboard.layouts.message title="success" />
                                @endif
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive overflow-auto">
                                            <table class="table table-striped " id="contactUs-table">
                                                <thead>
                                                    <tr class="text text-center">
                                                        <th>{{__('dashboard.table name')}}</th>
                                                        <th>{{__('dashboard.table phone')}}</th>
                                                        <th>{{__('dashboard.table email')}}</th>
                                                        <th>{{__('dashboard.message')}}</th>
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
            $('#contactUs-table').DataTable({
                processing: true,
                serverSide: true,
                lengthMenu: [10, 20, 40, 60, 80, 100],
                pageLength: 10,
                ajax: {
                    url :"{{route('admin.contactUs.contact-us-view')}}",
                    headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    data: function (d) {
                        d.page = 1;
                    }
                },
                "paging": true,
                columns: [
                    {data: 'name', name:'name'},
                    {data: 'phone', name:'phone'},
                    {data: 'email', name:'email'},
                    {data: 'message', name:'message'},
                    {data: 'id',
                        render:function (data,two,three){
                            let deleting ='contact-us-delete/'+data;
                            return `<div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-flat-dark dropdown-toggle mr-1 mb-1" type="button" id="dropdownMenuButton700" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{__('dashboard.actions')}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton700">
                                <form action='${deleting}' method='POST' class="contactUs-${data}">
                                @csrf
                                </form>
                                <button class="dropdown-item" onClick="remove(${data},'contactUs')"><i class="fa fa-trash mr-1"></i>{{__('dashboard.delete')}}</button>
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
