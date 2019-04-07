@extends('layouts.student')
@section('title', 'Overview')
@section('bar', 'Overview')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="p-3">
                <div class="title">
                    <h3>Announcements</h3>
                    <hr>
                </div>
                <div class="body-card">
                    <div class="list">
                        @foreach($announcements as $announcement)
                        <div class="item my-card p-2 m-2">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="m-2 text-left text-wrap">{{ $announcement->title }}<br>
                                    <p class="badge badge-primary">admin</p><br>
                                    <small class="text-muted text-left">{{ date('M d, Y H:i', strtotime($announcement->created_at)) }}</small>
                                    </h4>
                                </div>
                                <p class="p-4 comment more">{{ $announcement->description }}</p>
                            </div>
                        </div>
                        @endforeach
                        {{ $announcements->links() }}
                    </div>
                </div>
            </div>
        </div>            

        <div class="col-md-4">
            <div class="p-3">
                 <div class="title">
                    <h3>Upcoming Events</h3>
                    <hr>
                </div>
                <div class="body-card">
                    <div class="list-group my-card">
                        <div class="item">
                        @foreach($events as $event)
                            <div class="row mt-2">
                                <div class="col-2 text-center">
                                    <span class="material-icons ml-4" >
                                    calendar_today
                                    </span>
                                </div>
                                <div class="col-10">
                                    <p>{{ $event->name }}<br>
                                    <small class="text-muted">{{ date('M d, Y H:i', strtotime($event->created_at)) }}</small>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop