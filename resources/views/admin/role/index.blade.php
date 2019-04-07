@extends('layouts.admin')
@section('title')
<a href="{{ route('role.create') }}"  class="btn btn-success waves-effect waves-light">Add Role <i class="mdi mdi-plus-circle-outline"></i></a><br>
@endsection
@section('more_css')
 <link href="{{ asset('css/dataTables.bootstrap4.min.css') }} " rel="stylesheet" type="text/css" />
 <link href="{{ asset('css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
 <link href="{{ asset('css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
 <link href="{{ asset('css/select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
        <div class="col-12">
            <div class="card-box">
                <ul class="nav nav-tabs tabs-bordered nav-justified">
                        <li class="nav-item">
                                <a href="/admin/users" aria-expanded="false" class="nav-link ">
                                    User
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/roles"  aria-expanded="true" class="nav-link active">
                                    Roles
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/priviledges" aria-expanded="false" class="nav-link">
                                    Priviledges
                                </a>
                            </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane  active" id="home-b2">
                        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th data-priority="1">ID</th>
                                <th data-priority="2">Title</th>
                                <th data-priority="3">Description</th>
                                <th></th>
                                {{-- <th></th> --}}
                            </tr>
                            </thead>


                            <tbody>
                                    @foreach($roles as $role)
                                    <tr>
                                        <td>{{$id++}}</td>
                                        <td><b>{{$role->name}}</b></td>
                                        <td>{{$role->description}}</td>
                                        <td><a  class="btn btn-danger waves-effect waves-light m-b-5" href="{!! action('Admin\RolesController@edit', $role->id)!!}">Edit Role</a> </td>
                                    </tr>
                                    @endforeach
                               
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>




    {{-- <div class="container mt-3">
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-" href="/admin/users">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/admin/roles">Roles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/priviledges">Priviledges</a>
            </li>
        </ul>
        <div class="my-card p-3">
            <a href="{{ route('role.create') }}" role="button" class="mt-2 mb-2 mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                Create Role
            </a>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{$id++}}</td>
                        <td><b>{{$role->name}}</b></td>
                        <td>{{$role->description}}</td>
                        <td><a href="{!! action('Admin\RolesController@edit', $role->id)!!}">Edit Role</a> </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
@stop
@section('more_js')
<script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('js/jszip.min.js')}}"></script>
<script src="{{ asset('js/pdfmake.min.js')}}"></script>
<script src="{{ asset('js/vfs_fonts.js')}}../plugins/datatables/"></script>
<script src="{{ asset('js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('js/buttons.print.min.js')}}"></script>
<script src="{{ asset('js/dataTables.keyTable.min.js')}}"></script>
<script src="{{ asset('js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('js/dataTables.select.min.js')}}"></script>
<script src="{{ asset('js/jquery.core.js')}}"></script>
<script src="{{ asset('js/jquery.app.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf']
        });
        $('#key-table').DataTable({
            keys: true
        });
        $('#responsive-datatable').DataTable();
        $('#selection-datatable').DataTable({
            select: {
                style: 'multi'
            }
        });
        table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });
</script>

@endsection