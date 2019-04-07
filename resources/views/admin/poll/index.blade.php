@extends('layouts.admin')
@section('title', 'Polls')
@section('more_css')
<link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
                <a href="{{ route('admin.poll.create') }}/"  class="btn btn-success waves-effect waves-light">Create Poll <i class="mdi mdi-plus-circle-outline"></i></a>
                <div class="tab-content">
                    <div class="tab-pane  active" id="home-b2">
                        <div class="table-responsive">
                        <table id="example" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th data-priority="1">Title</th>
                                <th data-priority="2">Description</th>
                                <th data-priority="3">Deadline</th>
                                <th class="notexport"></th>
                                <th class="notexport"></th>
                                <th class="notexport"></th>
                                <th class="notexport"></th>
                            </tr>
                            </thead>
                            <tbody>
                              
                                @foreach ($polls as $poll)
                                    <tr>  
                                    <td> {{ $poll->title}} </td>
                                    <td> {{ $poll->description}} </td>
                                    <td> {{ $poll->deadline}} </td>
                                    <td ><a href="{{ route('admin.poll.view', $poll->id) }}"> view </a></td>
                                    <td ><a href="{{ route('admin.poll.edit', $poll->id) }}"> Edit </a></td>
                                    <td ><a href="{{ route('admin.poll.start', $poll->id) }}"> Start Poll </a></td>
                                    <td ><a href="{{ route('admin.poll.stop', $poll->id) }}"> Stop Poll </a></td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@stop
@section('more_js')
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
    } ); } );
</script>
@endsection

    {{-- <div class="container mt-3 mb-3" >
       
        <div class="row">

            <div class="col-md-7">

                <div class="list-group">

                    <div class="list-group-item">

                        <h2>Next Naussa President</h2>
                        <p>A poll consist of the four candidates running for the naussa post</p>
                        <p>4 candidate</p>
                        <p>
                            <span class="text-danger">10th of October, 2018</span>
                        </p>

                        <p>
                        <div class="btn btn-group-toggle">

                            <button class="btn btn-primary">View</button>
                            <button class="btn btn-success">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </div>
                        </p>
                    </div>

                    <div class="list-group-item">

                        <h2>ACUSA President</h2>
                        <p>A poll that consist of four candidates contesting for the ACUSA president</p>
                        <p>4 candidate</p>
                        <p>
                            <span class="text-danger">10th of October, 2018</span>
                        </p>

                        <p>
                        <div class="btn btn-group-toggle">

                            <button class="btn btn-primary">View</button>
                            <button class="btn btn-success">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </div>
                        </p>
                    </div>

                </div>


            </div>

            <div class="col-md-5">

                <div class="list-group-item mt--3">

                    <h3>Quick Links</h3>
                    <hr>

                    <ul>

                        <li><a href="">Create Dues</a> </li>
                        <li><a href="">Create Announcement</a></li>
                        <li><a href="">Create Events</a></li>
                    </ul>

                </div>

            </div>

        </div>



    </div>

    <a href="/admin/polls/create" id="view-source" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--primary">
        <i class="material-icons">add</i>
    </a> --}}
