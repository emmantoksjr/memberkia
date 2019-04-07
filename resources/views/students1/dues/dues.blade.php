@extends('layouts.student')
@section('title', 'Dues')
@section('bar', 'Dues')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 mb-3">
            <ul class="nav nav-tabs nav-justified">
                <li class="nav-item">
                    <a class="nav-link active" href="/student/dues">Pending Dues</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/student/dues/paid">Paid Dues</a>
                </li>
            </ul>
            <div class="my-card p-3 mt-2">
                 @foreach($dues as $due)
                    @if(in_array($due->id, $alldues))
                    @else
                        <div class="flex-parent">
                    <div class="flex-child">
                        <img src="{{asset('/img/bank.svg')}}" alt="bank image" />
                    </div>
                    <div class="flex-child flex-grow">
                        <h2>{{ $due->name }}</h2>
                        <p class="due-text">{{ $due->amount }}</p>
                        <p class="due-session">{{$due->session}} session</p>
                        <a href="{{ route('student.due.pay', $due->id) }}" class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect">Pay now</a>
                    </div>
                </div>
                <hr>
                @endif
                @endforeach
                {{ $student_dues->links() }}
          
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="mt-0">
                <h3>More Details</h3>
                <hr>
            </div>
            <div class="my-list my-card">
                <div class="my-list-item p-3">
                    <a href="/student/announcement">View announcements</a>
                </div>
                <div class="my-list-item p-3">
                    <a href="/student/announcement">View events</a>
                </div>
                <div class="my-list-item p-3">
                    <a href="/student/announcement">View payments</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
