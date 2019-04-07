@extends('layouts.student')
@section('title', 'Tutorials')
@section('bar', 'Tutorials')
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
        @foreach($tutorials as $tutorial)
    <div class="my-card">
        <div class="title-card ml-4 mt-4">
            <h2 class="text-left text-wrap pt-3">{{$tutorial->name}}</h2>
            <h2 class="text-left text-wrap pt-3">{{$tutorial->description}}</h2>
            <h2 class="text-left text-wrap pt-3">{{$tutorial->location}}</h2>
            <h2 class="text-left text-wrap pt-3"> {{date('M d,Y', strtotime($tutorial->date))}}</h2>
            <h2 class="text-left text-wrap pt-3">{{$tutorial->start_time}}</h2>
            <h2 class="text-left text-wrap pt-3">{{$tutorial->end_time}}</h2>
            <h2 class="text-left text-wrap pt-3">{{$tutorial->prequisite}}</h2>
            <hr>
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
