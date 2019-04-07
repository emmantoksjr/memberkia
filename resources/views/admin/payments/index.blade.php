@extends('layouts.admin')
@section('title', 'Payments')
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
                <a href="{{ route('admin.payments.create') }}/"  class="btn btn-success waves-effect waves-light">Make Payment <i class="mdi mdi-plus-circle-outline"></i></a>
                <ul class="nav nav-tabs tabs-bordered nav-justified">
                    <li class="nav-item">
                        <a href="/admin/payments" aria-expanded="false" class="nav-link active">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/payments/online"  aria-expanded="true" class="nav-link">
                            Online Payment
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/payments/office" aria-expanded="false" class="nav-link">
                            In-office Payment
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane  active" id="home-b2">
                        <div class="table-responsive">
                        <table id="example" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th data-priority="1">Matric</th>
                                <th data-priority="2">Receipt</th>
                                <th data-priority="3">Name</th>
                            {{--    <th data-priority="4">Level</th> --}}
                                <th data-priority="5">Year</th>
                                <th data-priority="6">Level</th>
                                <th data-priority="7">Due</th>
                                <th data-priority="8">Payment Mode</th>
                                <th data-priority="9">Amount</th>
                                <th data-priority="10">Balance</th>
                                <th class="notexport"></th>
                                <!--<th></th>-->
                                <!--<th></th>-->
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $payment)
                                @foreach($dues as $due)
                                @if($payment->due_id == $due->id)
                                <tr>
                                   <td>{{$payment->matric}}</td>
                                   <td>{{$payment->reciept}}</td>
                                   @foreach($students as $student)
                                   @if($payment->matric == $student->matric_num)
                                   <td>{{$student->lastname}} {{$student->firstname}}</td>
                                {{--   <td>{{$student->level}}</td> --}}
                                   @endif
                                   @endforeach
                                  <td>{{$due->year}}</td>
                                   <td>{{$due->session}}</td>
                                   <td>{{$due->name}}</td>
                                  
                                   <td>{{$payment->mode}}</td>
                                   <td>{{$payment->paid}}</td>
                                   <td>{{$payment->balance}}</td>
                                   <td>
                                       <!--<a class="btn btn-info waves-effect waves-light m-b-5" data-toggle="modal" data-target="#con-close-modal1"> <i class="fa   fa-eye m-r-5"></i> <span>View</span> </a>-->
                                 <a href="{{ route('admin.payment.details', $payment->id) }}" class="btn btn-info waves-effect waves-light m-b-5">View details</a></td>
                               </tr>
                               @endif
                               @endforeach
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