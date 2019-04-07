@extends('layouts.student')
@section('title', 'Payments')
@section('bar', 'Payments')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mb-3">
                <form>
                    <div class="row mb-3">
                        <div class="col-4">
                            <label>From:</label>
                            <input type="date">
                        </div>
                        <div class="col-4">
                            <label>To:</label>
                            <input type="date">
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-sm btn-success">Check</button>
                        </div>
                    </div>
                </form>
                <div class="my-card">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Amount (NGN)</th>
                                <th>Mode</th>
                                <th>Type</th>
                                <th>Transaction Status</th>
                                <th>Date</th>
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
            </div>
            <div class="col-md-4">
                <div class="mt-0">
                    <h3>More Details</h3>
                    <hr>
                </div>
                <div class="my-list my-card">
                    <div class="my-list-item p-3">
                        <a href="/student/announcement">View announcements</a>
                    </div>
                    <div class="my-list-item p-3">
                        <a href="/student/event">Attend events</a>
                    </div>
                    <div class="my-list-item p-3">
                        <a href="/student/dues">Pay dues</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop