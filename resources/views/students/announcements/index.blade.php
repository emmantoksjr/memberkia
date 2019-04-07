@extends('layouts.student')
@section('title', 'Announcements')
@section('bar', 'Announcement')
@section('content')

<div class="container-fluid">

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Announcement</h4>
            
            <div class="clearfix"></div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-7">
        <div class="card-box">
            <ul class="sortable-list taskList list-unstyled" id="upcoming">

    @if($announcements->count() < 1)

     @else
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
                @endif
            </ul><br>
            {{ $announcements->links()}}
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
                <small>{{ date('M d,Y', strtotime($event->date)) }}</small>
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
       
            </ul>
        </div> 
    </div>
</div>

    <!-- <div class="container">
        <div class="row">
            <div class="col-md-8 mb-3">
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
                @if($announcements->count() < 1)
                    <div class="my-card">
                        <div class="title-card ml-4 mt-4">
                            <p class="text-left text-wrap pt-3">No Announcement</p>
                        </div>
                        <div class="comment more ml-4 pb-4">
                            There is no announcement in the time range chosen. Kindly select another time range.
                        </div>
                    </div>
                @else
                    @foreach($announcements as $announcement)
                        <div class="my-card">
                            <div class="title-card ml-4 mt-4">
                                <h2 class="text-left text-wrap pt-3">{{ $announcement->title }}</h2>
                                <small class="badge badge-primary">admin</small>
                                <br>
                                <small class="text-muted text-left">{{ date('M d, Y H:i', strtotime($announcement->created_at)) }}</small>
                                <hr>
                            </div>
                            <div class="comment more ml-4 pb-4">
                                {{ $announcement->description }}
                            </div>
                        </div>
                    @endforeach
                @endif
                {{ $announcements->links() }}
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
                                Attend Event
                            </a>
                        </li>
                        <li class="mdl-list__item">
                            <a href="#" class="mdl-list__item-primary-content">
                                View Payments
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->
@stop