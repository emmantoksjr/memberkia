@extends('layouts.student')
@section('title', 'Events')
@section('bar', 'Events')
@section('more_meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')

<div class="container">
<div class="row">
    <div class="col-md-8 mb-3">
        <div class="row">
            <div class="col-6">
                <!-- <label for="from">From:</label>
                <input type="date"> -->
            </div>
            <div class="col-6">
                <!-- <label for="to">To:</label>
                <input type="date"> -->
            </div>
        </div>
        <div class="col-md-4 mb-3">
                    <input class="due-text" style="display: none" id="firstname" value="{{$user->firstname}}">
                    <input class="due-text" style="display: none" id="lastname" value="{{$user->lastname}}">
                    <input class="due-text" style="display: none" id="email" value="{{$user->email}}">
                    <input class="due-text" style="display: none" id="phone" value="{{$user->phone}}">
                </div>
        @foreach($events as $event)
    <div class="my-card">
        <div class="title-card ml-4 mt-4">
            <h2 class="text-left text-wrap pt-3">{{$event->name}}</h2>
            @if($event->mode == 1)
            <small class="badge badge-primary">Free</small><br>
            @elseif($event->mode == 2)
            <small class="badge badge-success">Paid</small><br>
            @endif
            <small class="text-muted text-left"> {{date('M d,Y', strtotime($event->date))}}</small>
            <hr>
        </div>
        <div class="comment more ml-4 pb-4">
        {{$event->description}}
        </div>
        <div class="footer p-3">
        @if($event->mode == 1)
           @if(in_array($event->id,$ats))
            <a id="unattendFree"onclick="removeFree(event,{{$event->id}})" href="" class="btn btn-danger">Unattend Event</a>
            <a href="{{ route('student.generate') }}" class="btn btn-success">Generate Pass</a>
                 @else
            <a id="attendFree" onclick="attendFree(event,{{$event->id}})" href="" class="btn btn-primary">Attend Event</a>
                 @endif
         @elseif($event->mode == 2)
            @if(in_array($event->id,$ats))
            <a href="{{ route('student.generate') }}" class="btn btn-success">Generate Pass</a>
                 @else
            <a href="{{ route('student.event.pay', $event->id) }}" class="btn btn-success">Attend Event</a>
                 @endif
         @endif
        </div>
    </div>
    @endforeach
    </div>
    <div class="col-md-4">
        <div class="title">
            <h3>More Details</h3>
            <hr>
        </div>
        <div class="my-card">
            <ul class="demo-list-item mdl-list">
                <li class="mdl-list__item">
                    <a href="#" class="mdl-list__item-primary-content">
                        Pay due
                    </a>
                </li>
                <li class="mdl-list__item">
                    <a href="#" class="mdl-list__item-primary-content">
                        View announcements
                    </a>
                </li>
                <li class="mdl-list__item">
                    <a href="#" class="mdl-list__item-primary-content">
                    View Payments 
                    </a>
                </li>
            </ul>
        </div>
        <div class="my-card">
            <p class="p-2">
                <span class="badge badge-success">PAID</span> - Represents Paid Events which means students needs to pay to attend Events
            </p>
            <p class="p-2">
                <span class="badge badge-primary">FREE</span> - Represents Free Events which means students can attend free events 
            </p>
        </div>
    </div>
</div>
</div>
@stop
@section('more_js')
<script>
        function attendFree(e,id){
            e.preventDefault();
            var url = '/student/event/free/'+id;
            $.ajax({
                url: url,
                data: {
                    format: 'json'
                },
                error: function(data) {
                },
                dataType: 'json',
                success: function(response) {
                    $('#attendFree').remove();
                },
                type: 'GET'
            });
        }

        function removeFree(e,id){
            e.preventDefault();
            var url = '/student/event/free/remove/'+id;
            $.ajax({
                url: url,
                data: {
                    format: 'json'
                },
                error: function(data) {
                },
                dataType: 'json',
                success: function(response) {
                    $('#unattendFree').remove();
                    $('#generate').remove();
                },
                type: 'GET'
            });
        }

</script>
@endsection