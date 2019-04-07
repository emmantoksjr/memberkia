@extends('layouts.admin')
@section('title', 'Tutorials')
@section('bar', 'Tutorials')
@section('more_css')
<link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
<!--<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />-->

<link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <a href="/admin/tutorial/create"  class="btn btn-success waves-effect waves-light">Add Tutorial <i class="mdi mdi-plus-circle-outline"></i></a><br><br>
                <div class="table-responsive">
                <table id="example" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        {{-- <th>ID</th> --}}
                        <th data-priority="1">Name</th>
                        <th data-priority="2">Description</th>
                        <th data-priority="3">Level</th>
                        <th data-priority="4">Location</th>
                        <th data-priority="5">Start Time</th>
                        <th data-priority="6">End Time</th>
                        <th data-priority="7">Date</th>
                        <th data-priority="8">Prequisites</th>
                        <th class="notexport"></th>
                    </tr>
                    </thead>
                    <tbody>
                            @foreach($tutorials as $tutorial)
                            <tr>
                              {{-- <td>{{ $id++}}</td> --}}
                              <td>{{ $tutorial->name }}</td>
                              <td>{{ $tutorial->description}}</td>
                              <td>{{ $tutorial->level}}</td>
                              <td>{{ $tutorial->location}}</td>
                              <td>{{ $tutorial->start_time }}</td>
                              <td>{{ $tutorial->end_time }}</td>
                              <td>{{ $tutorial->date}}</td>
                              <td>{{ $tutorial->prequisites}}</td>
                              <td><a class="btn btn-danger waves-effect waves-light m-b-5" href="{{ route('tutorial.edit', $tutorial->id)}}">Edit details</a></td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div> 
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