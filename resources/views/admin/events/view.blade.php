@extends('layouts.admin')
@section('title', 'View details')
@section('bar', 'View details')
@section('more_css')
<link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="row">
        <div class="col-lg-12">
                <div class="card-box">
            <div class="text-center card-box">
                <div class="member-card">
                    <div class="text-left m-t-40">
                        <p class="text-muted font-13"><strong>Event Name :</strong> <span class="m-l-15">{{ $eventdetail->name}}</span></p>

                        <p class="text-muted font-13"><strong>Location :</strong><span class="m-l-15">{{ $eventdetail->location}}</span></p>

                        <p class="text-muted font-13"><strong>Date :</strong> <span class="m-l-15">{{date('d M,Y', strtotime($eventdetail->date))}}</span></p>

                        <p class="text-muted font-13"><strong>Time :</strong> <span class="m-l-15">{{ $eventdetail->time}}</span></p>
                        @if($eventdetail->mode ==1)
                        <p class="text-muted font-13"><strong>Mode :</strong> <span class="badge badge-primary">Free</span></p>
                 @else
                 <p class="text-muted font-13"><strong>Mode :</strong> <span class="badge badge-success">Paid</span></p>
                @endif
            </div>
        <div class="col-lg-3 col-md-4 col-sm-4"></div>
        </div>
    </div>

 <div class="my-card p-3 mb-5">
        <h2>Registered Students</h2>
        <hr>
        <div class="card-box table-responsive">
            <table id="example" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Matric No</th>
                        <th>Name</th>
                        <th>Level</th>
                    </tr>
                </thead>
                <tbody>
                @if($allattend == null )
                
                @else
                @foreach($users as $user)
                @if(in_array($user->id,$allattend))
                    <tr>
                        <td> {{$id++}} </td>
                        <td>{{$user->matric_num}}</td>
                        <td>{{$user->lastname}} {{$user->firstname}}</td>
                        <td>{{$user->level}}</td>
                    </tr>
                     @endif
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="my-card p-3 mb-5">
        <h2>Attendees</h2>
        <hr>
        <div class="card-box table-responsive">
            <table id="example2" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Matric No</th>
                        <th>Name</th>
                        <th>Level</th>
                    </tr>
                </thead>
                <tbody>
                @if($allattended == null)
                
                @else
                @foreach($users as $user)
                @if(in_array($user->id,$allattended))
                    <tr>
                        <td> 1 </td>
                        <td>{{$user->matric_num}}</td>
                        <td>{{$user->lastname}} {{$user->firstname}}</td>
                        <td>{{$user->level}}</td>
                    </tr>
                    @endif
                    @endforeach
                @endif
                </tbody>
            </table>
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
    } );
    } );
</script>
<script type="text/javascript">
    $(document).ready(function() {
         $('#example2').DataTable( {
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
    } );
    } );
</script>

@endsection