@extends('layouts.admin')
@section('title', 'Event Payments')
@section('more_css')
<link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
<!--<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />-->

<link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<form method="post">
        @csrf
        <div class="row mb-3">
            <div class="col-4">
                <label>From:</label>
                <input name="from" type="date">
            </div>
            <div class="col-4">
                <label>To:</label>
                <input name="to" type="date">
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-sm btn-success">Check</button>
            </div>
        </div>
    </form>
<div class="row">
        <div class="col-12">
            <div class="card-box">
                <ul class="nav nav-tabs tabs-bordered nav-justified">
                        <li class="nav-item">
                                <a class="nav-link" href="/admin/event/payments">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/event/payments/online">Online Payments</a>
                            </li>
                
                            <li class="nav-item">
                                <a class="nav-link active" href="/admin/event/payments/office">In-office Payments</a>
                        </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane  active" id="home-b2">
                        <div class="table-responsive">
                        <table id="example" class="table table-bordered table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th data-priority="1">Matric</th>
                                <th data-priority="2">Receipt</th>
                                <th data-priority="3">Name</th>
                                <th data-priority="4">Level</th>
                                <th data-priority="5">Session</th>
                                <th data-priority="6">Due</th>
                                <th data-priority="7">Status</th>
                                <th data-priority="8">Amount Paid</th>
                                <th data-priority="9">Balance</th>
                                <th data-priority="10">Payment Date</th>
                                <th class="notexport"></th>
                            </tr>
                            </thead>


                            <tbody>
                                {{-- <tr>
                                    <th>14N02012</th>
                                    <td>T045747628580227</td>
                                    <td>Darego Agbani</td>
                                    <td>100</td>
                                    <td>First Semester</td>
                                    <td>Monthly</td>
                                    <td><span class="badge badge-success">Success</span></td>
                                    <td>100</td>
                                    <td>0</td>
                                    <td>2018-09-07T17:40:49.000Z</td>
                                    <td><button class="btn btn-info waves-effect waves-light m-b-5" data-toggle="modal" data-target="#con-close-modal1"> <i class="fa   fa-eye m-r-5"></i> <span>View</span> </button></td>
                                </tr> --}}
                                @foreach($payments as $payment)
                     <tr>
                        <td>{{$payment->matric}}</td>
                        <td>{{$payment->reciept}}</td>
                        @foreach($students as $student)
                        @if($payment->matric == $student->matric_num)
                        <td>{{$student->lastname}} {{$student->firstname}}</td>
                        <td>{{$student->level}}</td>
                        @endif
                        @endforeach
                        @foreach($events as $event)
                        @if($payment->event_id == $event->id)
                        <td>{{$event->name}}</td>
                        @endif
                        @endforeach
                        <td><span style="color: green;">{{$payment->status}}</span></td>
                        <td>{{$payment->paid}}</td>
                        <td>{{$payment->balance}}</td>
                        <td>{{$payment->payin_time}}</td>
                        <td class="notexport"><a href="{{ route('admin.payment.details', $payment->id) }}" class="btn btn-primary">View details</a></td>
                    </tr>
                        @endforeach
                                
                                <!-- Repeat -->
                            </tbody>
                        </table>
                    </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div> <!-- end row -->













    {{-- <div class="container mt-2">
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link" href="/admin/payments">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/payments/online">Online Payments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/admin/payments/office">In-office Payments</a>
            </li>
        </ul>
        <div class="table-responsive-lg table-responsive-sm">
            <table id="example1" class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Receipt</th>
                    <th>Name</th>
                    <th>Level</th>
                    <th>Due</th>
                    <th>Session</th>
                    <th>Status</th>
                    <th>Amount Paid(NG)</th>
                    <th>Balance (NGN)</th>
                    <th>Payment date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <td>{{$payment->matric}}</td>
                        <td>{{$payment->reciept}}</td>
                        @foreach($students as $student)
                        @if($payment->matric == $student->matric_num)
                        <td>{{$student->lastname}} {{$student->firstname}}</td>
                        <td>{{$student->level}}</td>
                        @endif
                        @endforeach
                        @foreach($dues as $due)
                        @if($payment->due_id == $due->id)
                        <td>{{$due->name}}</td>
                        <td>{{$due->session}}</td>
                        @endif
                        @endforeach
                        <td><span style="color: green;">{{$payment->status}}</span></td>
                        <td>{{$payment->paid}}</td>
                        <td>{{$payment->balance}}</td>
                        <td>{{$payment->payin_time}}</td>
                        <td class="notexport"><a href="{{ route('admin.payment.details', $payment->id) }}" class="mdl-button btn-sm mdl-js-button text-center mdl-button mdl-button--colored">View details</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}
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