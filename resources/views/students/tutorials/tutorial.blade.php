@extends('layouts.student')
@section('title', 'Tutorials')
@section('bar', 'Tutorials')
@section('more_meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
<div class="container-fluid">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Tutorial</h4>
                                    
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-7">
                                <div class="card-box">
                                    <ul class="sortable-list taskList list-unstyled" id="upcoming">

                                @foreach($tutorials as $tutorial)
                                        <li id="task3">
                                            <h4 class="text-dark header-title m-t-0">{{ $tutorial->title }}</h4>
                                           {{ $tutorial->description }}
                                            <div class="clearfix"></div>
                                            <div class="mt-3">
                                                <p class="mb-0 float-right">
                                                    <small>{{date('M d,Y', strtotime($tutorial->date))}}</small>
                                                </p>
                                                <p class="mb-0">
                                                    <p><i class=" ti-location-pin"></i> {{ $tutorial->location }}</p>
                                                    <p><i class="ti-calendar"></i>&nbsp; {{date('M d,Y', strtotime($tutorial->date))}}</p>
                                                    <p><i class="ti-alarm"></i> &nbsp; {{$tutorial->start_time}} - {{$tutorial->end_time}} </p>
                                                </p>
                                            </div>
                                        </li>

                                    @endforeach
                                        
                                    </ul><br>
                                    {{$tutorials->links()}}
                                    <!--<nav>-->
                                    <!--    <ul class="pagination justify-content-center">-->
                                    <!--        <li class="page-item">-->
                                    <!--            <a class="page-link" href="#" aria-label="Previous">-->
                                    <!--                <span aria-hidden="true">&laquo;</span>-->
                                    <!--                <span class="sr-only">Previous</span>-->
                                    <!--            </a>-->
                                    <!--        </li>-->
                                    <!--        <li class="page-item"><a class="page-link" href="#">1</a></li>-->
                                    <!--        <li class="page-item"><a class="page-link" href="#">2</a></li>-->
                                    <!--        <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                                    <!--        <li class="page-item"><a class="page-link" href="#">4</a></li>-->
                                    <!--        <li class="page-item"><a class="page-link" href="#">5</a></li>-->
                                    <!--        <li class="page-item">-->
                                    <!--            <a class="page-link" href="#" aria-label="Next">-->
                                    <!--                <span aria-hidden="true">&raquo;</span>-->
                                    <!--                <span class="sr-only">Next</span>-->
                                    <!--            </a>-->
                                    <!--        </li>-->
                                    <!--    </ul>-->
                                    <!--</nav>-->
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

                                    @if($event->mode == 1)

                                    <li class="task-info" id="task2">
                                            <div class="pull-right">
                                                <small class="badge badge-info">Free</small>
                                            </div>
                                            <h4 class="text-dark header-title m-t-0">{{ $event->name }}</h4>
                                                    {{ $event->description }}
                                            <div class="clearfix"></div>
                                            <div class="mt-3">
                                                <p class="mb-0 float-right">
                                                    <small>{{date('M d,Y', strtotime($event->date))}}</small>
                                                </p>
                                                <p class="mb-0">
                                                    <button type="button" class="btn btn-info btn-sm waves-effect waves-light">View</button>
                                                </p>
                                            </div>
                                        </li>


                                    @elseif($event->mode == 2)
                                    <li class="task-danger" id="task1">
                                            <div class=" pull-right">
                                                <small class="badge badge-danger">Paid</small>
                                            </div>
                                            <h4 class="text-dark header-title m-t-0">{{ $event->name }}</h4>
                                            {{ $event->description }}
                                            <div class="clearfix"></div>
                                            <div class="mt-3">
                                                <p class="mb-0 float-right">
                                                    <small>{{date('M d,Y', strtotime($event->date))}}</small>
                                                </p>
                                                <p class="mb-0">
                                                    <button type="button" class="btn btn-danger btn-sm waves-effect waves-light">View</button>
                                                </p>
                                            </div>
                                        </li>


                                    @endif
                         

                                    @endforeach
                                        <!-- <li class="task-info" id="task2">
                                            <div class="pull-right">
                                                <small class="badge badge-info">Free</small>
                                            </div>
                                            <h4 class="text-dark header-title m-t-0">Health due</h4>
                                            Many desktop publishing packages and web page editors now use Lorem.
                                            <div class="clearfix"></div>
                                            <div class="mt-3">
                                                <p class="mb-0 float-right">
                                                    <small>Sep 04, 2018 09:13</small>
                                                </p>
                                                <p class="mb-0">
                                                    <button type="button" class="btn btn-info btn-sm waves-effect waves-light">View</button>
                                                </p>
                                            </div>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>


@stop
