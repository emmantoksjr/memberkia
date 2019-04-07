@extends('layouts.admin')
@section('title', 'Events')
@section('more_css')
<link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')

<div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <a href="{{ route('event.add') }}"  class="btn btn-success waves-effect waves-light">Add Event <i class="mdi mdi-plus-circle-outline"></i></a><br><br>
                <div class="table-responsive">
                <table id="example" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th data-priority="1">Name</th>
                        <th data-priority="2">Description</th>
                        <th data-priority="3">Location</th>
                        <th data-priority="4">Date</th>
                        <th data-priority="5">Start Time</th>
                        <th data-priority="6">End Time</th>
                        <th data-priority="7">Mode</th>
                        <th data-priority="8">Audience</th>
                        <th class="notexport"></th>
                        <th class="notexport"></th>
                        <th class="notexport"></th>
                    </tr>
                    </thead>
                    <tbody>
                            @foreach($events as $event)
                        <tr>
                            <th>{{ $event->name }}</th>
                            <td>{{$event->description}}</td>
                            <td>{{$event->location}}</td>
                            <td>{{date('d M,Y', strtotime($event->date))}}</td>
                            <td>{{$event->time}}</td>
                            <td>{{$event->end_time}}</td>
                            @if($event->mode == 1)
                            <td><span class="badge badge-primary">Free</span></td>
                        @elseif($event->mode == 2)
                        <td><span class="badge badge-success">Paid</span></td>
                        @endif
                            
                            <td><span class="badge badge-success">Students</span></td>
                            <td><a href="{{ action('AdminController@editEvent', $event->id) }}" class="btn btn-info waves-effect waves-light m-b-5" > <i class="fa  fa-pencil m-r-5"></i> <span>Edit</span> </button>
                            </td>
                            <td><a href="{{ action('AdminController@completeEvent', $event->id) }}" class="btn btn-danger waves-effect waves-light m-b-5" > <i class="fa   fa-trash m-r-5"></i> <span>Complete Event</span> </button></td>
                                <td><a href="{{ action('AdminController@viewDetails', $event->id) }}" class="btn btn-primary waves-effect waves-light m-b-5" > <i class="fa   fa-trash m-r-5"></i> <span>Details</span> </button></td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div> <!-- end row -->
    {{-- <div class="container mt-3">
        <div class="row">
            <div class="col-md-8 mb-2">
                <div class="my-card">
                    @foreach($events as $event)
                    <div class="my-card">
                    <div class="item">
                        <div class="title-card ml-4 mt-4">
                            <h2 class="text-left text-wrap pt-3 mb-3">{{ $event->name }}<br>
                                @if($event->mode == 1)
                                    <span style="font-size: 15px" class="badge badge-primary">Free</span>
                                @elseif($event->mode == 2)
                                    <span style="font-size: 15px" class="badge badge-success">Paid</span>
                                @endif
                            </h2>
                            <div class="flex-parent">
                                <div class="flex-child">
                                <span class="material-icons">
                                    location_on
                                </span>
                                </div>
                                <div class="flex-child flex-grow mt-1 ml-1">
                                   {{$event->location}}
                                </div>
                            </div>
                            <div class="flex-parent">
                                <div class="flex-child">
                                <span class="material-icons">
                                    calendar_today
                                </span>
                                </div>
                                <div class="flex-child flex-grow mt-1 ml-1">
                                    {{date('d M,Y', strtotime($event->date))}}
                                </div>
                            </div>
                            <div class="flex-parent">
                                <div class="flex-child">
                                <span class="material-icons">
                                    access_alarm
                                </span>
                                </div>
                                <div class="flex-child flex-grow mt-1 ml-1">
                                  Start:  {{$event->time}}  
                                  End:  
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="comment more ml-4 pb-4">
                            {{$event->description}}
                        </div>
                        <div class="footer p-3">
                            <a href="{{ action('AdminController@editEvent', $event->id) }}" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Edit Details</a>
                            <a href="{{ action('AdminController@completeEvent', $event->id) }}"  class="btn btn-success">Event Completed</a>
                            <a href="{{ action('AdminController@viewDetails', $event->id) }}" class="btn btn-info">View details</a>
                        </div>
                    </div>
                    <!-- <hr /> -->
                    </div>
                    @endforeach
                    {{$events->links( )}}
                </div>
            </div>
            <div class="col-md-4">
                <div class="my-card">
                    <p class="pt-3 pl-3 pb-3 pr-3">
                        <span class="badge badge-success">Paid</span> - This donote a paid event, Which means student would pay to attend a particular event
                    </p>
                    <p class="pl-3 pr-3 pb-3">
                        <span class="badge badge-primary">Free</span> - This donote a free event, Which means student would  attend a particular event for free but must
                        be registered to attend each such event
                    </p>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('event.add') }}" id="view-source" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--accent">
        <i class="material-icons">add</i>
    </a> --}}

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
    } );
</script>

@endsection



