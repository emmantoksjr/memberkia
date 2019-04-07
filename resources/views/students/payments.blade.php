@extends('layouts.student')
@section('title', 'Payments')
@section('bar', 'Payments')
@section('content')

      <div class="container-fluid">

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Payment</h4>
            
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 ">
        <div class="card-box">
            
            <table id="example" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th data-priority="1">ID</th>
                    <th data-priority="2">Name</th>
                    <th data-priority="3">Amount</th>
                    <th data-priority="4">Mode</th>
                    <th data-priority="4">Type</th>
                    <th data-priority="4">Transaction Status</th>
                    <th data-priority="4">Date</th>
                </tr>
                </thead>

                    <tbody>
                  @foreach($payments as $payment)
                            @if($payment->due_id > 0)
                            <tr>
                                <td>{{$id++}}</td>
                                @foreach($dues as $due)
                                @if($payment->due_id == $due->id)
                                <td>{{ $due->name }}</td>
                                @endif
                                @endforeach
                                <td>{{$payment->paid}}</td>
                                <td>{{$payment->mode}}</td>
                                <td>Due</td>
                                <td><span style="color:green">{{$payment->status}}</span></td>
                                <td>{{$payment->payin_time}}</td>
                            </tr>
                            @else
                            <tr>
                                <td>{{$id++}}</td>
                                @foreach($events as $event)
                                @if($payment->event_id == $event->id)
                                <td>{{ $event->name }}</td>
                                @endif
                                @endforeach
                                <td>{{$payment->paid}}</td>
                                <td>{{$payment->mode}}</td>
                                <td>Event</td>
                                <td><span style="color:green">{{$payment->status}}</span></td>
                                <td>{{$payment->payin_time}}</td>
                            </tr>
                            @endif
                            @endforeach
                            </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->

@stop