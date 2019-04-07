@extends('layouts.admin')
@section('title', 'Announcements')
@section('more_css')
 <!-- DataTables -->
<link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
<!--<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />-->

<link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
<div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <a href="{{ route('admin.announcement.create') }}"  class="btn btn-success waves-effect waves-light">Add Announcement <i class="mdi mdi-plus-circle-outline"></i></a><br><br>
                <table id="example" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Announcement</th>
                        <th>Audience</th>
                        <th>Date</th>
                        {{-- <th></th> --}}
                        <th class="notexport"></th>
                    </tr>
                    </thead>
                    <tbody>
                            @foreach($announcements as $announcement)
                            @if($announcement->viewers == 1)
                    <tr>
                        <td>{!! $announcement->title !!}</td>
                        <td>{!! $announcement->description !!}</td>
                        <td><span class="badge badge-primary">Students</span></td>
                        <td>{{ $announcement->created_at }}</td>
                        {{-- <td>
                            <a href="{!! action('AdminController@viewAnnouncementDetails', $announcement->id)!!}" class="btn btn-success waves-effect waves-light m-b-5" > <i class="fa  fa-pencil m-r-5"></i> <span>View</span> </a>
                        </td> --}}
                        <td><a href="{!! action('AdminController@editAnnouncementDetails', $announcement->id)!!}" class="btn btn-info waves-effect waves-light m-b-5" > <i class="fa   fa-pencil m-r-5"></i> <span>Edit</span> </a></td>
                    </tr>
                    @elseif($announcement->viewers == 2) 
                    <tr>
                            <td>{!! $announcement->title !!}</td>
                            <td>{!! $announcement->description !!}</td>
                            <td><span class="badge badge-primary">Alumni</span></td>
                            <td>{{ $announcement->created_at }}</td>
                            {{-- <td>
                                <a href="{!! action('AdminController@viewAnnouncementDetails', $announcement->id)!!}" class="btn btn-danger waves-effect waves-light m-b-5" data-toggle="modal" data-target="#con-close-modal1"> <i class="fa  fa-pencil m-r-5"></i> <span>View</span> </a>
                            </td> --}}
                            <td><a href="{!! action('AdminController@editAnnouncementDetails', $announcement->id)!!}" class="btn btn-danger waves-effect waves-light m-b-5" > <i class="fa   fa-pencil m-r-5"></i> <span>Edit</span> </a></td>
                        </tr>
                    @elseif($announcement->viewers == 3)
                    <tr>
                            <td>{!! $announcement->title !!}</td>
                            <td>{!! $announcement->description !!}</td>
                            <td><span class="badge badge-primary">Student</span><span class="badge badge-success">Alumni</span></td>
                            <td>{{ $announcement->created_at }}</td>
                            {{-- <td>
                                <a href="{!! action('AdminController@viewAnnouncementDetails', $announcement->id)!!}" class="btn btn-danger waves-effect waves-light m-b-5" data-toggle="modal" data-target="#con-close-modal1"> <i class="fa  fa-pencil m-r-5"></i> <span>View</span> </a>
                            </td> --}}
                            <td><a href="{!! action('AdminController@editAnnouncementDetails', $announcement->id)!!}" class="btn btn-danger waves-effect waves-light m-b-5" > <i class="fa   fa-pencil m-r-5"></i> <span>Edit</span> </a></td>
                        </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end row -->
@stop
@section('more_js')
<!-- Required datatable js -->
<script src="{{ asset('js/jquery.js')}}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('js/buttons.flash.min.js')}}"></script>
<script src="{{ asset('js/jszip.min.js')}}"></script>
<script src="{{ asset('js/pdfmake.min.js')}}"></script>
<script src="{{ asset('js/vfs_fonts.js')}} "></script>
<script src="{{ asset('js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('js/buttons.print.min.js')}}"></script>
<script src="{{ asset('js/jquery.core.js')}}"></script>
<script src="{{ asset('js/jquery.app.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
         $('#example').DataTable( {
        dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
         buttons: [
        {
        extend: 'excel',
        text: 'Excel',
        className: 'btn btn-default',
        exportOptions: {
            columns: ':not(.notexport)'
        }},
        {
        extend: 'copy',
        text: 'Copy',
        className: 'btn btn-default',
        exportOptions: {
            columns: ':not(.notexport)'
        }},
        {
        extend: 'csv',
        text: 'CSV',
        className: 'btn btn-default',
        exportOptions: {
            columns: ':not(.notexport)'
        }},
        {
        extend: 'pdf',
        text: 'PDF',
        className: 'btn btn-default',
        exportOptions: {
            columns: ':not(.notexport)'
        }},
        {
        extend: 'print',
        text: 'Print',
        className: 'btn btn-default',
        exportOptions: {
            columns: ':not(.notexport)'
        }},
        
    ]
    } );
    // $('#example').DataTable();
        // $('#datatable').DataTable();
        // var table = $('#datatable-buttons').DataTable({
        //     lengthChange: false,
        //     buttons: ['copy', 'excel', 'pdf']
        // });
        // $('#key-table').DataTable({
        //     keys: true
        // });
        // $('#responsive-datatable').DataTable();
        // $('#selection-datatable').DataTable({
        //     select: {
        //         style: 'multi'
        //     }
        // });
        // table.buttons().container()
        //         .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    } );
</script>

@endsection