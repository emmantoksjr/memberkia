@extends('layouts.student')
@section('title', 'Overview')
@section('bar', 'Overview')
@section('content')

<div class="container-fluid">

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Dashboard</h4>
            
            <div class="clearfix"></div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-7">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">Announcement</h4>
            <p class="text-muted m-b-30 font-13">
                <!--Your awesome text goes here. Your awesome text goes here.-->
            </p>

            <ul class="sortable-list taskList list-unstyled" id="upcoming">

              @foreach($announcements as $announcement)

                <li id="task3">
                    <h4 class="text-dark header-title m-t-0">{{ $announcement->title }}</h4>
                    {{ $announcement->description }}
                    <div class="clearfix"></div>
                    <div class="mt-3">
                        <p class="mb-0 float-right">
                            <small>{{ date('M d, Y H:i', strtotime($announcement->created_at)) }}</small>
                        </p>
                        <p class="mb-0">
                            <button type="button" class="btn btn-success btn-sm waves-effect waves-light">Admin</button>
                        </p>
                    </div>
                </li>

                 @endforeach

                 {{ $announcements->links() }}
            </ul>


        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-5">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">Upcoming Events</h4>
            <p class="text-muted m-b-30 font-13">
                <!--Your awesome text goes here. Your awesome text goes here.-->
            </p>

            <ul class="sortable-list taskList list-unstyled" id="upcoming">

             @foreach($events as $event)    
                <li class="task-danger" id="task1">


                @if( $event->price > 0)
                    <div class=" pull-right">
                        <small class="badge badge-danger">Price {{ $event->price }}</small>
                    </div>
                @endif
                    <h4 class="text-dark header-title m-t-0">{{ $event->name }}</h4>
                    {{ $event->description }}
                    <p><i class=" ti-location-pin"></i> {{ $event->location }}</p>
                    <div class="clearfix"></div>
                    <div class="mt-3">
                        <p class="mb-0 float-right">
                            <small>{{ date('M d, Y H:i', strtotime($event->created_at)) }}</small>
                        </p>
                        <!-- <p class="mb-0">
                            <button type="button" class="btn btn-danger btn-sm waves-effect waves-light">Attend Event</button>
                        </p> -->
                    </div>
                </li>

             @endforeach
                <!-- <li class="task-info" id="task2">
                    <div class="pull-right">
                        <small class="badge badge-info">Free</small>
                    </div>
                    <h4 class="text-dark header-title m-t-0">Health due</h4>
                    Many desktop publishing packages and web page editors now use Lorem.
                    <p><i class=" ti-location-pin"></i> Location</p>
                    <div class="clearfix"></div>
                    <div class="mt-3">
                        <p class="mb-0 float-right">
                            <small>Sep 04, 2018 09:13</small>
                        </p>
                        <p class="mb-0">
                            <button type="button" class="btn btn-info btn-sm waves-effect waves-light">Generate Pass</button>
                        </p>
                    </div>
                </li>

                <li class="task-danger" id="task1">
                    <div class=" pull-right">
                        <small class="badge badge-danger">Price #1000</small>
                    </div>
                    <h4 class="text-dark header-title m-t-0">Library due</h4>
                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    <p><i class=" ti-location-pin"></i> Location</p>
                    <div class="clearfix"></div>
                    <div class="mt-3">
                        <p class="mb-0 float-right">
                            <small>Sep 04, 2018 09:13</small>
                        </p>
                        <p class="mb-0">
                            <button type="button" class="btn btn-danger btn-sm waves-effect waves-light">Attend Event</button>
                        </p>
                    </div>
                </li>
                <li class="task-info" id="task2">
                    <div class="pull-right">
                        <small class="badge badge-info">Free</small>
                    </div>
                    <h4 class="text-dark header-title m-t-0">Health due</h4>
                    Many desktop publishing packages and web page editors now use Lorem.
                    <p><i class=" ti-location-pin"></i> Location</p>
                    <div class="clearfix"></div>
                    <div class="mt-3">
                        <p class="mb-0 float-right">
                            <small>Sep 04, 2018 09:13</small>
                        </p>
                        <p class="mb-0">
                            <button type="button" class="btn btn-info btn-sm waves-effect waves-light">Generate Pass</button>
                        </p>
                    </div>
                </li> -->
            </ul>
        </div>
    </div>
</div>
@stop