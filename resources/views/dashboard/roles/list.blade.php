    @extends('components.dashboard.layouts.master')
    @section('title')
        {{__('dashboard.roles list')}}
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
                    <x-dashboard.layouts.breadcrumb now="{{__('dashboard.roles list')}}">
                    </x-dashboard.layouts.breadcrumb>
                    <!-- Column selectors with Export Options and print table -->
                    <section id="column-selectors">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{__('dashboard.roles list')}}</h4>
                                    </div>
                                    @if(\Session::get('success'))
                                        <x-dashboard.layouts.message />
                                    @endif
                                    <div class="card-content">
                                        <div class="card-body card-dashboard">

                                            <div class="table-responsive overflow-auto">
                                                @can('add-permission')
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModalCenter"><i class="mr-1 feather icon-plus"></i>
                                                    {{__('dashboard.add permission')}}
                                                </button>
                                                @endcan
                                                <a href="{{route('admin.roles.create')}}"><button  class="mb-2 btn btn-primary"><i class="mr-1 feather icon-plus"></i>{{__('dashboard.add roles')}}</button></a>
                                                <table class="table table-striped " id="roles-table">

                                                    <thead >


                                                    <tr class="text text-center">
                                                         <th>#</th>
                                                        <th>{{__('dashboard.table name')}}</th>
                                                        <th>{{__('dashboard.users count')}}</th>
                                                        <th>{{__('dashboard.actions')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="text text-center ">

                                                    </tbody>
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

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">{{__('dashboard.add permission')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="{{route('admin.add_permission')}}">
                            <div class="modal-body permissions">
                                <button class="btn btn-outline-primary mb-1 add-new-permission" style="padding: 6px 9px;"><i class="fa fa-plus"></i></button>
                                <div class="plus-one mb-2">
                                    <label>{{__('dashboard.add permission')}}</label>
                                    <input type="text" name="name[]" class="form-control" placeholder="{{__('dashboard.add permission')}}">
                                    @error('name')
                                    <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                @csrf
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('dashboard.close')}}</button>
                                <button type="submit" class="btn btn-primary">{{__('dashboard.submit')}}</button>
                            </div>
                            </form>
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
                let i=0;
                $('#roles-table').DataTable({

                    processing: true,
                    serverSide: true,
                    lengthMenu: [10, 20, 40, 60, 80, 100],
                    pageLength: 10,
                    ajax: {
                        url :"roles",
                        headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                        data: function (d) {
                            d.page = 1;
                        }
                    },
                    "paging": true,
                    columns: [
                        {data: 'id', name: 'id',render:function (){

                            return i+=1;
                            }},
                        {data: 'name', name:'name'},
                        {data: 'users_count', name:'users_count',
                            render:function (data){
                                return `<span class="badge badge-primary text text-center font-medium-2">${data}</span><i class="fa fa-users fa-2x text text-primary ml-2"></i>`;
                            }},
                        {data: 'id',
                            render:function (data,two,three){
                                let edit ='roles/'+data+'/edit';
                                // let show ='roles/'+data;
                                let deleting ='roles/'+data;
                                if(data == 1){
                                    return ``;
                                }
                                @can('edit role','delete role')
                                return `<div class="btn-group">
                                <div class="dropdown">
                                    <button class="btn btn-flat-dark dropdown-toggle mr-1 mb-1" type="button" id="dropdownMenuButton700" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{__('dashboard.actions')}}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton700">
                                @can('edit role')
                                    <a class="dropdown-item" href="${edit}"><i class="fa fa-edit mr-1"></i>{{__('dashboard.edit')}}</a>
                                    @endcan
                                @can('delete role')
                                    <form action='${deleting}' method='POST' class="role-${data}">
                                    @csrf
                                    @method('DELETE')
                                    </form>
                                    <button class="dropdown-item" onClick="remove(${data},'role')"><i class="fa fa-trash mr-1"></i>{{__('dashboard.delete')}}</button>
                                @endcan
                                </div>
                                </div>
                            </div>`;
                            @endcan
                            }
                        },
                    ]
                });
                $('.add-new-permission').off().click(function (e){
                    e.preventDefault();
                   $('.permissions').append(`
                        <div class="plus-one mb-2">
                            <label>{{__('dashboard.add permission')}}</label>
                            <input type="text" name="name[]" class="form-control" placeholder="{{__('dashboard.add permission')}}">
                            @error('name')
                        <span class="text text-danger">{{$message}}</span>
                            @enderror
                   </div>
`);
                });

            });


        </script>

    @endsection
