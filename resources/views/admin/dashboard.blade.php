@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-success pull-left">
                                        <i class="mdi mdi-account-multiple-outline text-success"></i>
                                    </div>
                                    <div class="text-right">
                                    <h3 class="text-dark m-t-10"><b class="counter">{{$students->count()}}</b></h3>
                                        <p class="text-muted mb-0">All Students</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-3 col-md-6">
                                <div class="widget-bg-color-icon card-box fadeInDown animated">
                                    <div class="bg-icon bg-icon-primary pull-left">
                                        <i class="  mdi mdi-cash text-info"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark m-t-10"><b class="counter">31,570</b></h3>
                                        <p class="text-muted mb-0">Total DUE</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="text-dark  header-title m-t-0">Announcement</h4>
                                    <p class="text-muted m-b-25 font-13">
                                        This is a list of all announcments created by admin
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table table-hover m-b-0">
                                            <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Announcement</th>
                                                <th>Audience</th>
                                                {{-- <th>Date</th> --}}
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                        @foreach ($announcements as $announcement)
                                        <tr>
                                                <td>{{$announcement->title}} </td>
                                                <td>{{$announcement->description}} </td>
                                                @if ($announcement->viewers == 1)
                                                <td><span class="badge badge-success">Students</span></td>
                                                @elseif($announcement->viewers == 2)  
                                                <td><span class="badge badge-primary">Alumni</span></td>
                                                @else 
                                                <td><span class="badge badge-success">Both</span></td>
                                                @endif
                                                <td>
                                                    {{-- <a href="{!! action('AdminController@viewAnnouncementDetails', $announcement->id)!!}" class="btn btn-danger waves-effect waves-light m-b-5" > <i class="fa fa-pencil m-r-5"></i> <span>Edit</span> </a> --}}
                                                </td>
                                                <td><a href="{!! action('AdminController@editAnnouncementDetails', $announcement->id)!!}"class="btn btn-danger waves-effect waves-light m-b-5" > <i class="fa fa-trash m-r-5"></i> <span>Edit</span> </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="text-dark  header-title m-t-0">Events</h4> 
                                    <div class="table-rep-plugin">
                                        <div class="table-responsive" data-pattern="priority-columns">
                                            <table id="tech-companies-1" class="table  table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th data-priority="1">Location</th>
                                                        <th data-priority="3">Description</th>
                                                        <th data-priority="1">Date</th>
                                                        <th data-priority="3">Start Time</th>
                                                        <th data-priority="3">End Time</th>
                                                        <th data-priority="6">Mode</th>
                                                        <th data-priority="6">Audience</th>
                                                        <th data-priority="6"></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($events as $event)
                                                    <tr>
                                                            <th> {{$event->name}} </th>
                                                            <td> {{$event->location}} </td>
                                                            <td>{{$event->description}}</td>
                                                            <td> {{$event->date}} </td>
                                                            <td> {{$event->time}}</td>
                                                            <td>{{$event->end_time}} </td>
                                                            @if($event->mode == 1)
                                                            <td><span class="badge badge-primary">Free</span></td>
                                                            @else
                                                            <td><span class="badge badge-success">paid</span></td>
                                                            @endif
                                                            @if ($event->viewers == 1)
                                                            <td><span class="badge badge-primary">Students</span></td>
                                                            @elseif($event->viewers == 2)
                                                            <td><span class="badge badge-success">Alumni</span></td>
                                                            @else
                                                            <td><span class="badge badge-primary">Students</span>
                                                                <span class="badge badge-success">Alumni</span></td>
                                                            @endif
                                                            
                                                            <td><a href="{{ action('AdminController@editEvent', $event->id) }}" class="btn btn-danger waves-effect waves-light m-b-5" > <i class="fa  fa-pencil m-r-5"></i> <span>Edit</span> </a>
                                                            </td>
                                                            <td><a href="{{ action('AdminController@viewDetails', $event->id) }}"class="btn btn-danger waves-effect waves-light m-b-5" > <i class="fa   fa-trash m-r-5"></i> <span>Details</span> </a></td>
                                                            <td><a href="{{ action('AdminController@completeEvent', $event->id) }}"class="btn btn-danger waves-effect waves-light m-b-5"> <i class="fa   fa-trash m-r-5"></i> <span>Complete Event</span> </a></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
@stop
@section('more_js')
<script src="{{ asset('js/jquery.waypoints.min.js')}}"></script>
<script src="{{ asset('js/jquery.counterup.min.js')}}"></script>
<script src="{{ asset('js/morris.min.js')}}"></script>
<script src="{{ asset('js/raphael-min.js')}}"></script>
<script src="{{ asset('js/jquery.dashboard.js')}}"></script>
<script src="{{ asset('js/jquery.core.js')}}"></script>
<script src="{{ asset('js/jquery.app.js')}}"></script>    
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
    });
</script>
@endsection